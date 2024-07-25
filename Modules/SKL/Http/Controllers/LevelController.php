<?php

namespace Modules\SKL\Http\Controllers;
 
use Modules\SKL\Models\SKLLevel;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;  

class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    { 
        $levellist = SKLLevel::all();

        return view('skl::level.index' , compact('levellist')); 
    } 

    public function create(){

        return view('skl::level.create'); 
    }

    public function store(Request $request){

        $level = new SKLLevel();
        $level->name = $request->name;
        $level->description = $request->description;
        $level->save();

        flash(localize('Record has been submitted successfully.'))->success();
        return redirect()->route('admin.levels.index');

    }

    public function edit($id){

        $level = SKLLevel::findOrFail($id);

        return view('skl::level.edit' , compact('level'));
    }

    public function update(Request $request){

        $level = SKLLevel::findOrFail($request->id);
        $level->name = $request->name;
        $level->description = $request->description;
        $level->save();


        flash(localize('Record has been Updated successfully.'))->success();
        return redirect()->route('admin.levels.index');
    }

    public function delete($id){

        SKLLevel::where('id' , $id)->delete();

        flash(localize('Record has been Deleted successfully.'))->success();
        return redirect()->route('admin.levels.index');

    }
      
}
