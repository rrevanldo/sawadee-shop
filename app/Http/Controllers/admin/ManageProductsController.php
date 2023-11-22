<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class ManageProductsController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->get();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validatedProduct = $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'thumb_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('thumb_img')) {
            $image = $request->file('thumb_img');
            $imageName = 'Product_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images', $imageName);
            $validatedProduct['thumb_img'] = $imageName;
        }

        Product::create($validatedProduct);

        return redirect()->route('product')->with('success', 'Product created successfully.');
    }

    public function edit($id)
    {
        $product = Product::where('id', $id)->first();
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
    
        $validatedProduct = $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'thumb_img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // return dd($request->all(), $product, $validatedProduct);
    
        if ($request->hasFile('thumb_img')) {
            $image = $request->file('thumb_img');
            $imageName = 'Product_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images', $imageName);
            $validatedProduct['thumb_img'] = $imageName;
        }
    
        $product->update($validatedProduct);
    
        return redirect()->route('product')->with('success', 'Product updated successfully.');
    }
    

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        File::delete('public/images' . $product->thumb_img);
        $product->delete();

        return redirect()->route('product')->with('success', 'Product deleted successfully.');
    }
}
