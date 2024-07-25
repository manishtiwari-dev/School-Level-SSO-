<?php

namespace Modules\SSO\Http\Controllers;

use Modules\SSO\Models\SSOCoordinator;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CoordinatorController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $searchKey = null;
        $coordinateList = SSOCoordinator::oldest();
        if ($request->search != null) {
            $tags = $coordinateList->where('name', 'like', '%' . $request->search . '%');
            $searchKey = $request->search;
        }
        $coordinateList = $coordinateList->paginate(paginationNumber());

        return view('sso::coordinator.index', compact('coordinateList', 'searchKey'));
    }


}
