<?php

namespace App\Http\Controllers;

use App\Store;
use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\Storage;
use App\log;
use Illuminate\Support\Facades\Http;
class StoreController extends Controller
{
    public function index(){
        $stores = Store::orderBy('id', 'ASC')->get();
        return $stores;
    }

    public function create(Request $request){
        $this->validate($request, [
            'name' => ['required'],
        ]);
        $name = $request->name;
        $store = new Store();
        $store->name = $name;
        $store->save();
        return  'Tienda agrgada satisfactoriamente';
    }

    public function get($id){
        $store = Store::findOrFail($id);
        $products = Product::where('store_id', $id)->orderBy('id', 'DESC')->get();
        foreach($products as $product) {
            $image = Storage::disk('public')->get($product->image_path);
            $image_base64 = base64_encode($image);
            $product->image_path = $image_base64;
        }
        //datos para log
        $log = new log();
        $log->ip = $_SERVER['REMOTE_ADDR'];
        $log->type_service = 'GET';
        $log->controler = 'StoreControler';
        $log->store_id = $id;
        $log->save();

        return response()->json(['products' => $products, 'store' => $store]);
    }
}
