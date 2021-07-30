<?php

namespace App\Http\Controllers;

use App\Models\Hardware;
use App\Models\Purchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Hardware $hardware)
    {
        // store book
        $purchase = Purchase::create([
            'user_id' => auth()->user()->id,
            'hardware_id' => $hardware->id,
            'amount' => $hardware->price,
        ]);

        // create bill at toyyibPay
        $url = 'https://dev.toyyibpay.com/index.php/api/createBill';

        $response = Http::asForm()->post($url, [
            'userSecretKey' => 'czbbbpan-1b56-8is1-65cl-wjoun02tycye',
            'categoryCode' => 'gjmpjh9h',
            'billName' => auth()->user()->name,
            'billDescription' => 'Booking '.$hardware->name,
            'billPriceSetting' => 1,
            'billAmount' => $hardware->price,
            'billReturnUrl' => 'http://127.0.0.1:8888/return-url',
            'billCallbackUrl' => 'http://127.0.0.1:8888/call-back-url',
            'billExternalReferenceNo' => $purchase->id,
            'billTo' => auth()->user()->name,
            'billEmail' => auth()->user()->email,
            'billPhone' => '0124441998',
        ]);
        
        // update purchase with toyyibPay bill code
        $purchase->update([
            'toyyibPay_bill_code' => $response->json()[0]['BillCode'],
        ]);

        // return to show purchase
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function show(Purchase $purchase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function edit(Purchase $purchase)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Purchase $purchase)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function destroy(Purchase $purchase)
    {
        //
    }
}
