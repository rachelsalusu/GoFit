<?php

namespace App\Http\Controllers;


use App\Models\Product;
use App\Models\User;
use App\Models\Merchant;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardTransactionController extends Controller
{
    public function index() {
        $transaction = Transaction::whereHas('product', function ($query) {
            $query->where('merchant_id', '=', auth()->user()->merchant->id);
        })->get();
        
        return view('merchant.dashboard.transaction.index', compact('transaction'));
    }
}
