<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
use App\Category;
use Validator;
class BrandController extends Controller
{
    public function index(){
        $brands = Brand::all();
        return view('admin.brand.index', compact('brands'));
    }
    public function create(){
        $categories = Category::all();
        return view('admin.brand.create', compact('categories'));
    }
    public function store(Request $request){
        $this->validate($request,
            [
                'name' =>'required|min:2|max:100'
            ],
            [
                'name.required' => 'Bạn chưa nhập tên brand',
                'name.min' => 'Tên phải ít nhất 2 ký tự',
                'name.max' => 'Tên nhiều nhất 100 ký tự'
            ]);
        $brands = new Brand();
        $brands -> name= $request-> get('name');
        $brands -> category_id = $request->category;
        $brands -> save();

        return redirect()->route('brand.create')->with('thongbao', 'Thêm thành công');
    }
    public function destroy($id){
        $brand = Brand::find($id);
        $brand->delete();
        return redirect()->route('brand.index')->with('thongbao', 'Xóa thành công');
    }
    public function edit($id){
        $category = Category::all();
        $brand = Brand::find($id);
        return view('admin.brand.edit', compact('brand','category'));
    }
    public function update(Request $request, $id){
        $this->validate($request,
            [
                'name' =>'required|min:2|max:100'
            ],
            [
                'name.required' => 'Bạn chưa nhập tên brand',
                'name.min' => 'Tên phải ít nhất 2 ký tự',
                'name.max' => 'Tên nhiều nhất 100 ký tự'
            ]);
        $brand = Brand::find($id);
        $brand -> name= $request-> get('name');
        $brand -> category_id = $request->category;
        $brand -> save();

        return redirect()->route('brand.index')->with('thongbao', 'Sua thanh cong');
    }
}
