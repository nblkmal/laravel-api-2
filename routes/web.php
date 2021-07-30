<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/purchase/{hardware}', [App\Http\Controllers\PurchaseController::class, 'store'])->name('purchase:store');

Route::get('/return-url', function (Request $request) {
    $purchase = App\Models\Purchase::where('toyyibPay_bill_code', $request->billcode)->first();
    // validate if order id == biller code
    if ($purchase)
    {
        if( $request->order_id == $purchase->id)
        {
            // update payment status
            $purchase->update([
                'payment_status' => 1,
            ]);

            return redirect()->route('home');
        }
        else {
            return 'Check reponse';
        }
    }
    else {
        return 'Please check response';
    }
});
