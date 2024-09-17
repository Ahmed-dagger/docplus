<!--begin::Form-->

<form id="form" enctype="multipart/form-data" method="POST" action="{{route('insurance_companies.store')}}">
    @csrf
    <div class="row g-4">



        <div class="d-flex flex-column mb-7 fv-row col-sm-6">
            <!--begin::Label-->
            <label for="name" class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                <span class="required mr-1">{{helperTrans('admin.name')}} <span class="red-star">*</span></span>
            </label>
            <!--end::Label-->
            <input id="name" required type="text" class="form-control form-control-solid" placeholder="" name="name" value=""/>
        </div>

        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="d-flex flex-column mb-7 fv-row col-sm-6">
            <!--begin::Label-->
            <label for="phone" class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                <span class="required mr-1">{{helperTrans('admin.phone')}} </span>
                <span class="red-star">*</span>
            </label>
            <!--end::Label-->
            <input id="phone" required type="text" class="form-control form-control-solid" placeholder=" {{helperTrans('admin.phone')}}"
                   name="phone" value=""/>
        </div>



        <div class="d-flex flex-column mb-7 fv-row col-sm-6">
            <!--begin::Label-->
            <label for="api" class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                <span class="required mr-1">{{helperTrans('admin.Api')}} </span>
                <span class="red-star">*</span>
            </label>
            <!--end::Label-->
            <input id="api" required type="text" class="form-control form-control-solid" placeholder=" {{helperTrans('admin.api')}}"
                   name="api" value=""/>
        </div>





        <div class="d-flex flex-column mb-7 fv-row col-sm-6">
            <!--begin::Label-->
            <label for="check" class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                <span class="required mr-1">{{helperTrans('admin.Check')}}</span>
                <span class="red-star">*</span>
            </label>

            <select class="form-control" id="check" name="check">

                <option selected disabled> {{helperTrans('admin.Select Check')}}</option>
                <option value="code">{{helperTrans('admin.Code')}}</option>
                <option value="api">{{helperTrans('admin.Api')}}</option>

            </select>
        </div>



        <div class="col-sm-12 pb-3 p-2">
            <label for="address" class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                <span class="required mr-1">  {{helperTrans('admin.Address')}}   </span>
            </label>
            <textarea name="address" id="address" class="form-control " rows="5"
                      placeholder=""></textarea>
        </div>



    </div>
</form>
