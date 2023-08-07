<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category;

class categoryController extends Controller
{
    //
    public function getAllCategory(){
        return response()->json(category::all(), 200);
    }


    public function insertNewCategory(Request $request){
        $new_category = new category;
        $d = 'A0008';

        for ($n=0; $n<6; $n++) {
            echo ++$d;
        }
        $new_category->category_id = generateRandomString(6);
        $new_category->category_name = $request -> category_name;
        $new_category->category_category = $request -> category_category;
        $new_category->category_image = $request -> category_image;
        $new_category->category_stock = $request -> category_stock;
        $new_category->category_price = $request -> category_price;
        $new_category->category_opt = $request -> category_opt == '' ? $request -> category_opt : null ;
        $new_category->save();
        return response()->json([
            'status' => 'OK',
            'message' => 'Insert New Category Successfull',
            'data' => $new_category
        ],200);
    }

    public function updatecategory(Request $request){
        $check_category = category::firstWhere('category_id',$request-> category_id);
        if($check_category){
        $edit_category = category::where('category_id', $request-> category_id)->first();
        $edit_category->category_name = $request -> category_name;
        $edit_category->category_category = $request -> category_category;
        $edit_category->category_image = $request -> category_image;
        $edit_category->category_stock = $request -> category_stock;
        $edit_category->category_price = $request -> category_price;
        $edit_category->category_opt = $request -> category_opt == '' ? $request -> category_opt : "{}" ;
        $edit_category->update();
        return response()->json([
            'status' => 'OK',
            'message' => 'Update category Successfull',
            'data' => $edit_category
        ],200);
        }
        else{
            return response()->json([
                'status' => 'Not Found',
                'message' => `Category doesn't exist`,
            ], 404);
        }       
    }

    public function deletecategory($category_id){
        $check_category = category::firstWhere('category_id', $category_id);
        if($check_category){
            category::destroy($category_id);
            return response()->json([
                'status' => 'OK',
                'message' => 'Delete Category Successfull',
            ], 200);
        }
        else{
            return response()->json([
                'status' => 'Not Found',
                'message' => `Category doesn't exist`
            ]); 
        }
    }
}
