<?php

namespace Modules\SKL\Http\Controllers;

use Modules\SKL\Models\SKLParticipant;
use Modules\SKL\Models\SKLLevel;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;  

class QuizParticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    { 
        $participatelist = SKLParticipant::oldest();
       
        $participatelist = $participatelist->paginate(paginationNumber());


        return view('skl::participant.index' , compact('participatelist')); 

    } 

    public function create(){
        
        $levelist = SKLLevel::all();
        return view('skl::participant.create', compact('levelist')); 
    }

    public function store(Request $request){

        $participatelist = new SKLParticipant();
        $participatelist->name = $request->name;
        $participatelist->email = $request->email;
        $participatelist->contact_no = $request->contact_no;
        $participatelist->user_id  = auth()->user()->id;
        $participatelist->save();
        
        flash(localize('Record has been submitted successfully.'))->success();
        return redirect()->route('admin.participant.index');
    }

    public function edit($id){

        $participatelist = SKLParticipant::findOrFail($id);
        $levelist = SKLLevel::all();
        return view('skl::participant.edit' , compact('levelist','participatelist'));
    }

    public function update(Request $request){


        $participatelist = SKLParticipant::find($request->id);
        $participatelist->name = $request->name;
        $participatelist->email = $request->email;
        $participatelist->contact_no = $request->contact_no;
        $participatelist->user_id  = auth()->user()->id;
        $participatelist->save(); 
        

        flash(localize('Record has been Updated successfully.'))->success();
        return redirect()->route('admin.participant.index');


    }

    public function delete($id){

        SKLParticipant::where('id' , $id)->delete();

        flash(localize('Record has been Deleted successfully.'))->success();
        return redirect()->route('admin.participant.index');

    }
      
}
