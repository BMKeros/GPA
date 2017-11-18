<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Inventory;

class CatalogueController extends Controller
{
    public function index()
    {
        $inventory = Inventory::where('status_id', 1)->get();

        return view('catalogue.index', compact('inventory'));
    }

    public function show($product)
    {
    	$inventory = Inventory::where('slug', $product)->firstOrFail();

        return view('catalogue.show', ['inventory' => $inventory ]);
    }
}
