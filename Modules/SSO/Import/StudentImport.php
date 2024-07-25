<?php

namespace Modules\SSO\Import;

use Date;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Modules\SSO\Models\SSOInstitute;
use Modules\SSO\Models\SSOStudent;
use Carbon\Carbon;



class StudentImport implements ToModel, WithHeadingRow
{

    public function __construct($class_id,$institute_id)
    {
        $this->class_id = $class_id;
        $this->institute_id = $institute_id;
    }

    public function model(array $row)
    {
        // dd($row);
        $dob = Carbon::parse($row['dob'])->format('Y-m-d');

        $prdopval1 = SSOStudent::create([
            'class_id' => $this->class_id,
            'institute_id' => $this->institute_id,
            'name' =>  $row['name'] ?? '',
            'email' =>  $row['email'] ?? '',
            'phone' =>  $row['phone'] ?? '',
            'dob' =>    $dob ?? '2002-02-20',
            'parent_name' =>  $row['parent_name'] ?? '',
            'aadhar_no' =>  $row['aadhar_no'] ?? '',

        ]);


     
    }
}
