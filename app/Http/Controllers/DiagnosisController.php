<?php

namespace App\Http\Controllers;

use App\Models\Disease;
use App\Models\Diagnosis;
use App\Services\ForwardChainingService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiagnosisController extends Controller
{
    public function index()
    {
        $diseases = Disease::with('dietType')->orderBy('weight', 'desc')->get();
        return view('diagnosis.index', compact('diseases'));
    }

    public function process(Request $request)
    {
        $request->validate([
            'diseases' => 'required|array|min:1',
            'diseases.*' => 'exists:diseases,id',
        ]);

        $service = new ForwardChainingService($request->diseases);
        $result = $service->run();

        if ($result['diet'] === null) {
            return back()->with('error', $result['message']);
        }

        $diagnosis = Diagnosis::create([
            'user_id' => Auth::id(),
            'result_diet_id' => $result['diet']->id,
            'result_diet_name' => $result['diet']->name,
            'result_description' => $result['diet']->description,
            'result_pantangan' => $result['diet']->pantangan,
            'result_explanation' => $result['diet']->explanation,
        ]);

        $diagnosis->diseases()->attach($request->diseases);

        return redirect()->route('diagnosis.result', $diagnosis->id);
    }

    public function result(Diagnosis $diagnosis)
    {
        $this->authorize('view', $diagnosis);

        $diagnosis->load('diseases.dietType', 'resultDiet');

        $service = new ForwardChainingService($diagnosis->diseases->pluck('id')->toArray());
        $result = $service->run();

        return view('diagnosis.result', compact('diagnosis', 'result'));
    }
}
