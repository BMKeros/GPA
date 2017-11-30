<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use File;
use Validator;


class AdministrationProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        $products->each(function($products){
            $products->category;
        });
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $product = null;
        $categories = Category::all();
        return view('admin.products.create', ['product' => $product
            ], compact('categories'));
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

        $validator = Validator::make($data, [
            'name' => 'required|max:30',
            'brand' => 'required|max:30',
            'category' => 'required|not_in:0',
            'price' => 'required|numeric',
            'associated_percentage' => 'required|numeric',
            'street_percentage' => 'required|numeric',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $slug =  $request->name.'-'. $request->brand;
        $imageName = "image/nodisponible.jpg";

        if(isset($request->image)){
            $image = $request->image;
            $imageName = 'product_'. time() . '.' . $image->getClientOriginalExtension();
            $path = public_path() . '/images/products';
            if ( !File::exists($path) ) { 
                File::makeDirectory($path); 
            } 
            $image->move($path, $imageName);

        }

        $product = Product::create([
            'category_id' => $data['category'],
            'name' => $data['name'],
            'description' => $data['description'],
            'brand' => $data['brand'],
            'price' => $data['price'],
            'associated_percentage' => $data['associated_percentage'],
            'street_percentage' => $data['street_percentage'],
            'slug' => strtolower($slug),
            'image' => $imageName,
        ]);

    
        return redirect()->route('products.index')->with('success', "Producto {$product->name} Marca {$product->brand} Creado con exito!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('admin.products.show', ['product' => $product ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {

        $categories = Category::all();
        

        return view('admin.products.create', ['product' => $product
            ], compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {

        $this->validate(request(),[

            'name' => 'required|max:30',
            'brand' => 'required|max:30',
            'category' => 'required',
            'price' => 'required|not_in:0',
            'associated_percentage' => 'required',
            'street_percentage' => 'required',

        ]);


        $product->name = $request->name;
        $product->brand = $request->brand;
        $product->category_id = $request->category;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->associated_percentage = $request->associated_percentage;
        $product->street_percentage = $request->street_percentage;

        if(isset($request->image)){
            $image = $request->image;
            $imageName = 'product_'. time() . '.' . $image->getClientOriginalExtension();
            $path = public_path() . '/images/products';
            $image->move($path, $imageName);
            $product->image = $imageName;
        }

        $product->save();

 
        return redirect()->route('products.index')->with('success', "Producto {$product->name} Marca {$product->brand} Actualizado con exito!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {

        $product->delete();

        
        return redirect()->route('products.index');
    }
}
