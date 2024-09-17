<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\HospitalRequest;
use App\Http\Traits\ResponseTrait;
use App\Http\Traits\Upload_Files;
use App\Models\Hospital;
use App\Models\HospitalBranch;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class HospitalBranchController extends Controller
{
    //
    use  ResponseTrait,Upload_Files;

    public function index(Request $request)
    {

        $id = $request->id;
        if ($request->ajax()) {
            $hospital = Hospital::find($request->id);
            $admins = $hospital->branches;
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




                ->editColumn('name', function ($row) {
                    return $row->name;
                })

                ->editColumn('desc', function ($row) {
                    return $row->desc;
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
        return view('Admin.CRUDS.hospital.branches.index', compact('id'));
    }


    public function create(Request $request)
    {
        $hospitals = Hospital::get();
        return view('Admin.CRUDS.hospital.branches.parts.create',compact('hospitals'));
    }

    public function store(HospitalRequest $request)
    {
        $data = $request->validationData();

        if ($request->image)
            $data["image"] = $this->uploadFiles('hospital_branches', $request->file('image'), null);

        HospitalBranch::create($data);


        return $this->addResponse();

    }


    public function show($id)
    {


        //
    }


    public function edit($id )
    {

        $hospitals = Hospital::get();
        $row=HospitalBranch::findOrFail($id);
        return view('Admin.CRUDS.hospital.parts.edit', compact('row', 'hospitals'));

    }

    public function update(HospitalRequest $request, $id )
    {

        $row=Hospital::findOrFail($id);
        $data = $request->validationData();

        if ($request->image)
            $data["image"] = $this->uploadFiles('hospitals', $request->file('image'), $row->image);

        $row->update($data);


        return $this->updateResponse();

    }


    public function destroy($id)
    {
        $row = Hospital::findOrFail($id);

        if (file_exists($row->image)) {
            unlink($row->image);
        }

        $row->delete();

        return $this->deleteResponse();
    }//end fun


}
