<?php

namespace App\Http\Controllers;

use App\Models\ProductSells;
use App\Models\User;
use Illuminate\Http\Request;

class ProductSellsController extends Controller
{
    public function index()
    {
       $user_id = auth()->user()->id;
       return ProductSells::all();  
        
    }
 

public function store(Request $request){
    // $user_id = auth()->user()->id;
        $product = new ProductSells();
        $product->targete = $request->input('targate');
        $product->sells = $request->input('todySell');
        $product->Kpi_id=$request->input('id');

        $product->save();
             
    return response()->json('product created!');
}

}
