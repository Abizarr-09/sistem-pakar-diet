<?php

namespace App\Http\Controllers;

use App\Models\Diagnosis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    public function index()
    {
        $diagnoses = Diagnosis::where('user_id', Auth::id())
            ->with('diseases', 'resultDiet')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('history.index', compact('diagnoses'));
    }

    public function show(Diagnosis $diagnosis)
    {
        $this->authorize('view', $diagnosis);

        $diagnosis->load('diseases.dietType', 'resultDiet');

        return view('diagnosis.result', compact('diagnosis'));
    }
}
