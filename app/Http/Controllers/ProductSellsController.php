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
        $product->datepic=$request->input('datepic');

        $product->save();
             
    return response()->json('product created!');
}
public function show($id){
    $specShow = ProductSells::where('Kpi_id', $id)->get();
    return response()->json($specShow);
}

public function destroy($id){ 
    $prod = ProductSells::find($id);
    $prod->delete();
    return response()->json('KPI Data delleted');
}

}
