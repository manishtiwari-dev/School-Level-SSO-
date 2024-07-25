<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MediaManagerController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\AddressController;
use App\Http\Controllers\Frontend\ContactUsController;
use App\Http\Controllers\Frontend\AboutUsController;
use App\Http\Controllers\Frontend\RegisterController;
use App\Http\Controllers\Frontend\RazorpayController;



// for clear-cache
Route::get('/cc', function() {
    
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    Artisan::call('optimize:clear');

    flash(localize('Cach-Cleared'))->success();
    return back();
})->name('clear-cache');


Route::get('/register-institute', [RegisterController::class, 'index'])->name('register.institute');
Route::get('/register-offline', [RegisterController::class, 'offline_register'])->name('register.offline_register');

Route::post('/print-request', [RegisterController::class, 'handlePrintRequest'])->name('register.handlePrintRequest');

Route::post('/register-store', [RegisterController::class, 'store'])->name('register.instituteStore');
Route::get('/register-student', [RegisterController::class, 'individual_register'])->name('register.individual_register');
Route::post('/register-student-store', [RegisterController::class, 'individual_store'])->name('register.individual_store');
Route::post('/become-coordinator-store', [RegisterController::class, 'coordinator_store'])->name('register.coordinator_store');
Route::get('/become-coordinator', [RegisterController::class, 'coordinator'])->name('register.coordinator');


Route::get('payment/{SSOInstitute}', [RazorpayController::class, 'index'])->name('payment');
Route::post('/payment-store', [RazorpayController::class, 'store'])->name('payment.store');
Route::get('/payment-success', [RazorpayController::class, 'payment_success'])->name('payment.success');


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/blogs/{slug}', [HomeController::class, 'showBlog'])->name('home.blogs.show');
Route::get('/syllabus/{slug}', [HomeController::class, 'showSyllabus'])->name('home.syllabus.show');
Route::get('/gallery', [HomeController::class, 'gallery'])->name('home.gallery');
Route::get('/scholarship', [HomeController::class, 'scholarship'])->name('home.scholarship');
Route::get('/syllabus', [HomeController::class, 'syllabus'])->name('home.syllabus');


Route::get('/reference-book', [HomeController::class, 'referenceBook'])->name('home.refer-book');
Route::get('/subject', [HomeController::class, 'subject'])->name('home.subject');
Route::get('/model-paper', [HomeController::class, 'modelPaper'])->name('home.model-paper');




Route::get('/events', [HomeController::class, 'allEvents'])->name('home.events');
Route::get('/events/{slug}', [HomeController::class, 'showEvents'])->name('home.events.show');


//exam
Route::get('/about-exam', [HomeController::class, 'aboutExam'])->name('home.aboutExam');
Route::get('/exam-preprations', [HomeController::class, 'examPreprations'])->name('home.examPreprations');
Route::get('/exam-dates', [HomeController::class, 'examDates'])->name('home.examDates');


Route::get('/winner', [HomeController::class, 'winner'])->name('home.winner');
Route::get('/winner/{slug}', [HomeController::class, 'showWinner'])->name('home.winner.show');
Route::get('/downloadBrochure', [HomeController::class, 'downloadBrochure'])->name('home.downloadBrochure');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


# media files routes
Route::group(['prefix' => '', 'middleware' => ['auth']], function () {
    Route::get('/media-manager/get-files', [MediaManagerController::class, 'index'])->name('uppy.index');
    Route::get('/media-manager/get-selected-files', [MediaManagerController::class, 'selectedFiles'])->name('uppy.selectedFiles');
    Route::post('/media-manager/add-files', [MediaManagerController::class, 'store'])->name('uppy.store');
    Route::get('/media-manager/delete-files/{id}', [MediaManagerController::class, 'delete'])->name('uppy.delete');
});


# addresses
Route::post('/get-states', [AddressController::class, 'getStates'])->name('address.getStates');
Route::post('/get-cities', [AddressController::class, 'getCities'])->name('address.getCities');



// # page
 Route::get('/contact-us', [HomeController::class, 'contactUs'])->name('home.contactUs');


 # about
Route::get('/page/{slug}', [AboutUsController::class, 'index'])->name('home.pages.show');
Route::post('/contact-us-store', [ContactUsController::class, 'store'])->name('contactUs.store');


require __DIR__.'/admin.php';
require __DIR__.'/auth.php';
