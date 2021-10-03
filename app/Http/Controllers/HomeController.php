<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $items = DB::table('products')->orderby('updated_at', 'desc')->paginate(12);
        return view('home.index', compact('items'));
    }
        public function about()
    {
        
        return view('home.about');
    }
    
        public function new_arrivals()
    {
        $items = Product::where('prod_new', '=', 1)->paginate(12);
        return view('home.index', compact('items'));
    }
    public function popular()
    {
        $items = Product::where('prod_new', '=', 0)->paginate(12);
        return view('home.index', compact('items'));
    }
    
    public function password_reset()
    {
       // $token = $request->session()->token();
        return view('auth.passwords.reset');
    }    
}
