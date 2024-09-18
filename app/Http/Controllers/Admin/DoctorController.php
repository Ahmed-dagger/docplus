<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DoctorRequest;
use App\Http\Requests\Admin\ProviderTimeRequest;
use App\Http\Traits\ResponseTrait;
use App\Http\Traits\Upload_Files;
use App\Models\Category;
use App\Models\City;
use App\Models\Day;
use App\Models\Doctor;
use App\Models\DoctorUpdate;
use App\Models\DoctorCategory;
use App\Models\Experience;
use App\Models\Governorate;
use App\Models\ProviderCategory;
use App\Models\ProviderTime;
use App\Models\Specialization;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\DoctorContract;
use Illuminate\Support\Facades\Storage;
class DoctorController extends Controller
{
    //
    //
    use  ResponseTrait,Upload_Files;

    public function index(Request $request)
    {

        if ($request->ajax()) {
            $admins = Doctor::query()->latest();
            return DataTables::of($admins)
                ->addColumn('action', function ($admin) {

                    $edit = '';
                    $delete = '';


                    return '
                            <button ' . $edit . '  class="editBtn btn rounded-pill btn-primary waves-effect waves-light"
                                    data-id="' . $admin->id . '"
                            <span class="svg-icon svg-icon-3">
                                <span class="svg-icon svg-icon-3">
                                    <i class="las la-edit"></i>
                                </span>
                            </span>
                            </button>
                            <button ' . $delete . '  class="btn rounded-pill btn-danger waves-effect waves-light delete"
                                    data-id="' . $admin->id . '">
                            <span class="svg-icon svg-icon-3">
                                <span class="svg-icon svg-icon-3">
                                    <i class="las la-trash-alt"></i>
                                </span>
                            </span>
                            </button>
                            <a href="'.route('admin.doctors_branches.index', $admin->id).'" class="btn rounded-pill btn-info waves-effect waves-light">Branches</a>
                       ';


                })


                ->editColumn('specialization_id', function ($row) {
                    return $row->specialization->name??'';
                })
                ->addColumn('doctor_times', function ($row) {
                    $route=route('admin.doctor_times',$row->id);
                    return "<a href='$route' class='btn btn-outline-primary'>".helperTrans('admin.Doctor Time')."</a>";
                })
                ->addColumn('doctor_contract', function ($row) {
                    $latestContract = $row->contracts()->latest()->first();
    
                    if ($latestContract) {
                        $route = route('admin.doctor_contract_show', $latestContract->id);
                        return "<a href='$route' class='btn btn-outline-success'>".helperTrans('admin.Doctor Contract')."</a>";
                    } else {
                        $route = route('admin.doctor_contract', $row->id);
                        return "<a href='$route' class='btn btn-outline-success'>".helperTrans('admin.Add Contract')."</a>";
                    }
                })
                ->setRowClass(function ($row) {
                    $latestContract = $row->contracts()->latest()->first();
                    if ($latestContract && strtotime($latestContract->contract_end_date) < time()) {
                        return 'custom_warning_bg';
                    }
                    return '';
                })
                ->addColumn('update', function ($row) {
                    $doctorUpdate = DoctorUpdate::where('doctor_id', $row->id)->latest()->first();
                    if(isset($doctorUpdate)) {
                        if($doctorUpdate->status == 'pending') {
                            $route=route('admin.update.doctor',$doctorUpdate->id);
                            return '<a href="'.$route.'" class="btn btn-warning ">Show Update</a>';
                        } elseif($doctorUpdate->status == 'reject') {
                            return '<span class="btn btn-danger">Reject</span>';
                        } elseif($doctorUpdate->status == 'approved') {
                            return '<span class="btn btn-success">Approved</span>';
                        }
                    } else {
                        return '<span class="btn btn-info">Not Needed</span>';
                    }
                })
                ->editColumn('status', function ($row) {
                    $active = '';
                    $operation = '';
                    $operation = '';

                    if ($row->status == 1)
                        $active = 'checked';

                    return '<div class="form-check form-switch">
                               <input ' . $operation . '  class="form-check-input activeBtn" data-id="' . $row->id . ' " type="checkbox" role="switch" id="flexSwitchCheckChecked" ' . $active . '  >
                            </div>';
                })



                    ->editColumn('image', function ($admin) {
                    return '
                              <a data-fancybox="" href="' . get_file($admin->image) . '">
                                <img height="60px" src="' . get_file($admin->image) . '">
                            </a>
                             ';
                })




                ->editColumn('created_at', function ($admin) {
                    return date('Y/m/d', strtotime($admin->created_at));
                })
                ->escapeColumns([])
                ->make(true);


        }
        return view('Admin.CRUDS.doctor.index');
    }


    public function create()
    {
        $categories=Category::whereIn('slug', ['doctors', 'visit_doctor', 'consultation'])->get();

        $specializations=Specialization::get();

        $governorates=Governorate::get();
        $experiences=Experience::get();

        return view('Admin.CRUDS.doctor.parts.create',compact('specializations','categories','governorates','experiences'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        unset($data['category_id']);
        if ($request->image)
            $data["image"] = $this->uploadFiles('doctors', $request->file('image'), null);

        $data['password'] = bcrypt($request->password);

        $doctor=Doctor::create($data);
        if ($request->category_id)
        foreach ($request->category_id as $category_id)
        {
            ProviderCategory::create([
                'provider_id'=>$doctor->id,
                'category_id'=>$category_id,
                'provider_type'=>'doctor',
            ]);
        }

        return $this->addResponse();

    }


    public function show($id)
    {
        //
    }


    public function edit($id )
    {
        $row=Doctor::findOrFail($id);
        $specializations=Specialization::get();
        $sub_specializations=Specialization::where('parent_id',$row->specialization_id)->get();

        $categories=Category::whereIn('slug', ['doctors', 'visit_doctor', 'consultation'])->get();
        $governorates=Governorate::get();
        $cities=City::where('governorate_id',$row->governorate_id)->get();
        $experiences=Experience::get();


        $categoriesIdes=ProviderCategory::where('provider_id',$row->id)->where('provider_type','doctor')->pluck('category_id')->toArray();


        return view('Admin.CRUDS.doctor.parts.edit', compact('row','specializations','categories','categoriesIdes','governorates','cities','experiences','sub_specializations'));

    }

    public function update(Request $request, $id )
    {
        $row=Doctor::findOrFail($id);

        $data = $request->all();

        unset($data['category_id']);

        if ($request->image)
            $data["image"] = $this->uploadFiles('doctors', $request->file('image'), null);

        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        } else {
            unset($data['password']);
        }

        $row->update($data);

       if ($request->category_id) {
           ProviderCategory::where('provider_id',$id)->where('provider_type','doctor')->whereNotIn('category_id',$request->category_id)->delete();
           ProviderTime::where('provider_id',$id)->where('provider_type','doctor')->whereNotIn('category_id',$request->category_id)->delete();

           foreach ($request->category_id as $category_id) {
               ProviderCategory::updateOrCreate([
                   'category_id' => $category_id,
                   'provider_id' => $id,
                   'provider_type'=>'doctor',
               ]);
           }
       }
       else{
           ProviderCategory::where('provider_id',$id)->where('provider_type','doctor')->delete();
           ProviderTime::where('provider_id',$id)->where('provider_type','doctor')->delete();
       }
        return $this->updateResponse();
    }


    public function destroy($id)
    {
        $row = Doctor::findOrFail($id);
        $row->delete();
        return $this->deleteResponse();
    }//end fun

    public function doctor_times($id){

        $doctor=Doctor::findOrFail($id);
        $doctorTimes=ProviderTime::where('provider_type','doctor')->where('provider_id',$id)->get();
        $days=Day::get();
        $categoriesIdes=ProviderCategory::where('provider_id',$id)->where('provider_type','doctor')->pluck('category_id')->toArray();
        $categories=Category::whereIn('id',$categoriesIdes)->get();
        return view('Admin.CRUDS.doctor.times',compact('doctor','doctorTimes','categories','days'));

    }


    // -- Start Doctor Contract Logic -- //
    public function doctor_contract() {
        //$doctor=Doctor::findOrFail($id);
        $categories=Category::whereIn('slug', ['doctors', 'visit_doctor', 'consultation'])->get();

        $specializations=Specialization::get();

        $governorates=Governorate::get();
        $experiences=Experience::get();

        return view('Admin.CRUDS.doctor.contract.contract',compact('specializations','categories','governorates','experiences'));
    }

    public function addDoctorContract(Request $request) {
        $request->validate([
            'name'          => 'required',
            'email'         => "required|email|unique:doctors,email",
            'nickname'      => 'required|unique:doctors,nickname',
            'phone'             => 'required|unique:patients,phone|unique:doctors,phone',
            'private_number'    => 'required',
            'password'  => 'required|min:6',
            'gender'=>'required|in:male,female',
            'specialization_id'=>'required|exists:specializations,id',
            'sub_specialization_id'=>'required|exists:specializations,id',
            'governorate_id'=>'required|exists:governorates,id',
            'city_id'=>'required|exists:cities,id',
            'lang'=>'required',
            'weight'=>'nullable',
            'location'=>'required',
            'is_popular'=>'required|in:0,1',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp',
            'latitude'=>'required',
            'longitude'=>'required',
            'experience_years'=>'nullable',
            'contract_start_date' => 'required|date',
            'contract_end_date' => 'required|date|after:contract_start_date',
            'home_care_net_price' => 'nullable|numeric',
            'home_care_gross_price' => 'nullable|numeric',
            'home_care_discount' => 'nullable|string',
            'service_clinic_gross_price' => 'nullable|numeric',
            'service_clinic_net_price' => 'nullable|numeric',
            'service_clinic_discount' => 'nullable|string',
            'price_list_outpatient' => 'nullable|string',
            'price_list_intpatient' => 'nullable|string',
            'service_online_gross_price' => 'nullable|numeric',
            'service_online_net_price' => 'nullable|numeric',
            'service_online_discount' => 'nullable|string',
            'attach_contract' => 'nullable|file|mimes:pdf,doc,docx,jpg,png',
            'attach_documents' => 'nullable|file|mimes:pdf,doc,docx,jpg,png',
            'attach_price_list' => 'nullable|file|mimes:pdf,doc,docx,jpg,png',
            'contract_note' => 'nullable|string',
        ]);

        // Create the doctor
        $doctorData = $request->only(['name', 'email', 'nickname', 'phone', 'private_number', 'password', 'gender', 'specialization_id',
        'sub_specialization_id', 'governorate_id', 'city_id', 'lang', 'weight', 'location', 'is_popular', 'image', 'service_price_online',
        'service_price_home', 'latitude', 'longitude', 'experience_years']);
        $doctorData['password'] = bcrypt($request->password);
        
        if ($request->hasFile('image')) {
            $doctorData['image'] = $this->uploadFiles('doctors', $request->file('image'), null);
        }

        $doctor = Doctor::create($doctorData);

        $doctorContract = new DoctorContract();
        $doctorContract->doctor_id = $doctor->id;
        $doctorContract->contract_start_date = $request->contract_start_date;
        $doctorContract->contract_end_date = $request->contract_end_date;
        $doctorContract->home_care_net_price = $request->home_care_net_price;
        $doctorContract->home_care_gross_price = $request->home_care_gross_price;
        $doctorContract->home_care_discount = $request->home_care_discount;
        $doctorContract->service_clinic_gross_price = $request->service_clinic_gross_price;
        $doctorContract->service_clinic_net_price = $request->service_clinic_net_price;
        $doctorContract->service_clinic_discount = $request->service_clinic_discount;
        $doctorContract->price_list_outpatient = $request->price_list_outpatient;
        $doctorContract->price_list_intpatient = $request->price_list_intpatient;
        $doctorContract->service_online_gross_price = $request->service_online_gross_price;
        $doctorContract->service_online_net_price = $request->service_online_net_price;
        $doctorContract->service_online_discount = $request->service_online_discount;
        $doctorContract->contract_note = $request->contract_note;
        if ($request->hasFile('attach_contract')) {
            $contractPath = $this->uploadFiles('contracts', $request->file('attach_contract'), null);
            $doctorContract->attach_contract = $contractPath;
        }
        if ($request->hasFile('attach_documents')) {
            $documentsPath = $this->uploadFiles('documents', $request->file('attach_documents'), null);
            $doctorContract->attach_documents = $documentsPath;
        }
        if ($request->hasFile('attach_price_list')) {
            $priceListPath = $this->uploadFiles('price_lists', $request->file('attach_price_list'), null);
            $doctorContract->attach_price_list = $priceListPath;
        }
        $doctorContract->save();
        return redirect()->route('doctors.index')->with('success', 'Contract Created successfully.');
    }

    public function showContract(DoctorContract $contract) {
        $doctor = Doctor::find($contract->doctor_id);
        return view('Admin.CRUDS.doctor.contract.doctor_contract_show', compact(['contract', 'doctor']));
    }

    public function destroyContract(DoctorContract $contract) {
        if ($contract->attach_contract)
            Storage::disk('public')->delete('storage/uploads/' . $contract->attach_contract);

        if ($contract->attach_documents)
            Storage::disk('public')->delete('storage/uploads/' . $contract->attach_documents);

        if ($contract->attach_price_list)
            Storage::disk('public')->delete('storage/uploads/' . $contract->attach_price_list);

        $contract->delete();
        return redirect()->route('doctors.index')->with('success', 'Contract deleted successfully.');
    }

    public function renewContract($contract_id, $doctor_id) {
        try {
            $contract = DoctorContract::findOrFail($contract_id);
            $doctor = Doctor::findOrFail($doctor_id);
            return view('Admin.CRUDS.doctor.contract.contract_renewal', [
                'contract' => $contract,
                'doctor' => $doctor
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while processing your request.');
        }
    }

    public function storeRenewal(Request $request) {
        $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'doctor_contract_id' => 'required|exists:doctor_contracts,id',
            'renewal_start_date' => 'required|date|after_or_equal:today',
            'renewal_end_date' => 'nullable|date|after:renewal_start_date',
            'renewed_attach_contract' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'renewed_attach_documents' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'renewed_attach_price_list' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'renewed_home_care_gross_price' => 'nullable|numeric|min:0',
            'renewed_home_care_discount' => 'nullable|string',
            'renewed_home_care_net_price' => 'nullable|numeric|min:0',
            'renewed_service_clinic_gross_price' => 'nullable|numeric|min:0',
            'renewed_service_clinic_discount' => 'nullable|string',
            'renewed_service_clinic_net_price' => 'nullable|numeric|min:0',
            'renewed_price_list_outpatient' => 'nullable|string',
            'renewed_price_list_intpatient' => 'nullable|string',
            'renewed_service_online_gross_price' => 'nullable|numeric|min:0',
            'renewed_service_online_discount' => 'nullable|string',
            'renewed_service_online_net_price' => 'nullable|numeric|min:0',
            'renewal_note' => 'nullable|string|max:1000',
        ]);
        try {
            $data = $request->all();
            if ($request->hasFile('renewed_attach_contract'))
                $data['renewed_attach_contract'] = $request->file('renewed_attach_contract')->store('contracts');

            if ($request->hasFile('renewed_attach_documents'))
                $data['renewed_attach_documents'] = $request->file('renewed_attach_documents')->store('documents');

            if ($request->hasFile('renewed_attach_price_list'))
                $data['renewed_attach_price_list'] = $request->file('renewed_attach_price_list')->store('price_lists');

            $contract = DoctorContract::findOrFail($request->doctor_contract_id);
            $contract->renewals()->create($data);
            return redirect()->route('doctors.index')->with('success', 'Contract renewed successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while processing your request.');
        }
    }
    // -- End Doctor Contract Logic -- //
    public function update_doctor_times($id,ProviderTimeRequest $request ){
        $doctor=Doctor::findOrFail($id);
          ProviderTime::where('provider_id',$id)->where('provider_type','doctor')->delete();
        if ($request->type)
            for($i=0;$i<count($request->type);$i++){

                ProviderTime::create([
                    'provider_id'=>$id,
                    'category_id'=>$request->category_id[$i] ?? null,
                    'day_id'=>$request->day_id[$i],
                    'type'=>$request->type[$i],
                    'from_time'=>$request->from_time[$i],
                    'to_time'=>$request->to_time[$i],
                    'provider_type'=>'doctor',
                ]);


            }


        return $this->updateResponse();

    }

    public function get_city_by_governorate(Request $request){

        $governorate=Governorate::findOrFail($request->governorate_id);

        $cities=City::where('governorate_id',$governorate->id)->get();


        return view('Admin.CRUDS.doctor.parts.cities',compact('cities'));


    }

    public function get_sub_specialization(Request $request){
        $specialization=Specialization::findOrFail($request->specialization_id);
        $sub_specializations=Specialization::where('parent_id',$specialization->id)->get();

        return view('Admin.CRUDS.doctor.parts.sub_specializations',compact('sub_specializations'));

    }

    public function activate(Request $request)
    {

        $admin = Doctor::findOrFail($request->id);
        if ($admin->status == true) {
            $admin->status = 0;
            $admin->save();
        } else {
            $admin->status = 1;
            $admin->save();
        }

        return $this->successResponse();
    }//end fun

    public function approved($id) {
        $row=DoctorUpdate::findOrFail($id);
        $specializations=Specialization::get();
        $sub_specializations=Specialization::where('parent_id',$row->specialization_id)->get();
        $categories=Category::get();
        $governorates=Governorate::get();
        $cities=City::where('governorate_id',$row->governorate_id)->get();
        $experiences=Experience::get();
        $categoriesIdes=ProviderCategory::where('provider_id',$row->id)->where('provider_type','doctor')->pluck('category_id')->toArray();
    
        return view('Admin.CRUDS.doctor.parts.update',compact('row','specializations','categories','categoriesIdes','governorates','cities','experiences','sub_specializations'));
    }

    public function approvedUpdate(Request $request, $id) {
        $row=DoctorUpdate::findOrFail($id);
        if($request->submit == 'Reject') {
            $row->update(['status'=>'reject']);
            session()->flash('success', 'Reject Update Doctor Successfully');
        } else {
            $doctor = Doctor::findOrFail($row->doctor_id);
            $doctor->update([
                'name'                  => $row->name,
                'email'                 => $row->email,
                'image'                 => $row->image,
                'phone'                 => $row->phone,
                'location'              => $row->location,
                'gender'                => $row->gender,
                'nickname'              => $row->nickname,
            ]);
            $row->update(['status'=>'approved']);
            session()->flash('success', 'Approved Update Doctor Successfully');
        }
        return redirect()->route('doctors.index');
    }
}
