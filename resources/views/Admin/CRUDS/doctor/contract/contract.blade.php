@extends('Admin.layouts.inc.app')
@section('title')
    {{helperTrans('admin.Doctor Contract')}}
@endsection
@section('css')



@endsection
@section('content')
    <div class="card">
        <div class="card-header d-flex align-items-center">
            <h5 class="card-title mb-0 flex-grow-1">{{helperTrans('admin.Contract For Doctor')}}
                {{$doctor->name}}
            </h5>
        </div>
        <form action="{{ route('addDoctorContract', ['doctor' => $doctor->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="doctor_id" value="{{ $doctor->id }}">
            <div class="card-content p-2">
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="mb-3 pt-4">
                            <label for="contract_start_date" class="form-label">Contract Start Date:</label>
                            <input type="date" class="form-control" name="contract_start_date" id="contract_start_date">
                        </div>
                        <div class="mb-3 pt-3">
                            <label for="contract_end_date" class="form-label">Contract End Date:</label>
                            <input type="date" class="form-control" name="contract_end_date" id="contract_end_date">
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
                        <!-- Start Home Care Service -->
                        <div class="mb-4">
                            <h3 class="text-primary">Service Home Care Price:</h3>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="home_care_gross_price" class="form-label">Gross Price:</label>
                                    <input type="number" step="0.01" class="form-control" name="home_care_gross_price" id="home_care_gross_price">
                                </div>
                                <div class="col-md-4">
                                    <label for="home_care_discount" class="form-label">Discount %:</label>
                                    <input type="text" class="form-control" name="home_care_discount" id="home_care_discount">
                                </div>
                                <div class="col-md-4">
                                    <label for="home_care_net_price" class="form-label">Net Price:</label>
                                    <input type="number" step="0.01" class="form-control" name="home_care_net_price" id="home_care_net_price">
                                </div>
                            </div>
                        </div>
                        <!-- End Home Care Service -->

                        <!-- Start Service Clinic Price -->
                        <div class="col-md-12 mb-4">
                            <h3 class="text-primary">Service Clinic Price:</h3>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="service_clinic_gross_price" class="form-label">Gross Price:</label>
                                    <input type="number" step="0.01" class="form-control" name="service_clinic_gross_price" id="service_clinic_gross_price">
                                </div>
                                <div class="col-md-4">
                                    <label for="service_clinic_discount" class="form-label">Discount %:</label>
                                    <input type="text" class="form-control" name="service_clinic_discount" id="service_clinic_discount">
                                </div>
                                <div class="col-md-4">
                                    <label for="service_clinic_net_price" class="form-label">Net Price:</label>
                                    <input type="number" step="0.01" class="form-control" name="service_clinic_net_price" id="service_clinic_net_price">
                                </div>
                            </div>
                        </div>
                        <!-- End Service Clinic Price -->

                        <!-- Start Price List Discount -->
                        <div class="mb-4">
                            <h3 class="text-primary">Price List Discount:</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="price_list_outpatient" class="form-label">Outpatient %:</label>
                                    <input type="text" class="form-control" name="price_list_outpatient" id="price_list_outpatient">
                                </div>
                                <div class="col-md-6">
                                    <label for="price_list_intpatient" class="form-label">Intpatient %:</label>
                                    <input type="text" class="form-control" name="price_list_intpatient" id="price_list_intpatient">
                                </div>
                            </div>
                        </div>
                        <!-- End Price List Discount -->
                        <div class="mb-4">
                            <h3 class="text-primary">Service Online Price:</h3>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="service_online_gross_price" class="form-label">Gross Price:</label>
                                    <input type="number" step="0.01" class="form-control" name="service_online_gross_price" id="service_online_gross_price">
                                </div>
                                <div class="col-md-4">
                                    <label for="service_online_net_price" class="form-label">Net Price:</label>
                                    <input type="number" step="0.01" class="form-control" name="service_online_net_price" id="service_online_net_price">
                                </div>
                                <div class="col-md-4">
                                    <label for="service_online_discount" class="form-label">Discount: %</label>
                                    <input type="text" class="form-control" name="service_online_discount" id="service_online_discount">
                                </div>
                            </div>
                        </div>
                    </div>
                    <br />
                    <div class="col-md-12">
                        <div class="mb-4">
                            <label for="contract_note" class="form-label">Contract Note:</label>
                            <textarea class="form-control" name="contract_note" id="contract_note"></textarea>
                        </div>
                    </div>

                    <div class="col-md-12 text-center text-lg">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection
@section('js')

@endsection
