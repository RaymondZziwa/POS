<?php

namespace App\Http\Controllers;

use App\Http\Controllers;
use charlieuki\ReceiptPrinter\ReceiptPrinter as ReceiptPrinter;

class PrintController extends Controller
{


    public function addmerch($MerchandiseName,$MerchandisePrice){
        $cart = array();
        $items = array(
            'name'=> $MerchandiseName,
            'price'=> $MerchandisePrice
        );
        $cart.array_push($item);
    }


    public function test($cart)
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
        $items = $cart;

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