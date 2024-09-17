<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\InsurancePeopleRequest;
use App\Http\Traits\ResponseTrait;
use App\Models\InsurancePeople;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class InsurancePeopleController extends Controller
{
    //
    use  ResponseTrait;

    public function index(Request $request)
    {

        if ($request->ajax()) {
            $admins = InsurancePeople::query()->latest();
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
                       ';


                })


                ->editColumn('status', function ($row) {

                    if ($row->status=='active')
                        return "<span class='badge bg-success'>".helperTrans('admin.Active')."</span>";

                    elseif ($row->status=='expire')
                        return "<span class='badge bg-danger'>".helperTrans('admin.Expire')."</span>";
                     else
                         return  null;
                })




                ->editColumn('created_at', function ($admin) {
                    return date('Y/m/d', strtotime($admin->created_at));
                })
                ->escapeColumns([])
                ->make(true);


        }
        return view('Admin.CRUDS.insurancePeople.index');
    }


    public function create()
    {

        return view('Admin.CRUDS.insurancePeople.parts.create');
    }

    public function store(InsurancePeopleRequest $request)
    {
        $data = $request->validationData();

     $row=  InsurancePeople::create($data);

        // Update the row code
        $row->update(['code' => $row->id]);


        return $this->addResponse();

    }


    public function show($id)
    {


        //
    }


    public function edit($id )
    {


        $row=InsurancePeople::findOrFail($id);


        return view('Admin.CRUDS.insurancePeople.parts.edit', compact('row'));

    }

    public function update(InsurancePeopleRequest $request, $id )
    {

        $row=InsurancePeople::findOrFail($id);
        $data = $request->validationData();

        $row->update($data);

        return $this->updateResponse();


    }


    public function destroy($id)
    {
        $row = InsurancePeople::findOrFail($id);

        $row->delete();

        return $this->deleteResponse();
    }//end fun

}
