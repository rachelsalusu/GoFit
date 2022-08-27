<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Models\User;
use App\Models\Product;
use App\Models\Merchant;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Session\Session;

class TransactionDashboardController extends Controller
{
    public function index()
    {
        $data = Transaction::orderBy('created_at')->get();
        return view('admin.dashboard.transactions.index', compact('data'));
    }
    public function accepted($id) {
        try {
            $transaction = Transaction::where('id',$id)->first();
            $transaction->update([
                'status_id' => 2
            ]);
            $merchant = $transaction->product->merchant;
            $merchant->wallet += $transaction->price;
            $merchant->save();


            \Session::flash('sukses','Transaction has been accepted');
        } catch (\exception $e) {
            \Session::flash('gagal', $e->getMessage());
        }

        return redirect()->back();
    }
    public function rejected($id) {
        try {
            Transaction::where('id',$id)->update([
                'status_id' => 3
            ]);

            \Session::flash('sukses','Transaction has been rejected');
        } catch (\exception $e) {
            \Session::flash('gagal', $e->getMessage());
        }

        return redirect()->back();
    }
}
