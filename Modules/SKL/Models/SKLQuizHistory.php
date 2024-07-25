<?php

namespace Modules\SKL\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SKLQuizHistory extends Model
{
    use HasFactory;
    
    protected $table = 'skl_quiz_history';
    protected $guarded = [
        'id',
    ];

    public function questions(){

        return $this->belongsTo(SKLQuizQuestion::class, 'id', 'question_id');
 
    }

    public function answer(){

        return $this->belongsTo(SKLQuestionOption::class, 'id', 'answer_id');
 
    }


}