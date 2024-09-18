@extends('Admin.layouts.inc.app')
@section('title')
    {{helperTrans('admin.Doctor Contract')}}
@endsection
@section('css')



@endsection
@section('content')
    <div class="card">

        <div class="card-header d-flex align-items-center">
            <h5 class="card-title mb-0 flex-grow-1">{{helperTrans('admin.Add Doctor and Contract')}}
            </h5>
        </div>

        <div class="card-content p-2">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form enctype="multipart/form-data" method="POST" action="{{route('admin.addDoctor')}}">
                @csrf
                <div class="row g-4">


                    <div class="form-group">
                        <label for="image" class="form-control-label">{{helperTrans('admin.image')}} </label>
                        <input id="image" type="file" class="dropify" name="image" data-default-file="{{get_file()}}" accept="image/*"/>
                        <span
                            class="form-text text-muted text-center">{{helperTrans('admin.Only the following formats are allowed: jpeg, jpg, png, gif, svg, webp, avif.')}}</span>
                    </div>


                    <div class="d-flex flex-column mb-7 fv-row col-sm-6">
                        <!--begin::Label-->
                        <label for="name" class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                            <span class="required mr-1">{{helperTrans('admin.name')}} <span class="red-star">*</span></span>
                        </label>
                        <!--end::Label-->
                        <input id="name" required type="text" class="form-control form-control-solid" placeholder="" name="name" value="{{old('name')}}"/>
                    </div>



                    <div class="d-flex flex-column mb-7 fv-row col-sm-6">
                        <!--begin::Label-->
                        <label for="nickname" class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                            <span class="required mr-1">{{helperTrans('admin.nickname')}} <span class="red-star">*</span></span>
                        </label>
                        <!--end::Label-->
                        <input id="nickname" required type="text" class="form-control form-control-solid" placeholder="" name="nickname" value="{{old('nickname')}}"/>
                    </div>

                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="d-flex flex-column mb-7 fv-row col-sm-6">
                        <!--begin::Label-->
                        <label for="email" class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                            <span class="required mr-1">{{helperTrans('admin.email')}} </span>
                            <span class="red-star">*</span>
                        </label>
                        <!--end::Label-->
                        <input id="email" required type="email" class="form-control form-control-solid" placeholder=" {{helperTrans('admin.email')}}"
                            name="email" value="{{old('email')}}"/>
                    </div>

                    <div class="d-flex flex-column mb-7 fv-row col-sm-6">
                        <!--begin::Label-->
                        <label for="phone" class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                            <span class="required mr-1"> {{helperTrans('admin.Phone')}}</span>
                            <span class="red-star">*</span>
                        </label>
                        <!--end::Label-->
                        <input id="phone" type="text" class="form-control form-control-solid" placeholder=" " name="phone"
                        value="{{old('phone')}}"/>
                    </div>

                    <div class="d-flex flex-column mb-7 fv-row col-sm-6">
                        <!--begin::Label-->
                        <label for="private_number" class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                            <span class="required mr-1"> {{helperTrans('admin.Priavte Phone Number')}}</span>
                            <span class="red-star">*</span>
                        </label>
                        <!--end::Label-->
                        <input id="private_number" type="text" class="form-control form-control-solid" placeholder=" " name="private_number"
                        value="{{old('private_number')}}"/>
                    </div>


                    <div class="d-flex flex-column mb-7 fv-row col-sm-6">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                            <span class="required mr-1">{{helperTrans('admin.password')}}</span>
                            <span class="red-star">*</span>
                        </label>
                        <!--end::Label-->
                        <input type="password" class="form-control form-control-solid" placeholder=" " name="password" value="{{old('password')}}"/>
                    </div>



                    <div class="d-flex flex-column mb-7 fv-row col-sm-6">
                        <!--begin::Label-->
                        <label for="gender" class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                            <span class="required mr-1">{{helperTrans('admin.Gender')}} <span class="red-star">*</span></span>
                        </label>
                        <!--end::Label-->
                        <select name="gender" id="gender" class="form-control">
                            <option selected disabled>Select Gender</option>
                                <option value="male" {{old('gender') == 'male' ? 'selected' : ''}}>Male</option>
                                <option value="female" {{old('gender') == 'male' ? 'female' : ''}}>Female</option>

                        </select>
                    </div>

                    <div class="d-flex flex-column mb-7 fv-row col-sm-6">
                        <!--begin::Label-->
                        <label for="specialization_id" class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                            <span class="required mr-1">{{helperTrans('admin.specialization')}} <span class="red-star">*</span></span>
                        </label>
                        <!--end::Label-->
                        <select name="specialization_id" id="specialization_id" class="form-control">
                            <option selected disabled>Select Specialization</option>
                            @foreach($specializations as $specialization)
                                <option value="{{$specialization->id}}">{{$specialization->name}}</option>
                            @endforeach

                        </select>
                    </div>

                    <div class="d-flex flex-column mb-7 fv-row col-sm-6">
                        <!--begin::Label-->
                        <label for="sub_specialization_id" class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                            <span class="mr-1">{{helperTrans('admin.Sub Specialization')}}
                        </label>
                        <!--end::Label-->
                        <select name="sub_specialization_id" id="sub_specialization_id" class="form-control">
                            <option selected disabled>Select Specialization First</option>


                        </select>
                    </div>

                    <div class="d-flex flex-column mb-7 fv-row col-sm-6">
                        <!--begin::Label-->
                        <label for="governorate_id" class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                            <span class="required mr-1">{{helperTrans('admin.Governorate')}} <span class="red-star">*</span></span>
                        </label>
                        <!--end::Label-->
                        <select name="governorate_id" id="governorate_id" class="form-control">
                            <option selected disabled>Select governorate</option>
                            @foreach($governorates as $governorate)
                                <option value="{{$governorate->id}}">{{$governorate->name}}</option>
                            @endforeach

                        </select>
                    </div>

                    <div class="d-flex flex-column mb-7 fv-row col-sm-6">
                        <!--begin::Label-->
                        <label for="city_id" class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                            <span class="required mr-1">{{helperTrans('admin.City')}} <span class="red-star">*</span></span>
                        </label>
                        <!--end::Label-->
                        <select name="city_id" id="city_id" class="form-control">
                            <option selected disabled>Select Governorate First</option>

                        </select>
                    </div>


                    <div class="d-flex flex-column mb-7 fv-row col-sm-6">
                        <!--begin::Label-->
                        <label for="experience_id" class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                            <span class="required mr-1">{{helperTrans('admin.Experience')}} <span class="red-star">*</span></span>
                        </label>
                        <!--end::Label-->
                        <select name="experience_id" id="experience_id" class="form-control">
                            <option selected disabled>Select Experience</option>
                            @foreach($experiences as $experience)
                                <option value="{{$experience->id}}">{{$experience->name}}</option>
                            @endforeach

                        </select>
                    </div>

                    <div class="d-flex flex-column mb-7 fv-row col-sm-6">
                        <!--begin::Label-->
                        <label for="experience_years" class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                            <span class="required mr-1"> Experience Years</span>
                            <span class="red-star">*</span>
                        </label>
                        <!--end::Label-->
                        <input id="lang" type="text" class="form-control form-control-solid" placeholder=" " name="experience_years" value="{{old('experience_years')}}"/>
                    </div>




                    <div class="d-flex flex-column mb-7 fv-row col-sm-6">
                        <!--begin::Label-->
                        <label for="lang" class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                            <span class="required mr-1"> {{helperTrans('admin.lang')}}</span>
                            <span class="red-star">*</span>
                        </label>
                        <!--end::Label-->
                        <input id="lang" type="text" class="form-control form-control-solid" placeholder=" " name="lang"
                            value="{{old('lang')}}"/>
                    </div>

                    <div class="d-flex flex-column mb-7 fv-row col-sm-6">
                        <!--begin::Label-->
                        <label for="latitude" class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                            <span class="required mr-1"> {{helperTrans('admin.Latitude')}}</span>
                            <span class="red-star">*</span>
                        </label>
                        <!--end::Label-->
                        <input id="latitude" type="text" class="form-control form-control-solid" placeholder=" " name="latitude"
                            value="{{old('latitude')}}"/>
                    </div>

                    <div class="d-flex flex-column mb-7 fv-row col-sm-6">
                        <!--begin::Label-->
                        <label for="longitude" class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                            <span class="required mr-1"> {{helperTrans('admin.Longitude')}}</span>
                            <span class="red-star">*</span>
                        </label>
                        <!--end::Label-->
                        <input id="longitude" type="text" class="form-control form-control-solid" placeholder=" " name="longitude"
                            value="{{old('longitude')}}"/>
                    </div>


                    <div class="d-flex flex-column mb-7 fv-row col-sm-6">
                        <!--begin::Label-->
                        <label for="weight" class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                            <span class="required mr-1"> {{helperTrans('admin.weight')}}</span>
                            <span class="red-star">*</span>
                        </label>
                        <!--end::Label-->
                        <input id="weight" type="number" class="form-control form-control-solid" placeholder=" " name="weight"
                            value="{{old('weight')}}"/>
                    </div>

                    <div class="d-flex flex-column mb-7 fv-row col-sm-6">
                        <!--begin::Label-->
                        <label for="location" class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                            <span class="required mr-1"> {{helperTrans('admin.Location')}}</span>
                            <span class="red-star">*</span>
                        </label>
                        <!--end::Label-->
                        <input id="location" type="text" class="form-control form-control-solid" placeholder=" " name="location"
                            value="{{old('location')}}"/>
                    </div>

                    <div class="d-flex flex-column mb-7 fv-row col-sm-6">
                        <!--begin::Label-->
                        <label for="category_id" class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                            <span class="required mr-1">{{helperTrans('admin.Category')}}</span>
                            <span class="red-star">*</span>
                        </label>
                        <select id="category_id" class="js-example-basic-multiple" name="category_id[]" multiple="multiple">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name??''}}</option>
                            @endforeach
                        </select>

                    </div>



                    <div class="d-flex flex-column mb-7 fv-row col-sm-6">
                        <!--begin::Label-->
                        <label for="is_popular" class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                            <span class="required mr-1">{{helperTrans('admin.Popular')}}</span>
                            <span class="red-star">*</span>
                        </label>
                        <select id="is_popular" class="form-control" name="is_popular" >
                        <option selected disabled>{{helperTrans('admin.Select')}}</option>
                            <option value="1">{{helperTrans('admin.yes')}}</option>
                            <option value="0" >{{helperTrans('admin.No')}}</option>
                        </select>

                    </div>


                    @foreach(languages() as $index=>$language)


                        <div class="col-sm-6 pb-3 p-2">
                            <label for="about_{{$language->abbreviation}}" class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                <span class="required mr-1">  {{helperTrans('admin.About')}}  ({{$language->abbreviation}})      </span>
                            </label>
                            <textarea name="about[{{$language->abbreviation}}]" id="about_{{$language->abbreviation}}" class="form-control " rows="5"
                                    placeholder=""></textarea>
                        </div>

                    @endforeach

                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="mb-3 pt-4">
                                <label for="contract_start_date" class="form-label">Contract Start Date:</label>
                                <input type="date" class="form-control" name="contract_start_date" id="contract_start_date" value="{{ old('contract_start_date') }}">
                            </div>
                            <div class="mb-3 pt-3">
                                <label for="contract_end_date" class="form-label">Contract End Date:</label>
                                <input type="date" class="form-control" name="contract_end_date" id="contract_end_date" value="{{ old('contract_end_date') }}">
                            </div>
                        </div>
                    
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="attach_contract" class="form-label">Attach Contract:</label>
                                <input type="file" class="form-control" name="attach_contract" id="attach_contract">
                            </div>
                            <div class="mb-3">
                                <label for="attach_documents" class="form-label">Attach Documents:</label>
                                <input type="file" class="form-control" name="attach_documents" id="attach_documents">
                            </div>
                            <div class="mb-3">
                                <label for="attach_price_list" class="form-label">Attach Price List:</label>
                                <input type="file" class="form-control" name="attach_price_list" id="attach_price_list">
                            </div>
                        </div>
                    
                        <div class="col-md-12">
                            
                            <!-- Home Care Service -->
                            <div class="col-md-12 mb-4">
                                <h3 class="text-primary">Service Home Care Price:</h3>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="home_care_gross_price" class="form-label">Gross Price:</label>
                                        <input type="number" step="0.01" class="form-control" name="home_care_gross_price" id="home_care_gross_price" value="{{ old('home_care_gross_price') }}">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="home_care_discount" class="form-label">Discount %:</label>
                                        <input type="number" class="form-control" maxlength="100" name="home_care_discount" id="home_care_discount" value="{{ old('home_care_discount') }}">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="home_care_net_price" class="form-label">Net Price:</label>
                                        <input type="number" step="0.01" class="form-control" name="home_care_net_price" id="home_care_net_price" value="{{ old('home_care_net_price') }}" readonly>
                                    </div>
                                </div>
                            </div>

                            <!-- Service Clinic Price -->
                            <div class="col-md-12 mb-4">
                                <h3 class="text-primary">Service Clinic Price:</h3>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="service_clinic_gross_price" class="form-label">Gross Price:</label>
                                        <input type="number" step="0.01" class="form-control" name="service_clinic_gross_price" id="service_clinic_gross_price" value="{{ old('service_clinic_gross_price') }}">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="service_clinic_discount" class="form-label">Discount %:</label>
                                        <input type="number" class="form-control" maxlength="100" name="service_clinic_discount" id="service_clinic_discount" value="{{ old('service_clinic_discount') }}">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="service_clinic_net_price" class="form-label">Net Price:</label>
                                        <input type="number" step="0.01" class="form-control" name="service_clinic_net_price" id="service_clinic_net_price" value="{{ old('service_clinic_net_price') }}" readonly>
                                    </div>
                                </div>
                            </div>

                            <!-- Service Online Price -->
                            <div class="col-md-12 mb-4">
                                <h3 class="text-primary">Service Online Price:</h3>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="service_online_gross_price" class="form-label">Gross Price:</label>
                                        <input type="number" step="0.01" class="form-control" name="service_online_gross_price" id="service_online_gross_price" value="{{ old('service_online_gross_price') }}">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="service_online_discount" class="form-label">Discount %:</label>
                                        <input type="number" class="form-control" maxlength="100" name="service_online_discount" id="service_online_discount" value="{{ old('service_online_discount') }}">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="service_online_net_price" class="form-label">Net Price:</label>
                                        <input type="number" step="0.01" class="form-control" name="service_online_net_price" id="service_online_net_price" value="{{ old('service_online_net_price') }}" readonly>
                                    </div>
                                </div>
                            </div>
                    
                            <!-- Start Price List Discount -->
                            <div class="mb-4">
                                <h3 class="text-primary">Price List Discount:</h3>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="price_list_outpatient" class="form-label">Outpatient %:</label>
                                        <input type="text" class="form-control" name="price_list_outpatient" id="price_list_outpatient" value="{{ old('price_list_outpatient') }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="price_list_intpatient" class="form-label">Intpatient %:</label>
                                        <input type="text" class="form-control" name="price_list_intpatient" id="price_list_intpatient" value="{{ old('price_list_intpatient') }}">
                                    </div>
                                </div>
                            </div>
                            <!-- End Price List Discount -->
                        </div>
                    
                        <br />
                    
                        <div class="col-md-12">
                            <div class="mb-4">
                                <label for="contract_note" class="form-label">Contract Note:</label>
                                <textarea class="form-control" name="contract_note" id="contract_note">{{ old('contract_note') }}</textarea>
                            </div>
                        </div>
                    
                        <div class="col-md-12 text-center text-lg">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                    
                </div>
            </form>


        </div>
    </div>
@endsection
@section('js')
    <link href="{{url('assets/dashboard/css/select2.css')}}" rel="stylesheet"/>
    <script src="{{url('assets/dashboard/js/select2.js')}}"></script>
    <script>
        $('.dropify').dropify();
        $(document).ready(function () {
            $('.js-example-basic-multiple').select2();
        });

        $(document).ready(function() {
            // Function to calculate net price for home care
            function calculateHomeCareNetPrice() {
                var grossPrice = parseFloat($('#home_care_gross_price').val()) || 0;
                var discount = parseFloat($('#home_care_discount').val()) || 0;
                
                var netPrice = grossPrice - (grossPrice * (discount / 100));
                $('#home_care_net_price').val(netPrice.toFixed(2));
            }

            // Function to calculate net price for service clinic
            function calculateServiceClinicNetPrice() {
                var grossPrice = parseFloat($('#service_clinic_gross_price').val()) || 0;
                var discount = parseFloat($('#service_clinic_discount').val()) || 0;
                
                var netPrice = grossPrice - (grossPrice * (discount / 100));
                $('#service_clinic_net_price').val(netPrice.toFixed(2));
            }

            // Function to calculate net price for service online
            function calculateServiceOnlineNetPrice() {
                var grossPrice = parseFloat($('#service_online_gross_price').val()) || 0;
                var discount = parseFloat($('#service_online_discount').val()) || 0;
                
                var netPrice = grossPrice - (grossPrice * (discount / 100));
                $('#service_online_net_price').val(netPrice.toFixed(2));
            }

            // Event listeners for home care fields
            $('#home_care_gross_price').on('input', calculateHomeCareNetPrice);
            $('#home_care_discount').on('input', calculateHomeCareNetPrice);

            // Event listeners for service clinic fields
            $('#service_clinic_gross_price').on('input', calculateServiceClinicNetPrice);
            $('#service_clinic_discount').on('input', calculateServiceClinicNetPrice);

            // Event listeners for service online fields
            $('#service_online_gross_price').on('input', calculateServiceOnlineNetPrice);
            $('#service_online_discount').on('input', calculateServiceOnlineNetPrice);
        });

    </script>
    <script>
        $(document).on('change','#governorate_id',function (){
            var governorate_id=$(this).val();
            var route="{{route('admin.get_city_by_governorate')}}?governorate_id="+governorate_id;
            setTimeout(function (){
                $('#city_id').load(route)
            },1000)
        })
    </script>

    <script>
        $(document).on('change','#specialization_id',function (){
            var specialization_id=$(this).val();
            var route="{{route('admin.get_sub_specialization')}}?specialization_id="+specialization_id;
            setTimeout(function (){
                $('#sub_specialization_id').load(route)
            },1000)
        })
    </script>




@endsection
