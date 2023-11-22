<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ManageCategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'thumb_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('thumb_img')) {
            $image = $request->file('thumb_img');
            $imageName = 'Category_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images', $imageName);
            $validatedData['thumb_img'] = $imageName;
        }

        Category::create($validatedData);

        return redirect()
            ->route('category')
            ->with('success', 'Category created successfully.');
    }

    public function edit($id)
    {
        $category = Category::where('id', $id)->first();
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'thumb_img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('thumb_img')) {
            $image = $request->file('thumb_img');
            $imageName = 'Category_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images', $imageName);
            $validatedData['thumb_img'] = $imageName;
        }

        $validatedData['name'] = $request->input('name');

        $category->update($validatedData);

        return redirect()
            ->route('category')
            ->with('success', 'Category updated successfully.');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        File::delete('public/images' . $category->thumb_img);
        $category->delete();

        return redirect()
            ->route('category')
            ->with('success', 'Category deleted successfully.');
    }
}
