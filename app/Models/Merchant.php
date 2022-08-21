<?php

namespace App\Models;

use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merchant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id',
        'deskripsi',
        'status',
    ];

    
    public function user()
    {
        return $this->hasOne(User::class);
    }
    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function status()
    {
        return $this->hasOne(Status::class,'id','status_id');
    }
    
}
