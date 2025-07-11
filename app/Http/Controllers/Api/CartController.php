<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|integer|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        // $userId = Auth::id();
        $userId = 1;

        // Check if user exists
        $userExists = DB::table('users')->where('id', $userId)->exists();

        if (!$userExists) {
            return response()->json(['message' => 'User not found'], 404);
        }
        // Get or create cart
        $cart = DB::table('carts')
            ->where('user_id', $userId)
            ->first();

        if (!$cart) {
            $cartId = DB::table('carts')->insertGetId([
                'user_id' => $userId,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            $cart = (object)['id' => $cartId, 'user_id' => $userId];
        } else {
            $cartId = $cart->id;
        }

        // Check if product already in cart
        $existingItem = DB::table('cart_items')
            ->where('cart_id', $cartId)
            ->where('product_id', $request->product_id)
            ->first();

        if ($existingItem) {
            DB::table('cart_items')
                ->where('id', $existingItem->id)
                ->update([
                    'quantity' => $existingItem->quantity + $request->quantity,
                    'updated_at' => now(),
                ]);
        } else {
            DB::table('cart_items')->insert([
                'cart_id' => $cartId,
                'product_id' => $request->product_id,
                'quantity' => $request->quantity,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        return response()->json([
            'message' => 'Product added to cart',
            'cart' => $this->getCartDetails($cartId)
        ]);
    }

    public function get()
    {
        // $userId = Auth::id();
        $userId = 1;
        $cart = DB::table('carts')
            ->where('user_id', $userId)
            ->first();

        if (!$cart) {
            return response()->json(['cart' => null]);
        }

        return response()->json([
            'cart' => $this->getCartDetails($cart->id)
        ]);
    }

    protected function getCartDetails($cartId)
    {
        $items = DB::table('cart_items')
            ->join('products', 'cart_items.product_id', '=', 'products.id')
            ->where('cart_items.cart_id', $cartId)
            ->select([
                'cart_items.product_id',
                'products.nameOf as title',
                'products.price',
                'products.imgPath as image',
                'cart_items.quantity as quantity',
                DB::raw('tbl_cart_items.quantity * tbl_products.price as subtotal')
            ])
            ->get();

        $totalItems = $items->sum('quantity');
        $totalPrice = $items->sum('subtotal');

        return [
            'id' => $cartId,
            'total_items' => $totalItems,
            'total_price' => $totalPrice,
            'items' => $items->map(function ($item) {
                return [
                    'product_id' => $item->product_id,
                    'title' => $item->title,
                    'price' => $item->price,
                    'image' => $item->image,
                    'quantity' => $item->quantity,
                    'subtotal' => $item->subtotal,
                ];
            })
        ];
    }

    public function remove($productId)
    {
        // $userId = Auth::id();
        $userId = 1;
        $cart = DB::table('carts')
            ->where('user_id', $userId)
            ->first();

        if (!$cart) {
            return response()->json(['message' => 'Cart not found'], 404);
        }

        DB::table('cart_items')
            ->where('cart_id', $cart->id)
            ->where('product_id', $productId)
            ->delete();

        // Delete cart if empty
        $itemCount = DB::table('cart_items')
            ->where('cart_id', $cart->id)
            ->count();

        if ($itemCount === 0) {
            DB::table('carts')->where('id', $cart->id)->delete();
        }

        return response()->json([
            'message' => 'Product removed from cart',
            'cart' => $itemCount > 0 ? $this->getCartDetails($cart->id) : null
        ]);
    }
}
