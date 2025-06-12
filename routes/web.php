<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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



Auth::routes();

Route::get('/', [App\Http\Controllers\PagesController::class, 'welcome']);
Route::get('/register_admin', [App\Http\Controllers\PagesController::class, 'register_admin']);
Route::get('/feedback_user', [App\Http\Controllers\PagesController::class, 'feedback_user']);
Route::get('/faq_user', [App\Http\Controllers\PagesController::class, 'faq_user']);

Route::get('/home', [App\Http\Controllers\PagesController::class, 'home']);
Route::get('/not-found', [App\Http\Controllers\PagesController::class, 'not_found']);


Route::middleware(['auth', 'admin'])->group(function () {
    Route::post('/searchPageAdmin', [App\Http\Controllers\PagesController::class, 'searchPageAdmin']);
    // erp
    Route::get('/erp/{id}', [App\Http\Controllers\PagesController::class, 'erp']);
    Route::get('/erp-create', [App\Http\Controllers\PagesController::class, 'erp_create']);
    Route::post('/erp/store', [App\Http\Controllers\ErpController::class, 'store']);
    Route::get('/erp-update/{id}', [App\Http\Controllers\ErpController::class, 'edit']);
    Route::post('/erp/update/{id}', [App\Http\Controllers\ErpController::class, 'update']);
    Route::post('/erp/delete/{id}', [App\Http\Controllers\ErpController::class, 'destroy']);

    // modul
    Route::get('/modul', [App\Http\Controllers\PagesController::class, 'modul']);
    Route::get('/modul-create', [App\Http\Controllers\ModulController::class, 'create']);
    Route::post('/modul/store', [App\Http\Controllers\ModulController::class, 'store']);
    Route::get('/modul-update/{id}', [App\Http\Controllers\ModulController::class, 'edit']);
    Route::post('/modul/update/{id}', [App\Http\Controllers\ModulController::class, 'update']);
    Route::get('/modul-delete/{id}', [App\Http\Controllers\ModulController::class, 'destroy']);

    // fungsionalitas
    Route::get('/fungsionalitas', [App\Http\Controllers\PagesController::class, 'fungsionalitas']);
    Route::get('/fungsionalitas-create', [App\Http\Controllers\FungsionalitasController::class, 'create']);
    Route::post('/fungsionalitas/store', [App\Http\Controllers\FungsionalitasController::class, 'store']);
    Route::get('/fungsionalitas-update/{id}', [App\Http\Controllers\FungsionalitasController::class, 'edit']);
    Route::post('/fungsionalitas/update/{id}', [App\Http\Controllers\FungsionalitasController::class, 'update']);
    Route::get('/fungsionalitas-delete/{id}', [App\Http\Controllers\FungsionalitasController::class, 'destroy']);

    // function area
    Route::get('/function_area', [App\Http\Controllers\PagesController::class, 'function_area']);
    Route::get('/function-area-create', [App\Http\Controllers\FunctionAreaController::class, 'create']);
    Route::post('/function-area/store', [App\Http\Controllers\FunctionAreaController::class, 'store']);
    Route::get('/function-area-update/{id}', [App\Http\Controllers\FunctionAreaController::class, 'edit']);
    Route::post('/function-area/update/{id}', [App\Http\Controllers\FunctionAreaController::class, 'update']);
    Route::get('/function-area-delete/{id}', [App\Http\Controllers\FunctionAreaController::class, 'destroy']);


    // user need
    Route::get('/user_need', [App\Http\Controllers\PagesController::class, 'user_need']);
    Route::get('/user-need-create', [App\Http\Controllers\UserNeedController::class, 'create']);
    Route::post('/user-need/store', [App\Http\Controllers\UserNeedController::class, 'store']);
    Route::get('/user-need-update/{id}', [App\Http\Controllers\UserNeedController::class, 'edit']);
    Route::post('/user-need/update/{id}', [App\Http\Controllers\UserNeedController::class, 'update']);
    Route::get('/user-need-delete/{id}', [App\Http\Controllers\UserNeedController::class, 'destroy']);

    // type
    Route::get('/type', [App\Http\Controllers\PagesController::class, 'type']);
    Route::get('/type-create', [App\Http\Controllers\TypeController::class, 'create']);
    Route::post('/type/store', [App\Http\Controllers\TypeController::class, 'store']);
    Route::get('/type-update/{id}', [App\Http\Controllers\TypeController::class, 'edit']);
    Route::post('/type/update/{id}', [App\Http\Controllers\TypeController::class, 'update']);
    Route::get('/type-delete/{id}', [App\Http\Controllers\TypeController::class, 'destroy']);


    // type
    Route::get('/other_requirement', [App\Http\Controllers\PagesController::class, 'other_requirement']);
    Route::get('/other-requirement-create', [App\Http\Controllers\OtherRequirementController::class, 'create']);
    Route::post('/other-requirement/store', [App\Http\Controllers\OtherRequirementController::class, 'store']);
    Route::get('/other_requirement-update/{id}', [App\Http\Controllers\OtherRequirementController::class, 'edit']);
    Route::post('/other_requirement/update/{id}', [App\Http\Controllers\OtherRequirementController::class, 'update']);
    Route::get('/other_requirement-delete/{id}', [App\Http\Controllers\OtherRequirementController::class, 'destroy']);

    // report
    Route::get('/user-report', [App\Http\Controllers\PagesController::class, 'user_report']);
    Route::get('/erp-report-admin', [App\Http\Controllers\PagesController::class, 'erp_report_admin']);

    // faq
    Route::get('/faq-admin', [App\Http\Controllers\PagesController::class, 'faq_admin']);
    Route::post('/faq_admin/create', [App\Http\Controllers\FaqController::class, 'store']);

});

Route::middleware(['auth', 'user'])->group(function () {
    Route::post('/searchPageUser', [App\Http\Controllers\PagesController::class, 'searchPageUser']);

    // erp
    Route::get('/erp_user/{id}', [App\Http\Controllers\PagesController::class, 'erp_user']);
    Route::get('/erp_recomendation', [App\Http\Controllers\PagesController::class, 'erp_recomendation']);
    Route::post('erp-recomendation/store', [App\Http\Controllers\ErpRecomendationController::class, 'store']);
    Route::get('/erp_report', [App\Http\Controllers\PagesController::class, 'erp_report']);

    // owner
    Route::get('/owner', [App\Http\Controllers\OwnerController::class, 'index']);
    Route::get('/owner/create', [App\Http\Controllers\OwnerController::class, 'create']);
    Route::get('/owner/edit/{id}', [App\Http\Controllers\OwnerController::class, 'edit']);
    Route::post('/owner/store', [App\Http\Controllers\OwnerController::class, 'store']);
    Route::post('/owner/update/profile/{id}', [App\Http\Controllers\OwnerController::class, 'updateProfile']);
    Route::post('/owner/update/{id}', [App\Http\Controllers\OwnerController::class, 'update']);
    Route::post('/owner/destroy/{id}', [App\Http\Controllers\OwnerController::class, 'destroy']);

    // company
    Route::get('/company', [App\Http\Controllers\CompanyController::class, 'index']);
    Route::get('/company/create', [App\Http\Controllers\CompanyController::class, 'create']);
    Route::get('/company/edit/{id}', [App\Http\Controllers\CompanyController::class, 'edit']);
    Route::post('/company/store', [App\Http\Controllers\CompanyController::class, 'store']);
    Route::post('/company/update/{id}', [App\Http\Controllers\CompanyController::class, 'update']);
    Route::post('/company/destroy/{id}', [App\Http\Controllers\CompanyController::class, 'destroy']);

    // profile
    Route::get('/profile', [App\Http\Controllers\PagesController::class, 'profile']);


    // faq
    Route::get('/faq', [App\Http\Controllers\FaqController::class, 'index']);

    // feedback
    Route::get('/feedback', [App\Http\Controllers\FeedbackController::class, 'index']);
    Route::post('/feedback/create', [App\Http\Controllers\FeedbackController::class, 'store']);

});
