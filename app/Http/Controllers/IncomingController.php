<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class IncomingController extends Controller
{
    //
    public function addIncoming(){
        return view('recordincomings');
    }

    public function saveIncoming(Request $request){
        DB::table('Incomings')->insert([
            'Date'=>$request->date,
            'MerchandiseIn'=>$request->merchandisein,
            'Reason'=>$request->reason,
            'AdditionalComments'=>$request->addcomment,
            'RecievedBy'=>$request->recievedby,
            'BroughtInBy'=>$request->broughtby,
            'Branch'=>$request->branch,
        ]);

        return back()-> with('record_add', 'Incoming Record Saved Successfully');
    }

    public function recordList(){
        $records = DB::table('Incomings')->get();
        return view('incomings',compact('records'));
    }
}
