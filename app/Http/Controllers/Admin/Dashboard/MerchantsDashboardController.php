<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Models\Merchant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MerchantsDashboardController extends Controller
{
    public function index()
    {
        $data = Merchant::orderBy('created_at')->get();
        return view('admin.dashboard.merchants.index', compact('data'));
    }
    public function approved($id) {
        try {
            Merchant::where('id',$id)->update([
                'status_id' => 2
            ]);

            \Session::flash('sukses','Registration has been Accepted');
        } catch (\exception $e) {
            \Session::flash('gagal', $e->getMessage());
        }

        return redirect()->back();
    }
}
