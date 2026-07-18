<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Hero;

class HeroSeeder extends Seeder
{
    public function run(): void
    {
        Hero::create([

            'subtitle'=>'CV. PRO ATS INDONESIA',

            'tagline'=>'Produsen & Distributor Alat Musik',

            'title'=>'Suara Presisi, Kualitas Abadi',

            'description'=>'CV. Proats Indonesia adalah industri rumahan profesional yang bergerak di bidang produksi dan distribusi alat musik berkualitas tinggi sejak 1970.',

            'button1'=>'Jelajahi Produk',

            'button2'=>'Tentang Kami',

            'image'=>null,

            'stat1'=>'50+ Tahun',

            'stat2'=>'10000+ Produk',

            'stat3'=>'100% Indonesia'

        ]);
    }
}
