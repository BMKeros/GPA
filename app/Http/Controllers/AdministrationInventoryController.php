<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Unit;

class AdministrationInventoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    public function index()
    {
        return view('admin.inventory.index');
    }

    public function create()
    {
        $products = Product::all();
        return view('admin.inventory.create', compact('products'));
    }

}
