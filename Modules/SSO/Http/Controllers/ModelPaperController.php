<?php

namespace Modules\SSO\Http\Controllers;

use Modules\SSO\Models\SSOModelPaper;
use Modules\SSO\Models\SSOClasse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\SSO\Models\SSOExam;

class ModelPaperController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */

    public function index(Request $request)
    {
        $modelPaper = SSOModelPaper::oldest();
        $modelPaper = $modelPaper->paginate(paginationNumber());

        return view('sso::model-paper.index', compact('modelPaper'));
    }

    public function create()
    {
        $examlist = SSOExam::all();
        $classlist = SSOClasse::all();

        return view('sso::model-paper.create', compact('classlist', 'examlist'));
    }

    public function store(Request $request)
    {

      

        $modelPaper =  new SSOModelPaper();
        $modelPaper->class_id = $request->class_id;
        $modelPaper->name        = $request->name;
        $modelPaper->content = $request->content;
        $modelPaper->attachment        = $request->attachment;
        $modelPaper->exam_id    = $request->exam_id;

        $modelPaper->save();



        flash(localize('Model Paper has been added successfully.'))->success();
        return redirect()->route('admin.model-paper.index');
    }


    public function edit($id)
    {
        $modelPaper = SSOModelPaper::findOrFail($id);
        $classlist = SSOClasse::all();
        $examlist = SSOExam::all();

        return view('sso::model-paper.edit', compact('modelPaper', 'classlist', 'examlist'));
    }


    public function update(Request $request)
    {


     



        $modelPaper = SSOModelPaper::findOrFail($request->id);
        $modelPaper->class_id = $request->class_id;
        $modelPaper->name        = $request->name;
        $modelPaper->content = $request->content;
        $modelPaper->attachment        = $request->attachment;
        $modelPaper->exam_id    = $request->exam_id;

        $modelPaper->save();


        flash(localize('Model Paper has been Updated successfully.'))->success();
        return redirect()->route('admin.model-paper.index');
    }
    # update status 
    public function updateStatus(Request $request)
    {
        $modelPaper = SSOModelPaper::findOrFail($request->id);
        $modelPaper->status = $request->status;
        if ($modelPaper->save()) {
            return 1;
        }
        return 0;
    }

    public function delete($id)
    {

        $modelPaper = SSOModelPaper::findOrFail($id);
        $modelPaper->delete();

        flash(localize('Model Paper has been Deleted successfully.'))->success();
        return redirect()->route('admin.model-paper.index');
    }
}
