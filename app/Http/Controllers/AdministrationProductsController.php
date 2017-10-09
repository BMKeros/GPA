<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use App\Categories;
use App\Units;


class AdministrationProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Products::all();
        $products->each(function($products){
            $products->categories;
            $products->units;
        });
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categories::all();
        $units = Units::all();
        return view('admin.products.create', compact('categories', 'units'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();


        $units = Units::where('id', $request->units)->first();

        $slug =  $request->name.'-'. $request->brand.'-'. $request->quantity.''.$units->abbreviation;

        $imageName = "image/nodisponible.jpg";

        if(isset($request->image)){
            $image = $request->image;
            $imageName = 'product_'. time() . '.' . $image->getClientOriginalExtension();
            $path = public_path() . '/images/products';
            $image->move($path, $imageName);

        }

        $product = Products::create([
            'categories_id' => $data['category'],
            'name' => $data['name'],
            'description' => $data['description'],
            'brand' => $data['brand'],
            'price' => $data['price'],
            'units_id' => $data['units'],
            'associated_percentage' => $data['associated_percentage'],
            'street_percentage' => $data['street_percentage'],
            'quantity_available' => $data['quantity_available'],
            'quantity' => $data['quantity'],
            'slug' => strtolower($slug),
            'image' => $imageName,
        ]);

    
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        //$product = Products::findOrFail($id);
        $product = Products::where('slug', $slug)->first(); 

        return view('admin.products.show', ['product' => $product ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Products::findOrFail($id);

        $product->delete();

        
        return redirect()->route('products.index');
    }
}
