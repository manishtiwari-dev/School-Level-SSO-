<?php

namespace Modules\SSO\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App;
use Modules\SSO\Models\SSOPageLocalization;

class SSOPage extends Model
{
    use HasFactory;

    protected $with = ['sso_page_localizations'];
    protected $table = 'sso_pages';

     
    public function collectLocalization($entity = '', $lang_key = '')
    {
        $lang_key = $lang_key ==  '' ? App::getLocale() : $lang_key;
        $sso_page_localizations = $this->sso_page_localizations->where('lang_key', $lang_key)->first();
        return $sso_page_localizations != null && $sso_page_localizations->$entity ? $sso_page_localizations->$entity : $this->$entity;
    }

    public function sso_page_localizations()
    {
        return $this->hasMany(SSOPageLocalization::class,'page_id','id');
    } 
}
