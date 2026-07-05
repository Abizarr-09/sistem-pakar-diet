<?php

namespace Database\Seeders;

use App\Models\Disease;
use Illuminate\Database\Seeder;

class DiseaseSeeder extends Seeder
{
    public function run(): void
    {
        $diseases = [
            // R01 - Diet Rendah Garam (ID: 1)
            [
                'name' => 'Hipertensi',
                'description' => 'Kondisi tekanan darah tinggi kronis (>= 140/90 mmHg) yang meningkatkan risiko penyakit jantung, stroke, dan kerusakan ginjal.',
                'weight' => 60,
                'diet_type_id' => 1,
            ],
            [
                'name' => 'Edema Ginjal',
                'description' => 'Pembengkakan pada tubuh akibat penumpukan cairan yang disebabkan oleh gangguan fungsi ginjal dalam mengatur keseimbangan cairan dan elektrolit.',
                'weight' => 85,
                'diet_type_id' => 1,
            ],

            // R02 - Diet DM (ID: 2)
            [
                'name' => 'Diabetes Mellitus',
                'description' => 'Gangguan metabolisme kronis yang ditandai dengan kadar gula darah tinggi akibat gangguan produksi atau fungsi insulin.',
                'weight' => 70,
                'diet_type_id' => 2,
            ],
            [
                'name' => 'Kencing Manis',
                'description' => 'Istilah umum untuk diabetes melitus yang ditandai dengan tingginya kadar glukosa dalam darah dan urine, sering disertai sering buang air kecil dan haus berlebihan.',
                'weight' => 70,
                'diet_type_id' => 2,
            ],

            // R03 - Diet Jantung (ID: 3)
            [
                'name' => 'Jantung Koroner',
                'description' => 'Penyempitan pembuluh darah koroner akibat penumpukan plak kolesterol, mengurangi aliran darah kaya oksigen ke otot jantung.',
                'weight' => 75,
                'diet_type_id' => 3,
            ],
            [
                'name' => 'Gagal Jantung',
                'description' => 'Kondisi dimana jantung tidak mampu memompa darah secara efektif ke seluruh tubuh, menyebabkan kelelahan, sesak napas, dan penumpukan cairan.',
                'weight' => 80,
                'diet_type_id' => 3,
            ],
            [
                'name' => 'Kolesterol Tinggi',
                'description' => 'Kondisi kadar kolesterol total dan LDL (kolesterol jahat) dalam darah melebihi batas normal, meningkatkan risiko aterosklerosis dan penyakit jantung.',
                'weight' => 50,
                'diet_type_id' => 3,
            ],

            // R04 - Diet Rendah Protein (ID: 4)
            [
                'name' => 'Gangguan Ginjal Kronik',
                'description' => 'Penurunan fungsi ginjal secara progresif dan ireversibel yang berlangsung lebih dari 3 bulan, ditandai dengan penurunan laju filtrasi glomerulus.',
                'weight' => 95,
                'diet_type_id' => 4,
            ],
            [
                'name' => 'Gagal Ginjal',
                'description' => 'Tahap akhir dari penyakit ginjal kronis dimana ginjal kehilangan hampir seluruh kemampuannya untuk menyaring limbah dan kelebihan cairan dari darah.',
                'weight' => 95,
                'diet_type_id' => 4,
            ],

            // R05 - Diet Rendah Purin (ID: 5)
            [
                'name' => 'Asam Urat',
                'description' => 'Peradangan sendi akut yang disebabkan oleh penumpukan kristal asam urat, ditandai dengan nyeri hebat, bengkak, dan kemerahan pada sendi.',
                'weight' => 40,
                'diet_type_id' => 5,
            ],
            [
                'name' => 'Hiperuresemia',
                'description' => 'Kondisi dimana kadar asam urat dalam darah melebihi batas normal, yang dapat memicu terbentuknya kristal asam urat di sendi dan jaringan tubuh.',
                'weight' => 40,
                'diet_type_id' => 5,
            ],
        ];

        foreach ($diseases as $disease) {
            Disease::create($disease);
        }
    }
}
