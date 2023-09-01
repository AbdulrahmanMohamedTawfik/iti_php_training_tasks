<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $products = Product::get();
        return response()->json(['data' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|string|max:20|min:3',
            'price' => 'required',
            'category_id' => 'required|exists:categories,id'
        ]);
        $product = Product::create($request->all());
        return response()->json(['data' => $product]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $product = Product::find($id);
        if ($product) {
            return response()->json(['data' => $product]);
        }
        return response()->json(['message' => 'product not found']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id, Request $request)
    {
        //
        $product = Product::find($id);
        $product->update($request->except('_method', '_token'));
        return redirect()->route('product.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $product = Product::find($id);
        if ($product) {
            $product->delete();
            return response()->json(['data' => $product, 'message' => 'product deleted']);
        }
        return response()->json(['message' => 'product not found']);
    }
}
