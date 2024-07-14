<?php

namespace App\Http\Controllers;

use App\Models\adminModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class adminController extends Controller
{
    public function rememberAdmin(Request $req)
    {
        $credentials = $req->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string']
        ]);

        $adminRecord = adminModel::where('email', $credentials['email'])->first();

        if ($adminRecord && Hash::check($credentials['password'], $adminRecord->password)) {
            Auth::login($adminRecord);
            $req->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'login_error' => 'Invalid Credentials!',
        ])->onlyInput('email');
    }

    public function forgetAdmin(Request $req)
    {
        Auth::logout();
        $req->session()->invalidate();
        $req->session()->regenerateToken();
        return redirect('/login');
    }
}
