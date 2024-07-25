<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\State;
use Modules\SSO\Models\SSOInstitute;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Modules\SSO\Models\SSOStudent;
use Modules\SSO\Models\SSOClasse;
use Modules\SSO\Models\SSOCoordinator;
use App\Mail\RegistrationDetailsMail;
use PDF;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    # get 
    public function index(Request $request)
    {
        $country_data = Country::where('is_active', 1)->get();
        $state_list = State::where('is_active', 1)->get();

        return getView('pages.register.institute_index', ['country_data' => $country_data, 'state_list' => $state_list]);
    }


    # get 
    public function individual_register(Request $request)
    {
        $collegelist = SSOInstitute::all();
        $classlist = SSOClasse::all();
       
        return getView('pages.register.individual_register', ['collegelist' => $collegelist, 'classlist' => $classlist]);
    }



    # get 
    public function offline_register(Request $request)
    {
        $collegelist = SSOInstitute::all();
        $classlist = SSOClasse::all();
       
        return getView('pages.register.offline_register', ['collegelist' => $collegelist, 'classlist' => $classlist]);
    }




    public function handlePrintRequest(Request $request)
    {
        $validatedData = $request->validate([
            'institute_id' => 'required|integer',
            'class_id' => 'required|integer',
        ]);
    
        // Process the data
        $institute = SSOInstitute::find($validatedData['institute_id']);
        $class = SSOClasse::find($validatedData['class_id']);

        $website_logo = getSetting('website_logo');

        $data = [
            'institute' => $institute,
            'class' => $class,
             'website_logo'=>$website_logo
        ];


        // Load the view and pass the data
        $pdf = PDF::loadView('frontend.pages.register.printPage', $data);

        // Download the PDF file
        return $pdf->download('offline_form.pdf');


    }
    






    public function store(Request $request)
    {

        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'country_id' => 'required',
                'state_id' => 'required',
                //  'email' => 'required|email|unique:sso_institute,email',
            ],
            [
                'name.required' => 'Please enter name.',
                'country_id' => 'required',
                'state_id' => 'required',
                // 'email.required' => 'Please enter email.',
                //'email.email' => 'Please enter valid email.',

            ]
        );



        if ($validator->fails()) {
            flash(localize($validator->messages()))->error();
            return back();
        } else {
            $request->request->add(['created_by' => auth()->user()->user_type]);

            $instituteId = $this->GenerateAndCheck('SSOInstitute', 'institute_number', [1, 7]);


            $SSOInstitute = new SSOInstitute();
            $SSOInstitute->name = $request->name;
            $SSOInstitute->contact_email = $request->contact_email;
            $SSOInstitute->institute_number = $instituteId ?? '';
            $SSOInstitute->contact_name = $request->contact_name;
            $SSOInstitute->contact_phone = $request->contact_phone;
            $SSOInstitute->principle_name = $request->principle_name;
            $SSOInstitute->principle_email = $request->principle_email;
            $SSOInstitute->principle_phone = $request->principle_phone;
            $SSOInstitute->designation = $request->designation;
            $SSOInstitute->address = $request->address;
            $SSOInstitute->city = $request->city;
            $SSOInstitute->state_id = $request->state_id;
            $SSOInstitute->country_id = $request->country_id;
            $SSOInstitute->pincode = $request->pincode;
            // $SSOInstitute->attachment = $request->attachment;

            $SSOInstitute->save();

            // $randPassword = rand(100000, 500000);
            // $user = User::create([
            //     'user_type' => 'admin',
            //     'name' => $request->contact_name,
            //     'email' => strtolower($request->contact_email ?? ''),
            //     'phone' => $request->contact_phone,
            //     'password' => Hash::make($randPassword),
            // ]);

            // $SSOInstitute->user_id = $user->id;
            // $SSOInstitute->save();

            // if (auth()->user()->user_type == 'admin') {
            //     $loginDetails = [
            //         'email' => $SSOInstitute->contact_email,
            //         'password' => $randPassword
            //     ];
            //     Mail::to($SSOInstitute->contact_email)->queue(new LoginDetailsMail($loginDetails));
            // }

            flash(localize('Institute has been register successfully.'))->success();
            return redirect()->route('home');

            // return redirect()->route('payment', ['SSOInstitute' => $SSOInstitute]);

        }
    }


    public function individual_store(Request $request)
    {

        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'email' => 'required|email|unique:sso_students,email',
                'dob' => 'required',
                'aadhar_no' => 'required|digits:12|numeric',
            ],
            [
                'name.required' => 'Please enter name.',
                'email.required' => 'Please enter email.',
                'email.email' => 'Please enter valid email.',
                'dob.required' => 'Please select a date.',
                'aadhar_no.required' => 'Please enter Aadhar number.',
                'aadhar_no.digits' => 'Aadhar number must be exactly 12 digits.',
                'aadhar_no.numeric' => 'Aadhar number must contain only numeric characters.',
            ]
        );



        if ($validator->fails()) {
            flash(localize($validator->messages()))->error();
            return back();
        } else {
            $reg_id = $this->GenerateAndCheck('SSOStudent', 'registration_number', [1, 7]);

            $student = new SSOStudent();
            $student->institute_id = $request->institute_id;
            $student->other_institute = $request->other_institute;
            $student->class_id = $request->class_id;
            $student->registration_number = $reg_id ?? '';
            $student->name = $request->name;
            $student->email = $request->email;
            $student->dob = $request->dob;
            $student->parent_name = $request->parent_name;
            $student->parent_contact = $request->parent_contact;
            $student->phone = $request->phone;
            $student->aadhar_no = $request->aadhar_no;
            $student->thumbnail = $request->thumbnail;
            $student->save();

            $registrationDetails=[
               'registration_number'=> $student->registration_number,
               'email'=> $student->email,
            ];

            Mail::to($student->email)->queue(new RegistrationDetailsMail($registrationDetails));

            return redirect()->route('payment', ['SSOInstitute' => $student]);
        }
    }


    public function coordinator()
    {

        $country_data = Country::where('is_active', 1)->get();
        $state_list = State::where('is_active', 1)->get();
        return getView('pages.register.coordinate', ['country_data' => $country_data, 'state_list' => $state_list]);
    }

    

    public function coordinator_store(Request $request)
    {

        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'country_id' => 'required',
                'state_id' => 'required',
                //  'email' => 'required|email|unique:sso_institute,email',
            ],
            [
                'name.required' => 'Please enter name.',
                'country_id' => 'required',
                'state_id' => 'required',
                // 'email.required' => 'Please enter email.',
                //'email.email' => 'Please enter valid email.',

            ]
        );



        if ($validator->fails()) {
            flash(localize($validator->messages()))->error();
            return back();
        } else {
          
            $SSOCoordinator = new SSOCoordinator();
            $SSOCoordinator->name = $request->name;
            $SSOCoordinator->email = $request->email;
            $SSOCoordinator->phone = $request->phone;
            $SSOCoordinator->dob = $request->dob;
            $SSOCoordinator->education_qualification = $request->education_qualification;
            $SSOCoordinator->other_qualification = $request->other_qualification;
            $SSOCoordinator->address = $request->address;
            $SSOCoordinator->city = $request->city;
            $SSOCoordinator->state_id = $request->state_id;
            $SSOCoordinator->country_id = $request->country_id;
            $SSOCoordinator->pincode = $request->pincode;
            $SSOCoordinator->save();


            flash(localize('Become Coordinator has been register successfully.'))->success();
            return redirect()->route('home');
        }
    }

    public function GenerateAndCheck($model, $column_name, $sizeArray)
    {

        $generatedNumber = generate_random_token('alphabet', $sizeArray[0]) . generate_random_token('alpha_numeric', $sizeArray[1]);
        $modelpath = str_replace('"', "", 'Modules\SSO\Models' . '\\' . $model);
        $availabel = $modelpath::where($column_name, $generatedNumber)->first();
        if (!empty($availabel)) {
            $this->GenerateAndCheck($model, $column_name, $sizeArray);
        } else {
            return $generatedNumber;
        }
    }
}
