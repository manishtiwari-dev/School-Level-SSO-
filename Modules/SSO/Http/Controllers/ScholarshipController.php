<?php

namespace Modules\SSO\Http\Controllers;

use Modules\SSO\Models\SSOScholarship;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;

class ScholarshipController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */

       # construct
    public function __construct()
    {
        $this->middleware(['permission:scholarships'])->only('index'); 
        $this->middleware(['permission:add_scholarships'])->only(['create', 'store']);  
        $this->middleware(['permission:edit_scholarships'])->only(['edit', 'update']);  
        $this->middleware(['permission:delete_scholarships'])->only(['delete']);  
    }


    public function index(Request $request)
    {
        $scholarShipData = SSOScholarship::oldest();
        $scholarShipData = $scholarShipData->paginate(paginationNumber());

        return view('sso::scholarship.index', compact('scholarShipData'));
    }

    public function create()
    {
      

        return view('sso::scholarship.create');
    }

    public function store(Request $request)
    {

        $scholarShipData =  new SSOScholarship();
        $scholarShipData->name = $request->name;
        $scholarShipData->content = $request->content;
        $scholarShipData->attachment        = $request->attachment;
        $scholarShipData->slug              = Str::slug($request->name, '-') . '-' . strtolower(Str::random(5));

        $scholarShipData->save();



        flash(localize('Scholarship has been added successfully.'))->success();
        return redirect()->route('admin.scholarship.index');
    }


    public function edit($id)
    {
        $scholarShipData = SSOScholarship::findOrFail($id);
      
        return view('sso::scholarship.edit', compact('scholarShipData'));
    }


    public function update(Request $request)
    {


    
        $scholarship = SSOScholarship::findOrFail($request->id);
        $scholarship->name = $request->name;
        $scholarship->content = $request->content;
        $scholarship->attachment        = $request->attachment;
        $scholarship->slug              = (!is_null($request->slug)) ? Str::slug($request->slug, '-') : Str::slug($request->name, '-') . '-' . strtolower(Str::random(5));
        $scholarship->save();


        flash(localize('Scholarship has been Updated successfully.'))->success();
        return redirect()->route('admin.scholarship.index');
    }
    # update status 
    public function updateStatus(Request $request)
    {
        $scholarship = SSOScholarship::findOrFail($request->id);
        $scholarship->status = $request->status;
        if ($scholarship->save()) {
            return 1;
        }
        return 0;
    }

    public function delete($id)
    {

        $scholarship = SSOScholarship::findOrFail($id);
        $scholarship->delete();

        flash(localize('Scholarship has been Deleted successfully.'))->success();
        return redirect()->route('admin.scholarship.index');
    }
}
