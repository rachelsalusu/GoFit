<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Status;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function order(Product $product)
    {  
        return view('product.order', compact('product'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'address' => 'required|string',
            'bank_name' => 'required|string',
            'bank_account_number' => 'required|string',
            'product_id' => 'required|exists:products,id',
        ]);
        $product = Product::where('id', $validatedData['product_id'] )->first();
        
        $validatedData['price'] = $product->price;
        $validatedData['user_id'] = auth()->id();
        
        Transaction::create($validatedData);
        return redirect()->route('product.index')->with('success', 'Order created successfully');
    }
}
