<?php

namespace App\Http\Controllers;

use App\Store;
use Illuminate\Http\Request;
use App\Product;
class StoreController extends Controller
{
    public function index(){
        $stores = Store::orderBy('id', 'DESC')->get();
        return $stores;
    }

    public function create(Request $request){
        $name = $request->name;
        $store = new Store();
        $store->name = $name;
        $store->save();
        return  'Tienda agrgada satisfactoriamente';
    }

    public function get($id){
        $store = Store::findOrFail($id);
        $products = Product::where('store_id', $id)->orderBy('id', 'DESC')->get();
        return response()->json(['products' => $products, 'store' => $store]);
    }

    public function edit(Store $store)
    {
        //
    }

    public function update(Request $request, Store $store)
    {
        //
    }

    public function destroy(Store $store)
    {
        //
    }
}
