<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{

    public function index(){
        //
    }
    public function create(Request $request){
        //validate inf
        $this->validate($request, [
            'name' => ['required'],
            'sku' => ['required'],
            'description' => ['required'],
            'value' => ['required'],
            'image' => ['image'],
        ]);
        //get data of frontend
        $name = $request->name;
        $sku = $request->sku;
        $description = $request->description;
        $value = $request->value;
        $image = $request->image;
        $store_id = $request->store_id;
        //get image and save name-file
        $image_path = time() . $image->getClientOriginalName();
        $image_save = File::get($image);
        Storage::disk('public')->put($image_path, $image_save);
        //created object and sabe in database
        $product = new Product();
        $product->name = $name;
        $product->sku = $sku;
        $product->description = $description;
        $product->value = $value;
        $product->image_path = $image_path;
        $product->store_id = $store_id;
        $product->save();
        return $image;

    }

    public function store(Request $request)
    {
        //
    }

    public function show(Product $product)
    {
        //
    }


    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
