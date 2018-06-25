<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->paginate(6);

        return view('products.products', compact('products'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'product_name' => 'required',
            'product_info' => 'required',
            'product_price'=> 'required',
        ]);

        $products = new Product;

        $products->product_name = request('product_name');
        $products->product_info = request('product_info');
        $products->product_price = request('product_price');

        // Handle file upload

        //Cover Image for the product

        if($request->hasFile('images')) {
            // Get file name with extension
            $fileNameWithExt = $request->file('images')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Get just extension
            $extension = $request->file('images')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            // Upload image
            $path = $request->file('images')->storeAs('public/images', $fileNameToStore);
        }

        if($request->hasFile('images')){
            $products->images = $fileNameToStore;
        }


        // First Image of the product

        if($request->hasFile('images2')) {
            // Get file name with extension
            $fileNameWithExt = $request->file('images2')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Get just extension
            $extension = $request->file('images2')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            // Upload image
            $path = $request->file('images2')->storeAs('public/images', $fileNameToStore);
        }

        if($request->hasFile('images2')){
            $products->images2 = $fileNameToStore;
        }

        // Second Image of the product

        if($request->hasFile('images3')) {
            // Get file name with extension
            $fileNameWithExt = $request->file('images3')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Get just extension
            $extension = $request->file('images3')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            // Upload image
            $path = $request->file('images3')->storeAs('public/images', $fileNameToStore);
        }

        if($request->hasFile('images3')){
            $products->images3 = $fileNameToStore;
        }

        // Third Image of the product

        if($request->hasFile('images4')) {
            // Get file name with extension
            $fileNameWithExt = $request->file('images4')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Get just extension
            $extension = $request->file('images4')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            // Upload image
            $path = $request->file('images4')->storeAs('public/images', $fileNameToStore);
        }

        if($request->hasFile('images4')){
            $products->images4 = $fileNameToStore;
        }

        $products->save();


        flash()->overlay('Your product is added!', 'Thank you!');

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);

        return view('products.show', compact('product'));

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
        $products = Product::find($id);

        // Delete Cover Image
        if($products->images != null){
            //Delete image from folder storage/images
            Storage::delete('public/images/'.$products->images);
        }

        //Delete First Image of the Product
        if($products->images2 != null){
            //Delete image from folder storage/images
            Storage::delete('public/images/'.$products->images2);
        }

        //Delete Second Image of the Product
        if($products->images3 != null){
            //Delete image from folder storage/images
            Storage::delete('public/images/'.$products->images3);
        }

        //Delete Third Image of the Product
        if($products->images4 != null){
            //Delete image from folder storage/images
            Storage::delete('public/images/'.$products->images4);
        }




        $products->delete();


        flash()->overlay('Product is deleted.', 'Warning!');


        return back();
    }



    public function adminProducts(){

        $products = Product::latest()->paginate(6);

        return view('products.admin', compact('products'));

    }


}
