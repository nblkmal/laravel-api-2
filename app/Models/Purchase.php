<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'hardware_id',
        'amount',
        'payment_status',
        'toyyibPay_bill_code'
    ];

    // real_amount
    public function getRealAmountAttribute()
    {
        return 'RM '.$this->amount/100;
    }

    // payment_link
    public function getPaymentLinkAttribute()
    {
        return 'https://dev.toyyibpay.com/'.$this->toyyibPay_bill_code;
    }
}
