<?php

namespace App\Http\Controllers;

use App\Models\Disease;
use App\Models\Diagnosis;
use App\Models\Patient;
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
            'rm_number' => 'required|string|max:50',
            'patient_name' => 'required|string|max:255',
            'patient_age' => 'required|integer|min:0|max:150',
            'patient_gender' => 'required|in:L,P',
            'diseases' => 'required|array|min:1',
            'diseases.*' => 'exists:diseases,id',
        ]);

        $patient = Patient::firstOrCreate(
            ['rm_number' => $request->rm_number],
            [
                'name' => $request->patient_name,
                'age' => $request->patient_age,
                'gender' => $request->patient_gender,
            ]
        );

        $service = new ForwardChainingService($request->diseases);
        $result = $service->run();

        if ($result['diet'] === null) {
            return back()->with('error', $result['message']);
        }

        $selectedDiseases = Disease::whereIn('id', $request->diseases)->with('dietType')->get();
        $secondaryInstructions = $this->generateSecondaryInstructions($selectedDiseases, $result['top_disease']);

        $diagnosis = Diagnosis::create([
            'user_id' => Auth::id(),
            'patient_id' => $patient->id,
            'result_diet_id' => $result['diet']->id,
            'result_diet_name' => $result['diet']->name,
            'result_description' => $result['diet']->description,
            'result_pantangan' => $result['diet']->pantangan,
            'result_explanation' => $result['diet']->explanation,
            'secondary_diet_instructions' => $secondaryInstructions,
        ]);

        $diagnosis->diseases()->attach($request->diseases);

        return redirect()->route('diagnosis.result', $diagnosis->id);
    }

    public function result(Diagnosis $diagnosis)
    {
        $this->authorize('view', $diagnosis);

        $diagnosis->load('diseases.dietType', 'resultDiet', 'patient');

        $service = new ForwardChainingService($diagnosis->diseases->pluck('id')->toArray());
        $result = $service->run();

        return view('diagnosis.result', compact('diagnosis', 'result'));
    }

    public function print(Diagnosis $diagnosis)
    {
        $this->authorize('view', $diagnosis);

        $diagnosis->load('diseases.dietType', 'resultDiet', 'patient', 'user');

        $service = new ForwardChainingService($diagnosis->diseases->pluck('id')->toArray());
        $result = $service->run();

        return view('diagnosis.print', compact('diagnosis', 'result'));
    }

    private function generateSecondaryInstructions($selectedDiseases, $topDisease): string
    {
        if ($selectedDiseases->count() <= 1) {
            return '';
        }

        $instructions = [];
        foreach ($selectedDiseases as $disease) {
            if ($disease->id === $topDisease['id']) continue;

            $dietName = $disease->dietType->name;
            $instructions[] = "Pasien juga terdiagnosis {$disease->name}. Terapkan prinsip {$dietName} sebagai modifikasi tambahan.";
        }

        return implode("\n", $instructions);
    }

    public function searchPatient(Request $request)
    {
        $patients = Patient::where('rm_number', 'LIKE', "%{$request->q}%")
            ->orWhere('name', 'LIKE', "%{$request->q}%")
            ->limit(10)
            ->get();
        return response()->json($patients);
    }
}
