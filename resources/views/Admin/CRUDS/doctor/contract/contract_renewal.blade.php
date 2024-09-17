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
                            <label for="renewal_start_date" class="form-label">Renewal Start Date:</label>
                            <input type="date" class="form-control" name="renewal_start_date" id="renewal_start_date" required>
                        </div>
                        <div class="mb-3 pt-3">
                            <label for="renewal_end_date" class="form-label">Renewal End Date:</label>
                            <input type="date" class="form-control" name="renewal_end_date" id="renewal_end_date">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="renewed_attach_contract" class="form-label">Attach Contract:</label>
                            <input type="file" class="form-control" name="renewed_attach_contract" id="renewed_attach_contract">
                        </div>
                        <div class="mb-3">
                            <label for="renewed_attach_documents" class="form-label">Attach Documents:</label>
                            <input type="file" class="form-control" name="renewed_attach_documents" id="renewed_attach_documents">
                        </div>
                        <div class="mb-3">
                            <label for="renewed_attach_price_list" class="form-label">Attach Price List:</label>
                            <input type="file" class="form-control" name="renewed_attach_price_list" id="renewed_attach_price_list">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <!-- Start Home Care Service -->
                        <div class="mb-4">
                            <h3 class="text-primary">Service Home Care Price:</h3>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="renewed_home_care_gross_price" class="form-label">Gross Price:</label>
                                    <input type="number" step="0.01" class="form-control" name="renewed_home_care_gross_price" id="renewed_home_care_gross_price">
                                </div>
                                <div class="col-md-4">
                                    <label for="renewed_home_care_discount" class="form-label">Discount %:</label>
                                    <input type="text" class="form-control" name="renewed_home_care_discount" id="renewed_home_care_discount">
                                </div>
                                <div class="col-md-4">
                                    <label for="renewed_home_care_net_price" class="form-label">Net Price:</label>
                                    <input type="number" step="0.01" class="form-control" name="renewed_home_care_net_price" id="renewed_home_care_net_price">
                                </div>
                            </div>
                        </div>
                        <!-- End Home Care Service -->

                        <!-- Start Service Clinic Price -->
                        <div class="mb-4">
                            <h3 class="text-primary">Service Clinic Price:</h3>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="renewed_service_clinic_gross_price" class="form-label">Gross Price:</label>
                                    <input type="number" step="0.01" class="form-control" name="renewed_service_clinic_gross_price" id="renewed_service_clinic_gross_price">
                        </div>
                        <div class="col-md-4">
                            <label for="renewed_service_clinic_discount" class="form-label">Discount %:</label>
                            <input type="text" class="form-control" name="renewed_service_clinic_discount" id="renewed_service_clinic_discount">
                        </div>
                        <div class="col-md-4">
                            <label for="renewed_service_clinic_net_price" class="form-label">Net Price:</label>
                            <input type="number" step="0.01" class="form-control" name="renewed_service_clinic_net_price" id="renewed_service_clinic_net_price">
                        </div>
                    </div>
                </div>
                <!-- End Service Clinic Price -->

                <!-- Start Price List Discount -->
                <div class="mb-4">
                    <h3 class="text-primary">Price List Discount:</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="renewed_price_list_outpatient" class="form-label">Outpatient %:</label>
                            <input type="text" class="form-control" name="renewed_price_list_outpatient" id="renewed_price_list_outpatient">
                        </div>
                        <div class="col-md-6">
                            <label for="renewed_price_list_intpatient" class="form-label">Inpatient %:</label>
                            <input type="text" class="form-control" name="renewed_price_list_intpatient" id="renewed_price_list_intpatient">
                        </div>
                    </div>
                </div>
                <!-- End Price List Discount -->

                <!-- Start Service Online Price -->
                <div class="mb-4">
                    <h3 class="text-primary">Service Online Price:</h3>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="renewed_service_online_gross_price" class="form-label">Gross Price:</label>
                            <input type="number" step="0.01" class="form-control" name="renewed_service_online_gross_price" id="renewed_service_online_gross_price">
                        </div>
                        <div class="col-md-4">
                            <label for="renewed_service_online_net_price" class="form-label">Net Price:</label>
                            <input type="number" step="0.01" class="form-control" name="renewed_service_online_net_price" id="renewed_service_online_net_price">
                        </div>
                        <div class="col-md-4">
                            <label for="renewed_service_online_discount" class="form-label">Discount %:</label>
                            <input type="text" class="form-control" name="renewed_service_online_discount" id="renewed_service_online_discount">
                        </div>
                    </div>
                </div>
                <!-- End Service Online Price -->

                <div class="mb-4">
                    <label for="renewal_note" class="form-label">Renewal Note:</label>
                    <textarea class="form-control" name="renewal_note" id="renewal_note"></textarea>
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

@endsection
