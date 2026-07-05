<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Disease;
use App\Models\DietType;
use Illuminate\Http\Request;

class DiseaseController extends Controller
{
    public function index()
    {
        $diseases = Disease::with('dietType')->orderBy('weight', 'desc')->get();
        return view('admin.diseases.index', compact('diseases'));
    }

    public function create()
    {
        $diets = DietType::all();
        return view('admin.diseases.form', compact('diets'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'weight' => 'required|integer|min:1|max:100',
            'diet_type_id' => 'required|exists:diet_types,id',
        ]);

        Disease::create($request->all());

        return redirect()->route('admin.diseases.index')->with('success', 'Penyakit berhasil ditambahkan.');
    }

    public function edit(Disease $disease)
    {
        $diets = DietType::all();
        return view('admin.diseases.form', compact('disease', 'diets'));
    }

    public function update(Request $request, Disease $disease)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'weight' => 'required|integer|min:1|max:100',
            'diet_type_id' => 'required|exists:diet_types,id',
        ]);

        $disease->update($request->all());

        return redirect()->route('admin.diseases.index')->with('success', 'Penyakit berhasil diperbarui.');
    }

    public function destroy(Disease $disease)
    {
        $disease->delete();
        return redirect()->route('admin.diseases.index')->with('success', 'Penyakit berhasil dihapus.');
    }
}
