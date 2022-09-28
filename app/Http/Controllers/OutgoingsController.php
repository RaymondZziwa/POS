<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class OutgoingsController extends Controller
{
    //
    public function saveOutgoing(Request $request){
        DB::table('outgoings')->insert([
            'Date'=>$request->date,
            'MerchandiseOut'=>$request->merchandiseout,
            'Reason'=>$request->reason,
            'AdditionalComments'=>$request->addcomments,
            'AuthorizedBy'=>$request->authorizedby,
            'TakenOutBy'=>$request->takenby,
            'Branch'=>$request->branch,
        ]);

        return back()-> with('outrecord_add', 'Outgoing Record Saved Successfully');
    }

    public function outRecordList(){
        $outrecords = DB::table('outgoings')->get();
        return view('outgoings',compact('outrecords'));
    }
}
