<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
{
    $products = Product::all();
    return view('products.index', compact('products'));
}

public function create()
{
    return view('products.create');
}

public function store(Request $request)
{
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'price' => 'required|numeric',
        'image' => 'required|string',
        'shop_id' => 'required|integer',
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    $product = Product::create([
        'name' => $request->input('name'),
        'price' => $request->input('price'),
        'image' => $request->input('image'),
        'shop_id' => $request->input('shop_id'),
    ]);

    return redirect()->route('products.index');
}

public function edit($id)
{
    $product = Product::find($id);
    return view('products.edit', compact('product'));
}

public function update(Request $request, $id)
{
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'price' => 'required|numeric',
        'image' => 'required|string',
        'shop_id' => 'required|integer',
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    $product = Product::find($id);
    $product->name = $request->input('name');
    $product->price = $request->input('price');
    $product->image = $request->input('image');
    $product->shop_id = $request->input('shop_id');
    $product->save();

    return redirect()->route('products.index');
}

public function destroy($id)
{
    $product = Product::find($id);
    $product->delete();

    return redirect()->route('products.index');
}
}
