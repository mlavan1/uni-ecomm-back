<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $data = DB::table('tbl_products')
        ->get();
        return response()->json(['status'=> true, 'data'=>$data]);
    }
    
    public function allElectronicProducts()
    {
        $data = DB::table('products')
        ->where('main_category_id',1)
        ->get();
        return response()->json(['status'=> true, 'data'=>$data]);
    }
}
