<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

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
        $ptAll = Post::select()->where('user_id', auth()->id())->count();
        $pt = Post::select()
        ->where('user_id', auth()->id())
        ->orderBy('updated_at','DESC')
        ->get();
        return view('home')->with(['beitraege'=>$pt,'alle'=>$ptAll]);
        
    }
}
