<!--begin::Form-->

<form id="form" enctype="multipart/form-data" method="POST" action="{{route('insurance_people.update',$row->id)}}">
    @csrf
    @method('PUT')
    <div class="row g-4">


        <input type="hidden" name="id" value="{{$row->id}}">

        <div class="d-flex flex-column mb-7 fv-row col-sm-4">
            <!--begin::Label-->
            <label for="name" class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                <span class="required mr-1">{{helperTrans('admin.name')}} <span class="red-star">*</span></span>
            </label>
            <!--end::Label-->
            <input id="name" required type="text" class="form-control form-control-solid" placeholder="" name="name" value="{{$row->name}}"/>
        </div>

        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="d-flex flex-column mb-7 fv-row col-sm-4">
            <!--begin::Label-->
            <label for="phone" class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                <span class="required mr-1">{{helperTrans('admin.phone')}} </span>
                <span class="red-star">*</span>
            </label>
            <!--end::Label-->
            <input id="phone" required type="text" class="form-control form-control-solid" placeholder=" {{helperTrans('admin.phone')}}"
                   name="phone" value="{{$row->phone}}"/>
        </div>






        <div class="d-flex flex-column mb-7 fv-row col-sm-4">
            <!--begin::Label-->
            <label for="status_data" class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                <span class="required mr-1">{{helperTrans('admin.Status')}}</span>
                <span class="red-star">*</span>
            </label>

            <select class="form-control" id="status_data" name="status">

                <option @if($row->status=='active') selected @endif value="active">{{helperTrans('admin.Active')}}</option>
                <option @if($row->status=='expire') selected @endif value="expire">{{helperTrans('admin.Expire')}}</option>

            </select>
        </div>



        <div class="col-sm-12 pb-3 p-2">
            <label for="address" class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                <span class="required mr-1">  {{helperTrans('admin.Address')}}   </span>
            </label>
            <textarea name="address" id="address" class="form-control " rows="5"
                      placeholder="">{{$row->address}}</textarea>
        </div>




    </div>
</form>
