<?php

namespace App\Http\Controllers;

use App\Models\Merchant;
use App\Models\TransferWallet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WalletController extends Controller
{
    public function index(Request $request) {
        $merchant = Merchant::where('user_id',auth()->id())->first();
        $transfers = TransferWallet::where('merchant_id',auth()->user()->merchant->id)->get();
        return view('merchant.dashboard.wallet.index', compact('merchant','transfers'));
    }
    public function create()
    {
        return view('merchant.dashboard.wallet.create');
    }

    public function store(Request $request)
    {
        $merchant = auth()->user()->merchant;
        $request->validate([
            'price' => ['required','numeric', 'min:100000',
            function ($attribute, $value, $fail) use ($merchant) {
                if ($value > $merchant->wallet) {
                    $fail('Wallet amount is not enough');
                }
            }],
            'bank_name' => 'required|string',
            'bank_account_number' => 'required|string',
        ]);
        try {
            $merchant->wallet -= $request->price;
            $merchant->save();
            TransferWallet::create([
                'merchant_id' => $merchant->id,
                'price' => $request->price,
                'bank_name' => $request->bank_name,
                'bank_account_number' => $request->bank_account_number,
            ]);
        } catch (\Exception $e) {
            throw $e;
        }
        return redirect()->route('merchant.dashboard.wallet.index')->with('success', 'Withdraw has been successfully');
    }
}
