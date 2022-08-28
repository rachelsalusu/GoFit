<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Merchant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $data = Merchant::where('user_id', auth()->id())->first();
        return view('merchant.dashboard.profile.index', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $merchant = Merchant::where('user_id', auth()->id())->first();
        $validatedData = $request->validate([           
            'name' => 'string',
            'deskripsi' => 'string',
            'image' => 'image',
        ]);
        if ($request->file('image')) {
            if ($merchant->image) {
                Storage::delete($merchant->image);
            }
            $validatedData['image'] = $request->file('image')->store('blog-images');
        }
        $merchant->update($validatedData);
        return redirect()->route('merchant.dashboard.profile')->with('success', 'Profile updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
