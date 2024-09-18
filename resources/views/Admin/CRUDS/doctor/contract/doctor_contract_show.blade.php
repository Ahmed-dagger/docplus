@extends('Admin.layouts.inc.app')
@section('title')
{{$doctor->name . ' Contract' }}
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
        <div class="card-body">
            <h3>Doctor :</h3>
            <p>{{ $doctor->name }}</p>
            <!-- Start Accodion -->
            <div class="accordion" id="accordionContractDetails-{{ $contract->id }}">
                <!-- Contract Details -->
                <div class="accordion-item">
                    @php
                        $contractEndDate = \Carbon\Carbon::parse($contract->contract_end_date);
                        $currentDate = \Carbon\Carbon::now();
                        $isExpired = $currentDate->greaterThan($contractEndDate);
                    @endphp
                    <h2 class="accordion-header fs-4 {{ $isExpired ? 'bg-danger' : 'bg-success' }}" id="headingContractDetails-{{ $contract->id }}">
                        <button class="accordion-button d-flex justify-content-between" type="button" data-bs-toggle="collapse" data-bs-target="#collapseContractDetails-{{ $contract->id }}" aria-expanded="true" aria-controls="collapseContractDetails-{{ $contract->id }}">
                            <span class="me-auto fs-3 text-dark">Contract Details</span>
                            <span class="fs-3 p-1 ms-auto text-dark {{ $isExpired ? 'text-decoration-line-through' : '' }} }}">
                                End Date : {{ $contract->contract_end_date }}
                            </span>
                        </button>
                    </h2>
                    <div id="collapseContractDetails-{{ $contract->id }}" class="accordion-collapse collapse show" aria-labelledby="headingContractDetails-{{ $contract->id }}" data-bs-parent="#accordionContractDetails-{{ $contract->id }}">
                        <div class="accordion-body">
                            <div class="row">
                                <h3>Contract Details :</h3>
                                <p><strong>Contract Start Date :</strong> {{ $contract->contract_start_date }}</p>
                                <p><strong>Contract End Date :</strong> {{ $contract->contract_end_date }}</p>
                            </div>
                            <a href="{{ route('admin.doctor_contract_renewal', ['contract_id' => $contract->id, 'doctor_id' => $doctor->id]) }}" class="mt-2 text-center btn btn-warning">Renew Contract</a>
                            <br /><br />
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="card mb-3">
                                        <div class="card-header bg-primary text-white">
                                            <h4 class="text-white"><strong>Online Service Price:</strong></h4>
                                        </div>
                                        <div class="card-body">
                                            <p><strong>Gross Price:</strong> {{ $contract->service_online_gross_price }}</p>
                                            <p><strong>Discount:</strong> {{ $contract->service_online_discount }}</p>
                                            <p><strong>Net Price:</strong> {{ $contract->service_online_net_price }}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="card mb-3">
                                        <div class="card-header bg-success text-white">
                                            <h4 class="text-white"><strong>Home Care Service Price:</strong></h4>
                                        </div>
                                        <div class="card-body">
                                            <p><strong>Gross Price:</strong> {{ $contract->home_care_gross_price }}</p>
                                            <p><strong>Discount:</strong> {{ $contract->home_care_discount }}</p>
                                            <p><strong>Net Price:</strong> {{ $contract->home_care_net_price }}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="card mb-3">
                                        <div class="card-header bg-danger text-white">
                                            <h4 class="text-white"><strong>Service Clinic Price:</strong></h4>
                                        </div>
                                        <div class="card-body">
                                            <p><strong>Gross Price:</strong> {{ $contract->service_clinic_gross_price }}</p>
                                            <p><strong>Discount:</strong> {{ $contract->service_clinic_discount }}</p>
                                            <p><strong>Net Price:</strong> {{ $contract->service_clinic_net_price }}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="card mb-3">
                                        <div class="card-header bg-info text-white">
                                            <h4 class="text-white"><strong>Price List Discount:</strong></h4>
                                        </div>
                                        <div class="card-body">
                                            <p><strong>Out-Patient %:</strong> {{ $contract->price_list_outpatient }}</p>
                                            <p><strong>Int-Patient %:</strong> {{ $contract->price_list_intpatient }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                @if($contract->attach_contract)
                                <div class="col-md-4">
                                    <div class="card mb-3">
                                        <div class="card-header bg-primary text-white">
                                            <h4 class="text-white"><strong>Contract Attach :</strong></h4>
                                        </div>
                                        <div class="card-body">
                                            <a href="{{ asset('storage/uploads/' . $contract->attach_contract) }}" target="_blank">show</a>
                                        </div>
                                    </div>
                                </div>
                                @endif

                                @if($contract->attach_documents)
                                <div class="col-md-4">
                                    <div class="card mb-3">
                                        <div class="card-header bg-success text-white">
                                            <h4 class="text-white"><strong>Document Attach :</strong></h4>
                                        </div>
                                        <div class="card-body">
                                            <a href="{{ asset('storage/uploads/' . $contract->attach_documents) }}" target="_blank">show</a>
                                        </div>
                                    </div>
                                </div>
                                @endif

                                @if($contract->attach_price_list)
                                <div class="col-md-4">
                                    <div class="card mb-3">
                                        <div class="card-header bg-danger text-white">
                                            <h4 class="text-white"><strong>Price List Attach :</strong></h4>
                                        </div>
                                        <div class="card-body">
                                            <a href="{{ asset('storage/uploads/' . $contract->attach_price_list) }}" target="_blank">show</a>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>

                            <br />
                            <div class="card mb-3">
                                <div class="card-header bg-primary text-white">
                                    <strong>Contract Note</strong>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">{{ $contract->contract_note }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Accodion -->
        </div>
    </div>

@endsection
@section('js')

@endsection
