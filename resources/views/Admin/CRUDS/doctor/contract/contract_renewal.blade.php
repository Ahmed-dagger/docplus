@extends('Admin.layouts.inc.app')
@section('title')
    {{helperTrans('admin.Renwal ') . $doctor->name . ' ' . helperTrans('admin.Contract')}}
@endsection
@section('css')



@endsection
@section('content')
    <div class="card">
        <div class="card-header d-flex align-items-center">
            <h5 class="card-title mb-0 flex-grow-1 text-warning">{{helperTrans('admin.Contract Renewal ')}}
                {{--$doctor->name . ' ' . $contract->contract_end_date->diffForHumans()--}}
                {{$doctor->name . ' ' . \Carbon\Carbon::parse($contract->contract_end_date)->diffForHumans()}}

            </h5>
        </div>
        <form action="{{ route('admin.doctor_contract_renewal_store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="doctor_id" value="{{ $doctor->id }}">
            <input type="hidden" name="doctor_contract_id" value="{{ $contract->id }}">

            <div class="card-content p-2">
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
                
                </div>
                

                <div class="col-md-12 text-center text-lg">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>


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
