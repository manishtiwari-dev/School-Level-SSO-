<?php
use Illuminate\Support\Facades\Route;
use Modules\SKL\Http\Controllers\QuizController;    
use Modules\SKL\Http\Controllers\LevelController;    
use Modules\SKL\Http\Controllers\QuestionController;   
use Modules\SKL\Http\Controllers\QuizParticipantController;   



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your aaplication. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
 
 
Route::group(['prefix' => 'admin/', 'as'=>'admin.', 'middleware' => ['auth', 'verified']], function() {
    
    Route::group(['prefix' => 'quiz'], function () {
        Route::get('/', [QuizController::class, 'index'])->name('quize.index');
        Route::get('/add', [QuizController::class, 'create'])->name('quize.create');
        Route::post('/add-quiz', [QuizController::class, 'store'])->name('quize.store');
        Route::post('/update-quiz', [QuizController::class, 'update'])->name('quize.update');
        Route::get('/quiz-edit/{id}', [QuizController::class, 'edit'])->name('quize.edit');
        Route::get('/quiz-delete/{id}', [QuizController::class, 'delete'])->name('quize.delete');
    });

     //Route Question   
    Route::group(['prefix' => 'questions'], function () {
        Route::get('/', [QuestionController::class, 'index'])->name('questions.index');
        Route::get('/add', [QuestionController::class, 'create'])->name('questions.create');
        Route::post('/filter', [QuestionController::class, 'quizFilter'])->name('questions.quizFilter');
        Route::post('/add-questions', [QuestionController::class, 'store'])->name('questions.store');
        Route::post('/update-questions', [QuestionController::class, 'update'])->name('questions.update');
        Route::get('/questions-edit/{id}', [QuestionController::class, 'edit'])->name('questions.edit');
        Route::get('/questions-delete/{id}', [QuestionController::class, 'delete'])->name('questions.delete');
    });

    //level Route 
    Route::group(['prefix' => 'levels'], function () {
        Route::get('/', [LevelController::class, 'index'])->name('levels.index');
        Route::get('/add', [LevelController::class, 'create'])->name('levels.create');
        Route::post('/add-levels', [LevelController::class, 'store'])->name('levels.store');
        Route::post('/update-levels', [LevelController::class, 'update'])->name('level.update');
        Route::get('/levels-edit/{id}', [LevelController::class, 'edit'])->name('level.edit');
        Route::get('/levels-delete/{id}', [LevelController::class, 'delete'])->name('level.delete');
    });
     

    Route::group(['prefix' => 'participant'], function () {
        Route::get('/', [QuizParticipantController::class, 'index'])->name('participant.index');
        Route::get('/add', [QuizParticipantController::class, 'create'])->name('participant.create');
        Route::post('/add-participant', [QuizParticipantController::class, 'store'])->name('participant.store');
        Route::post('/update-participant', [QuizParticipantController::class, 'update'])->name('participant.update');
        Route::get('/participant-edit/{id}', [QuizParticipantController::class, 'edit'])->name('participant.edit');
        Route::get('/participant-delete/{id}', [QuizParticipantController::class, 'delete'])->name('participant.delete');
    });
    
});

 