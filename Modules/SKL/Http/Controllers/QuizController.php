<?php

namespace Modules\SKL\Http\Controllers;

use Modules\SKL\Models\SKLQuizze;
use Modules\SKL\Models\SKLLevel;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;  

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    { 
        $quizelist = SKLQuizze::oldest();
       
        $quizelist = $quizelist->paginate(paginationNumber());


        return view('skl::quiz.index' , compact('quizelist')); 

    } 

    public function create(){
        
        $levelist = SKLLevel::all();
        return view('skl::quiz.create', compact('levelist')); 
    }

    public function store(Request $request){

        $quiz = new SKLQuizze();
        $quiz->title = $request->title;
        $quiz->description = $request->description;
        $quiz->level_id = $request->level;
        $quiz->start_time = $request->start_time;
        $quiz->durations = $request->durations;
        $quiz->created_by  = auth()->user()->id;
        $quiz->save();
        
        flash(localize('Record has been submitted successfully.'))->success();
        return redirect()->route('admin.quize.index');
    }

    public function edit($id){

        $quiz = SKLQuizze::findOrFail($id);
        $levelist = SKLLevel::all();
        return view('skl::quiz.edit' , compact('quiz','levelist'));
    }

    public function update(Request $request){


        $quiz = SKLQuizze::find($request->id);
        $quiz->title = $request->title;
        $quiz->description = $request->description;
        $quiz->level_id = $request->level;
        $quiz->start_time = $request->start_time;
        $quiz->durations = $request->durations;
        $quiz->created_by  = auth()->user()->id;
        $quiz->save(); 
        

        flash(localize('Record has been Updated successfully.'))->success();
        return redirect()->route('admin.quize.index');


    }

    public function delete($id){

        SKLQuizze::where('id' , $id)->delete();

        flash(localize('Record has been Deleted successfully.'))->success();
        return redirect()->route('admin.quize.index');

    }
      
}
