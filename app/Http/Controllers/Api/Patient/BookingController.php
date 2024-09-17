<?php

namespace App\Http\Controllers\Api\Patient;

use App\Http\Controllers\Controller;
use App\Http\Resources\AgoraRoomResource;
use App\Http\Resources\BookingResource;
use App\Http\Resources\ReplayingBookingResource;
use App\Http\Traits\Api_Trait;
use App\Http\Traits\Upload_Files;
use App\Models\AgoraRoom;
use App\Models\Booking;
use App\Models\Doctor;
use App\Models\Notification;
use App\Models\BookingDoc;
use App\Models\MainServicePackage;
use App\Models\Package;
use App\Models\PatientSubscribe;
use App\Models\Relative;
use App\Models\ReplyingBooking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\PaymentGateways\Paypal as newPaypal;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class BookingController extends Controller
{
    use Api_Trait,Upload_Files;
    //
    public function make_booking(Request $request){
        $validator = Validator::make($request->all(),
            [
                'main_service_id' => 'required|exists:main_services,id',
                'desc'=>'required|string',
                'operation_type'=>'nullable|in:package,insurance,paid_online',
                'specialization_type'=>'nullable|in:nutrition,speech_and_psychological',
                'doc'=>'nullable|array',
                'doc.*'=>'required|file',

            ], []);
        if ($validator->fails()) {
            return $this->returnErrorValidation(collect($validator->errors())->flatten(1),403);
        }

        $patient=auth('patient')->user();

        if($request->operation_type == 'package') {
            $patient_subscribes=PatientSubscribe::where('patient_id',$patient->id)->where('status','active')->whereHas('package',function ($query) use ($request){
                $query->whereHas('mainServicesPackage',function ($q) use ($request){
                    $q->where('main_service_id',$request->main_service_id);
                });
            })->get();
    
            $booking_test=false;
    
            foreach ($patient_subscribes as $patient_subscribe){
                $package=Package::find($patient_subscribe->package_id);
    
                if ($package){
    
                    $all_patient_service_count=MainServicePackage::where('package_id',$package->id)->where('main_service_id',$request->main_service_id)->sum('count');
                    $use_patient_service_count=Booking::where('operation_type','package')->where('operation_id',$patient_subscribe->id)->where('main_service_id',$request->main_service_id)->count();
                    if ($use_patient_service_count<$all_patient_service_count){
    
                    $booking= Booking::create([
                            'patient_id'=>$patient->id,
                            'main_service_id'=>$request->main_service_id,
                            'operation_type'=>'package',
                            'operation_id'=>$patient_subscribe->id,
                            'desc'=>$request->desc,
                            'day'=>date('Y-m-d'),
                            'time'=>date('H:i:s'),
                            'specialization_type' => $request->specialization_type ?? null,
                        ]);
    
                    $booking_id=$booking->id;
    
                    if ($request->doc)
                        foreach ($request->doc as $doc){
                            $doc_file = $this->uploadFiles('bookings', $doc, null);
    
                            BookingDoc::create([
                                'booking_id'=>$booking->id,
                                'doc'=>$doc_file,
                            ]);
                        }
    
    
    
    
                        $booking_test=true;
    
                        $all_package_count=count($package->mainServicesPackage);
                        $use_package_count=0;
    
                        foreach ($package->mainServicesPackage as $mainServicePackage){
                            $all_package_service_count=MainServicePackage::where('package_id',$package->id)->where('main_service_id',$mainServicePackage->main_service_id)->first()->count??0;
                            $use_package_service_count=Booking::where('operation_type','package')->where('operation_id',$patient_subscribe->id)->where('main_service_id',$mainServicePackage->main_service_id)->count();
                            if ($all_package_service_count==$use_package_service_count){
                                ++$use_package_count;
                            }
                        }
    
                        if ($all_package_count==$use_package_count){
                            $patient_subscribe->update([
                                'status'=>'expire',
                            ]);
                        }
    
    
                        break;
                    }
    
    
    
    
                }
            }
    
            if ($booking_test){
                   $doctors = Doctor::whereHas('categories', function ($query) {
                    $query->where('category_id', 15);
                })->get();
                
                if($booking->specialization_type) {
                    $body = $booking->specialization_type;
                } else {
                    $body = 'General Consultation';
                }
                foreach($doctors as $doctor) {
                    Notification::create([
                        'title' => helperTrans('api.Booking ') . $body,
                        'body' => 'You have New booking - '. $body,
                        'user_type' => 'patient',
                        'user_id' => $doctor->id,
                        'type' => 'booking',
                        'foreign_id' => $booking->id,
                        'main_service_id' => $booking->main_service_id,
                        'date' => date('Y-m-d'),
                    ]);
                }
            
                return  $this->returnData(BookingResource::make($booking),[helperTrans('api.booking successfully')]);
            }
            else
                return  $this->returnError([helperTrans('api.you don`t have package active for this service')]);
        } else {
            if ($request->image) {
                $image = $request->file('image'); // Get the single uploaded file
                $image_file = $this->uploadFiles('bookings', $image, null); // Call the method to upload the file
            }
            $booking = Booking::create([
                'patient_id'=>$patient->id,
                'main_service_id'=>$request->main_service_id,
                'operation_type'=>$request->operation_type,
                //'operation_id'=>$patient_subscribe->id,
                'desc'=>$request->desc,
                'day'=>date('Y-m-d'),
                'time'=>date('H:i:s'),
                'specialization_type' => $request->specialization_type ?? null,
                'image' => $image_file ?? null,
            ]);

            $booking_id=$booking->id;

            if ($request->doc)
                foreach ($request->doc as $doc){
                    $doc_file = $this->uploadFiles('bookings', $doc, null);

                    BookingDoc::create([
                        'booking_id'=>$booking->id,
                        'doc'=>$doc_file,
                    ]);
                }

        }

        $doctors = Doctor::whereHas('categories', function ($query) {
            $query->where('category_id', 15);
        })->get();
        
        if($booking->specialization_type) {
            $body = $booking->specialization_type;
        } else {
            $body = 'General Consultation';
        }
        foreach($doctors as $doctor) {
            Notification::create([
                'title' => helperTrans('api.Booking ') . $body,
                'body' => 'You have New booking - '. $body,
                'user_type' => 'patient',
                'user_id' => $doctor->id,
                'type' => 'booking',
                'foreign_id' => $booking->id,
                'main_service_id' => $booking->main_service_id,
                'date' => date('Y-m-d'),
            ]);
        }
                
        return  $this->returnData(BookingResource::make($booking),[helperTrans('api.booking successfully')]);

    }
    // public function make_booking(Request $request){
    //     $validator = Validator::make($request->all(),
    //         [
    //             'main_service_id' => 'required|exists:main_services,id',
    //             'desc'=>'required|string',
    //             'operation_type'=>'nullable|in:package,insurance,paid_online',
    //             'specialization_type'=>'nullable|in:nutrition,speech_and_psychological',
    //             'doc'=>'nullable|array',
    //             'doc.*'=>'required|file',

    //         ], []);
    //     if ($validator->fails()) {
    //         return $this->returnErrorValidation(collect($validator->errors())->flatten(1),403);
    //     }

    //     $patient=auth('patient')->user();

    //     if($request->operation_type == 'package') {
    //         $patient_subscribes=PatientSubscribe::where('patient_id',$patient->id)->where('status','active')->whereHas('package',function ($query) use ($request){
    //             $query->whereHas('mainServicesPackage',function ($q) use ($request){
    //                 $q->where('main_service_id',$request->main_service_id);
    //             });
    //         })->get();

    //         $booking_test=false;

    //         foreach ($patient_subscribes as $patient_subscribe){
    //             $package=Package::find($patient_subscribe->package_id);

    //             if ($package){

    //                 $all_patient_service_count=MainServicePackage::where('package_id',$package->id)->where('main_service_id',$request->main_service_id)->sum('count');
    //                 $use_patient_service_count=Booking::where('operation_type','package')->where('operation_id',$patient_subscribe->id)->where('main_service_id',$request->main_service_id)->count();
    //                 if ($use_patient_service_count<$all_patient_service_count){

    //                 $booking= Booking::create([
    //                         'patient_id'=>$patient->id,
    //                         'main_service_id'=>$request->main_service_id,
    //                         'operation_type'=>'package',
    //                         'operation_id'=>$patient_subscribe->id,
    //                         'desc'=>$request->desc,
    //                         'day'=>date('Y-m-d'),
    //                         'time'=>date('H:i:s'),
    //                         'specialization_type' => $request->specialization_type ?? null,
    //                     ]);

    //                 $booking_id=$booking->id;

    //                 if ($request->doc)
    //                     foreach ($request->doc as $doc){
    //                         $doc_file = $this->uploadFiles('bookings', $doc, null);

    //                         BookingDoc::create([
    //                             'booking_id'=>$booking->id,
    //                             'doc'=>$doc_file,
    //                         ]);
    //                     }




    //                     $booking_test=true;

    //                     $all_package_count=count($package->mainServicesPackage);
    //                     $use_package_count=0;

    //                     foreach ($package->mainServicesPackage as $mainServicePackage){
    //                         $all_package_service_count=MainServicePackage::where('package_id',$package->id)->where('main_service_id',$mainServicePackage->main_service_id)->first()->count??0;
    //                         $use_package_service_count=Booking::where('operation_type','package')->where('operation_id',$patient_subscribe->id)->where('main_service_id',$mainServicePackage->main_service_id)->count();
    //                         if ($all_package_service_count==$use_package_service_count){
    //                             ++$use_package_count;
    //                         }
    //                     }

    //                     if ($all_package_count==$use_package_count){
    //                         $patient_subscribe->update([
    //                             'status'=>'expire',
    //                         ]);
    //                     }


    //                     break;
    //                 }




    //             }
    //         }

    //         if ($booking_test){

    //             return  $this->returnData(BookingResource::make($booking),[helperTrans('api.booking successfully')]);
    //         }
    //         else
    //             return  $this->returnError([helperTrans('api.you don`t have package active for this service')]);
    //     } else {

    //         $booking = Booking::create([
    //             'patient_id'=>$patient->id,
    //             'main_service_id'=>$request->main_service_id,
    //             'operation_type'=>$request->operation_type,
    //             //'operation_id'=>$patient_subscribe->id,
    //             'desc'=>$request->desc,
    //             'day'=>date('Y-m-d'),
    //             'time'=>date('H:i:s'),
    //             'specialization_type' => $request->specialization_type ?? null,
    //         ]);

    //         $booking_id=$booking->id;

    //         if ($request->doc)
    //             foreach ($request->doc as $doc){
    //                 $doc_file = $this->uploadFiles('bookings', $doc, null);

    //                 BookingDoc::create([
    //                     'booking_id'=>$booking->id,
    //                     'doc'=>$doc_file,
    //                 ]);
    //             }

    //     }
    //     $price = 100;
    //     $order = (object) [
    //         'price' => $price,
    //         'booking' => $booking
    //     ];
    //     $paymentUrl = $this->createPayment($order);
    //     $bookingResource = BookingResource::make($booking);
    //     if ($paymentUrl) {
    //         $bookingResource->additional(['payment_url' => $paymentUrl]);
    //     } else {
    //         return $this->returnError([helperTrans('api.payment initiation failed')]);
    //     }
    //     return $this->returnData($bookingResource, [helperTrans('api.booking successfully, please complete payment')]);
    // }

    public function make_booking_for_relative(Request $request){

        $validator = Validator::make($request->all(),
            [
                'main_service_id' => 'required|exists:main_services,id',
                'desc'=>'required|string',
                'operation_type'=>'required|in:package',
                'doc'=>'nullable|array',
                'doc.*'=>'nullable|file',
               'relative_id'=>'required|exists:relatives,id',

            ], []);
        if ($validator->fails()) {
            return $this->returnErrorValidation(collect($validator->errors())->flatten(1),403);
        }
        $patient=auth('patient')->user();


        $relative=Relative::where('patient_id',$patient->id)->find($request->relative_id);

        if (!$relative){
            return    $this->returnError([helperTrans('api.relative not found')]);
        }


        $patient_subscribes=PatientSubscribe::where('patient_id',$patient->id)->where('status','active')->whereHas('package',function ($query) use ($request){
            $query->whereHas('mainServicesPackage',function ($q) use ($request){
                $q->where('main_service_id',$request->main_service_id);
            });
        })->get();

        $booking_test=false;

        foreach ($patient_subscribes as $patient_subscribe){
            $package=Package::find($patient_subscribe->package_id);

            if ($package){

                $all_patient_service_count=MainServicePackage::where('package_id',$package->id)->where('main_service_id',$request->main_service_id)->sum('count');
                $use_patient_service_count=Booking::where('operation_type','package')->where('operation_id',$patient_subscribe->id)->where('main_service_id',$request->main_service_id)->count();
                if ($use_patient_service_count<$all_patient_service_count){


                    $booking= Booking::create([
                        'patient_id'=>$patient->id,
                        'main_service_id'=>$request->main_service_id,
                        'operation_type'=>'package',
                        'operation_id'=>$patient_subscribe->id,
                        'desc'=>$request->desc,
                        'day'=>date('Y-m-d'),
                        'time'=>date('H:i:s'),
                        'booking_for'=>'for_relative',
                        'relative_id'=>$relative->id,
                    ]);

                    $booking_id=$booking->id;

                    if ($request->doc)
                        foreach ($request->doc as $doc){
                            $doc_file = $this->uploadFiles('bookings', $doc, null);

                            BookingDoc::create([
                                'booking_id'=>$booking->id,
                                'doc'=>$doc_file,
                            ]);
                        }




                    $booking_test=true;

                    $all_package_count=count($package->mainServicesPackage);
                    $use_package_count=0;

                    foreach ($package->mainServicesPackage as $mainServicePackage){
                        $all_package_service_count=MainServicePackage::where('package_id',$package->id)->where('main_service_id',$mainServicePackage->main_service_id)->first()->count??0;
                        $use_package_service_count=Booking::where('operation_type','package')->where('operation_id',$patient_subscribe->id)->where('main_service_id',$mainServicePackage->main_service_id)->count();
                        if ($all_package_service_count==$use_package_service_count){
                            ++$use_package_count;
                        }
                    }

                    if ($all_package_count==$use_package_count){
                        $patient_subscribe->update([
                            'status'=>'expire',
                        ]);
                    }


                    break;
                }




            }
        }

        if ($booking_test){

            return  $this->returnData(BookingResource::make($booking),[helperTrans('api.booking successfully')]);
        }
        else
            return  $this->returnError([helperTrans('api.you don`t have package active for this service')]);


    }

    public function bookings(Request $request){

        $validator = Validator::make($request->all(),
            [
                'status' => 'required|in:active,complete',
            ], []);
        if ($validator->fails()) {
            return $this->returnErrorValidation(collect($validator->errors())->flatten(1),403);
        }
        $patient=auth('patient')->user();

        $status=['complete'];

        if ($request->status=='active')
            $status=['active','pending'];

        $bookings=Booking::with(['doctor','mainService', 'replying'])->whereIn('status',$status)->where('patient_id',$patient->id)->latest()->get();

        return $this->returnData(BookingResource::collection($bookings),[helperTrans('api.Bookings Data')],200);


    }

    public function get_agora_room(Request $request){

        $validator = Validator::make($request->all(),
            [
                'booking_id' => 'required|exists:bookings,id',
                'type'=>'required|in:audio,video',
            ], []);
        if ($validator->fails()) {
            return $this->returnErrorValidation(collect($validator->errors())->flatten(1), 403);
        }

        $patient = auth('patient')->user();
        $booking=Booking::where('patient_id',$patient->id)->where('status','active')->find($request->booking_id);
        if (!$booking){
            return  $this->returnError([helperTrans('api.Booking not Found')]);
        }

        $room= AgoraRoom::where('doctor_id',$booking->doctor_id)->where('booking_id',$booking->id)->where('patient_id',$patient->id)->where('name','!=',null)->first();


        if (!$room){
            return  $this->returnError([helperTrans('api.Room not Found')]);
        }


        return $this->returnData(AgoraRoomResource::make($room),[helperTrans('api.Room Data')],200);

    }

    public function booking_replay(Request $request){

        $validator = Validator::make($request->all(),
            [
                'booking_id' => 'required|exists:bookings,id',
            ], []);
        if ($validator->fails()) {
            return $this->returnErrorValidation(collect($validator->errors())->flatten(1), 403);
        }

        $patient = auth('patient')->user();


        $booking=Booking::where('patient_id',$patient->id)->find($request->booking_id);

        if (!$booking){
            return $this->returnError([helperTrans('api.booking not found')]);
        }

        $replay=ReplyingBooking::with(['doctor','replyingBookingAnalysis','replyingBookingMedicals','replyingBookingRadiology','replyingBookingDiagnoses'])->where('booking_id',$booking->id)->first();

        if (!$replay){
            return $this->returnError([helperTrans('api.There is No Replaying')]);
        }


        return $this->returnData(ReplayingBookingResource::make($replay),[helperTrans('api.Booking Replay Data')],200);

    }
    
    public function createPayment($order) {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        $data = [
            'intent' => 'CAPTURE',
            'purchase_units' => [
                [
                    'amount' => [
                        'currency_code' => 'USD',
                        'value' => $order->price,
                    ],
                ],
            ],
            "application_context" => [
                "brand_name" => $order?->booking?->desc,
                "return_url" => route('paypal.success'),
                "cancel_url" => route('paypal.cancel')
            ]
        ];
        $response = $provider->createOrder($data);
        //dd($response);
        if (isset($response['id']) && $response['id'] != null) {
            foreach ($response['links'] as $link) {
                if ($link['rel'] === 'approve') {
                    return [
                        'payment_url' => $link['href']
                    ];
                }
            }
        } else {
            return null;
        }
    }

    public function success(Request $request) {
        $provider = new PayPalClient();
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request->token);
        //dd($response);
    }
    
    public function initiatePayment(Request $request) {
        $bookingId = $request->input('bookingId');
        $booking = Booking::find($bookingId);
        if (!$booking) {
            return response()->json(['error' => 'Booking not found.'], 404);
        }
        $paymentUrl = $this->createPayment($booking);
        if ($paymentUrl) {
            return response()->json([
                'data' => $booking,
                'paymentUrl' => $paymentUrl,
                'message' => 'Booking successfully created. Please complete payment.',
                'status' => 200
            ]);
        } else {
            return response()->json(['error' => 'Unable to create PayPal payment.'], 500);
        }
    }


}
