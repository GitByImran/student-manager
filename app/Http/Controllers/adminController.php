<?php

namespace App\Http\Controllers;

use App\Models\adminModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class adminController extends Controller
{
    public function rememberAdmin(Request $req)
    {
        $email = $req->email;
        $password = $req->password;

        $adminRecord = adminModel::where('email', $email)->first();

        if (!$adminRecord || !Hash::check($password, $adminRecord->password)) {
            return redirect('/login')->with('login_error', 'Invalid Credentials!');
        } else {
            Session::put('admin_email', $adminRecord->email);
            return redirect('/');
        }
    }

    public function forgetAdmin()
    {
        Session::flush();
        return redirect('/login');
    }
}
