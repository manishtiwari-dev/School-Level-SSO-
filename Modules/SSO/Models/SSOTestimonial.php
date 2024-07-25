<?php

namespace Modules\SSO\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\SSO\Models\SSOClasse;
use Modules\SSO\Models\SSOSection;

class SSOTestimonial extends Model
{
    use HasFactory;
    
    protected $table = 'sso_testimonial';

    protected $primaryKey = 'id';
    protected $guarded = [
        'id',
        
    ];

  
 

}

