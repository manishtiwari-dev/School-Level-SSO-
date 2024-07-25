<?php

namespace Modules\SSO\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SSOPageLocalization extends Model
{
    use HasFactory;
        
    protected $table = 'sso_page_localizations';

    protected $fillable = [
        'name',
        'page_id',
        'lang_key',
    ];
}
