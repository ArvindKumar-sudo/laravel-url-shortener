<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user->hasRole('SuperAdmin')) {
            return view('dashboard.superadmin');
        }

        if ($user->hasRole('Admin')) {
            return view('dashboard.admin');
        }

        return view('dashboard.member');
    }
}
