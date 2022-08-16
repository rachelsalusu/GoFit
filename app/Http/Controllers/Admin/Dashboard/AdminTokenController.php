<?php

namespace App\Http\Controllers\Admin\Dashboard;


use App\Models\AdminToken;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class AdminTokenController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin-access');
    }

    public function index()
    {
        $admin_tokens = AdminToken::get();
        return view('admin.dashboard.admintokens.index', compact('admin_tokens'));
    }

    public function generate()
    {

        AdminToken::create([
            'token' => Str::random(60),
            'user_id' => auth()->user()->id,
        ]);
        return redirect()->route('admin.dashboard.admintokens.index');
    }

    public function destroy(AdminToken $adminToken)
    {
        $adminToken->delete();
        return redirect()->route('admin.dashboard.admintokens.index');
    }
}
