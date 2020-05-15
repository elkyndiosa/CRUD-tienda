<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ProductController extends Controller{
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

    }
    public function edit(Request $request){
        //validate inf
        $this->validate($request, [
            'name' => ['required'],
            'sku' => ['required'],
            'description' => ['required'],
            'value' => ['required'],
        ]);
        //get data of frontend
        $id = $request->id;
        $name = $request->name;
        $sku = $request->sku;
        $description = $request->description;
        $value = $request->value;
        $product = Product::findOrFail($id);
        if($request->image != ''){
            $image = $request->image;
            $image_path = time() . $image->getClientOriginalName();
            $image_save = File::get($image);
            Storage::disk('public')->put($image_path, $image_save);
            $image_prev = $request->image_prev;
            Storage::delete($image_prev);
            $product->image_path = $image_path;
        }
        $product->name = $name;
        $product->sku = $sku;
        $product->description = $description;
        $product->value = $value;
        $product->update();
    }
    public function delete($id){
        $product = Product::findOrFail($id);
        $product->delete();
    }
    public function getProduct($id){
        $product = Product::findOrFail($id);
        if(isset($product)){
            return response()->json(['product' => $product]);
        }
    }
}
