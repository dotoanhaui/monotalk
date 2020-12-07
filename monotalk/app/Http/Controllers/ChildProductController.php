<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Color;
use App\Size;
use App\ChildProduct;
use App\Product;
use Auth;
use Validator;

class ChildProductController extends Controller
{
    public function index() {
        $childProducts = ChildProduct::orderBy('id', 'desc')->paginate(3);
        return view('admin.child_product.index', compact('childProducts'));
    }
    public function create() {
        $products = Product::all();
        $colors = Color::all();
        $sizes = Size::all();
        return view('admin.child_product.create', compact('products', 'colors', 'sizes'));
    }
    public function store(Request $request) {
        $data = $request->all();
        $validator = Validator::make($data, [
            'name' => 'required|min:2',
            'price' => 'required|numeric|min:1000',
            'old_price' => 'required|numeric|min:1000',
            'quantity' => 'required|numeric',
        ], [
            'name.required' => 'Bạn chưa nhập tên ',
            'name.min' => 'Tên chứa ít nhất 2 ký tự',
            'price.required' => 'Bạn chưa nhập giá tiền',
            'price.numeric' => 'Giá tiền phải là 1 số',
            'price.min' => 'Giá bắt đầu từ 1000',
            'old_price.required' => 'Bạn chưa nhập giá cũ',
            'old_price.numeric' => 'Giá cũ phải là 1 số',
            'old_price.min' => 'Giá cũ phải bắt đầu từ 1000',
            'quantity.required' => 'Bạn chưa nhập số lượng',
            'quantity.numeric' => 'Số lượng phải là 1 số',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $childProduct = new ChildProduct();
        $name = $request->get('name');
        $price = $request->get('price');
        $oldPrice = $request->get('old_price');
        $product = $request->get('product');
        $color = $request->get('color');
        $size = $request->get('size');
        $quantity = $request->get('quantity');
        $image = $request->image;
        $childProduct = new ChildProduct();
        if ($image) {
            $newFileName = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = 'upload/';
            $image->move($destinationPath, $newFileName);
            $uploadPath = $destinationPath . $newFileName;
        } else {
            $uploadPath = $childProduct->image;
        }
        $childProduct->name = $name;
        $childProduct->price = $price;
        $childProduct->old_price = $oldPrice;
        $childProduct->product_id = $product;
        $childProduct->color_id = $color;
        $childProduct->size_id = $size;
        $childProduct->quantity = $quantity;
        $childProduct->image = $uploadPath;
        $childProduct->save();
        return redirect()->route('child_product.create')->with('thongbao','Thêm thành công');
    }
    public function edit($id) {
        $products = Product::all();
        $colors = Color::all();
        $sizes = Size::all();
        $childProduct = ChildProduct::find($id);
        return view('admin.child_product.edit', compact('products', 'colors', 'sizes', 'childProduct'));
    }
    public function update($id, Request $request) {
        $data = $request->all();
        $validator = Validator::make($data, [
            'name' => 'required|min:2',
            'price' => 'required|numeric|min:1000',
            'old_price' => 'required|numeric|min:1000',
            'quantity' => 'required|numeric',
        ], [
            'name.required' => 'Bạn chưa nhập tên ',
            'name.min' => 'Tên chứa ít nhất 2 ký tự',
            'price.required' => 'Bạn chưa nhập giá tiền',
            'price.numeric' => 'Giá tiền phải là 1 số',
            'price.min' => 'Giá bắt đầu từ 1000',
            'old_price.required' => 'Bạn chưa nhập giá cũ',
            'old_price.numeric' => 'Giá cũ phải là 1 số',
            'old_price.min' => 'Giá cũ phải bắt đầu từ 1000',
            'quantity.required' => 'Bạn chưa nhập số lượng',
            'quantity.numeric' => 'Số lượng phải là 1 số',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $childProduct = ChildProduct::find($id);
        $name = $request->get('name');
        $price = $request->get('price');
        $oldPrice = $request->get('old_price');
        $product = $request->get('product');
        $color = $request->get('color');
        $size = $request->get('size');
        $quantity = $request->get('quantity');
        $image = $request->image;
        if ($image) {
            $newFileName = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = 'upload/';
            $image->move($destinationPath, $newFileName);
            $uploadPath = $destinationPath . $newFileName;
        } else {
            $uploadPath = $childProduct->image;
        }
        $childProduct->name = $name;
        $childProduct->price = $price;
        $childProduct->old_price = $oldPrice;
        $childProduct->product_id = $product;
        $childProduct->color_id = $color;
        $childProduct->size_id = $size;
        $childProduct->quantity = $quantity;
        $childProduct->image = $uploadPath;
        $childProduct->save();
        return redirect()->route('child_product.index');
    }
    public function destroy($id) {
        $childProduct = ChildProduct::find($id);
        $childProduct->delete();
        return redirect()->route('child_product.index');
    }
    public function show() {

    }
}
