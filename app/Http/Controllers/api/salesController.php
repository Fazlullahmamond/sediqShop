<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class salesController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::all();
        if($products->count() > 0 ){
            return response()->json([
                'status' => 200,
                'products' => $products
            ], 200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'No Record Found'
            ], 200);
        }
    }
}
