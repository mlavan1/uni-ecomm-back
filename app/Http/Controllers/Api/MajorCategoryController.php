<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\URL;

class MajorCategoryController extends Controller
{
    public function index()
    {
        $data = DB::table('major_categories')
        ->where('is_active','Y')
        ->get();

        return response()->json(['status'=> true, 'data'=>$data]);
    }

    public function all_categories()
    {
        $data = DB::table('major_categories')
            ->leftJoin('products', 'major_categories.id', '=', 'products.mainCategory_id')
            ->select('major_categories.id', 'major_categories.name_of', DB::raw('COUNT(tbl_products.id) as product_count'))
            ->groupBy('major_categories.id', 'major_categories.name_of')
            ->where('is_active', 'Y')
            ->get();

        //Log::info(json_encode($data));
        return response()->json(['status' => true, 'data' => $data]);
    }

    public function getTopEightCategories(){
        $data = DB::table('major_categories')
        ->where('is_active','Y')
        ->orderBy('name_of', 'desc')->take(12)->get();

        $data->transform(function($item){
            $item->img_path = URL::to('storage/images/demos/demo-13/cats/' . basename($item->img_path));
            return $item;
        });
        return response()->json(['status'=> true, 'data'=>$data]);

      }


}
