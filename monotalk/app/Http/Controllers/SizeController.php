<?php

namespace App\Http\Controllers;

use App\Attribute;
use App\Size;
use Validator;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    public function index() {
        $sizes = Size::orderBy('id', 'desc')->paginate(5);
        return view('admin.size.index', compact('sizes'));
    }
    public function create() {
        $attributes = Attribute::all();
        return view('admin.size.create', compact('attributes'));
    }
    public function store(Request $request) {
        $data = $request->all();
        $validator = Validator::make($data, [
            'name' => 'required|min:1',
            'value' => 'required',
        ], [
            'name.required' => 'Bạn chưa nhập tên',
            'name.min' => 'Tên chứa ít nhất 1 ký tự',
            'value.required' => 'Bạn chưa nhập value',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $name = $request->get('name');
        $value = $request->get('value');
        $attribute = $request->get('attribute');
        $size = new Size();
        $size->name = $name;
        $size->value = $value;
        $size->attribute_id = $attribute;
        $size->save();
        return redirect()->route('size.create');
    }
    public function edit($id) {
        $size = Size::find($id);
        $attributes = Attribute::all();
        return view('admin.size.edit', compact('size', 'attributes'));
    }
    public function update(Request $request, $id) {
        $data = $request->all();
        $validator = Validator::make($data, [
            'name' => 'required|min:1',
            'value' => 'required',
        ], [
            'name.required' => 'Bạn chưa nhập tên',
            'name.min' => 'Tên chứa ít nhất 1 ký tự',
            'value.required' => 'Bạn chưa nhập value',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $name = $request->get('name');
        $value = $request->get('value');
        $attribute = $request->get('attribute');
        $size = Size::find($id);
        $size->name = $name;
        $size->value = $value;
        $size->attribute_id = $attribute;
        $size->save();
        return redirect()->route('size.index');
    }
    public function destroy($id) {
        $size = Size::find($id);
        $size->delete();
        return redirect()->route('size.index');
    }
    public function show() {

    }
}
