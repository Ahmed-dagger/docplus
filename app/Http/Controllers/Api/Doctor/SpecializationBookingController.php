<?php

namespace App\Http\Controllers\Api\Doctor;

use App\Http\Controllers\Controller;
use App\Http\Resources\SpecializationBookingResource;
use App\Http\Resources\ProviderSpecializationBookingResource;
use App\Http\Traits\Api_Trait;
use App\Http\Traits\Upload_Files;
use App\Models\SpecializationBookingDocs;
use App\Models\SpecializationBooking;
use App\Models\ProviderSpecializationBooking;
use App\Models\ProviderSpecializationBookingDocs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SpecializationBookingController extends Controller
{
    use Api_Trait,Upload_Files;
    //
 
    public function bookings(Request $request) {

        $validator = Validator::make($request->all(),
        [
            'status' => 'required|in:pending,active,complete',
        ], []);
        if ($validator->fails()) {
            return $this->returnErrorValidation(collect($validator->errors())->flatten(1), 403);
        }

        $doctor = auth('doctor')->user();

        $bookings = SpecializationBooking::with('doctor')->get();

        return $this->returnData(SpecializationBookingResource::collection($bookings),[helperTrans('api.Specialization booking Data')],200);


    }

    public function acceptBooking(Request $request) {
        $validator = Validator::make($request->all(), ['booking_id' => 'required|exists:bookings,id',], []);
        if ($validator->fails()) {
            return $this->returnErrorValidation(collect($validator->errors())->flatten(1), 403);
        }

        $doctor = auth('doctor')->user();
        $booking = SpecializationBooking::where('status', 'pending')->where('doctor_id', $doctor->id)->find($request->booking_id);

        if (!$booking)
            return $this->returnError([helperTrans('api.the booking accepted before')]);

        $booking->update('status', 'active');

        return $this->returnSuccessMessage(['api.accepted successfully']);

    }

}
