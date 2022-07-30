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
            $data=Product::orderBy('id', 'ASC')->get();
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
