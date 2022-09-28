<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CartController extends Controller
{
    //
    public function index(){
        return view('welcome');
    }

        public function saveCart(Request $request){
            DB::table('carts')->insert([
                'merchandise'=>$request->mname,
                'price'=>$request->mprice*$request->qty
            ]);
            
            return back()-> with('prod_add', 'Merchandise successfully added to cart');
        }
}
