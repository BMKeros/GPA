<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;



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

        $slug =  $request->name.'-'. $request->brand;
        $imageName = "image/nodisponible.jpg";

        if(isset($request->image)){
            $image = $request->image;
            $imageName = 'product_'. time() . '.' . $image->getClientOriginalExtension();
            $path = public_path() . '/images/products';
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

    
        return redirect()->route('products.index');
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

        return redirect()->route('products.index');

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
