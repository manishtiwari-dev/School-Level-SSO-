<?php

namespace Modules\SSO\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class SSOWinner extends Model
{
    use HasFactory;
    
    protected $table = 'sso_winnners';

    protected $primaryKey = 'id';
    protected $guarded = [
        'id',
        
    ];

}

