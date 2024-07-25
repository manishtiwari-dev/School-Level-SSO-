<?php

namespace Modules\SSO\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\SSO\Models\SSOInstitute;
use Modules\SSO\Models\SSOClasse;

class SSOStudent extends Model
{
    use HasFactory;
    protected $table = 'sso_students';

    protected $primaryKey = 'id';
    protected $guarded = [
        'id',
        
    ];

    public function institute(){

        return $this->belongsTo(SSOInstitute::class, 'institute_id', 'id');
    }

    public function classes(){

        return $this->belongsTo(SSOClasse::class, 'class_id', 'id');
    }

}