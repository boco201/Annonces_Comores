<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{Product, Ile, Identite, Category, ProductGallery};
use Illuminate\Support\Facades\Auth;

class AdminProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('category')->orderBy('id', 'DESC')->paginate(3);

        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $iles = Ile::all();
        $identites = Identite::all();

        return view('admin.products.create',compact('categories', 'iles', 'identites'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd(request()->all());
        $product = new Product();
        $product->category_id = $request->category_id;
        $product->identite_id = $request->identite_id;
        $product->ile_id = $request->ile_id;
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->user_id = Auth()->user()->id;
        $product->image('image', $product);

        if ($product->save()) {

            ProductGallery::imageGallery('imageGalleries',$product->id);
        }

        return redirect()->route('admin.products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $iles = Ile::all();
        $identites = Identite::all();

        return view('admin.products.edit',compact('categories', 'iles', 'identites', 'product'));
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
        $product->category_id = $request->category_id;
        $product->identite_id = $request->identite_id;
        $product->ile_id = $request->ile_id;
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->image('image', $product);

        if ($product->save()) {

            ProductGallery::imageGallery('imageGalleries',$product->id);
        }

        return redirect()->route('admin.products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if($product->delete()){
           ProductGallery::with('product_id')->delete();
            return redirect()->route('admin.products.index');
        }
    }

}
