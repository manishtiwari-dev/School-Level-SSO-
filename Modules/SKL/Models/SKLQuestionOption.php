<?php

namespace Modules\SKL\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SKLQuestionOption extends Model
{
    use HasFactory;

    protected $table = 'skl_quiz_question_answer';

    protected $fillable = ['question_id', 'option_text', 'is_correct'];

    
}