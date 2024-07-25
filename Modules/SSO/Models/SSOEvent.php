<?php

namespace Modules\SSO\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App;

class SSOEvent extends Model
{
    use HasFactory;

    protected $with = ['event_localizations'];
    protected $table = 'sso_events';

    public function scopeIsActive($query)
    {
        return $query->where('is_active', 1);
    } 
 
    public function collectLocalization($entity = '', $lang_key = '')
    {
        $lang_key = $lang_key ==  '' ? App::getLocale() : $lang_key;
        $event_localizations = $this->event_localizations->where('lang_key', $lang_key)->first();
        return $event_localizations != null && $event_localizations->$entity ? $event_localizations->$entity : $this->$entity;
    }

    public function event_localizations()
    {
        return $this->hasMany(SSOEventLocalization::class,'event_id','id');
    } 



}
