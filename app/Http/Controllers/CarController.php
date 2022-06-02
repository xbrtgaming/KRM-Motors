<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Brand;
use App\Models\Message;
use App\Models\Category;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    public function car()
    {
        $data = [
            'car' => Car::all(),
            'brand' => Brand::all(),
            'category' => Category::all()
        ];
        return view('dashboard.car.index', compact('data'));
    }

    public function car_add(Request $request)
    {
        $request->validate([
            'type' => 'required',
            'brand' => 'required',
            'price' => 'required',
            'year' => 'required',
            'range' => 'required',
            'specification' => 'required',
            'category' => 'required',
            'status' => 'required',
            'image' => 'required',
        ]);

        $data = [
            'type' => $request->type,
            'brand' => $request->brand,
            'price' => $request->price,
            'year' => $request->year,
            'range' => $request->range,
            'specification' => $request->specification,
            'category' => $request->category,
            'status' => $request->status,
            'image' => Storage::putFile('car', new File($request->file('image'))),
        ];

        Car::create($data);

        $toast = [
            'title' => 'Success',
            'message' => 'New car has been added',
            'type' => 'success',
        ];

        return redirect()->back()->with($toast);
    }

    public function car_detail($id)
    {
        $data = [
            'car' => Car::find($id),
            'count' => Message::where('order', $id)->count(),
        ];
        return view('dashboard.car.detail', $data);
    }

    public function print(Request $request)
    {
        $request->validate([
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        $start_date = $request->start_date;
        $end_date = $request->end_date;

        $data = [
            'car' => Car::whereBetween('created_at', [$start_date, $end_date])->where('status', 'sold')->get(),
            'status' => Car::whereBetween('created_at', [$start_date, $end_date])->where('status', 'sold')->count(),
            'price' => Car::whereBetween('created_at', [$start_date, $end_date])->sum('price'),
        ];

        return view('dashboard.car.print', compact('data'));
    }

    public function car_edit($id)
    {
        $data = [
            'cars' => Car::find($id),
            'brands' => Brand::all(),
            'categories' => Category::all(),
        ];
        return view('dashboard.car.edit', $data);
    }

    public function car_update(Request $request, $id)
    {
        $request->validate([
            'type' => 'required',
            'brand' => 'required',
            'price' => 'required',
            'year' => 'required',
            'range' => 'required',
            'specification' => 'required',
            'category' => 'required',
            'status' => 'required',
        ]);

        $data = [
            'type' => $request->type,
            'brand' => $request->brand,
            'price' => $request->price,
            'year' => $request->year,
            'range' => $request->range,
            'specification' => $request->specification,
            'category' => $request->category,
            'status' => $request->status,
            'image' => $request->image,
        ];

        if ($request->hasFile('image')) {
            $image = Car::find($id);
            Storage::delete($image->image);
            $data['image'] = Storage::putFile('car', new File($request->file('image')));
        } else {
            $image = Car::find($id);
            $data['image'] = $image->image;
        }

        Car::where('id', $id)->update($data);

        $toast = [
            'title' => 'Success',
            'message' => 'Car has been updated',
            'type' => 'success',
        ];

        return redirect()->route('car')->with($toast);
    }

    public function car_delete($id)
    {
        $image = Car::find($id);
        Storage::disk('public')->delete($image->image);

        Car::find($id)->delete();

        $toast = [
            'title' => 'Success',
            'message' => 'Car has been removed',
            'type' => 'success',
        ];
        return redirect()->back()->with($toast);
    }
}
