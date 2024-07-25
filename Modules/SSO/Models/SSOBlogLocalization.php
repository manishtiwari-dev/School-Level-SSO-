<?php

namespace Modules\SSO\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SSOBlogLocalization extends Model
{
    use HasFactory; 
    protected $table = 'sso_blog_localizations';

    protected $fillable = [
        'name',
        'blog_id',
        'lang_key',
    ];
}
