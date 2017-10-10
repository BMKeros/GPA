<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class CatalogueController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('catalogue.index', compact('products'));
    }

    public function show($product)
    {
    	$product = Product::where('slug', $product)->firstOrFail();

        return view('catalogue.show', ['product' => $product ]);
    }
}
