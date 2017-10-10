<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use App\Categories;
use App\Units;

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
        $products = Products::all();
        return view('admin.inventory.create', compact('products'));
    }

}
