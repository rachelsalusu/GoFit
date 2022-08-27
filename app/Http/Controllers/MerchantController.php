<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Merchant;
use Illuminate\Http\Request;

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
}
