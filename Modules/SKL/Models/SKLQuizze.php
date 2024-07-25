<?php

namespace Modules\SKL\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SKLQuizze extends Model
{
    use HasFactory;
    
    protected $table = 'skl_quiz';

    public function level(){

        return $this->belongsTo(SKLLevel::class, 'level_id', 'id');
 
    }
}