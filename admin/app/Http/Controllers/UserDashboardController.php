<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    public function show()
    {
        $user = auth()->user();

        if ($user->hasRole('admin')) {
            return view('dashboard.admin');
        }
    }
}
