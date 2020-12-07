<?php

namespace App\Http\Controllers;

use App\Attribute;
use App\ChildProduct;
use App\Color;
use App\Size;
use Illuminate\Http\Request;
use App\Category;
use App\Product;


class PageController extends Controller
{
    public function index() {
        $bestSeller = Product::take(8)->get();
        $products = Product::orderBy('id', 'desc')->get();
        $categories = Category::all();
        return view('page.application.index', compact('products', 'categories', 'bestSeller'));
    }
    public function search(Request $request) {
        $categories = Category::all();
        $q = $request->get('q');
        $query = Product::query();
        if ($q) {
            $query->where('name', 'like', "%$q%");
        }
        $products = $query->orderBy('id', 'desc')->paginate(3);
        return view('page.application.search', compact('q', 'products', 'categories'));
    }
    public function product() {
        $count = Product::count();
        $products = Product::paginate(9);
        $categories = Category::all();
        $colors = Color::all();
        $attributes = Attribute::all();
        return view('page.product.index', compact('products', 'categories', 'count', 'attributes', 'colors'));
    }
    public function category($id, Request $request) {
        if ($request->get('i1')) {
            foreach ($request->all() as $key => $value) {
                $color = Color::where('value', '=', $value)->first();
            }
            $childProducts = ChildProduct::where('color_id', $color->id)->get();
            $all = Product::where('category_id', $id)->get();
            $categories = Category::all();
            $category = Category::find($id);
            $productIds = [];
            foreach ($childProducts as $child) {
                foreach ($all as $p) {
                    if ($child->product_id == $p->id) {
                        $productIds[] = $p->id;
                    }
                }
            }
            $products = Product::where('category_id', $id)->whereIn('id', $productIds)->paginate(3);
            $count = $products->count();
            $colors = [];
            foreach ($all as $p) {
                foreach ($p->child_products as $child) {
                    $colors[] = $child->color;
                }
            }
            $colors = array_unique($colors);
        }
        if ($request->get('i2')) {
            foreach ($request->all() as $key => $value) {
                $size = Size::where('value', '=', $value)->first();
            }
            $childProducts = ChildProduct::where('size_id', $size->id)->get();
            $all = Product::where('category_id', $id)->get();
            $categories = Category::all();
            $category = Category::find($id);
            $productIds = [];
            foreach ($childProducts as $child) {
                foreach ($all as $p) {
                    if ($child->product_id == $p->id) {
                        $productIds[] = $p->id;
                    }
                }
            }
            $products = Product::where('category_id', $id)->whereIn('id', $productIds)->paginate(3);
            $count = $products->count();
            $sizes = [];
            foreach ($all as $p) {
                foreach ($p->child_products as $child) {
                    $sizes[] = $child->size;
                }
            }
            $sizes = array_unique($sizes);
        }
        if (!$request->all()) {
            $colors=[];
            $sizes = [];
            $count = Product::where('category_id', $id)->count();
            $products = Product::where('category_id', $id)->paginate(3);
            $category = Category::find($id);
            $categories = Category::all();
            foreach ($products as $p) {
                foreach ($p->child_products as $child) {
                    if($child->color){
                        $colors[] = $child->color;
                    }
                }
            }
            foreach ($products as $p) {
                foreach ($p->child_products as $child) {
                    if ($child->size){
                        $sizes[] = $child->size;
                    }
                }
            }
            $colors = array_unique($colors);
            $sizes = array_unique($sizes);
        }
        return view('page.product.category', compact('products', 'sizes', 'colors', 'category', 'categories', 'count'));
    }
}
