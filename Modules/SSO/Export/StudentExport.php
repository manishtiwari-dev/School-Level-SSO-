<?php 
namespace Modules\SSO\Export;
 

use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Modules\SSO\Models\SSOStudent;

 
class StudentExport implements FromCollection,WithHeadings
{

    //  public function __construct(  $startdate,   $enddate, $website_id) 
    //     {
    //         $this->startdate = $startdate;
    //         $this->enddate = $enddate;
    //         $this->website_id = $website_id;
    //     }

    /**
    * @return \Illuminate\Support\Collection
    */ 
    public function headings():array{
        return[
          
            'Institute Name',
            'Class Name',
            'Name',
            'Email',
            'DOB',
            'Parent Name',
            'Phone',
            'Aadhar Number',
           
        ];
    } 

    public function collection()
    {

         $student_details = SSOStudent::with('institute','classes')->get();


          $student_data = collect([]);

         foreach($student_details as $student){

            $student_data->add([
                "institute_id" => $student->institute->name ?? '',
                "class_id" => $student->classes->name ?? '',
                "name" => $student->name ?? '',
                "email" => $student->email  ?? '',
                "dob" => $student->dob ?? '',
                "parent_name" => $student->parent_name ?? '',
                "phone" => $student->phone ?? '',
                "aadhar_no" => $student->aadhar_no ?? '',
                          
             ]);

          } 

         return $student_details;
          
    }
    
}