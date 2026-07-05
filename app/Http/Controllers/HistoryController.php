<?php

namespace App\Http\Controllers;

use App\Models\Diagnosis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    public function index(Request $request)
    {
        $query = Diagnosis::where('user_id', Auth::id())
            ->with('diseases', 'resultDiet', 'patient');

        if ($request->filled('search')) {
            $search = $request->search;
            $query->whereHas('patient', function ($q) use ($search) {
                $q->where('rm_number', 'LIKE', "%{$search}%")
                  ->orWhere('name', 'LIKE', "%{$search}%");
            });
        }

        $diagnoses = $query->orderBy('created_at', 'desc')->paginate(10);

        return view('history.index', compact('diagnoses'));
    }
}
