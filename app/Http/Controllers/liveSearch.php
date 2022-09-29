<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class liveSearch extends Controller
{
    //
    public function index(){
        return view('welcome');
    }


    public function action(Request $request){
        if($request->ajax())
        {
        $output = '';
        $query = $request->get('query');
        if($query != '')
        {
        $data = DB::table('merchandises')
            ->where('MerchandiseCode', 'like', '%'.$query.'%')
            ->get();
            echo json_encode($data);
        }
      
     }
}
}
