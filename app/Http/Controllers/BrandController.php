<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    public function brand()
    {
        $data = [
            'brand' => Brand::all(),
        ];

        return view('dashboard.brand.index', $data);
    }

    public function brand_add(Request $request)
    {
        $request->validate([
            'brand' => 'required|unique:brands',
        ]);

        Brand::create([
            'brand' => $request->brand,
        ]);

        $toast = [
            'type' => 'success',
            'title' => 'Success',
            'message' => 'New brand has been added',
        ];

        return redirect()->back()->with($toast);
    }

    public function brand_delete($id)
    {
        Brand::find($id)->delete();

        $toast = [
            'type' => 'success',
            'title' => 'Success',
            'message' => 'Brand has been removed',
        ];

        return redirect()->back()->with($toast);
    }
}
