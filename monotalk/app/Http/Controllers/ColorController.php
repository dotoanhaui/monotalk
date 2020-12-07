<?php

namespace App\Http\Controllers;

use App\Attribute;
use App\Color;
use Validator;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function index(){

        $colors = Color::orderBy('id', 'desc')->paginate(5);
        return view('admin.color.index', compact('colors'));
    }
    public function create(){
        $attributes = Attribute::all();
        return view('admin.color.create', compact('attributes'));
    }
    public function store(Request $request){
        $data = $request->all();
        $validator = Validator::make($data,
            [
                'name' => 'required|min:2',
                'value' => 'required|min:2',
                'content' => 'required|min:2',
            ], [
                'name.required' => 'Bạn chưa nhập tên',
                'name.min' => 'Tên có ít nhất 2 kí tự',
                'value.required' => 'Bạn chưa nhập value',
                'value.min' => 'Tên có ít nhất 2 kí tự',
                'content.required' => 'Bạn chưa nhập code',
                'content.min' => 'Code có ít nhất 2 kí tự'
            ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $color = new Color();
        $name = $request->get('name');
        $value = $request->get('value');
        $content = $request->get('content');
        $attribute = $request->get('attribute');
        $color->name = $name;
        $color->value = $value;
        $color->content = $content;
        $color->attribute_id = $attribute;
        $color->save();

        return redirect()->route('color.create')->with('thongbao','thêm thành công');
    }
    public function edit($id) {
        $color = Color::find($id);
        $attributes = Attribute::all();
        return view('admin.color.edit', compact('color', 'attributes'));
    }
    public function update(Request $request, $id) {
        $data = $request->all();
        $validator = Validator::make($data,
            [
                'name' => 'required|min:2',
                'value' => 'required|min:2',
                'content' => 'required|min:2',
            ], [
                'name.required' => 'Bạn chưa nhập tên',
                'name.min' => 'Tên có ít nhất 2 kí tự',
                'value.required' => 'Bạn chưa nhập value',
                'value.min' => 'Tên có ít nhất 2 kí tự',
                'content.required' => 'Bạn chưa nhập code',
                'content.min' => 'Code có ít nhất 2 kí tự'
            ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $name = $request->get('name');
        $value = $request->get('value');
        $content = $request->get('content');
        $attribute = $request->get('attribute');
        $color = Color::find($id);
        $color->name = $name;
        $color->value = $value;
        $color->content = $content;
        $color->attribute_id = $attribute;
        $color->save();
        return redirect()->route('color.index');
    }
    public function destroy($id) {
        $color = Color::find($id);
        $color->delete();
        return redirect()->route('color.index');
    }
    public function show() {

    }
}
