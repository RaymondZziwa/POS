<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Database\QueryException;

class MerchandiseController extends Controller
{
    //
    public function saveMerchandise(Request $request){
       try{
            DB::table('merchandises')->insert([
                'MerchandiseCode'=>$request->merchandisecode,
                'MerchandiseName'=>$request->merchandisename,
                'MerchandisePrice'=>$request->merchandiseprice
            ]);
            
                return back()-> with('record_add', 'Merchandise Record Saved Successfully');
       }catch(QueryException $ex){
            if($ex->errorInfo[1]==19){
                return back()-> with('record_error', 'A merchandise Record already exists with the merchandise code you are trying to register');
            }  
       }
    }


    public function  merchandiseRecordList(){
        $merchandiserecords = DB::table('merchandises')->get();
        return view('merchandiseoperations',compact('merchandiserecords'));
    }
}
