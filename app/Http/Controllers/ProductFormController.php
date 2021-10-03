<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use DB;

class ProductFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.webpages.products_form');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(Request $request)
    {
        //
        Product::create([
            'prod_name' => $request->prod_name,
            'prod_new'  => $request->prod_cat,
            'prod_price_now' => $request->prod_price,
            'prod_rating' => $request ->prod_rating,
            'prod_image_name' =>'image.jpeg',
        ]);
        return redirect(route('admincreate'))->with('success', ('Item was added to database succesfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        //$item = DB::table("SELECT * FROM products WHERE prod_id = $id");
        $item = Product::where('prod_id', '=', $id)->get();
        return view('admin.webpages.products_edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
//        DB::table('products')->where('prod_id',$id)->update($request);
     
//        $request->validate([
//            'prod_name'=> 'required',
//            'prod_price_now' => 'required',
//            
//        ]);
        
        $name = $request->prod_name;
        $prod_cat = $request->prod_cat;
        $price_now = $request->prod_price;
//        if(!empty ($request->prod_prev_price))
//        {
//           $prev_price = $request->prod_prev_price;
//        }
        global $prev_price;
        
        if($request->prod_cat==0)
        {
            global $prev_price;
            $prev_price = $request->prod_prev_price;
            
        }
        else
        {
            global $prev_price;
            $prev_price = 0;
        }
            
       
        
        $prod_rating = $request->prod_rating;
        
        Product::where('prod_id', $id)->update(['prod_name'=>$name, 'prod_price_now'=>$price_now,'prod_prev_price'=>$prev_price, 'prod_new'=>$prod_cat, 'prod_rating'=>$prod_rating]);
        //$request ->session()->put('update',  'Item Updated Successfully in Database');
        return  redirect()->route('adminedit',$id )->with('update',  'Item Updated Successfully in Database');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        DB::delete("DELETE FROM products WHERE prod_id = $id");
        //Product::destroy($id);
        return  redirect()->back()->with('success', ('Item was deleted from database succesfully.'));
    }
}
