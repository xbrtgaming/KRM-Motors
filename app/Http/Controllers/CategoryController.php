<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function category()
    {
        $data = [
            'category' => Category::all(),
        ];

        return view('dashboard.category.index', $data);
    }

    public function category_add(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories',
        ]);

        $data = [
            'name' => $request->name,
        ];

        Category::create($data);

        $toast = [
            'title' => 'Success',
            'message' => 'New category has been added',
            'type' => 'success',
        ];

        return redirect()->back()->with($toast);
    }

    public function category_delete($id)
    {
        Category::find($id)->delete();
        $toast = [
            'title' => 'Success',
            'message' => 'Category has been removed',
            'type' => 'success',
        ];

        return redirect()->back()->with($toast);
    }
}
