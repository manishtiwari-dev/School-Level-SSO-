<?php

namespace Modules\SSO\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\SSO\Models\SSOClasse;

class SSOModelPaper extends Model
{
    use HasFactory;
    
    protected $table = 'sso_model_paper';

    public function classes(){

        return $this->belongsTo(SSOClasse::class, 'class_id', 'id');
    }
 

}