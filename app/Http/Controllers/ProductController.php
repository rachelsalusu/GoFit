<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use App\Models\Merchant;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Product::with(['user'])->where('title', 'like', '%' . request('search') . '%')
            ->where('user_id', auth()->id())
            ->latest()
            ->paginate(100)
            // ->withQueryString();
            ->appends($request->query());
        return view('merchant.dashboard.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('merchant.dashboard.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->merge(['slug' => Str::slug($request->title)]);
        $validatedData = $request->validate([
            'title' => 'required|min:3',
            'slug' => 'required|min:3|unique:products',
            'body' => 'required|min:3',
            'price' => 'integer',
            'image' => 'image',
        ]);
        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('blog-images');
        }
        $merchant = Merchant::where('user_id',auth()->id())->first();

        $merchant_id = $merchant->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 30);
        $validatedData['merchant_id'] = $merchant->id;
        $validatedData['user_id'] = auth()->id();

        $product = Product::create($validatedData);
        return redirect()->route('merchant.dashboard.product.index')->with('success', 'Products created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        if (!Gate::allows('update-product', $product)) {
            abort(403);
        }
        return view('merchant.dashboard.product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->merge(['slug' => Str::slug($request->title)]);
        $validatedData = $request->validate([
            'title' => 'required|min:3',
            'slug' => 'required|min:3|unique:products,slug,'. $product->id,
            'body' => 'required|min:3',
            'price' => 'integer',
            'image' => 'image',
        ]);
        if ($request->file('image')) {
            if ($product->image) {
                Storage::delete($product->image);
            }
            $validatedData['image'] = $request->file('image')->store('product-images');
        }
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 30);
        $product->update($validatedData);
        return redirect()->route('merchant.dashboard.product.index')->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if ($product->image) {
            Storage::delete($product->image);
        }
        $product->delete();
        return redirect()->route('merchant.dashboard.product.index')->with('success', 'Product deleted successfully');
    }
}
