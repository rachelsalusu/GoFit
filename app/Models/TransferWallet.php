<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransferWallet extends Model
{
    use HasFactory;
    protected $fillable = [
        'price',
        'merchant_id',
        'bank_name',
        'bank_account_number',
    ];
}
