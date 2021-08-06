<?php

use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AppsController;
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
use App\Http\Controllers\ChartsController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Master\ChannelController;
use App\Http\Controllers\Master\ComponentTemplateController;
use App\Http\Controllers\Master\MerchantController;
use App\Http\Controllers\Master\PageTemplateController;
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
Route::get('/', [DashboardController::class,'dashboardEcommerce'])->name('dashboard-ecommerce');

// Route::get('/', function () {
//   return view('login');
// });

Auth::routes(['verify' => true]);
// AUTH By Farhan
Route::get('permissions/datatable',[PermissionController::class,'datatable'])->name('permissions.datatable');
Route::get('users/update-status/{id}',[UserController::class, 'updateStatus'])->name('users.updateStatus');
Route::get('channels/datatable', [ChannelController::class, 'datatable'])->name('channels.datatable'); //datatable 'channel'
Route::get('merchants/datatable', [MerchantController::class, 'datatable'])->name('merchants.datatable'); //datatable 'merchant'
Route::get('pages/datatable', [PageTemplateController::class, 'datatable'])->name('pages.datatable'); //datatable 'page template'
Route::get('components/datatable', [ComponentTemplateController::class, 'datatable'])->name('components.datatable'); //datatable 'component template'

Route::resource('roles',RoleController::class);
Route::resource('permissions',PermissionController::class);
Route::resource('users',UserController::class);

// MASTER DASHBOARD ROUTE
Route::resource('channels', ChannelController::class);
Route::resource('merchants', MerchantController::class);
Route::resource('user', UserController::class);
Route::resource('pages', PageTemplateController::class);
Route::resource('components', ComponentTemplateController::class);

// Auth::routes(['verify' => true]);

// ROUTE UNTUK DASHBOARD DINAMIS 
Route::get('dashboard/{id}/{url}/{sequence}',[PageController::class,'index'] );

// API DINAMIS 
Route::get('api/test/{api_name}',[ApiController::class, 'test']); //update status user
Route::get('api/{api_name}',[ApiController::class, 'getFromApi']); //update status user


/* Route Dashboards */
Route::group(['prefix' => 'dashboard'], function () {
  Route::get('analytics', [DashboardController::class,'dashboardAnalytics'])->name('dashboard-analytics');
  Route::get('ecommerce', [DashboardController::class,'dashboardEcommerce'])->name('dashboard-ecommerce');
  Route::get('search', [DashboardController::class,'search'])->name('search');
});
/* Route Dashboards */