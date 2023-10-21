<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Pos\UnitController;
use App\Http\Controllers\Pos\StockController;
use App\Http\Controllers\Pos\CategorController;
use App\Http\Controllers\Pos\DefaultController;
use App\Http\Controllers\Pos\InvoiceController;
use App\Http\Controllers\Pos\ProductController;
use App\Http\Controllers\Pos\PurchaseController;
use App\Http\Controllers\Pos\SupplierController;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Controllers\Pos\CustomersController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [AdminController::class, 'AdminLogin'])->name('admin.dashboard')->middleware(RedirectIfAuthenticated::class);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


// admin-----------------------------------------------------------------
Route::middleware(['auth','role:admin'])->group(function(){

    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
    Route::get('/admin/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');
    Route::post('/admin/update/password', [AdminController::class, 'AdminUpdatePassword'])->name('admin.update.password');

    // Supplier  all routes
    Route::controller(SupplierController::class)->group(function(){
        Route::get('/supplier/all', 'SupplierAll')->name('supplier.all');
        Route::get('/supplier/add', 'SupplierAdd')->name('supplier.add');
        Route::post('/supplier/store', 'SupplierStore')->name('supplier.store');
        Route::get('/supplier/edit/{id}', 'SupplierEdit')->name('supplier.edit');
        Route::post('/sullpier/update', 'SupplierUpdate')->name('sullpier.update');
        Route::get('/supplier/delete/{id}', 'SupplierDelet')->name('supplier.delete');
    });

        // Customers  all routes
    Route::controller(CustomersController::class)->group(function(){
        Route::get('/customer/all', 'CustomerAll')->name('customer.all');
        Route::get('/customer/add', 'CustomerAdd')->name('customer.add');
        Route::post('/customer/store', 'CustomerStore')->name('customer.store');
        Route::get('/customer/edit/{id}', 'CustomerEdit')->name('customer.edit');
        Route::post('/customer/update', 'CustomerUpdate')->name('customer.update');
        Route::get('/customer/delete/{id}', 'CustomerDelet')->name('customer.delete');


        Route::get('/credit/customer', 'CreditCustomer')->name('credit.customer');
         Route::get('/credit/customer/print/pdf', 'CreditCustomerPrintPdf')->name('credit.customer.print.pdf');
         Route::get('/customer/edit/invoice/{invoice_id}', 'CustomerEditInvoice')->name('customer.edit.invoice');
         Route::post('/customer/update/invoice/{invoice_id}', 'CustomerUpdateInvoice')->name('customer.update.invoice');
          Route::get('/customer/invoice/details/{invoice_id}', 'CustomerInvoiceDetails')->name('customer.invoice.details.pdf');


           Route::get('/paid/customer', 'PaidCustomer')->name('paid.customer');
           Route::get('/paid/customer/print/pdf', 'PaidCustomerPrintPdf')->name('paid.customer.print.pdf');
            Route::get('/customer/wise/report', 'CustomerWiseReport')->name('customer.wise.report');
              Route::get('/customer/wise/credit/report', 'CustomerWiseCreditReport')->name('customer.wise.credit.report');
              Route::get('/customer/wise/paid/report', 'CustomerWisePaidReport')->name('customer.wise.paid.report');
    });

    // unit  all routes
    Route::controller(UnitController::class)->group(function(){
        Route::get('/unit/all', 'UnitAll')->name('unit.all');
        Route::get('/unit/add', 'UnitAdd')->name('unit.add');
        Route::post('/unit/store', 'UnitStore')->name('unit.store');
        Route::get('/unit/edit/{id}', 'UnitEdit')->name('unit.edit');
        Route::post('/unit/update', 'UnitUpdate')->name('unit.update');
        Route::get('/unit/delete/{id}', 'UnitDelet')->name('unit.delete');
    });

    // category  all routes
    Route::controller(CategorController::class)->group(function(){
        Route::get('/category/all', 'CategoryAll')->name('category.all');
        Route::get('/category/add', 'CategoryAdd')->name('category.add');
        Route::post('/category/store', 'CategoryStore')->name('category.store');
        Route::get('/category/edit/{id}', 'CategoryEdit')->name('category.edit');
        Route::post('/category/update', 'CategoryUpdate')->name('category.update');
        Route::get('/category/delete/{id}', 'CategoryDelet')->name('category.delete');
    });

    // product  all routes
    Route::controller(ProductController::class)->group(function(){
        Route::get('/product/all', 'ProductAll')->name('product.all');
        Route::get('/product/add', 'ProductAdd')->name('product.add');
        Route::post('/product/store', 'ProductStore')->name('product.store');
        Route::get('/product/edit/{id}', 'ProductEdit')->name('product.edit');
        Route::post('/product/update', 'ProductUpdate')->name('product.update');
        Route::get('/product/delete/{id}', 'ProductDelet')->name('product.delete');
    });

    // product  all routes
    Route::controller(PurchaseController::class)->group(function(){
        Route::get('/purchase/all', 'PurchaseAll')->name('purchase.all');
        Route::get('/purchase/add', 'PurchaseAdd')->name('purchase.add');
        Route::post('/purchase/store', 'PurchaseStore')->name('purchase.store');        
        Route::get('/purchase/delete/{id}', 'PurchaseDelet')->name('purchase.delete');

        Route::get('/purchase/pending', 'PurchasePending')->name('purchase.pending');
        Route::get('/purchase/approve/{id}', 'PurchaseApprove')->name('purchase.approve');



        Route::get('/daily/purchase/report', 'DailyPurchaseReport')->name('daily.purchase.report');
        Route::get('/daily/purchase/pdf', 'DailyPurchasePdf')->name('daily.purchase.pdf');
       
    });

    // Default All Route 
    Route::controller(DefaultController::class)->group(function () {
        Route::get('/get-category', 'GetCategory')->name('get-category'); 
        Route::get('/get-product', 'GetProduct')->name('get-product'); 
        Route::get('/check-product', 'GetStock')->name('check-product-stock');
    });

    // Invoice  all routes
    Route::controller(InvoiceController::class)->group(function(){
        Route::get('/invoice/all', 'InvoiceAll')->name('invoice.all');
        Route::get('/invoice/add', 'InvoiceAdd')->name('invoice.add');
        Route::post('/invoice/store', 'InvoiceStore')->name('invoice.store');
        Route::get('/invoice/edit/{id}', 'invoiceEdit')->name('invoice.edit');
        Route::post('/invoice/update', 'invoiceUpdate')->name('invoice.update');
        Route::get('/invoice/delete/{id}', 'invoiceDelet')->name('invoice.delete');


        Route::get('/invoice/pending/list', 'PendingList')->name('invoice.pending.list');
        Route::get('/invoice/delete/{id}', 'InvoiceDelete')->name('invoice.delete');
         Route::get('/invoice/approve/{id}', 'InvoiceApprove')->name('invoice.approve');
         Route::post('/approval/store/{id}', 'ApprovalStore')->name('approval.store');

         Route::get('/print/invoice/list', 'PrintInvoiceList')->name('print.invoice.list');
    Route::get('/print/invoice/{id}', 'PrintInvoice')->name('print.invoice');

    Route::get('/daily/invoice/report', 'DailyInvoiceReport')->name('daily.invoice.report');
    Route::get('/daily/invoice/pdf', 'DailyInvoicePdf')->name('daily.invoice.pdf');

    });


    Route::controller(StockController::class)->group(function () {
        Route::get('/stock/report', 'StockReport')->name('stock.report'); 
        Route::get('/stock/report/pdf', 'StockReportPdf')->name('stock.report.pdf');


        Route::get('/stock/supplier/wise', 'StockSupplierWise')->name('stock.supplier.wise');
         Route::get('/supplier/wise/pdf', 'SupplierWisePdf')->name('supplier.wise.pdf');
          Route::get('/product/wise/pdf', 'ProductWisePdf')->name('product.wise.pdf');

    });

   














});

//Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');

Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login')->middleware(RedirectIfAuthenticated::class);


