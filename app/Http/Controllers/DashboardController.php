<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Display the appropriate dashboard based on session or user role.
     */
    public function index(Request $request): View
    {
        $mode = $request->session()->get('login_as');

        return view('dashboard', [
            'mode' => $mode,
        ]);
    }
}
