<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DealsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FastoAdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\OrganisationController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\QuoteController;

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

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::get('/',[PageController::class,'home'])->name('home');
Route::get('/payment',[PaymentController::class,'payment'])->name('payment')->middleware('auth','verifiedEmail');
Route::post('/payment/store',[PaymentController::class,'paymentStore'])->name('payment.store')->middleware('auth');
Route::get('/verify-email', [HomeController::class, 'verifyMassage'])->name('verify.massage');
Route::get('verify/email', [HomeController::class, 'verifyEmail'])->name('verify.token');
Route::get('/agian/verify/email', [HomeController::class, 'againVerifyEmail'])->name('again.verify.token');

Route::middleware(['auth','subscribe'])->prefix('dashboard')->group(function() {
    Route::get('/',[FastoAdminController::class,'dashboard'])->name('dashboard');
    // Route::get('/index','dashboard');
    // Route::get('/index-2','dashboard_2');
    // Route::get('/projects','projects');
    // Route::get('/contacts','contacts');
    // Route::get('/kanban','kanban');
    // Route::get('/calendar','calendar');
    // Route::get('/messages','messages');
    // Route::get('/app-profile','app_profile');
    // Route::match(['get','post'],'/post-details','post_details');
    // Route::match(['get','post'],'/email-compose','email_compose');
    // Route::get('/email-inbox','email_inbox');
    // Route::get('/email-read','email_read');
    // Route::get('/app-calender','app_calender');
    // Route::get('/ecom-product-grid','ecom_product_grid');
    // Route::get('/ecom-product-list','ecom_product_list');
    // Route::get('/ecom-product-detail','ecom_product_detail');
    // Route::get('/ecom-product-order','ecom_product_order');
    // Route::get('/ecom-checkout','ecom_checkout');
    // Route::get('/ecom-invoice','ecom_invoice');
    // Route::get('/ecom-customers','ecom_customers');
    // Route::get('/chart-flot','chart_flot');
    // Route::get('/chart-morris','chart_morris');
    // Route::get('/chart-chartjs','chart_chartjs');
    // Route::get('/chart-chartist','chart_chartist');
    // Route::get('/chart-sparkline','chart_sparkline');
    // Route::get('/chart-peity','chart_peity');
    // Route::get('/ui-accordion','ui_accordion');
    // Route::get('/ui-alert','ui_alert');
    // Route::get('/ui-badge','ui_badge');
    // Route::get('/ui-button','ui_button');
    // Route::get('/ui-modal','ui_modal');
    // Route::get('/ui-button-group','ui_button_group');
    // Route::get('/ui-list-group','ui_list_group');
    // Route::get('/ui-media-object','ui_media_object');
    // Route::get('/ui-card','ui_card');
    // Route::get('/ui-carousel','ui_carousel');
    // Route::get('/ui-dropdown','ui_dropdown');
    // Route::get('/ui-popover','ui_popover');
    // Route::get('/ui-progressbar','ui_progressbar');
    // Route::get('/ui-tab','ui_tab');
    // Route::get('/ui-typography','ui_typography');
    // Route::get('/ui-pagination','ui_pagination');
    // Route::get('/ui-grid','ui_grid');
    Route::get('/uc-select2',[FastoAdminController::class,'uc_select2']);
    // Route::get('/uc-nestable','uc_nestable');
    // Route::get('/uc-noui-slider','uc_noui_slider');
    // Route::get('/uc-sweetalert','uc_sweetalert');
    // Route::get('/uc-toastr','uc_toastr');
    // Route::get('/map-jqvmap','map_jqvmap');
    // Route::get('/uc-lightgallery','uc_lightgallery');
    // Route::get('/widget-basic','widget_basic');
    // Route::get('/form-element','form_element');
    // Route::get('/form-wizard','form_wizard');
    // Route::get('/ckeditor','form_ckeditor');
    // Route::get('/form-pickers','form_pickers');
    // Route::get('/form-validation-jquery','form_validation_jquery');
    // Route::get('/table-bootstrap-basic','table_bootstrap_basic');
    // Route::get('/table-datatable-basic','table_datatable_basic');
    // Route::get('/page-register','page_register');
    // Route::get('/page-login','page_login');
    // Route::get('/page-error-400','page_error_400');
    // Route::get('/page-error-403','page_error_403');
    // Route::get('/page-error-404','page_error_404');
    // Route::get('/page-error-500','page_error_500');
    // Route::get('/page-error-503','page_error_503');
    // Route::get('/page-lock-screen','page_lock_screen');
    // Route::get('/page-forgot-password','page_forgot_password');
    // Route::post('/ajax/contact-list','contact_list_ajax');
    Route::resource('leads', LeadController::class);
    
    Route::get('convert/create/{lead}',[LeadController::class,'convert'])->name('leads.convert');
    Route::post('convert/store/{lead}',[LeadController::class,'convertStore'])->name('leads.convert.store');

    Route::resource('deals', DealsController::class);

    Route::post('notes/create/{model}/{id}',[ActivityController::class,'noteCreate'])->name('note.create');
    Route::post('task/create/{model}/{id}',[ActivityController::class,'taskCreate'])->name('task.create');
    Route::post('calls/create/{model}/{id}',[ActivityController::class,'callsCreate'])->name('calls.create');
    Route::post('meeting/create/{model}/{id}',[ActivityController::class,'meetingCreate'])->name('meeting.create');
    Route::post('lunches/create/{model}/{id}',[ActivityController::class,'lunchesCreate'])->name('lunches.create');
    Route::post('file/create/{model}/{id}',[ActivityController::class,'fileCreate'])->name('file.create');
    Route::DELETE('note/delete/{model}/{id}',[ActivityController::class,'noteDelete'])->name('note.delete');
    Route::DELETE('activity/delete/{model}/{id}',[ActivityController::class,'activityDelete'])->name('activity.delete');

    // Route::resource('quotes', QuoteController::class);
    Route::resource('clients', ClientController::class);
    Route::post('client/create',[ClientController::class,'clientAjax'])->name('client.ajax');
    Route::get('organisation/fetch',[ClientController::class,'orgFecth'])->name('org.fetch');

    Route::resource('products', ProductController::class);

    // Route::resource('organisations', OrganisationController::class);
    Route::get('organizations',[OrganisationController::class,'index'])->name('organisations.index');
    Route::get('organizations/{organisation}',[OrganisationController::class,'show'])->name('organisations.show');
    Route::post('corganizations/store',[OrganisationController::class,'store'])->name('organisations.store');
    Route::put('corganizations/update/{organisation}',[OrganisationController::class,'update'])->name('organisations.update');
    Route::delete('corganizations/delete/{organisation}',[OrganisationController::class,'destroy'])->name('organisations.destroy');
    Route::post('company/social/update/{organisation}',[OrganisationController::class,'socialUpdate'])->name('social.update');
    Route::post('person/store/{organisation}',[OrganisationController::class,'personStore'])->name('person.store');
    Route::post('organisation/create',[OrganisationController::class,'organisationAjax'])->name('organisation.ajax');
    Route::get('/fetchSocialData/{organisation}', [OrganisationController::class, 'fetchSocialData']);
    Route::post('/fetchSocialData/update/{organisation}', [OrganisationController::class, 'fetchSocialDataUpdate'])->name('other.social.url.update');

    Route::resource('categories', CategoryController::class);
    Route::get('deals-kanvan',[DealsController::class,'kanvan'])->name('kanvan');
    Route::post('deals-kanvan/update',[DealsController::class,'kanvanUpdate'])->name('kanvan.update');
    Route::post('category-drop',[CategoryController::class,'drop'])->name('category.kanvan');
    Route::get('charges',[PaymentController::class,'charges'])->name('charges');
    Route::get('settings',[FastoAdminController::class,'settings'])->name('settings');
    Route::post('update/card',[PaymentController::class,'updateCard'])->name('update.card');
    Route::post('update/profile',[HomeController::class,'profileUpdate'])->name('profile.update');
    Route::post('change/password', [HomeController::class, 'changePassword'])->name('change.password');
    Route::get('cencel/subscription', [PaymentController::class, 'cencel'])->name('cencel.subscription');
});



Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::get('/success',function(){
    return 'hello';
})->name('checkout-success');
