<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class MajorCategoryController extends Controller
{
    public function index()
    {
        $data = DB::table('major_categories')
        ->where('is_active','Y')
        ->get();
        
        Log::info($data);

        return response()->json(['status'=> true, 'data'=>$data]);
    }
}
