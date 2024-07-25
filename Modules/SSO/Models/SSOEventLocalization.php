<?php

namespace Modules\SSO\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SSOEventLocalization extends Model
{
    use HasFactory; 
    protected $table = 'sso_event_localizations';

    protected $fillable = [
        'name',
        'event_id',
        'lang_key',
    ];
}
