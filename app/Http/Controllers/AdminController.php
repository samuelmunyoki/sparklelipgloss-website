<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Input;
use DB;
use Cache;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $no_orders = DB::table('order_details')->count();
        $request ->session()->put('no_orders', $no_orders );
        
        $no_popular = DB::table('products')->where('prod_new', '=', 0)->count();
        $request ->session()->put('no_popular',  $no_popular );
        
        $no_new = DB::table('products')->where('prod_new', '=', 1)->count();
        $request ->session()->put('no_new',  $no_new );
        
        $onlines = 0;
        $users = DB::table('users')->get();
        foreach($users as $user)
        {
            if(Cache::has('user-is-online-' .$user->id))
            {
                $onlines = $onlines+1;
            }
     
            
        }
        $request ->session()->put('users_online',  $onlines );
        
        
        $orders =DB::table('order_details')->orderby('updated_at', 'desc')->paginate(25);
        return view('admin.webpages.home', compact('orders'));
    }

    public function admin_new_arrivals()
    {
        $items = Product::orderby('prod_name', 'asc')->where('prod_new', '=', 1)->paginate(30);
        return view('admin.webpages.products', compact('items'));
    }
    public function users()
    {
       $users = DB::table('users')->orderby('updated_at', 'desc')->paginate(25);
        return view('admin.webpages.users', compact('users'));
    }
    
    
    public function admin_popular()
    {
        $items = Product::orderby('prod_name', 'asc')->where('prod_new', '=', 0)->paginate(30);
        return view('admin.webpages.products', compact('items'));
    }
    
    
    public function search(Request $request)
    {
        $search_key = $request->input('search_key');
        
        $items = Product::orderby('prod_name', 'asc')->where('prod_name', 'LIKE', "%$search_key%")->paginate(30);
        return view('admin.webpages.products', compact('items'));
    }    
    
    
    public function userlogin()
    {

        return view('auth.login');
        
    }
    
    
        public function user_registration()
    {

        return view('auth.register');
        
    }
        
}
