<?php

namespace Modules\SSO\Http\Controllers;

use App\Models\Country;
use App\Models\State;
use Modules\SSO\Models\SSOInstitute;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Mail\LoginDetailsMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class InstituteController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */



    public function index()
    {
        $collegelist = SSOInstitute::paginate(paginationNumber());
      
        return view('sso::institute.index', compact('collegelist'));
    }

    public function create()
    {
        $countries = Country::where('is_active', 1)->get();
        $states = State::where('is_active', 1)->get();
        return view('sso::institute.create', compact('states', 'countries'));
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


    public function store(Request $request)
    {
        $request->request->add(['created_by' => auth()->user()->user_type]);


        $instituteId = $this->GenerateAndCheck('SSOInstitute', 'institute_number', [1, 7]);
        

     //   $SSOInstitute= SSOInstitute::create($request->except('_token'));

        
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
        $SSOInstitute->attachment = $request->attachment;

        $SSOInstitute->save();






        $randPassword=rand(100000,500000);

        $user=User::create([
            'user_type'=>'admin',
            'name'=>$request->contact_name,
            'email'=>strtolower($request->contact_email ?? ''),
            'phone'=>$request->contact_phone,
            'password'=>Hash::make($randPassword),
        ]);

        $SSOInstitute->user_id= $user->id;
        $SSOInstitute->save();



        if (auth()->user()->user_type == 'admin') {

         $loginDetails = [
        'email' => $SSOInstitute->contact_email,
        'password' =>$randPassword  
        ];
        Mail::to($SSOInstitute->contact_email)->queue(new LoginDetailsMail($loginDetails));

     
      }

        flash(localize('Institute has been added successfully.'))->success();
        return redirect()->route('admin.institute.index');
    }

    public function edit(Request $request, $id)
    {

        $collegelist = SSOInstitute::findOrFail($id);
        $countries = Country::where('is_active', 1)->get();
        $states = State::where('is_active', 1)->get();
        return view('sso::institute.edit', compact('states', 'countries', 'collegelist'));
    }

    # update 
    public function update(Request $request)
    {
        $college = SSOInstitute::findOrFail($request->id);
        $college->name = $request->name;
        $college->contact_email = $request->contact_email;
      //  $college->email = $request->email ?? '';
        $college->contact_name = $request->contact_name;
        $college->contact_phone = $request->contact_phone;
        $college->principle_name = $request->principle_name;
        $college->principle_email = $request->principle_email;
        $college->principle_phone = $request->principle_phone;
        $college->designation = $request->designation;
        $college->address = $request->address;
        $college->city = $request->city;
        $college->state_id = $request->state_id;
        $college->country_id = $request->country_id;
        $college->pincode = $request->pincode;
        $college->attachment = $request->attachment;

        $college->save();

        flash(localize('Institute has been updated successfully'))->success();
        return back();
    }

  # update status 
  public function updateStatus(Request $request)
  {
      $college = SSOInstitute::findOrFail($request->id);
      $college->status = $request->status;
      if ($college->save()) {
          return 1;
      }
      return 0;
  }

    # delete 
    public function delete($id)
    {
        $college = SSOInstitute::findOrFail($id);
        $college->delete();
        flash(localize('Institute has been deleted successfully'))->success();
        return back();
    }


    public function view(Request $request, $id)
    {

        $collegelist = SSOInstitute::with('students')->findOrFail($request->id);
       
        return view('sso::institute.show', compact('collegelist'));
    }
   
}
