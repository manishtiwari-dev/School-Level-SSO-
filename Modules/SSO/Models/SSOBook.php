<?php

namespace Modules\SSO\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\SSO\Models\SSOClasse;

class SSOBook extends Model
{
    use HasFactory;
    
    protected $table = 'sso_books';
    protected $primaryKey = 'id';
    protected $guarded = [
        'id',
        
    ];
   
    public function classes(){

        return $this->belongsTo(SSOClasse::class, 'class_id', 'id');
    }
}