<?php

namespace Modules\SSO\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class SSOPayment extends Model
{
    use HasFactory;
    
    protected $table = 'sso_payments';

    protected $primaryKey = 'id';
    protected $guarded = [
        'id',
        
    ];

}

