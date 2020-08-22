<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * __construct add middlewares
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * show home of dashboard
     *
     * @return void
     */
    public function index()
    {
        $user = Auth::user();
        return view('dashboard.index',compact('user'));
    }
    /**
     * logout user
     *
     * @return void
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('welcome');
    }
}
