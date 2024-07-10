<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{
    public function search(Request $request){
        $query = $request->input('query');
        $listProducts = DB::table('product')
            ->join('category', 'category.id', '=', 'product.category_id')
            ->select('product.id', 'product.name', 'product.price', 'product.view', 'product.category_id', 'product.create_at', 'product.update_at')
            ->where('product.name', 'like', "%{$query}%")
            ->orderBy('product.view', 'desc')
            ->get();
        return view('products/listProducts', compact('listProducts'));
    }

    public function listProducts(){
        $listProducts  = DB::table('product')
        ->join('category', 'category.id', '=', 'product.category_id')
        ->select('product.id','product.name','product.price','product.view','product.category_id','product.create_at', 'product.update_at')
        ->orderBy('product.view', 'desc')
        ->get();
        return view('products/listProducts', compact('listProducts'));
    }

    public function addProducts()
    {
        $category = DB::table('category')->select('id','name')->get();
        return view('products/addProducts', compact("category"));
    }
    public function storeProducts(Request $req){
        $data = [
            'name' => $req->nameProduct,
            'price' => $req->priceProduct,
            'view' => $req->viewProduct,
            'category_id' => $req->category,
            'create_at' => Carbon::now(),
            'update_at' =>Carbon::now(),

        ];
        DB::table('product')->insert($data);
        return redirect()->route('products.listProducts');
    }

    public function editProducts($idPro){
        $category = DB::table('category')->select('id', 'name')->get();
        $product = DB::table('product')->where('id',$idPro)->first();
        return view('products/editProducts', compact('category','product'));
    }
    public function updateProducts(Request $req){
        $data = [
            'name' => $req->nameProduct,
            'price' => $req->priceProduct,
            'view' => $req->viewProduct,
            'category_id' => $req->category,
            'update_at' =>Carbon::now(),

        ];
        DB::table('product')->where('id', $req->idPro)->update($data);
        return redirect()->route('products.listProducts');
    }

    public function delProducts($id){
        DB::table('product')
        ->where('id', $id)->delete();
        return redirect()->route('products.listProducts');
        
    }
}
