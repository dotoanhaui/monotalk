<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Product;
use Validator;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products = Product::orderBy('id', 'desc')->paginate(5);
        return view('admin.product.index', compact('products'));
    }
    public function create(){
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.product.create',compact('categories','brands'));
    }
    public function store(Request $request){
        $data = $request->all();
        $validator = Validator::make($data,
        [
            'name' => 'required|min:3',
            'price' => 'required|numeric|min:1000',
            'old_price' => 'numeric|min:1000',
            'quantity' => 'required'
        ],
        [
            'name.required' => 'bạn chưa nhập tên sản phẩm',
            'name.min' => 'Tên phải có ít nhất 3 kí tự',
            'price.required' => 'Bạn chưa nhập giá sản phẩm',
            'price.numeric' => 'Giá sản phẩm phải là số',
            'price.min' => 'Giá sản phẩm phải từ 1000 trở lên',
            'old_price.numeric' => 'Giá sản phẩm phải là số',
            'old_price.min' => 'Giá sản phẩm phải từ 1000 trở lên',
            'quantity.required' => 'bạn chưa nhập số lượng'
        ]);
        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $image = $request->image;
        $product = new Product();
        if ($image) {
            $newFileName = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = 'upload/';
            $image->move($destinationPath, $newFileName);
            $uploadPath = $destinationPath . $newFileName;
        } else {
            $uploadPath = $product->image;
        }
        $product->name = $request->get('name');
        $product->price = $request->get('price');
        $product->old_price = $request->get('old_price');
        $product->category_id = $request->get('category');
        $product->brand_id = $request->get('brand');
        $product->quantity = $request->get('quantity');
        $product->image = $uploadPath;
        $product->save();
         return redirect()->route('product.create')->with('thongbao','Them thành công');
    }
}
