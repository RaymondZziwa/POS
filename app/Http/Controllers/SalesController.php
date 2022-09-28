<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB; 

class SalesController extends Controller
{
    //
    public function saveSale(Request $request){
        DB::table('sales')->insert([
            'Date'=>$request->date,
            'MerchandiseSold'=>$request->merchandisesold,
            'TotalPrice'=>$request->price,
            'AuthorizedBy'=>$request->authorizedby
        ]);

        return back()-> with('sale_add', 'Sale recorded successfully.');
    }
    public function salesRecordList(){
        $outrecords = DB::table('sales')->get();
        return view('sales',compact('outrecords'));
    }

}
