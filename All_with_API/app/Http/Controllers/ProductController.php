<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    function index()
    {
        $products = Product::get();
        return view('product.index', ['products' => $products]);
    }
    function show($id)
    {
        $product = Product::find($id);
        return view('product.show', compact('product'));
    }
    function destroy($id)
    {
        $product = Product::find($id);
        Storage::delete('images/' . $product->product_picture);
        $product->delete();
        return redirect()->route('product.index');
    }
    function update($id)
    {
        $product = Product::find($id);
        return view('product.update', compact('product'));
    }

    function edit(Request $request, $id)
    {
        $product = Product::find($id);
        Storage::delete('images/' . $product->product_picture);
        $image = $request->file('product_picture');
        $image_name = time() . '.' . $image->getClientOriginalExtension();
        $image->move('images', $image_name);

        $product->update($request->except('_method', '_token'));
        DB::table('products')->where('product_id', $product->product_id)->update([
            'product_picture' => $image_name
        ]);
        return redirect()->route('product.index');
    }

    public function store(Request $request)
    {
        $image = $request->file('product_picture');
        $image_name = time() . '.' . $image->getClientOriginalExtension();
        $image->move('images', $image_name);

        $product = Product::create($request->all());
        DB::table('products')->where('product_id', $product->product_id)->update([
            'product_picture' => $image_name
        ]);
        return redirect()->route('product.index');
    }
}
