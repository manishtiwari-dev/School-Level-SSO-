<?php

namespace Modules\SSO\Http\Controllers;

use Modules\SSO\Models\SSOExam;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\SSO\Models\SSOClasse;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $examData = SSOExam::all();

        return view('sso::exam.index', compact('examData'));
    }



    public function create()
    {

        $classlist = SSOClasse::all();

        return view('sso::exam.create', compact('classlist'));
    }


    public function store(Request $request)
    {


        $examData =    SSOExam::create([
            'name' => $request->name,
            'nav_name' => $request->nav_name,
            'about' => $request->about,
            'how_to_participate' => $request->how_to_participate,
            'exam_dates' => $request->exam_dates


        ]);


        flash(localize('Syllabus has been added successfully.'))->success();
        return redirect()->route('admin.competition.index');
    }


    public function edit($id)
    {
        $examData = SSOExam::findOrFail($id);
        $classlist = SSOClasse::all();

        return view('sso::exam.edit', compact('examData', 'classlist'));
    }

    public function update(Request $request)
    {


        $examData = SSOExam::findOrFail($request->id);
        $examData->name = $request->name;
        $examData->nav_name = $request->nav_name;
        $examData->about = $request->about;
        $examData->how_to_participate = $request->how_to_participate;
        $examData->exam_dates = $request->exam_dates;

        $examData->save();

        flash(localize('Competition has been Updated successfully.'))->success();
        return redirect()->route('admin.competition.index');
    }
    # update status 
    public function updateStatus(Request $request)
    {
        $examData = SSOExam::findOrFail($request->id);
        $examData->status = $request->status;
        if ($examData->save()) {
            return 1;
        }
        return 0;
    }

    public function delete($id)
    {

        $examData = SSOExam::findOrFail($id);
        $examData->delete();

        flash(localize('Competition has been Deleted successfully.'))->success();
        return redirect()->route('admin.competition.index');
    }
}
