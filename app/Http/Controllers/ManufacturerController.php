<?php

namespace App\Http\Controllers;

use App\Models\Manufacturer;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule as ValidationRule;

class ManufacturerController extends Controller
{
    public function index()
    {
        $manufacturers = Manufacturer::all();
        return view('SetupModule.Manufacturers.index', compact('manufacturers'));
    }

    public function create()
    {
        return view('SetupModule.Manufacturers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:manufacturers',
            // Add other validation rules based on the fields
        ]);

        Manufacturer::create($request->all());

        return redirect()->route('manufacturers.index')->with('success', 'Manufacturer created successfully.');
    }

    public function edit(Manufacturer $manufacturer)
    {
        return view('SetupModule.Manufacturers.edit', compact('manufacturer'));
    }

    public function update(Request $request, Manufacturer $manufacturer)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                ValidationRule::unique('manufacturers')->ignore($manufacturer->id),
            ],
            // Add other validation rules based on the fields
        ]);

        $manufacturer->update($request->all());

        return redirect()->route('manufacturers.index')->with('success', 'Manufacturer updated successfully.');
    }

    public function destroy(Manufacturer $manufacturer)
    {
        $manufacturer->delete();

        return redirect()->route('manufacturers.index')->with('success', 'Manufacturer deleted successfully.');
    }

}
