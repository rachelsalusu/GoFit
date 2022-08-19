<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;

class IndexProductController extends Controller
{
    public function index(Request $request)
    {
        $search = request('search');
        $user = request('user');

        $query = Product::with(['user']);
        if ($search) {
            $query = $query->where('title', 'like', '%' . $search . '%');
        }
        if ($user) {
            $query = $query->whereHas('user', function ($query) use ($user) {
                $query->where('username', '=',  $user);
            });
        }
        $products = $query->latest()
            ->paginate(9)
            ->appends($request->query());

        $users = User::has('products')->get();

        return view('product.index', compact('products', 'users'));
    }

    public function show(Product $product)
    {
        $product->load(['user']);
        return view('product.show', compact('product'));
    }

}
