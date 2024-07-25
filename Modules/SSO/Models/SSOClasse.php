<?php

namespace Modules\SSO\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\SSO\Models\SSOSyllabus;

class SSOClasse extends Model
{
    use HasFactory;
    
    protected $table = 'sso_classes';

    //  public function subjects(){

    //     return $this->hasMany(SSOSyllabus::class, 'class_id', 'id');
    // }

}