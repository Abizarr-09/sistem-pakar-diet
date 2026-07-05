<?php

namespace Database\Seeders;

use App\Models\DietType;
use Illuminate\Database\Seeder;

class DietTypeSeeder extends Seeder
{
    public function run(): void
    {
        $diets = [
            [
                'name' => 'Diet Rendah Garam',
                'description' => 'Diet yang membatasi asupan natrium untuk mengontrol tekanan darah dan mengurangi beban pada ginjal. Dianjurkan bagi penderita hipertensi dan gangguan ginjal.',
                'pantangan' => 'Makanan asin (ikan asin, telur asin, sayur asin), makanan olahan (sosis, nugget, kornet, ham), makanan kaleng, keripik asin, saus kemasan, kecap, tauco, makanan cepat saji, mentega, keju.',
                'explanation' => 'Diet Rendah Garam direkomendasikan karena penyakit yang Anda derita berkaitan dengan tekanan darah tinggi atau gangguan fungsi ginjal. Pembatasan natrium bertujuan mengurangi retensi cairan, menurunkan tekanan darah, dan mencegah pembengkakan (edema) pada tubuh.'
            ],
            [
                'name' => 'Diet DM (Diabetes Mellitus)',
                'description' => 'Pola makan khusus untuk mengontrol kadar gula darah dengan mengatur jumlah dan jenis karbohidrat yang dikonsumsi serta memilih makanan dengan indeks glikemik rendah.',
                'pantangan' => 'Gula pasir, gula merah, sirup, madu berlebihan, kue manis, dodol, nasi putih dalam jumlah besar, roti putih, kentang, minuman bersoda, es krim, susu kental manis, buah kalengan, alkohol.',
                'explanation' => 'Diet DM direkomendasikan karena Anda memiliki gangguan metabolisme gula darah. Pengaturan asupan karbohidrat dan pemilihan makanan rendah indeks glikemik membantu menjaga kadar gula darah tetap stabil dan mencegah komplikasi diabetes.'
            ],
            [
                'name' => 'Diet Jantung',
                'description' => 'Pola makan yang dirancang untuk mengurangi risiko penyakit kardiovaskular dengan membatasi lemak jenuh, kolesterol, dan natrium serta meningkatkan asupan serat dan lemak sehat.',
                'pantangan' => 'Makanan tinggi lemak jenuh (daging berlemak, kulit ayam, jeroan), makanan digoreng, santan kental, mentega, margarin, kue-kue manis, makanan cepat saji, keripik, minuman bersoda, alkohol.',
                'explanation' => 'Diet Jantung direkomendasikan karena Anda memiliki kondisi yang berkaitan dengan gangguan pembuluh darah jantung atau kadar kolesterol tinggi. Pola makan ini bertujuan menurunkan kadar kolesterol jahat (LDL), mengurangi beban kerja jantung, dan mencegah penyempitan pembuluh darah.'
            ],
            [
                'name' => 'Diet Rendah Protein',
                'description' => 'Diet yang membatasi asupan protein untuk mengurangi beban kerja ginjal dalam menyaring limbah nitrogen. Ditujukan bagi penderita gangguan ginjal kronis.',
                'pantangan' => 'Daging merah (sapi, kambing), jeroan, telur berlebihan, ikan, udang, cumi, tahu, tempe dalam jumlah besar, kacang-kacangan, susu full cream, keju, produk olahan kedelai berlebihan.',
                'explanation' => 'Diet Rendah Protein direkomendasikan karena penyakit ginjal yang Anda derita mengganggu kemampuan ginjal dalam menyaring limbah protein. Pembatasan protein bertujuan mengurangi penumpukan urea dan kreatinin dalam darah, sehingga memperlambat progresivitas kerusakan ginjal.'
            ],
            [
                'name' => 'Diet Rendah Purin',
                'description' => 'Diet yang membatasi asupan purin untuk mengontrol kadar asam urat dalam darah dan mencegah serangan gout (radang sendi).',
                'pantangan' => 'Jeroan (hati, ginjal, otak, babat), makanan laut (kerang, udang, kepiting, sarden, teri), daging merah berlebihan, bebek, angsa, alkohol (terutama bir), ragi, kaldu daging kental, emping, durian.',
                'explanation' => 'Diet Rendah Purin direkomendasikan karena Anda memiliki kadar asam urat tinggi dalam darah. Membatasi makanan tinggi purin membantu mengurangi produksi asam urat, mencegah pembentukan kristal pada sendi, dan mengurangi risiko serangan gout yang menyakitkan.'
            ],
        ];

        foreach ($diets as $diet) {
            DietType::create($diet);
        }
    }
}
