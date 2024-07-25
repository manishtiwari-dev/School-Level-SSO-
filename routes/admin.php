<?php


use App\Http\Controllers\Backend\Appearance\BannerSectionOneController;
use App\Http\Controllers\Backend\Appearance\BannerSectionTwoController;
use App\Http\Controllers\Backend\Appearance\BestDealProductsController;
use App\Http\Controllers\Backend\Appearance\BestSellingProductsController;
use App\Http\Controllers\Backend\Appearance\CertificationController;
use App\Http\Controllers\Backend\Appearance\ContentController;
use App\Http\Controllers\Backend\Appearance\DistributerController;
use App\Http\Controllers\Backend\Appearance\FeaturedProductsController;
use App\Http\Controllers\Backend\Appearance\FooterController;
use App\Http\Controllers\Backend\Appearance\HeaderController;
use App\Http\Controllers\Backend\Appearance\HeroController;
use App\Http\Controllers\Backend\Appearance\TopCategoriesController;
use App\Http\Controllers\Backend\Appearance\TopTrendingProductsController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\SettingsController;
use App\Http\Controllers\Backend\StaffsController;
use App\Http\Controllers\Backend\Contacts\ContactUsMessagesController;
use App\Http\Controllers\Backend\MediaManager\MediaManagerController;
use App\Http\Controllers\Backend\Newsletters\NewslettersController;
use App\Http\Controllers\Backend\OrderSettingsController;
use App\Http\Controllers\Backend\Roles\RolesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Recruitment\RecruitmentController;
use App\Http\Controllers\Backend\BlogSystem\BlogsController;
use App\Http\Controllers\Backend\SSOEventController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

# variation to create product --> also used in vendor panel





Route::group(
    ['prefix' => 'admin', 'middleware' => ['auth', 'admin']],
    function () {
        # dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
        Route::get('/profile', [DashboardController::class, 'profile'])->name('admin.profile');
        Route::post('/profile', [DashboardController::class, 'updateProfile'])->name('admin.profile.update');


        #sms settings
        Route::get('/settings/sms', [SettingsController::class, 'smsSettings'])->name('admin.settings.smsSettings');

        # settings
        Route::post('/settings/env-key-update', [SettingsController::class, 'envKeyUpdate'])->name('admin.envKey.update');
        Route::get('/settings/general-settings', [SettingsController::class, 'index'])->name('admin.generalSettings');
        Route::get('/settings/smtp-settings', [SettingsController::class, 'smtpSettings'])->name('admin.smtpSettings.index');
        Route::post('/settings/test/smtp', [SettingsController::class, 'testEmail'])->name('admin.test.smtp');
        Route::post('/settings/update', [SettingsController::class, 'update'])->name('admin.settings.update');

        #payment methods
        Route::get('/settings/payment-methods', [SettingsController::class, 'paymentMethods'])->name('admin.settings.paymentMethods');
        Route::post('/settings/update-payment-methods', [SettingsController::class, 'updatePaymentMethods'])->name('admin.settings.updatePaymentMethods');

        #enquiry settings
        Route::get('/settings/enquiry-settings', [OrderSettingsController::class, 'index'])->name('admin.orderSettings');

        # social login

        Route::post('/settings/activation', [SettingsController::class, 'updateActivation'])->name('admin.settings.activation');


        # products
       

        # pages
       

        # customers
        Route::group(['prefix' => 'customers'], function () {
            Route::get('/', [CustomersController::class, 'index'])->name('admin.customers.index');
            Route::post('/update-banned-customer', [CustomersController::class, 'updateBanStatus'])->name('admin.customers.updateBanStatus');
        });

      
        # media manager
        Route::get('/media-manager', [MediaManagerController::class, 'index'])->name('admin.mediaManager.index');

        # bulk-emails
        Route::controller(NewslettersController::class)->group(function () {
            Route::get('/bulk-emails', 'index')->name('admin.newsletters.index');
            Route::post('/bulk-emails/send', 'sendNewsletter')->name('admin.newsletters.send');
        });




        # roles & permissions
        Route::group(['prefix' => 'roles'], function () {
            Route::get('/', [RolesController::class, 'index'])->name('admin.roles.index');
            Route::get('/add-role', [RolesController::class, 'create'])->name('admin.roles.create');
            Route::post('/add-role', [RolesController::class, 'store'])->name('admin.roles.store');
            Route::get('/update-role/{id}', [RolesController::class, 'edit'])->name('admin.roles.edit');
            Route::post('/update-role', [RolesController::class, 'update'])->name('admin.roles.update');
            Route::get('/delete-role/{id}', [RolesController::class, 'delete'])->name('admin.roles.delete');
        });



        # contact us message
        Route::group(['prefix' => 'contacts'], function () {
            Route::get('/', [ContactUsMessagesController::class, 'index'])->name('admin.queries.index');
            Route::get('/mark-as-read/{id}', [ContactUsMessagesController::class, 'read'])->name('admin.queries.markRead');
        });

     

        # appearance
        // Route::group(['prefix' => 'appearance'], function () {

        //     # homepage - hero
        //     Route::get('/homepage/slider', [HeroController::class, 'hero'])->name('admin.appearance.homepage.hero');
        //     Route::post('/homepage/slider', [HeroController::class, 'storeHero'])->name('admin.appearance.homepage.storeHero');
        //     Route::get('/homepage/slider/edit/{id}', [HeroController::class, 'edit'])->name('admin.appearance.homepage.editHero');
        //     Route::post('/homepage/slider/update', [HeroController::class, 'update'])->name('admin.appearance.homepage.updateHero');
        //     Route::get('/homepage/slider/delete/{id}', [HeroController::class, 'delete'])->name('admin.appearance.homepage.deleteHero');

        //     # homepage - certification
        //     Route::get('/homepage/certification', [CertificationController::class, 'certificates'])->name('admin.appearance.homepage.certificate');
        //     Route::post('/homepage/certification', [CertificationController::class, 'storeCertificate'])->name('admin.appearance.homepage.storeCertificate');
        //     Route::get('/homepage/certification/edit/{id}', [CertificationController::class, 'edit'])->name('admin.appearance.homepage.editCertificate');
        //     Route::post('/homepage/certification/update', [CertificationController::class, 'update'])->name('admin.appearance.homepage.updateCertificate');
        //     Route::get('/homepage/certification/delete/{id}', [CertificationController::class, 'delete'])->name('admin.appearance.homepage.deleteCertificate');

        //     # homepage - certification
        //     Route::get('/homepage/content', [ContentController::class, 'contents'])->name('admin.appearance.homepage.content');
        //     Route::post('/homepage/content', [ContentController::class, 'storeContent'])->name('admin.appearance.homepage.storeContent');
        //     Route::get('/homepage/content/edit/{id}', [ContentController::class, 'edit'])->name('admin.appearance.homepage.editContent');
        //     Route::post('/homepage/content/update', [ContentController::class, 'update'])->name('admin.appearance.homepage.updateContent');
        //     Route::get('/homepage/content/delete/{id}', [ContentController::class, 'delete'])->name('admin.appearance.homepage.deleteContent');


        //     # homepage - top category
        //     Route::get('/homepage/top-category', [TopCategoriesController::class, 'index'])->name('admin.appearance.homepage.topCategories');

        //     # homepage - featured products
        //     Route::get('/homepage/featured-products', [FeaturedProductsController::class, 'index'])->name('admin.appearance.homepage.featuredProducts');

        //     # homepage - top trending products
        //     Route::get('/homepage/trending-products', [TopTrendingProductsController::class, 'index'])->name('admin.appearance.homepage.topTrendingProducts');
        //     Route::post('/homepage/get-products-for-trending', [TopTrendingProductsController::class, 'getProducts'])->name('admin.appearance.homepage.getProducts');

        //     # homepage - banner section one
        //     Route::get('/homepage/banner-section-one', [BannerSectionOneController::class, 'index'])->name('admin.appearance.homepage.bannerOne');
        //     Route::post('/homepage/banner-section-one', [BannerSectionOneController::class, 'storeBannerOne'])->name('admin.appearance.homepage.storeBannerOne');
        //     Route::get('/homepage/banner-section-one/edit/{id}', [BannerSectionOneController::class, 'edit'])->name('admin.appearance.homepage.editBannerOne');
        //     Route::post('/homepage/banner-section-one/update', [BannerSectionOneController::class, 'update'])->name('admin.appearance.homepage.updateBannerOne');
        //     Route::get('/homepage/banner-section-one/delete/{id}', [BannerSectionOneController::class, 'delete'])->name('admin.appearance.homepage.deleteBannerOne');

        //     # homepage - best deals products
        //     Route::get('/homepage/best-deal-products', [BestDealProductsController::class, 'index'])->name('admin.appearance.homepage.bestDeals');

        //     # homepage - banner section two
        //     Route::get('/homepage/banner-section-two', [BannerSectionTwoController::class, 'index'])->name('admin.appearance.homepage.bannerTwo');


        //     # homepage - best selling products
        //     Route::get('/homepage/best-selling-products', [BestSellingProductsController::class, 'index'])->name('admin.appearance.homepage.bestSelling');


        //      # homepage - Authorized Distributors

        //      Route::get('/homepage/authorized-distributors', [DistributerController::class, 'index'])->name('admin.appearance.homepage.distributers');

        //     # products - listing
         
          

        //     # header
        //     Route::get('/header', [HeaderController::class, 'index'])->name('admin.appearance.header');

        //     # footer
        //     Route::get('/footer', [FooterController::class, 'index'])->name('admin.appearance.footer');
        // });

        # staffs
        Route::group(['prefix' => 'staffs'], function () {
            Route::get('/', [StaffsController::class, 'index'])->name('admin.staffs.index');
            Route::get('/add-staff', [StaffsController::class, 'create'])->name('admin.staffs.create');
            Route::post('/add-staff', [StaffsController::class, 'store'])->name('admin.staffs.store');
            Route::get('/update-staff/{id}', [StaffsController::class, 'edit'])->name('admin.staffs.edit');
            Route::post('/update-staff', [StaffsController::class, 'update'])->name('admin.staffs.update');
            Route::get('/delete-staff/{id}', [StaffsController::class, 'delete'])->name('admin.staffs.delete');
        });


         # staffs
         Route::group(['prefix' => 'recruitment'], function () {
            Route::get('/', [RecruitmentController::class, 'index'])->name('admin.recruitment.index');
            Route::get('/mark-as-read/{id}', [RecruitmentController::class, 'read'])->name('admin.recruitment.markRead');
        });


        //    # blog system
        //    Route::group(['prefix' => 'blogs'], function () {
        //     # blogs
        //     Route::get('/', [BlogsController::class, 'index'])->name('admin.blogs.index');
        //     Route::get('/add-blog', [BlogsController::class, 'create'])->name('admin.blogs.create');
        //     Route::post('/add-blog', [BlogsController::class, 'store'])->name('admin.blogs.store');
        //     Route::get('/edit/{id}', [BlogsController::class, 'edit'])->name('admin.blogs.edit');
        //     Route::post('/update-blog', [BlogsController::class, 'update'])->name('admin.blogs.update');
        //     Route::post('/update-popular', [BlogsController::class, 'updatePopular'])->name('admin.blogs.updatePopular');
        //     Route::post('/update-status', [BlogsController::class, 'updateStatus'])->name('admin.blogs.updateStatus');
        //     Route::get('/delete/{id}', [BlogsController::class, 'delete'])->name('admin.blogs.delete');

          
        // });


            //  # blog system
            //  Route::group(['prefix' => 'events'], function () {
            //     # blogs
            //     Route::get('/', [SSOEventController::class, 'index'])->name('admin.events.index');
            //     Route::get('/add-event', [SSOEventController::class, 'create'])->name('admin.events.create');
            //     Route::post('/add-event', [SSOEventController::class, 'store'])->name('admin.events.store');
            //     Route::get('/edit/{id}', [SSOEventController::class, 'edit'])->name('admin.events.edit');
            //     Route::post('/update-events', [SSOEventController::class, 'update'])->name('admin.events.update');
            //     Route::post('/update-popular', [SSOEventController::class, 'updatePopular'])->name('admin.events.updatePopular');
            //     Route::post('/update-status', [SSOEventController::class, 'updateStatus'])->name('admin.events.updateStatus');
            //     Route::get('/delete/{id}', [SSOEventController::class, 'delete'])->name('admin.events.delete');
    
              
            // });


    }
);
