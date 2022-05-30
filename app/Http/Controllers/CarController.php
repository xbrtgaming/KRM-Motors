<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    public function findcar()
    {
        return view('home.findcar');
    }

    public function car()
    {
        $car = Car::all();
        return view('dashboard.car.index', compact('car'));
    }

    public function car_add(Request $request)
    {
        $request->validate([
            'type' => 'required',
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
            'price' => $request->price,
            'year' => $request->year,
            'range' => $request->range,
            'specification' => $request->specification,
            'category' => $request->category,
            'status' => $request->status,
            'image' => Storage::putFile('car', new File($request->file('image'))),
        ];

        Car::create($data);
        return redirect()->back();
    }

    public function car_detail($id)
    {
        $car = Car::find($id);
        return view('dashboard.car.detail', compact('car'));
    }

    public function search_date(Request $request)
    {
        $request->validate([
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $status = "sold";

        $car = Car::whereBetween('created_at', [$start_date, $end_date])->get();
        return view('dashboard.car.date', compact('car'));
    }

    public function print(Request $request)
    {
        $request->validate([
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $status = "sold";

        $car = Car::whereBetween('created_at', [$start_date, $end_date])->get();
        return view('dashboard.car.print', compact('car'));
    }
}
