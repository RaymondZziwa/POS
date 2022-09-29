<?php

namespace App\Http\Controllers;

use App\Http\Controllers;
use Illuminate\Http\Request;
use charlieuki\ReceiptPrinter\ReceiptPrinter as ReceiptPrinter;
use DB;

class PrintController extends Controller
{
    public $cart = array();

    public function index(){
        return view('welcome');
    }

    
    public function addmerch(Request $request){
        $qty = $request->qty;
        DB::table('carts')->insert([
            'merchandise' => $request->mname,
            'totalPrice' => $request->mprice*$qty       
        ]);

        return back()-> with('cartprod_add', 'Merchandise Successfully Added To Cart');
    }

    public function cartList(){
        $cartmerchs = DB::table('carts')->get();
        return view('cart',compact('cartmerchs'));
    }

    public function test()
    {
        // Set params
        $mid = '123123456';
        $store_name = 'YOURMART';
        $store_address = 'Mart Address';
        $store_phone = '1234567890';
        $store_email = 'yourmart@email.com';
        $store_website = 'yourmart.com';
        $tax_percentage = 10;
        $transaction_id = 'TX123ABC456';

        // Set items
        $items = [
            [
                'name'=>'Panadol',
                'Qty'=>2,
                'Price'=>2000
            ],
            [
                'name'=>'Dexa',
                'Qty'=>5,
                'Price'=>1000
            ],
            [
                'name'=>'Gloves',
                'Qty'=>3,
                'Price'=>2500
            ]
        ];

        // Init printer
        $printer = new ReceiptPrinter;
        $printer->init(
            config('receiptprinter.connector_type'),
            config('receiptprinter.connector_descriptor')
        );

        // Set store info
        $printer->setStore($mid, $store_name, $store_address, $store_phone, $store_email, $store_website);

        // Add items
        foreach ($items as $item) {
            $printer->addItem(
                $item['name'],
                $item['qty'],
                $item['price']
            );
        }
        // Set tax
        $printer->setTax($tax_percentage);

        // Calculate total
        $printer->calculateSubTotal();
        $printer->calculateGrandTotal();

        // Set transaction ID
        $printer->setTransactionID($transaction_id);

        // Set qr code
        $printer->setQRcode([
            'tid' => $transaction_id,
        ]);

        // Print receipt
        $printer->printReceipt();

        //make item array empty again
        $items = array();
        $cart = array();
    }
}