<?php

namespace Modules\SSO\Http\Controllers;

use Modules\SSO\Models\SSOWinner;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\SSO\Models\SSOExam;
use Illuminate\Support\Str;
use Modules\SSO\Models\SSOStudent;

class WinnerController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $searchKey = null;
        $winnerList = SSOWinner::oldest();
        if ($request->search != null) {
            $tags = $winnerList->where('name', 'like', '%' . $request->search . '%');
            $searchKey = $request->search;
        }
        $winnerList = $winnerList->paginate(paginationNumber());

        return view('sso::winners.index', compact('winnerList', 'searchKey'));
    }

    public function create()
    {
        $studentlist = SSOStudent::all();

        $examlist = SSOExam::all();

        return view('sso::winners.create', compact('examlist','studentlist'));
    }

    public function store(Request $request)
    {

    

        $SSOWinner = new SSOWinner();
        $SSOWinner->content = $request->content;
        $SSOWinner->short_description = $request->short_description;
        $SSOWinner->exam_id    = $request->exam_id;
        $SSOWinner->student_id    = $request->student_id;
        $SSOWinner->name = $request->name;
        $SSOWinner->attachment    = $request->attachment;
        if ($request->slug != null) {
            $SSOWinner->slug = Str::slug($request->slug);
        } else {
            $SSOWinner->slug = Str::slug($request->name) . '-' . Str::random(5);
        }

        $SSOWinner->save();


       

        flash(localize('Winner has been added successfully.'))->success();
        return redirect()->route('admin.winners.index');
    }


    public function edit($id)
    {
        $winnerList = SSOWinner::findOrFail($id);
        $examlist = SSOExam::all();
        $studentlist = SSOStudent::all();

        return view('sso::winners.edit', compact('winnerList', 'examlist','studentlist'));
    }



    # update status 
    public function updateStatus(Request $request)
    {
        $subject = SSOWinner::findOrFail($request->id);
        $subject->status = $request->status;
        if ($subject->save()) {
            return 1;
        }
        return 0;
    }

    public function update(Request $request)
    {

        $SSOWinner = SSOWinner::findOrFail($request->id);
        $SSOWinner->content = $request->content;
        $SSOWinner->short_description = $request->short_description;
        $SSOWinner->exam_id    = $request->exam_id;
        $SSOWinner->student_id    = $request->student_id;
        $SSOWinner->name = $request->name;
        $SSOWinner->attachment    = $request->attachment;
        $SSOWinner->slug = (!is_null($request->slug)) ? Str::slug($request->slug, '-') : Str::slug($request->name, '-') . '-' . strtolower(Str::random(5));
        $SSOWinner->save();


        flash(localize('Winner has been Updated successfully.'))->success();
        return redirect()->route('admin.winners.index');
    }

    public function delete($id)
    {

        $subject = SSOWinner::findOrFail($id);
        $subject->delete();

        flash(localize('Winner has been Deleted successfully.'))->success();
        return redirect()->route('admin.syllabus.index');
    }
}
