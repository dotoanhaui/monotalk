<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Category;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::orderBy('id', 'desc')->paginate(5);
        return view('admin.category.index', compact('categories'));
    }
    public function create(){
        return view('admin.category.create', compact('categories'));
    }
    public function store(Request $request){
        $this->validate($request,
        [
            'name' =>'required|min:2|max:100'
        ],
        [
            'name.required' => 'Bạn chưa nhập tên category',
            'name.min' => 'Tên phải ít nhất 2 ký tự',
            'name.max' => 'Tên nhiều nhất 100 ký tự'
        ]);
        $category = new Category();
        $category -> name= $request-> get('name');
        $category -> save();

        return redirect()->route('category.create')->with('thongbao', 'them thanh cong');
    }
    public function destroy($id){
        $category = Category::find($id);
        $category -> delete();
        return redirect()->route('category.index')->with('thongbao', 'xóa thành công');
    }
    public function edit($id){
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
    }
    public function update(Request $request, $id){
        $this->validate($request,
            [
                'name' =>'required|min:2|max:100'
            ],
            [
                'name.required' => 'Bạn chưa nhập tên category',
                'name.min' => 'Tên phải ít nhất 2 ký tự',
                'name.max' => 'Tên nhiều nhất 100 ký tự'
            ]);
        $category = Category::find($id);
        $category -> name= $request-> get('name');
        $category -> save();

        return redirect()->route('category.index')->with('thongbao', 'Sua thanh cong');
    }
}
