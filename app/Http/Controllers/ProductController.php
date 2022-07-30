<?php

namespace App\Http\Controllers;

use App\Imports\ProductImport;
use App\Product;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index');
    }


    public function fetch_data(Request $request){
        if($request->ajax()){
            $item_name=$request->item_name;
            // return $item_name;
            $item_value=$request->item_value;
            switch ($item_name) {
                case $item_name=='item':
                    $data = Product::where('item','LIKE','%'.$item_value.'%')->get();
                    break;
                case $item_name=='quantity':
                    $data = Product::where('quantity','LIKE','%'.$item_value.'%')->get();
                    break;
                case $item_name=='article_no':
                    $data = Product::where('article_no','LIKE','%'.$item_value.'%')->get();
                    break;
                case $item_name=='shipment_date':
                    $data = Product::where('shipment_date','LIKE','%'.$item_value.'%')->get();
                    break;
                case $item_name=='revise_date':
                    $data = Product::where('revise_date','LIKE','%'.$item_value.'%')->get();
                    break;
                case $item_name=='production_unit':
                    $data = Product::where('production_unit','LIKE','%'.$item_value.'%')->get();
                    break;
                case $item_name=='fabric_ref':
                    $data = Product::where('fabric_ref','LIKE','%'.$item_value.'%')->get();
                    break;
                case $item_name=='dye_factory':
                    $data = Product::where('dye_factory','LIKE','%'.$item_value.'%')->get();
                    break;
                case $item_name=='pp_status':
                    $data = Product::where('pp_status','LIKE','%'.$item_value.'%')->get();
                    break;
                case $item_name=='fab_status':
                    $data = Product::where('fab_status','LIKE','%'.$item_value.'%')->get();
                    break;
                case $item_name=='acc_status':
                    $data = Product::where('acc_status','LIKE','%'.$item_value.'%')->get();
                    break;
                case $item_name=='prod_status':
                    $data = Product::where('prod_status','LIKE','%'.$item_value.'%')->get();
                    break;
                default:
                    $data = Product::orderBy('id', 'ASC')->get();
                    break;
            }
            
            return response()->json($data);

        }
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if($request->ajax()){
            $data = array(
                $request->column_name       =>  $request->column_value
            );
            Product::where('id',$request->id)->update($data);
        }
    }


}
