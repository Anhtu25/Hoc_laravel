<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; // Dùng để sử lý file
class ProductController extends Controller
{
    public function listProducts(){
       $products =  Product::paginate(10);
       return view('admin.product.listProduct', compact('products'));
    }

    public function addProducts(){
        return view('admin.product.add-product');
    }
    public function addPostProducts(Request $req){
        $imageUrl ='';
        if($req->hasFile('imageProduct')){
            $image = $req->file('imageProduct');
            $nameImage = time(). "." . $image->getClientOriginalExtension();
            $link = "imageProducts/";
            $image->move(public_path($link), $nameImage);
            $imageUrl = $link . $nameImage;
        }
        $data = [
            'name'=> $req->nameProduct,
            'product_price'=> $req->priceProduct,
            'image' => $imageUrl
        ];



        Product::create($data);
        return redirect()->route('admin.products.listProducts')->with([
            'message' => 'Thêm mới thành công'
        ]);
    }

    public function deleteProduct(Request $req){
        $product = Product::find($req->idProduct);
        if($product->image != null && $product->image != ''){
            File::delete(public_path($product->image));
        }
        $product->delete();
        return redirect()->back()->with(['message'=>'Xóa thành công']);
    }
}
