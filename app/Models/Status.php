<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    protected $tabel = 'statuses';

    // public function merchant()
    // {
    //     return $this->hasMany(Merchant::class, 'user_id');
    // }
}
