<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Kpi;
use App\Models\ProductSells;
class KpiController extends Controller
{
    
    public function index(){ 
        $user_id = auth()->user()->id;
        $res_p = Kpi::all();
        return response()->Json($res_p);
    }
    
    public function store(Request $request){
        $user_id = auth()->user()->id;
        $addNewKpi = new Kpi();
        $addNewKpi->name = $request->input('name');
        $addNewKpi->discription = $request->input('discription');
        $addNewKpi->targate = $request->input('targate');
        $addNewKpi->user_id = $user_id;
        $addNewKpi->save();
    }

    public function show($kpiid){
        //return Kpi::where('id' , $kpiid )->get()->toJson();
        $product = Kpi::find($kpiid);
        return response()->json($product);
    }
    public function destroy ($id){ 
        $prod = Kpi::find($id);
        $prod->delete();
        return response()->json('KPI delleted');
    }
    
}
