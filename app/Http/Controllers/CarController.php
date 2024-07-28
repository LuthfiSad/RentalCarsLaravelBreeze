<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $cars = Car::orderBy('updated_at', 'desc')->paginate(10);
        return view('cars.index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('cars.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $currentYear = date('Y');
        $request->validate([
            'name' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'year' => "required|integer|digits:4|min:1000|max:$currentYear",
            'license_plate' => 'required|string|max:10',
            'rental_price_per_day' => 'required|numeric|min:500000',
            'status' => 'required|string|in:available,not available',
            'image' => 'image|file|max:3072|nullable',
            'description' => 'nullable|string',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        $car = new Car([
            'name' => $request->input('name'),
            'model' => $request->input('model'),
            'year' => $request->input('year'),
            'license_plate' => $request->input('license_plate'),
            'rental_price_per_day' => $request->input('rental_price_per_day'),
            'status' => $request->input('status'),
            'image' => $imagePath,
            'description' => $request->input('description'),
        ]);

        $car->save();

        return redirect()->route('cars.index')->with('success', 'Car created successfully');
    }


    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        //
        return view('cars.show', compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        //
        return view('cars.edit', compact('car'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Car $car)
    {
        // Validasi data input
        $currentYear = date('Y');
        $request->validate([
            'name' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'year' => "required|integer|digits:4|min:1000|max:$currentYear",
            'license_plate' => 'required|string|max:10',
            'rental_price_per_day' => 'required|numeric|min:500000',
            'status' => 'required|string|in:available,not available',
            'image' => 'image|file|max:3072|nullable',
            'description' => 'nullable|string',
        ]);

        $car->name = $request->input('name');
        $car->model = $request->input('model');
        $car->year = $request->input('year');
        $car->license_plate = $request->input('license_plate');
        $car->rental_price_per_day = $request->input('rental_price_per_day');
        $car->status = $request->input('status');
        $car->description = $request->input('description');

        if ($request->hasFile('image')) {
            if ($request->oldImage) {
                Storage::delete('public/' . $request->oldImage);
            }
            $imagePath = $request->file('image')->store('images', 'public');
            $car->image = $imagePath;
        }

        // Simpan perubahan
        $car->save();

        return redirect()->route('cars.index')->with('success', 'Car updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        //
        if ($car->image) {
            Storage::delete('public/' . $car->image);
        }
        $car->delete();
        return redirect()->route('cars.index');
    }
}
