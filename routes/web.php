<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\PagesController;
use App\Http\Controllers\Goods\TrackController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\PagesController as UserSettings;
use App\Http\Controllers\Goods\GoodsController;
use App\Http\Controllers\Goods\StockController;
use App\Http\Controllers\Goods\PagesController as GoodSettings;
use App\Http\Controllers\Goods\GoodSwapController;
use App\Http\Controllers\Account\PagesController as AccountSettings;
use App\Http\Controllers\Sales\PagesController as SalesSettings;
use App\Http\Controllers\Sales\SalesController;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\Staff\StaffController;
use App\Http\Controllers\Supplier\SupplierController;
use App\Http\Controllers\Customer\PagesController as CustomerSettings;
use App\Http\Controllers\Supplier\PagesController as SupplierSettings;
use App\Http\Controllers\Staff\PagesController as StaffSettings;
use App\Models\Track;
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

Route::get('/', [PagesController::class,'index']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [PagesController::class,'home'])->name('dashboard');
//-----------------------------------User Controller --------------------------------------------------------
Route::get('/change-password',[UserSettings::class,'change_password'])->name('change-password');
Route::post('/change-password',[UserSettings::class,'change_password_submit']);
Route::resource('/user',UserController::class);
//-----------------------------------------------------------------------------------------------------------
//--------------------------------Goods Controller-------------------------------------
Route::resource('/track',TrackController::class);
Route::resource('/goods',GoodsController::class);
Route::resource('/stock',StockController::class);
Route::resource('/good-swap',GoodSwapController::class);
Route::get('/stock-report',[GoodSettings::class,'stock_report']);
Route::post('/stock-report-view',[GoodSettings::class,'stock_report_view']);
Route::get('/view-goods',[GoodSettings::class,'view_goods']);
Route::post('/find-goods',[GoodSettings::class,'find_goods']);
Route::get('/search-goods',[GoodSettings::class,'search_goods']);
Route::get('/search-products',[GoodSettings::class,'search_products']);
Route::get('/result-goods',[GoodSettings::class,'result_goods']);
Route::get('/upload-goods',[GoodSettings::class,'upload_goods']);
Route::post('/import-goods',[GoodSettings::class,'import_goods'])->name('import-goods');
Route::post('/stock-report-view',[GoodSettings::class,'stock_report_view'])->name('stock-report-view');
Route::post('/single-report-view',[GoodSettings::class,'single_report_view'])->name('single-report-view');
//------------------------------------------------------------------------------


//-------------------------------Account Management----------------------------------------------------------------
Route::get('/add-expenditure',[AccountSettings::class,'add_expenditure'])->name('add-expenditure');
Route::post('/add-expenditure',[AccountSettings::class,'post_expenditure'])->name('post-expenditure');
Route::get('/view-account',[AccountSettings::class,'view_account'])->name('view-account');
Route::post('/find-sales',[AccountSettings::class,'find_sales'])->name('find-sales');
Route::post('/single-sales',[AccountSettings::class,'single_sales'])->name('single-sales');
Route::get('/balance-sheet',[AccountSettings::class,'balance_sheet'])->name('balance-sheet');
Route::get('/monthly-account',[AccountSettings::class,'monthly_account'])->name('monthly-account');
Route::post('/check-month',[AccountSettings::class,'check_month'])->name('check-month');
Route::get('/daily-account',[AccountSettings::class,'daily_account'])->name('daily-account');
Route::get('/yearly-account',[AccountSettings::class,'yearly_account'])->name('yearly-account');
Route::post('/check-year',[AccountSettings::class,'check_year'])->name('check-year');
//-----------------------------------------------------------------------------------------------------------------

//---------------------------------Sales Management---------------------------------------------------------------
Route::get('/reg-sales',[SalesSettings::class,'reg_sales'])->name('reg-sales');
Route::get('/find-product',[SalesSettings::class,'find_product'])->name('find-product');
Route::get('/select-items',[SalesSettings::class,'select_items'])->name('select-items');
Route::post('/add-sales',[SalesSettings::class,'add_sales'])->name('add-sales');
Route::get('/reg-sales2',[SalesSettings::class,'reg_sales2'])->name('reg-sales2');
Route::get('/delete-item',[SalesSettings::class,'delete_item'])->name('delete-item');
Route::resource('/sales',SalesController::class);
Route::get('/search-receipt',[SalesSettings::class,'search_receipt'])->name('search-receipt');
Route::post('/receipt-find',[SalesSettings::class,'receipt_find'])->name('receipt-find');
Route::get('/all-debt',[SalesSettings::class,'all_debt'])->name('all-debt');
//----------------------------------------------------------------------------------------------------------------

//--------------------------------Customer Management---------------------------------------------------------------
Route::resource('/customer',CustomerController::class);
Route::get('/search-customer',[CustomerSettings::class,'search_customer'])->name('search-customer');
Route::get('/customer-debt',[CustomerSettings::class,'customer_debt'])->name('customer-debt');
Route::get('/all-customer-debt',[CustomerSettings::class,'all_customer_debt'])->name('all-customer-debt');
Route::get('/single-customer-debt',[CustomerSettings::class,'single_customer_debt'])->name('single-customer-debt');
Route::post('/search-debt2',[CustomerSettings::class,'search_debt2'])->name('search-debt2');
Route::post('/find-customer',[CustomerSettings::class,'find_customer'])->name('find-customer');
//------------------------------------------------------------------------------------------------------------------

//--------------------------------Supplier Management --------------------------------------------------------------
Route::resource('/supplier',SupplierController::class);
Route::get('/search-supplier',[SupplierSettings::class,'search_supplier'])->name('search-supplier');
Route::post('/find-supplier',[SupplierSettings::class,'find_supplier'])->name('find-supplier');
//-------------------------------------------------------------------------------------------------------------------

//------------------------------------Staff Management --------------------------------------------------------------
Route::resource('/staff',StaffController::class);
Route::get('/staff-debt',[StaffSettings::class,'staff_debt'])->name('staff-debt');
Route::get('/all-staff-debt',[StaffSettings::class,'all_staff_debt'])->name('all-staff-debt');
Route::get('/single-staff-debt',[StaffSettings::class,'single_staff_debt'])->name('single-staff-debt');
Route::post('/search-debt',[StaffSettings::class,'search_debt'])->name('search-debt');
Route::get('/update-debt',[StaffSettings::class,'update_debt'])->name('update-debt');
Route::post('/update-debt',[StaffSettings::class,'update_debt2'])->name('post-debt');
//-------------------------------------------------------------------------------------------------------------------