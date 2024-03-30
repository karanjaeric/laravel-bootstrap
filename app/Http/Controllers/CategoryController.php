<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('category.index', compact('categories'));
    }

    public function create()
    {
        return view('category.create');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'string|required|max:255',
            'code' => 'string|required|max:50|unique:categories,code',
            'description' => 'string|required|max:255',
            'image' => 'nullable|mimes:jpg,png,jpeg,webp',
            'is_active' => 'sometimes'
        ]);

        if ($request->hasFile("image")) {
            $fileUploadPath = "images/categories/";
            $file = $request->file("image");
            $extention = $file->getClientOriginalExtension();
            $fileName = time() . "." . $extention;
            $file->move($fileUploadPath, $fileName);
        }

        Category::create(
            [
                'name' => $request->name,
                'code' => $request->code,
                'description' => $request->description,
                'image' => $fileUploadPath . $fileName,
                'is_active' => $request->is_active == true ? 1 : 0,

            ]
        );

        return redirect('categories/create')->with('status', 'Category Created Successfully');
    }

    public function edit(int $id)
    {
        $category = Category::findOrFail($id);
        return view('category.edit', compact('category'));



    }

    public function update(Request $request, int $id)
    {
        $this->validate($request, [
            'name' => 'string|required|max:255',
            'description' => 'string|required|max:255',
            'image' => 'required|mimes:jpg,png,jpeg,webp',
            'is_active' => 'sometimes'
        ]);
        $category = Category::findOrFail($id);
        if ($request->hasFile("image")) {
            $fileUploadPath = "images/categories/";
            $file = $request->file("image");
            $extention = $file->getClientOriginalExtension();
            $fileName = time() . "." . $extention;
            if (File::exists($category->image)) {
                File::delete($category->image);
            }
            $file->move($fileUploadPath, $fileName);
        }
        $category->update(
            [
                'name' => $request->name,
                'code' => $request->code,
                'description' => $request->description,
                'image' => $fileUploadPath.$fileName,
                'is_active' => $request->is_active == true ? 1 : 0
            ]
        );
        return redirect('categories')->with('status', 'Category Updated Successfully');


    }

    public function destroy(int $id)
    {
        Category::findOrFail($id)->delete();
        return redirect('categories')->with('status', 'Category Deleted Successfully');
    }

}
