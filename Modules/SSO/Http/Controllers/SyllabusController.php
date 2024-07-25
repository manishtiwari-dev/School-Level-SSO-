<?php

namespace Modules\SSO\Http\Controllers;

use Modules\SSO\Models\SSOSyllabus;
use Modules\SSO\Models\SSOClasse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\SSO\Models\SSOExam;
use Illuminate\Support\Str;

class SyllabusController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $searchKey = null;
        $subList = SSOSyllabus::with('classes')->oldest();
        if ($request->search != null) {
            $tags = $subList->where('name', 'like', '%' . $request->search . '%');
            $searchKey = $request->search;
        }
        $subList = $subList->paginate(paginationNumber());

        return view('sso::syllabus.index', compact('subList', 'searchKey'));
    }

    public function create()
    {

        $classlist = SSOClasse::all();
        $examlist = SSOExam::all();

        return view('sso::syllabus.create', compact('classlist', 'examlist'));
    }

    public function store(Request $request)
    {

    

        $SSOSyllabus = new SSOSyllabus();
        $SSOSyllabus->class_id = $request->class_id;
        $SSOSyllabus->content = $request->content;
        $SSOSyllabus->short_description = $request->short_description;
        $SSOSyllabus->exam_id    = $request->exam_id;
        $SSOSyllabus->name = $request->name;
        $SSOSyllabus->attachment    = $request->attachment;
        if ($request->slug != null) {
            $SSOSyllabus->slug = Str::slug($request->slug);
        } else {
            $SSOSyllabus->slug = Str::slug($request->name) . '-' . Str::random(5);
        }

        $SSOSyllabus->save();


       

        flash(localize('Syllabus has been added successfully.'))->success();
        return redirect()->route('admin.syllabus.index');
    }


    public function edit($id)
    {
        $subList = SSOSyllabus::findOrFail($id);
        $classlist = SSOClasse::all();
        $examlist = SSOExam::all();

        return view('sso::syllabus.edit', compact('subList', 'classlist', 'examlist'));
    }



    # update status 
    public function updateStatus(Request $request)
    {
        $subject = SSOSyllabus::findOrFail($request->id);
        $subject->status = $request->status;
        if ($subject->save()) {
            return 1;
        }
        return 0;
    }

    public function update(Request $request)
    {

        $SSOSyllabus = SSOSyllabus::findOrFail($request->id);
        $SSOSyllabus->class_id = $request->class_id;
        $SSOSyllabus->content = $request->content;
        $SSOSyllabus->short_description = $request->short_description;
        $SSOSyllabus->exam_id    = $request->exam_id;
        $SSOSyllabus->name = $request->name;
        $SSOSyllabus->attachment    = $request->attachment;
        $SSOSyllabus->slug = (!is_null($request->slug)) ? Str::slug($request->slug, '-') : Str::slug($request->name, '-') . '-' . strtolower(Str::random(5));
        $SSOSyllabus->save();


        flash(localize('Subject has been Updated successfully.'))->success();
        return redirect()->route('admin.syllabus.index');
    }

    public function delete($id)
    {

        $subject = SSOSyllabus::findOrFail($id);
        $subject->delete();

        flash(localize('Subject has been Deleted successfully.'))->success();
        return redirect()->route('admin.syllabus.index');
    }
}
