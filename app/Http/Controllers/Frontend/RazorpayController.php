<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\State;
use App\Mail\LoginDetailsMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Modules\SSO\Models\SSOPayment;
use Illuminate\Support\Facades\Session;
use Razorpay\Api\Api;
use Modules\SSO\Models\SSOStudent;

class RazorpayController extends Controller
{
    # get 
    public function index(Request $request ,$SSOInstitute)
    {
        $SSOStudent=SSOStudent::where('id',$SSOInstitute)->first();

        return getView('pages.payment', ['SSOStudent' => $SSOStudent]);
    }


    public function store(Request $request) {
        $input = $request->all();
        $api = new Api (env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
        $payment = $api->payment->fetch($input['razorpay_payment_id']);
        if(count($input) && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount' => $payment['amount']));
                $payment = SSOPayment::create([
                    'payment_id' => $response['id'],
                    'method' => $response['method'],
                    'currency' => $response['currency'],
                    'user_email' => $response['email'],
                    'amount' => $response['amount']/100,
                    'json_response' => json_encode((array)$response)
                ]);
            } catch(Exceptio $e) {
                return $e->getMessage();
                Session::put('error',$e->getMessage());
                return redirect()->back();
            }
        }
        Session::put('success',('Payment Successful'));
        return redirect()->route('payment.success');

    }

   

    public function payment_success()
    {
      
        return getView('pages.success');
    }
    
}
