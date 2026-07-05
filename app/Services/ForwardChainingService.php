<?php

namespace App\Services;

use App\Models\DietType;
use App\Models\Disease;
use Illuminate\Database\Eloquent\Collection;

class ForwardChainingService
{
    private array $selectedDiseases;
    private ?DietType $resultDiet = null;
    private array $inferenceTrace = [];

    public function __construct(array $diseaseIds)
    {
        $this->selectedDiseases = Disease::whereIn('id', $diseaseIds)
            ->with('dietType')
            ->get()
            ->toArray();
    }

    public function run(): array
    {
        if (empty($this->selectedDiseases)) {
            return [
                'diet' => null,
                'diseases' => [],
                'trace' => [],
                'message' => 'Tidak ada penyakit yang dipilih.',
            ];
        }

        usort($this->selectedDiseases, function ($a, $b) {
            return $b['weight'] <=> $a['weight'];
        });

        $topDisease = $this->selectedDiseases[0];

        $this->resultDiet = DietType::find($topDisease['diet_type_id']);

        $this->buildTrace();

        $selectedNames = array_map(function ($d) {
            return $d['name'];
        }, $this->selectedDiseases);

        return [
            'diet' => $this->resultDiet,
            'diseases' => $this->selectedDiseases,
            'top_disease' => $topDisease,
            'selected_names' => $selectedNames,
            'trace' => $this->inferenceTrace,
        ];
    }

    private function buildTrace(): void
    {
        $this->inferenceTrace[] = [
            'step' => 1,
            'action' => 'Memeriksa penyakit yang dipilih pasien',
            'detail' => 'Pasien memilih ' . count($this->selectedDiseases) . ' penyakit: ' . implode(', ', array_map(fn($d) => $d['name'], $this->selectedDiseases)),
        ];

        foreach ($this->selectedDiseases as $i => $disease) {
            $rank = $i + 1;
            $this->inferenceTrace[] = [
                'step' => $rank + 1,
                'action' => "Prioritas #{$rank}: {$disease['name']} (Bobot: {$disease['weight']})",
                'detail' => "Penyakit {$disease['name']} memiliki bobot {$disease['weight']}, terasosiasi dengan diet: {$disease['diet_type']['name']}",
            ];
        }

        $top = $this->selectedDiseases[0];
        $reason = '';

        if (count($this->selectedDiseases) > 1) {
            $reason = "Pasien memiliki lebih dari 1 penyakit. Berdasarkan perbandingan bobot, penyakit {$top['name']} memiliki bobot tertinggi ({$top['weight']}), sehingga menjadi prioritas utama dalam penentuan diet.";
        } else {
            $reason = "Pasien hanya memiliki 1 penyakit yaitu {$top['name']}, sehingga diet ditentukan berdasarkan penyakit tersebut.";
        }

        $this->inferenceTrace[] = [
            'step' => count($this->selectedDiseases) + 2,
            'action' => 'Menentukan jenis diet berdasarkan prioritas tertinggi',
            'detail' => $reason,
        ];

        $this->inferenceTrace[] = [
            'step' => count($this->selectedDiseases) + 3,
            'action' => 'Hasil akhir: ' . $this->resultDiet->name,
            'detail' => "Diet yang direkomendasikan adalah {$this->resultDiet->name} dengan penjelasan: {$this->resultDiet->explanation}",
        ];
    }
}
