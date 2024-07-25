<?php

namespace Modules\SKL\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SKLQuizQuestion extends Model
{
    use HasFactory;

    protected $table = 'skl_quiz_questions';

    public function quizzes(){

        return $this->belongsTo(SKLQuizze::class, 'quiz_id', 'id');

    }
}
