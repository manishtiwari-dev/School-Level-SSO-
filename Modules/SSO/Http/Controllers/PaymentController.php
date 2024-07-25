<?php

namespace Modules\SSO\Http\Controllers;

use Modules\SSO\Models\SSOPayment;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $searchKey = null;
        $paymentList = SSOPayment::oldest();
        if ($request->search != null) {
            $pay = $paymentList->where('user_email', 'like', '%' . $request->search . '%');
            $searchKey = $request->search;
        }
        $paymentList = $paymentList->paginate(paginationNumber());

        return view('sso::payment.index', compact('paymentList', 'searchKey'));
    }


}
