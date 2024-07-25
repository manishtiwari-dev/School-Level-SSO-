<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ContactUsMessage;
use Illuminate\Http\Request;
use Modules\SSO\Models\SSOContact;
use Illuminate\Support\Facades\Validator;

class ContactUsController extends Controller
{
    # store contact us form data
 

    public function store(Request $request)
    {



        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'email' => 'required|email|unique:sso_contact_us,email',
            ],
            [
                'name.required' => 'Please enter name.',
                'email.required' => 'Please enter email.',
                'email.email' => 'Please enter valid email.',
              
            ]
        );



        if ($validator->fails()) {
            flash(localize( $validator->messages()))->error();
            return back();
        } else {


          $msg = new SSOContact;
          $msg->name          = $request->name;
          $msg->email         = $request->email;
          $msg->phone         = $request->phone;
          $msg->message       = $request->message;
          $msg->save();

          flash(localize('Your message has been sent successfully'))->success();
          return back();

        }
    }
}
