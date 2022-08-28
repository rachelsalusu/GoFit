<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class UserProfileController extends Controller
{
    public function index()
    {  
        $user = User::where(auth()->id())->first();
        return view('account.index', compact('user'));
    }
}
