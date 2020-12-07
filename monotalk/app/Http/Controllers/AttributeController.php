<?php

namespace App\Http\Controllers;

use App\Attribute;
use App\Category;
use Validator;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    public function index(){
        $attributes = Attribute::orderBy('id', 'desc')->paginate(5);
        return view('admin.attribute.index',compact('attributes'));
    }
    public function create(){
        $categories = Category::all();
        return view('admin.attribute.create',compact('categories'));
    }
    public function store(Request $request){
        $data = $request->all();
        $validator = Validator::make($data,
        [
            'name' => 'required|min:2',
            'code' => 'required|min:2',
        ], [
            'name.required' => 'Bạn chưa nhập tên',
             'name.min' => 'Tên có ít nhất 2 kí tự',
             'code.required' => 'Bạn chưa nhập code',
             'code.min' => 'Code có ít nhất 2 kí tự'
            ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $attribute = new Attribute();
        $name = $request->get('name');
        $code = $request->get('code');
        $categories =$request->get('categories');
        $attribute->name = $name;
        $attribute->code = $code;
        $pivotData = [];
        foreach ($categories as $key => $id) {
            $pivotData[$id] = [
                'attribute_name' => $name,
                'category_name' => Category::find($id)->name,
            ];
        }
        $attribute->save();
        $attribute->categories()->attach($pivotData);
        return redirect()->route('attribute.index')->with('thongbao','Thêm thành công');
    }
    public function edit($id){
        $categories = Category::all();
        $attribute = Attribute::find($id);
        $categoryIds = $attribute->categories->pluck('id')->toArray();
        return view('admin.attribute.edit', compact('attribute', 'categories', 'categoryIds'));
    }
    public function update($id, Request $request){
        $data = $request->all();
        $validator = Validator::make($data, [
            'name' => 'required|min:2',
            'code' => 'required|min:2',
        ], [
            'name.required' => 'Name is required',
            'name.min' => 'Name must be at least 2 characters',
            'code.required' => 'Code is required',
            'code.min' => 'Code must be at least 2 characters',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $attribute = Attribute::find($id);
        $name = $request->get('name');
        $code = $request->get('code');
        $categories = $request->get('categories');
        $attribute->name = $name;
        $attribute->code = $code;
        $pivotData = [];
        foreach ($categories as $key => $id) {
            $pivotData[$id] = [
                'attribute_name' => $name,
                'category_name' => Category::find($id)->name,
            ];
        }
        $attribute->save();
        $attribute->categories()->sync($pivotData);
        return redirect()->route('attribute.index')->with('thongbao','Sửa thành công');
    }
}
