<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    public function index()
    {

        return view('admin.index');
    }
    public function account()
    {
        return view('admin.account');
    }
    public function update(Request $request)
    {
    $user = Auth::user();

    $request->validate([
        'name' =>
            'required',
            'name',
            Rule::unique('users', 'name')->ignore($user->id),
        'email' =>
            'required',
            'email',
            Rule::unique('users', 'email')->ignore($user->id),
        'password' =>
        'required',
        'password',
        Rule::unique('users', 'password')->ignore($user->id),
    ]);

    $user->update([
        'name' => $request->name,
        'email' => $request->email,
        'password' => $request->password,
    ]);

    return redirect()->route('admin.account')->with('success','Account data has been updated successfully');
    }

}
