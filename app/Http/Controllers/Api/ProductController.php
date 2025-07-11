<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

class ProductController extends Controller
{
    public function index()
    {
        $products = DB::table('tbl_products')->get();
        return response()->json(['status' => true, 'data' => $products]);
    }

    public function allProducts()
    {
        $products = Product::paginate(16);
        $products->transform(function ($item) {

            $item->imgPath = URL::to('storage/images/demos/demo-13/products/' . basename($item->imgPath));
            return $item;
        });
        return response()->json(['status' => true, 'data' => $products]);
    }

    public function allElectronicProducts()
    {
        $products = DB::table('products')
            ->where('mainCategory_id', 1)
            ->get();

        $products->transform(function ($item) {

            $item->imgPath = URL::to('storage/images/demos/demo-13/products/' . basename($item->imgPath));
            return $item;
        });
        return response()->json(['status' => true, 'data' => $products]);
    }

    public function allFurnitureProducts()
    {
        $products = DB::table('products')
            ->where('mainCategory_id', 3)
            ->get();

        $products->transform(function ($item) {
            $item->imgPath = URL::to('storage/images/demos/demo-13/products/' . basename($item->imgPath));
            return $item;
        });
        return response()->json(['status' => true, 'data' => $products]);
    }

    public function allClothingProducts()
    {
        $products = DB::table('products')
            ->where('mainCategory_id', 2)
            ->get();

        $products->transform(function ($item) {

            $item->imgPath = URL::to('storage/images/demos/demo-13/products/' . basename($item->imgPath));
            return $item;
        });
        return response()->json(['status' => true, 'data' => $products]);
    }

    public function getProductById($id)
    {
        $product = DB::table('products')->where('id', $id)->first();
        $product->imgPath = URL::to('storage/images/demos/demo-13/products/' . basename($product->imgPath));
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $product->product_sub_images = DB::table('product_sub_images')
            ->where('product_id', $id)
            ->get(['id', 'img_path', 'created_at']);
        return response()->json(['data' => $product], 200);
    }

    public function filteredProducts(Request $request)
    {
        $query = DB::table('products')
            ->select('products.*')
            ->when($request->categories, fn($q) => $q->whereIn('category_id', explode(',', $request->categories)))
            ->when($request->sizes, fn($q) => $q->whereIn('size', explode(',', $request->sizes)))
            ->when($request->colors, fn($q) => $q->whereIn('color', explode(',', $request->colors)))
            ->when($request->brands, fn($q) => $q->whereIn('brand', explode(',', $request->brands)))
            ->when($request->min_price, fn($q) => $q->where('price', '>=', $request->min_price))
            ->when($request->max_price, fn($q) => $q->where('price', '<=', $request->max_price))
            ->paginate(16);

        return response()->json(['status' => true, 'data' => $query]);
    }
}
