<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userId = Auth::id();
        $info = User::find($userId);
        if($info->ban === 3){
            $pass = 1;
            return view('home')->with('pass', $pass);

        }
        else{
            $pass = 0;
            return view('home')->with('pass', $pass);
        }
    }
}
