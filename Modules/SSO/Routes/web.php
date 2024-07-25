<?php

use Illuminate\Support\Facades\Route;
use Modules\SSO\Http\Controllers\InstituteController;
use Modules\SSO\Http\Controllers\StudentController;
use Modules\SSO\Http\Controllers\ClassController;
use Modules\SSO\Http\Controllers\SyllabusController;
use Modules\SSO\Http\Controllers\SectionController;
use Modules\SSO\Http\Controllers\ModelPaperController;
use Modules\SSO\Http\Controllers\ExamController;
use Modules\SSO\Http\Controllers\BookController;
use Modules\SSO\Http\Controllers\CoordinatorController;
use Modules\SSO\Http\Controllers\ContactController;
use Modules\SSO\Http\Controllers\TestimonialController;
use Modules\SSO\Http\Controllers\ScholarshipController;
use Modules\SSO\Http\Controllers\GalleryController;
use Modules\SSO\Http\Controllers\HomePageController;
use Modules\SSO\Http\Controllers\WebsettingController;
use Modules\SSO\Http\Controllers\PagesController;
use Modules\SSO\Http\Controllers\WinnerController;
use Modules\SSO\Http\Controllers\PaymentController;
use Modules\SSO\Http\Controllers\BlogsController;
use Modules\SSO\Http\Controllers\SSOEventController;




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


Route::group(['prefix' => 'admin/', 'as' => 'admin.', 'middleware' => ['auth', 'admin']], function () {


        # pages
        Route::group(['prefix' => 'pages'], function () {
            Route::get('/', [PagesController::class, 'index'])->name('pages.index');
            Route::get('/add-page', [PagesController::class, 'create'])->name('pages.create');
            Route::post('/add-page', [PagesController::class, 'store'])->name('pages.store');
            Route::get('/edit/{id}', [PagesController::class, 'edit'])->name('pages.edit');
            Route::post('/update-page', [PagesController::class, 'update'])->name('pages.update');
            Route::get('/delete/{id}', [PagesController::class, 'delete'])->name('pages.delete');
        });

    # appearance
    Route::group(['prefix' => 'appearance'], function () {

        # homepage - hero
        Route::get('/homepage/slider', [HomePageController::class, 'hero'])->name('appearance.homepage.hero');
        Route::post('/homepage/slider', [HomePageController::class, 'storeHero'])->name('appearance.homepage.storeHero');
        Route::get('/homepage/slider/edit/{id}', [HomePageController::class, 'edit'])->name('appearance.homepage.editHero');
        Route::post('/homepage/slider/update', [HomePageController::class, 'update'])->name('appearance.homepage.updateHero');
        Route::get('/homepage/slider/delete/{id}', [HomePageController::class, 'delete'])->name('appearance.homepage.deleteHero');
    });

    Route::group(['prefix' => 'websettings'], function () {
        Route::get('/', [WebsettingController::class, 'index'])->name('websettings.index');
        Route::post('/update', [WebsettingController::class, 'update'])->name('websettings.update');
    });

    //college section
    Route::group(['prefix' => 'institute'], function () {
        Route::get('/', [InstituteController::class, 'index'])->name('institute.index');
        Route::get('/add', [InstituteController::class, 'create'])->name('institute.create');
        Route::post('/institute-store', [InstituteController::class, 'store'])->name('institute.store');
        Route::get('/edit/{id}', [InstituteController::class, 'edit'])->name('institute.edit');
        Route::post('/update-institute', [InstituteController::class, 'update'])->name('institute.update');
        Route::get('/institute-delete/{id}', [InstituteController::class, 'delete'])->name('institute.delete');
        Route::get('/student-details/{id}', [InstituteController::class, 'view'])->name('institute.view');
        Route::post('/update-status', [InstituteController::class, 'updateStatus'])->name('institute.updateStatus');
    });
    //student section
    Route::group(['prefix' => 'student'], function () {
        Route::get('/', [StudentController::class, 'index'])->name('student.index');
        Route::get('/add', [StudentController::class, 'create'])->name('student.create');
        Route::get('/import', [StudentController::class, 'import_create'])->name('student.import');
        Route::post('/import-store', [StudentController::class, 'studentImportStore'])->name('student.importStore');
        Route::get('/export', [StudentController::class, 'exportData'])->name('student.exportData');
        Route::get('download-sample-file', [StudentController::class, 'donwloadFile'])->name('simple-download-file');

        Route::post('/student-store', [StudentController::class, 'store'])->name('student.store');
        Route::get('/edit/{id}', [StudentController::class, 'edit'])->name('students.edit');
        Route::post('/update-student', [StudentController::class, 'update'])->name('student.update');
        Route::get('/student-delete/{id}', [StudentController::class, 'delete'])->name('students.delete');
        Route::post('/update-status', [StudentController::class, 'updateStatus'])->name('students.updateStatus');
    });
    //class section
    Route::group(['prefix' => 'class'], function () {
        Route::get('/', [ClassController::class, 'index'])->name('class.index');
        Route::get('/add', [ClassController::class, 'create'])->name('class.create');
        Route::post('/class-store', [ClassController::class, 'store'])->name('class.store');
        Route::get('/edit/{id}', [ClassController::class, 'edit'])->name('class.edit');
        Route::post('/update-class', [ClassController::class, 'update'])->name('class.update');
        Route::get('/class-delete/{id}', [ClassController::class, 'delete'])->name('class.delete');
        Route::post('/update-status', [ClassController::class, 'updateStatus'])->name('class.updateStatus');
    });

    //subject syllabus
    Route::group(['prefix' => 'book'], function () {
        Route::get('/', [BookController::class, 'index'])->name('book.index');
        Route::get('/add', [BookController::class, 'create'])->name('book.create');
        Route::post('/book-store', [BookController::class, 'store'])->name('book.store');
        Route::get('/edit/{id}', [BookController::class, 'edit'])->name('book.edit');
        Route::post('/update-book', [BookController::class, 'update'])->name('book.update');
        Route::get('/book-delete/{id}', [BookController::class, 'delete'])->name('book.delete');
        Route::post('/update-status', [BookController::class, 'updateStatus'])->name('book.updateStatus');
    });



    //subject syllabus
    Route::group(['prefix' => 'syllabus'], function () {
        Route::get('/', [SyllabusController::class, 'index'])->name('syllabus.index');
        Route::get('/add', [SyllabusController::class, 'create'])->name('syllabus.create');
        Route::post('/syllabus-store', [SyllabusController::class, 'store'])->name('syllabus.store');
        Route::get('/edit/{id}', [SyllabusController::class, 'edit'])->name('syllabus.edit');
        Route::post('/update-syllabus', [SyllabusController::class, 'update'])->name('syllabus.update');
        Route::get('/syllabus-delete/{id}', [SyllabusController::class, 'delete'])->name('syllabus.delete');
        Route::post('/update-status', [SyllabusController::class, 'updateStatus'])->name('syllabus.updateStatus');
    });


      //subject winners
      Route::group(['prefix' => 'winners'], function () {
        Route::get('/', [WinnerController::class, 'index'])->name('winners.index');
        Route::get('/add', [WinnerController::class, 'create'])->name('winners.create');
        Route::post('/winners-store', [WinnerController::class, 'store'])->name('winners.store');
        Route::get('/edit/{id}', [WinnerController::class, 'edit'])->name('winners.edit');
        Route::post('/update-winners', [WinnerController::class, 'update'])->name('winners.update');
        Route::get('/winners-delete/{id}', [WinnerController::class, 'delete'])->name('winners.delete');
        Route::post('/update-status', [WinnerController::class, 'updateStatus'])->name('winners.updateStatus');
    });

    //subject section
    Route::group(['prefix' => 'model-paper'], function () {
        Route::get('/', [ModelPaperController::class, 'index'])->name('model-paper.index');
        Route::get('/add', [ModelPaperController::class, 'create'])->name('model-paper.create');
        Route::post('/model-paper-store', [ModelPaperController::class, 'store'])->name('model-paper.store');
        Route::get('/edit/{id}', [ModelPaperController::class, 'edit'])->name('model-paper.edit');
        Route::post('/model-paper-update', [ModelPaperController::class, 'update'])->name('model-paper.update');
        Route::get('/model-paper-delete/{id}', [ModelPaperController::class, 'delete'])->name('model-paper.delete');
        Route::post('/update-status', [ModelPaperController::class, 'updateStatus'])->name('model-paper.updateStatus');
    });


    //subject competition
    Route::group(['prefix' => 'competition'], function () {
        Route::get('/', [ExamController::class, 'index'])->name('competition.index');
        Route::get('/add', [ExamController::class, 'create'])->name('competition.create');
        Route::post('/store', [ExamController::class, 'store'])->name('competition.store');
        Route::get('/edit/{id}', [ExamController::class, 'edit'])->name('competition.edit');
        Route::post('/competition-update', [ExamController::class, 'update'])->name('competition.update');
        Route::get('/delete/{id}', [ExamController::class, 'delete'])->name('competition.delete');
        Route::post('/update-status', [ExamController::class, 'updateStatus'])->name('competition.updateStatus');
    });

    //subject coordinator
    Route::group(['prefix' => 'coordinator'], function () {
        Route::get('/', [CoordinatorController::class, 'index'])->name('coordinator.index');
    });


       //payment
       Route::group(['prefix' => 'transaction'], function () {
        Route::get('/', [PaymentController::class, 'index'])->name('transaction.index');
    });


    //subject contact
    Route::group(['prefix' => 'contact'], function () {
        Route::get('/', [ContactController::class, 'index'])->name('contact.index');
    });

    //subject testimonial
    Route::group(['prefix' => 'testimonial'], function () {
        Route::get('/', [TestimonialController::class, 'index'])->name('testimonial.index');
        Route::get('/add', [TestimonialController::class, 'create'])->name('testimonial.create');
        Route::post('/testimonial-store', [TestimonialController::class, 'store'])->name('testimonial.store');
        Route::get('/edit/{id}', [TestimonialController::class, 'edit'])->name('testimonial.edit');
        Route::post('/testimonial-update', [TestimonialController::class, 'update'])->name('testimonial.update');
        Route::get('/testimonial-delete/{id}', [TestimonialController::class, 'delete'])->name('testimonial.delete');
    });


    //subject scholarship
    Route::group(['prefix' => 'scholarship'], function () {
        Route::get('/', [ScholarshipController::class, 'index'])->name('scholarship.index');
        Route::get('/add', [ScholarshipController::class, 'create'])->name('scholarship.create');
        Route::post('/scholarship-store', [ScholarshipController::class, 'store'])->name('scholarship.store');
        Route::get('/edit/{id}', [ScholarshipController::class, 'edit'])->name('scholarship.edit');
        Route::post('/scholarship-update', [ScholarshipController::class, 'update'])->name('scholarship.update');
        Route::get('/scholarship-delete/{id}', [ScholarshipController::class, 'delete'])->name('scholarship.delete');
        Route::post('/update-status', [ScholarshipController::class, 'updateStatus'])->name('scholarship.updateStatus');
    });


    //subject scholarship
    Route::group(['prefix' => 'gallery'], function () {
        Route::get('/', [GalleryController::class, 'index'])->name('gallery.index');
        Route::get('/add', [GalleryController::class, 'create'])->name('gallery.create');
        Route::post('/gallery-store', [GalleryController::class, 'store'])->name('gallery.store');
        Route::get('/edit/{id}', [GalleryController::class, 'edit'])->name('gallery.edit');
        Route::post('/gallery-update', [GalleryController::class, 'update'])->name('gallery.update');
        Route::get('/gallery-delete/{id}', [GalleryController::class, 'delete'])->name('gallery.delete');
        Route::post('/update-status', [GalleryController::class, 'updateStatus'])->name('gallery.updateStatus');
    });

        # blog system
        Route::group(['prefix' => 'blogs'], function () {
            # blogs
            Route::get('/', [BlogsController::class, 'index'])->name('blogs.index');
            Route::get('/add-blog', [BlogsController::class, 'create'])->name('blogs.create');
            Route::post('/add-blog', [BlogsController::class, 'store'])->name('blogs.store');
            Route::get('/edit/{id}', [BlogsController::class, 'edit'])->name('blogs.edit');
            Route::post('/update-blog', [BlogsController::class, 'update'])->name('blogs.update');
            Route::post('/update-popular', [BlogsController::class, 'updatePopular'])->name('blogs.updatePopular');
            Route::post('/update-status', [BlogsController::class, 'updateStatus'])->name('blogs.updateStatus');
            Route::get('/delete/{id}', [BlogsController::class, 'delete'])->name('blogs.delete');
        });


            # blog system
            Route::group(['prefix' => 'events'], function () {
                # blogs
                Route::get('/', [SSOEventController::class, 'index'])->name('events.index');
                Route::get('/add-event', [SSOEventController::class, 'create'])->name('events.create');
                Route::post('/add-event', [SSOEventController::class, 'store'])->name('events.store');
                Route::get('/edit/{id}', [SSOEventController::class, 'edit'])->name('events.edit');
                Route::post('/update-events', [SSOEventController::class, 'update'])->name('events.update');
                Route::post('/update-popular', [SSOEventController::class, 'updatePopular'])->name('events.updatePopular');
                Route::post('/update-status', [SSOEventController::class, 'updateStatus'])->name('events.updateStatus');
                Route::get('/delete/{id}', [SSOEventController::class, 'delete'])->name('events.delete');
    
            });

});
