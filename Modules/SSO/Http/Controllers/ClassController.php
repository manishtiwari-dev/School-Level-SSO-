<?php

namespace Modules\SSO\Http\Controllers;

use Modules\SSO\Models\SSOClasse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $searchKey = null;
        $classList = SSOClasse::oldest();
        if ($request->search != null) {
            $tags = $classList->where('name', 'like', '%' . $request->search . '%');
            $searchKey = $request->search;
        }
        $classList = $classList->paginate(paginationNumber());

        return view('sso::class.index', compact('classList', 'searchKey'));
    }

    public function create()
    {

        return view('sso::class.create');
    }

    public function store(Request $request)
    {

        $class = new SSOClasse();
        $class->name = $request->name;
        $class->save();

        flash(localize('Class has been added successfully.'))->success();
        return redirect()->route('admin.class.index');
    }

    public function edit($id)
    {

        $classList = SSOClasse::findOrFail($id);

        return view('sso::class.edit', compact('classList'));
    }

    public function update(Request $request)
    {

        $class = SSOClasse::findOrFail($request->id);
        $class->name = $request->name;
        $class->save();


        flash(localize('Class has been Updated successfully.'))->success();
        return redirect()->route('admin.class.index');
    }


    # update status 
    public function updateStatus(Request $request)
    {
        $class = SSOClasse::findOrFail($request->id);
        $class->status = $request->status;
        if ($class->save()) {
            return 1;
        }
        return 0;
    }

    public function delete($id)
    {

        $class = SSOClasse::findOrFail($id);
        $class->delete();

        flash(localize('Class has been Deleted successfully.'))->success();
        return redirect()->route('admin.class.index');
    }
}
