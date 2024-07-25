<?php

namespace Modules\SSO\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\SSO\Models\SSOStudent;

class SSOInstitute extends Model
{
    use HasFactory;
    
    protected $table = 'sso_institute';

    protected $primaryKey = 'id';
    protected $guarded = [
        'id',
        
    ];

    public function students(){

        return $this->hasMany(SSOStudent::class, 'institute_id', 'id');
    }
    
}