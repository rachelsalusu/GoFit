<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Merchant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;


class MerchantController extends Controller
{
    public function index()
    {  
        $data = Merchant::where('user_id', auth()->id())->first();
        return view('merchant.index', compact('data'));
    }

    public function register()
    {
        return view('merchant.register');
    }

    public function merchantRegister(Request $request)
    {
        
        $validatedData = $request->validate([
            'name' => 'required',
            'deskripsi' => 'string',
            'image' => 'image',
        ]);
        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('blog-images');
        }
        
        $validatedData['user_id'] = auth()->id();
        
        Merchant::create($validatedData);
        session()->flash(
            'link',
            route('index')
        );
        return redirect()->route('merchant.index')->with('success', 'merchant created successfully');
    }
    public function show (Request $request,Merchant $merchant)
    {
        // $merchant->load(['products']);
        $query = Product::with(['merchant'])->where('merchant_id','=',$merchant->id);
        $products = $query->latest()
            ->paginate(6)
            ->appends($request->query());
        return view('product.shows.index', compact('merchant','products'));
    }

    
}
