<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DietType;
use Illuminate\Http\Request;

class DietController extends Controller
{
    public function index()
    {
        $diets = DietType::withCount('diseases')->get();
        return view('admin.diets.index', compact('diets'));
    }

    public function create()
    {
        return view('admin.diets.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'pantangan' => 'required|string',
            'explanation' => 'required|string',
        ]);

        DietType::create($request->all());

        return redirect()->route('admin.diets.index')->with('success', 'Jenis diet berhasil ditambahkan.');
    }

    public function edit(DietType $diet)
    {
        return view('admin.diets.form', compact('diet'));
    }

    public function update(Request $request, DietType $diet)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'pantangan' => 'required|string',
            'explanation' => 'required|string',
        ]);

        $diet->update($request->all());

        return redirect()->route('admin.diets.index')->with('success', 'Jenis diet berhasil diperbarui.');
    }

    public function destroy(DietType $diet)
    {
        if ($diet->diseases()->count() > 0) {
            return back()->with('error', 'Tidak dapat menghapus diet yang masih memiliki penyakit terkait.');
        }
        $diet->delete();
        return redirect()->route('admin.diets.index')->with('success', 'Jenis diet berhasil dihapus.');
    }
}
