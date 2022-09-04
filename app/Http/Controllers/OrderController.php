<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use App\Models\Merchant;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index() {
        $transaction = Transaction::where('user_id',auth()->id())->get();
        
        return view('orders.index', compact('transaction'));
    }
}
