<?php

namespace Modules\SSO\Http\Controllers;

use Modules\SSO\Models\SSOContact;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $searchKey = null;
        $contactList = SSOContact::oldest();
        if ($request->search != null) {
            $tags = $contactList->where('name', 'like', '%' . $request->search . '%');
            $searchKey = $request->search;
        }
        $contactList = $contactList->paginate(paginationNumber());

        return view('sso::contact.index', compact('contactList', 'searchKey'));
    }


}
