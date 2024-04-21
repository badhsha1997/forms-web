<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function store()
    {
        Auth::guard('admin')->logout();

        return redirect(route('admin.login.index'));
    }
}
