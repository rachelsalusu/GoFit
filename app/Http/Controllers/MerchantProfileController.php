<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MerchantProfileController extends Controller
{
    public function index()
    {  
        $data = Merchant::where('user_id', auth()->id())->first();
        return view('merchant.index', compact('data'));
    }
}
