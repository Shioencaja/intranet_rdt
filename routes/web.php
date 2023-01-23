<?php

use App\Http\Controllers\Admin\CourseAdminController;
use App\Http\Controllers\Admin\EventAdminController;
use App\Http\Controllers\Admin\HomeAdminController;

//admin
use App\Http\Controllers\Admin\LookAdminController;
use App\Http\Controllers\Admin\MarketingAdminController;
use App\Http\Controllers\Admin\TutorialAdminController;
use App\Http\Controllers\Admin\UserAdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\LookController;

//web
use App\Http\Controllers\MarketingController;
use App\Http\Controllers\TutorialController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', function () {
    // return Inertia::render('Welcome', [
    //     'canLogin' => Route::has('login'),
    //     'canRegister' => Route::has('register'),
    //     'laravelVersion' => Application::VERSION,
    //     'phpVersion' => PHP_VERSION,
    // ]);

    return redirect()->route('login');
});

Route::get('/register', function () {
    return Inertia::render('Auth/Register', [
        "business_type" => business_type(),
    ]);
})->name("register");

Route::middleware('auth')->group(function () {

    //users enabled
    Route::group(['middleware' => ['CheckEnabled', config('jetstream.auth_session'),
        'verified']], function () {

        Route::middleware([
            'auth:sanctum',
            config('jetstream.auth_session'),
            'verified',
        ])->group(function () {
            Route::get('/dashboard', function () {
                return Inertia::render('Dashboard');
            })->name('dashboard');
        });

        Route::group(['middleware' => ['IsAdmin']], function () {
            //-----------------------------------------------------admin-------------------
            Route::get('admin', [HomeAdminController::class, "index"])->name("admin");

            //events
            Route::get('admin/events', [EventAdminController::class, "index"])->name("admin.event");
            Route::get('admin/events/add', [EventAdminController::class, "create"])->name("admin.event_add");
            Route::post('admin/events', [EventAdminController::class, "store"])->name("admin.event_store");
            Route::get('admin/events/{event}', [EventAdminController::class, "edit"])->name("admin.event_edit");
            Route::post('admin/events/update/{event}', [EventAdminController::class, "update"])->name("admin.event_update");
            Route::delete('admin/events/destroy/{event}', [EventAdminController::class, "destroy"])->name("admin.event_destroy");

            //looks
            Route::get('admin/looks', [LookAdminController::class, "index"])->name("admin.look");
            Route::get('admin/looks/add', [LookAdminController::class, "create"])->name("admin.look_add");
            Route::post('admin/looks', [LookAdminController::class, "store"])->name("admin.look_store");
            Route::get('admin/looks/{look}', [LookAdminController::class, "edit"])->name("admin.look_edit");
            Route::post('admin/looks/update/{look}', [LookAdminController::class, "update"])->name("admin.look_update");
            Route::delete('admin/looks/{look}', [LookAdminController::class, "destroy"])->name("admin.look_destroy");

            //*****************************************************marketing*********************************************************
            Route::post('admin/marketings', [MarketingAdminController::class, "store"])->name("admin.marketing_store");
            Route::post('admin/marketings/videos', [MarketingAdminController::class, "storeWithVideo"])->name("admin.marketing_store_video");
            Route::post('admin/marketings/update/{marketing}', [MarketingAdminController::class, "update"])->name("admin.marketing_update");
            Route::post('admin/marketings/update/videos/{marketing}', [MarketingAdminController::class, "updateWithVideo"])->name("admin.marketing_update_video");
            Route::delete('admin/marketings/files/{id}', [MarketingAdminController::class, "destroyFileById"])->name("admin.marketing_file_delete");
            Route::delete('admin/marketings/{marketing}', [MarketingAdminController::class, "destroy"])->name("admin.marketing_destroy");
            //marketing-coupons
            Route::get('admin/marketings/hd/coupons', [MarketingAdminController::class, "coupons"])->name("admin.coupons");
            Route::get('admin/marketings/hd/coupons/add', [MarketingAdminController::class, "couponsCreate"])->name("admin.coupons_add");
            Route::get('admin/marketings/hd/coupons/edit/{marketing}', [MarketingAdminController::class, "couponsEdit"])->name("admin.coupons_edit");
            //marketing-redes
            Route::get('admin/marketings/hd/rds', [MarketingAdminController::class, "redes"])->name("admin.red");
            Route::get('admin/marketings/hd/rds/add', [MarketingAdminController::class, "redCreate"])->name("admin.red_add");
            Route::get('admin/marketings/hd/rds/{marketing}', [MarketingAdminController::class, "redEdit"])->name("admin.red_edit");

            //marketing-redes-videos
            Route::get('admin/marketings/hd/rds-v', [MarketingAdminController::class, "redesVideo"])->name("admin.red_video");
            Route::get('admin/marketings/hd/rds-v/add', [MarketingAdminController::class, "redVideoCreate"])->name("admin.red_video_add");
            Route::get('admin/marketings/hd/rds-v/{marketing}', [MarketingAdminController::class, "redVideoEdit"])->name("admin.red_video_edit");

            //marketing-cards(tarjetas de fidelización)
            Route::get('admin/marketings/hd/cards', [MarketingAdminController::class, "cards"])->name("admin.card");
            Route::get('admin/marketings/hd/cards/add', [MarketingAdminController::class, "cardCreate"])->name("admin.card_add");
            Route::get('admin/marketings/hd/cards/{marketing}', [MarketingAdminController::class, "cardEdit"])->name("admin.card_edit");

            //marketing-poster
            Route::get('admin/marketings/hd/posters', [MarketingAdminController::class, "posters"])->name("admin.poster");
            Route::get('admin/marketings/hd/posters/add', [MarketingAdminController::class, "posterCreate"])->name("admin.poster_add");
            Route::get('admin/marketings/hd/posters/{marketing}', [MarketingAdminController::class, "posterEdit"])->name("admin.poster_edit");
            //marketing-services
            Route::get('admin/marketings/hd/services', [MarketingAdminController::class, "services"])->name("admin.service");
            Route::get('admin/marketings/hd/services/add', [MarketingAdminController::class, "serviceCreate"])->name("admin.service_add");
            Route::get('admin/marketings/hd/services/{marketing}', [MarketingAdminController::class, "serviceEdit"])->name("admin.service_edit");
            //--------------------------------------------------------------------------------------------------------------------------------------
            //marketing-logo mark
            Route::get('admin/marketings/hp/logos', [MarketingAdminController::class, "logos"])->name("admin.logo");
            Route::get('admin/marketings/hp/logos/add', [MarketingAdminController::class, "logoCreate"])->name("admin.logo_add");
            Route::get('admin/marketings/hp/logos/{marketing}', [MarketingAdminController::class, "logoEdit"])->name("admin.logo_edit");

            //marketing-logo other
            Route::get('admin/marketings/hp/others-logos', [MarketingAdminController::class, "othersLogos"])->name("admin.other_logo");
            Route::get('admin/marketings/hp/others-logos/add', [MarketingAdminController::class, "otherLogoCreate"])->name("admin.other_logo_add");
            Route::get('admin/marketings/hp/others-logos/{marketing}', [MarketingAdminController::class, "otherLogoEdit"])->name("admin.other_logo_edit");
            //marketing-models
            Route::get('admin/marketings/hp/models', [MarketingAdminController::class, "models"])->name("admin.model");
            Route::get('admin/marketings/hp/models/add', [MarketingAdminController::class, "modelCreate"])->name("admin.model_add");
            Route::get('admin/marketings/hp/models/{marketing}', [MarketingAdminController::class, "modelEdit"])->name("admin.model_edit");

            //marketing-products
            Route::get('admin/marketings/hp/products', [MarketingAdminController::class, "products"])->name("admin.product");
            Route::get('admin/marketings/hp/products/add', [MarketingAdminController::class, "productCreate"])->name("admin.product_add");
            Route::get('admin/marketings/hp/products/{marketing}', [MarketingAdminController::class, "productEdit"])->name("admin.product_edit");

            //marketing-products-videos
            Route::get('admin/marketings/hp/products-v', [MarketingAdminController::class, "productsV"])->name("admin.product_v");
            Route::get('admin/marketings/hp/products-v/add', [MarketingAdminController::class, "productVCreate"])->name("admin.product_v_add");
            Route::get('admin/marketings/hp/products-v/{marketing}', [MarketingAdminController::class, "productVEdit"])->name("admin.product_v_edit");

            //marketing-products-videos
            Route::get('admin/marketings/hp/advertising/v', [MarketingAdminController::class, "advertising"])->name("admin.advertising");
            Route::get('admin/marketings/hp/advertising/v/add', [MarketingAdminController::class, "advertisingCreate"])->name("admin.advertising_add");
            Route::get('admin/marketings/hp/advertising/v/{marketing}', [MarketingAdminController::class, "advertisingEdit"])->name("admin.advertising_edit");

            //tutorial
            Route::get('admin/tutorials', [TutorialAdminController::class, "index"])->name("admin.tutorial");
            Route::get('admin/tutorials/add', [TutorialAdminController::class, "create"])->name("admin.tutorial_add");
            Route::post('admin/tutorials', [TutorialAdminController::class, "store"])->name("admin.tutorial_store");
            Route::get('admin/tutorials/edit/{tutorial}', [TutorialAdminController::class, "edit"])->name("admin.tutorial_edit");
            Route::post('admin/tutorials/update/{tutorial}', [TutorialAdminController::class, "update"])->name("admin.tutorial_update");
            Route::delete('admin/tutorials/{tutorial}', [TutorialAdminController::class, "destroy"])->name("admin.tutorial_destroy");

            //courses
            Route::get('admin/courses', [CourseAdminController::class, "index"])->name("admin.course");
            Route::get('admin/courses/add', [CourseAdminController::class, "create"])->name("admin.course_add");
            Route::post('admin/courses', [CourseAdminController::class, "store"])->name("admin.course_store");
            Route::get('admin/courses/edit/{course}', [CourseAdminController::class, "edit"])->name("admin.course_edit");
            Route::post('admin/courses/update/{course}', [CourseAdminController::class, "update"])->name("admin.course_update");
            Route::delete('admin/courses/destroy/{course}', [CourseAdminController::class, "destroy"])->name("admin.course_destroy");
            Route::delete('admin/courses/file/destroy/{id}', [CourseAdminController::class, "destroyFile"])->name("admin.course_file_destroy");

            //users
            Route::get('admin/users', [UserAdminController::class, "index"])->name("admin.user");
            Route::get('admin/users/{user}', [UserAdminController::class, "edit"])->name("admin.user_edit");

            Route::delete('admin/users/{user}', [UserAdminController::class, "destroy"])->name("admin.user_destroy");

        });

        //end admin

        //----------------------------intranet------------------------------
        //look
        Route::get('dashboard/looks', [LookController::class, "index"])->name("look");
        Route::get('dashboard/looks/{look}', [LookController::class, "show"])->name("look.show");

        //events
        Route::get('dashboard/events', [EventController::class, "index"])->name("event");
        Route::get('dashboard/events/{event}', [EventController::class, "show"])->name("event.show");
        Route::get('dashboard/xxxx/old', [EventController::class, "page"])->name("event.page");

        //marketing
        Route::get('dashboard/marketings', [MarketingController::class, "index"])->name("marketing");
        Route::get('dashboard/marketings/digital/{slug?}', [MarketingController::class, "digital"])->name("marketing.digital");
        Route::get('dashboard/marketings/advertising/{slug?}', [MarketingController::class, "advertising"])->name("marketing.advertising");

        //tutorials
        Route::get('dashboard/tutorials/{line}/{id}', [TutorialController::class, "index"])->name("tutorial");
        Route::get('dashboard/search', [DashboardController::class, "index"])->name("search");

        Route::get('dashboard/profile', [DashboardController::class, "profile"])->name("profile");
        Route::get('dashboard/profile/pass', [DashboardController::class, "pass"])->name("profile.pass");

        Route::post('admin/users/{user}', [UserAdminController::class, "update"])->name("admin.user_update");

        // Route::get('users/inscription/{user}', [DashboardController::class, "sendInscription"])->name("user.email");
    });
});
