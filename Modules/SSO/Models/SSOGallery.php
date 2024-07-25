<?php

namespace Modules\SSO\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\SSO\Models\SSOSyllabus;

class SSOGallery extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'id';
    protected $guarded = [
        'id',
        
    ];
    
    protected $table = 'sso_gallery';

  

}