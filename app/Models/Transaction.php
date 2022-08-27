<?php

namespace App\Models;

use App\Models\User;
use App\Models\Status;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'status_id',
        'address',
        'bank_name',
        'bank_account_number',
        'price',
    ];

    protected $with = ['status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
