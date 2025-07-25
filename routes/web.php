<?php

use Illuminate\Support\Facades\Route;
use App\Mail\InvoiceMail;
use Illuminate\Support\Facades\Mail;
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
use App\Http\Controllers\InvoiceController;

Route::get('/', [InvoiceController::class, 'create'])->name('invoices.create');
Route::post('/invoice', [InvoiceController::class, 'store'])->name('invoices.store');


Route::get('/test-mail', function () {
    $invoice = \App\Models\Invoice::latest()->with('items')->first();
    Mail::to('saravanars81@gmail.com')->send(new InvoiceMail($invoice));
    return 'Mail Sent';
});