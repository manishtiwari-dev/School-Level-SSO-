<?php

namespace Modules\SSO\Http\Controllers;

use Modules\SSO\Models\SSOInstitute;
use Modules\SSO\Models\SSOClasse;
use Modules\SSO\Models\SSOStudent;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use Modules\SSO\Import\StudentImport;
use Modules\SSO\Export\StudentExport;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $studentlist = SSOStudent::with('institute');
        $studentlist = $studentlist->paginate(paginationNumber());


        return view('sso::student.index', compact('studentlist'));
    }

    public function create()
    {

        $collegelist = SSOInstitute::all();
        $classlist = SSOClasse::all();
        return view('sso::student.create', compact('collegelist', 'classlist'));
    }

    public function store(Request $request)
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

            $mediaFile = '';

            if ($request->hasFile('video')) {
                $file = $request->file('video');
    
                // Get the current timestamp
                $timestamp = now()->timestamp;
    
                // Get the original file extension
                $extension = $file->getClientOriginalExtension();
    
                // Combine timestamp and extension to create a unique filename
                $fileName = $timestamp . '.' . $extension;
    
                // Store the file with the new filename
                $mediaFile = $file->storeAs('uploads/media', $fileName);
            }


            $reg_id = $this->GenerateAndCheck('SSOStudent', 'registration_number', [1, 7]);


            $student = new SSOStudent();
            $student->institute_id = $request->institute_id;
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
            $student->video = $mediaFile;

            $student->save();

            flash(localize('Student has been added successfully.'))->success();
            return redirect()->route('admin.student.index');
        }
    }


    public function import_create()
    {

        $collegelist = SSOInstitute::all();
        $classlist = SSOClasse::all();
        return view('sso::student.import_create', compact('collegelist', 'classlist'));
    }



    public function studentImportStore(Request $request)
    {

        $import_file = $request->file('import_file');

        if (!empty($import_file)) {


            Excel::import(new StudentImport($request->class_id, $request->institute_id),  $request->file('import_file'));

            flash(localize('Student has been imported successfully'))->success();
            return redirect()->route('admin.student.index');
        }
    }


    public function exportData(Request $request)
    {

        $name = 'student_details_' . date('Y-m-d i:h:s');
      

         return Excel::download(new StudentExport, $name . '.xlsx');

       // return view('sso::student.index', compact('url'));
    }

    public function edit(Request $request, $id)
    {

        $studentlist = SSOStudent::findOrFail($id);
        $collegelist = SSOInstitute::all();
        $classlist = SSOClasse::all();

        return view('sso::student.edit', compact('collegelist', 'classlist', 'studentlist'));
    }


    # update 
    public function update(Request $request)
    {


        $mediaFile = '';

        if ($request->hasFile('video')) {
            $file = $request->file('video');

            // Get the current timestamp
            $timestamp = now()->timestamp;

            // Get the original file extension
            $extension = $file->getClientOriginalExtension();

            // Combine timestamp and extension to create a unique filename
            $fileName = $timestamp . '.' . $extension;

            // Store the file with the new filename
            $mediaFile = $file->storeAs('uploads/media', $fileName);
        }


        $student = SSOStudent::findOrFail($request->id);
        $student->institute_id = $request->institute_id;
        $student->class_id = $request->class_id;
        $student->name = $request->name;
        $student->email = $request->email;
        $student->dob = $request->dob;
        $student->parent_name = $request->parent_name;
        $student->parent_contact = $request->parent_contact;
        $student->phone = $request->phone;
        $student->aadhar_no = $request->aadhar_no;
        $student->thumbnail = $request->thumbnail;
        $student->video = !empty($mediaFile)  ?  $mediaFile : $request->old_video;
        $student->save();

        
        


        flash(localize('Student has been updated successfully'))->success();
        return redirect()->route('admin.student.index');
    }

    # update status 
    public function updateStatus(Request $request)
    {
        $student = SSOStudent::findOrFail($request->id);
        $student->status = $request->status;
        if ($student->save()) {
            return 1;
        }
        return 0;
    }
    # delete 
    public function delete($id)
    {
        $student = SSOStudent::findOrFail($id);
        $student->delete();
        flash(localize('Student has been deleted successfully'))->success();
        return back();
    }

    public function donwloadFile(){
       
        $myFile = public_path("/importStudent.xlsx");

        return response()->download($myFile);
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
