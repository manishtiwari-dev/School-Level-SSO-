<?php

namespace Modules\SKL\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SKLParticipantQuiz extends Model
{
    use HasFactory;
    
    protected $table = 'skl_participant_quiz';
    protected $guarded = [
        'id',
    ];
    // public function level(){

    //     return $this->belongsTo(SKLLevel::class, 'level_id', 'id');
 
    // }
}