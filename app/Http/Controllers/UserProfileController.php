<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserProfileController extends Controller
{
    public function index()
    {  
        $user = User::where('id' ,auth()->id())->first();
        return view('account.index', compact('user'));
    }

    public function update(Request $request) 
    {
        $user = User::where('id' ,auth()->id())->first();
        $validatedData = $request->validate([           
            'name' => 'string|nullable',
            'email' => 'string|email|:users|nullable',
            'username' => 'string|alpha_dash|nullable',
            'password_confirmation' => 'string|same:password|nullable',
        ]);
        if (!empty($request->password)) {
            $user->password = Hash::make($request->password);
        }
        $user->update($validatedData);
        return redirect()->route('account.index')->with('success', 'Profile updated successfully');
    }
}
