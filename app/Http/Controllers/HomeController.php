<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $user_posts = $user->posts; //$user->posts , due to haveMany relationship in Models
        return view('home')->with('user_posts', $user_posts);
    }

    public function profile($id)
    {
        $user = User::find($id);
        $user_profile = $user->posts;
        return view('profile')->with(['user_name' => $user->name, 'profiles' => $user_profile]);
    }
}
