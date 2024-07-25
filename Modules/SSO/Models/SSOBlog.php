<?php

namespace Modules\SSO\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App;

class SSOBlog extends Model
{
    use HasFactory;

    protected $with = ['blog_localizations'];
    protected $table = 'sso_blogs';

    public function scopeIsActive($query)
    {
        return $query->where('is_active', 1);
    } 
 
    public function collectLocalization($entity = '', $lang_key = '')
    {
        $lang_key = $lang_key ==  '' ? App::getLocale() : $lang_key;
        $blog_localizations = $this->blog_localizations->where('lang_key', $lang_key)->first();
        return $blog_localizations != null && $blog_localizations->$entity ? $blog_localizations->$entity : $this->$entity;
    }

   

    public function blog_localizations()
    {
        return $this->hasMany(SSOBlogLocalization::class,'blog_id','id');
    } 


}
