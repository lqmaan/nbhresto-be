<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\voucher;

class voucherController extends Controller
{

    // voucher_id varchar(255) NOT NULL,
    // voucher_name varchar(255) NOT NULL,
    // voucher_exp TIMESTAMP,
    // voucher_status varchar(255) NOT NULL,
    // voucher_type varchar(255) NOT NULL,
    // voucher_amount float,
    // min_order float,
    // max_amount float,
    //
    public function getAllVouchers(){
        return response()->json(voucher::all(), 200);
    }


    public function insertNewVoucher(Request $request){
        $new_voucher = new voucher;
        $new_voucher->product_id = generateRandomString();
        $new_voucher->product_name = $request -> product_name;
        $new_prod->product_category = $request -> product_category;
        $new_prod->product_image = $request -> product_image;
        $new_prod->product_stock = $request -> product_stock;
        $new_prod->product_price = $request -> product_price;
        $new_prod->product_opt = $request -> product_opt == '' ? $request -> product_opt : null ;
        $new_prod->save();
        return response()->json([
            'status' => 'OK',
            'message' => 'Insert New Product Successfull',
            'data' => $new_prod
        ],200);
    }

    public function updateProduct(Request $request){
        $check_prod = product::firstWhere('product_id',$request-> product_id);
        if($check_prod){
        $edit_prod = product::where('product_id', $request-> product_id)->first();
        $edit_prod->product_name = $request -> product_name;
        $edit_prod->product_category = $request -> product_category;
        $edit_prod->product_image = $request -> product_image;
        $edit_prod->product_stock = $request -> product_stock;
        $edit_prod->product_price = $request -> product_price;
        $edit_prod->product_opt = $request -> product_opt == '' ? $request -> product_opt : "{}" ;
        $edit_prod->update();
        return response()->json([
            'status' => 'OK',
            'message' => 'Update Product Successfull',
            'data' => $edit_prod
        ],200);
        }
        else{
            return response()->json([
                'status' => 'Not Found',
                'message' => `Product doesn't exist`,
            ], 404);
        }       
    }

    public function deleteProduct($prod_id){
        $check_prod = product::firstWhere('product_id', $prod_id);
        if($check_prod){
            product::destroy($prod_id);
            return response()->json([
                'status' => 'OK',
                'message' => 'Delete Product Successfull',
            ], 200);
        }
        else{
            return response()->json([
                'status' => 'Not Found',
                'message' => `Product doesn't exist`
            ]);
        }
    }
}
