<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Inventory;
use App\Category;
use App\Unit;
use Validator;

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
        $inventory = Inventory::all();


        return view('admin.inventory.index', compact('inventory'));
    }

    public function create()
    {
        $inventory = null;
        $products = Product::all();
        $units = Unit::all();
        return view('admin.inventory.create', ['inventory' => $inventory], compact('products', 'units'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'quantity' => 'required|numeric',
            'status' => 'required|not_in:0',
            'unit' => 'required|not_in:0',
            'product' => 'required|not_in:0',


        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $product_exist = Inventory::where('product_id', $data['product'])->first();

        if (!is_null($product_exist)){

            $product_exist->quantity_available = $product_exist->quantity_available + $data['quantity'];
            $product_exist->save();
            return redirect()->route('inventory.index')->with('success', "Producto {$product_exist->product->name} Marca {$product_exist->product->brand} Actualizado con exito al inventario!");
        }
        else{
            $product = Product::findOrFail($data['product']);
            $slug = $product->slug;
            $inventory = Inventory::create([
                'status_id' => $data['status'],
                'product_id' => $data['product'],
                'unit_id' => $data['unit'],
                'slug' => $slug,
                'quantity_available' => $data['quantity'],
            ]);

            return redirect()->route('inventory.index')->with('success', "Producto {$product->name} Marca {$product->brand} Agregado con exito al inventario!");
        }


    }

    public function edit(Inventory $inventory)
    {
        $products = Product::all();
        $units = Unit::all();


        return view('admin.inventory.create', ['inventory' => $inventory
            ], compact('products', 'units'));
    }

    public function update(Request $request, Inventory $inventory)
    {

        $this->validate(request(),[
            'quantity' => 'required|numeric',
            'status' => 'required|not_in:0',
            'unit' => 'required|not_in:0',
            'product' => 'required|not_in:0',
        ]);

        $product = Product::findOrFail($request->product);
        $slug = $product->slug;

        $inventory->product_id = $request->product;
        $inventory->quantity_available = $request->quantity;
        $inventory->status_id = $request->status;
        $inventory->unit_id = $request->unit;
        $inventory->slug = $slug;
        $inventory->save();

        return redirect()->route('inventory.index')->with('success', "Producto {$product->name} Marca {$product->brand} Actualizado con exito!");

    }
    public function destroy(Inventory $inventory)
    {

        $inventory->delete();

        
        return redirect()->route('inventory.index');
    }

}
