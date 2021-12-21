<?php

use App\Http\Controllers\Api\BatchController;
use App\Http\Controllers\Api\InquiryController;
use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AppsController;
use App\Http\Controllers\AuditBatchController;
use App\Http\Controllers\AuditController;
use App\Http\Controllers\UserInterfaceController;
use App\Http\Controllers\CardsController;
use App\Http\Controllers\ComponentsController;
use App\Http\Controllers\ExtensionController;
use App\Http\Controllers\PageLayoutController;
use App\Http\Controllers\FormsController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\MiscellaneousController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\Bulk\ApproveBulkController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MasterAccountController;
use App\Http\Controllers\MasterCatalogController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\Bulk\UploadBulkController;
use Illuminate\Support\Facades\Auth;

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

// Main Page Route
// Route::get('/', [DashboardController::class,'dashboardEcommerce'])->name('dashboard-ecommerce')->middleware('verified');
//Route::get('/', [InquiryController::class,'index']);
Route::get('/', [DashboardController::class,'index']);
// Route::get('/', function () {
//   return view('login');
// });

Auth::routes(['verify' => true]);
// AUTH By Farhan
Route::get('permissions/datatable',[PermissionController::class,'datatable'])->name('permissions.datatable');
Route::get('users/update-status/{id}',[UserController::class, 'updateStatus'])->name('users.updateStatus');
Route::get('/report/pdf', [ReportController::class, 'createPDF'])->name('report.createPDF');
Route::get('account/datatable',[MasterAccountController::class,'datatable'])->name('account.datatable');

Route::resource('roles',RoleController::class);
Route::resource('permissions',PermissionController::class);
Route::resource('users',UserController::class);

// MPC 
Route::resource('audits',AuditController::class);
Route::resource('batchs',BatchController::class);

Route::resource('master-accounts',MasterAccountController::class);
Route::resource('reports',ReportController::class);
Route::resource('upload-bulks',UploadBulkController::class);
Route::resource('approve-bulks',ApproveBulkController::class);

/* Route Dashboards */
// Route::group(['prefix' => 'dashboard'], function () {
//   Route::get('analytics', [DashboardController::class,'dashboardAnalytics'])->name('dashboard-analytics');
//   Route::get('ecommerce', [DashboardController::class,'dashboardEcommerce'])->name('dashboard-ecommerce');
//   Route::get('search', [DashboardController::class,'search'])->name('search');
// });
/* Route Dashboards */