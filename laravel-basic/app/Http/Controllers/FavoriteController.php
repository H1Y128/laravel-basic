<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function index() {
        $favorite_ids = session('favorites', []);

        $products = Product::whereIn('id', $favorite_ids)->get();

        return view('favorites.index', compact('products'));
    }

    public function create() {
        $products = Product::all();
        return view('favorites.create', compact('products'));
    }

    public function store(Request $request) {
        $product_id = $request->input('product_id');
        $favorites = session('favorites', []);

        if (!in_array($product_id, $favorites)) {
            $favorites[] = $product_id;
            session(['favorites' => $favorites]);
        }

        return redirect()->route('favorites.index');
    }

    public function destroy(Request $request) {
        $favorites = session('favorites', []);
        $product_id = $request->input('product_id');

        if (($key = array_search($product_id, $favorites)) !== false) {
            unset($favorites[$key]);
            session(['favorites' => array_values($favorites)]);
        }

        return redirect()->route('favorites.index');
    }
}
