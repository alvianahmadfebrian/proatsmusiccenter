<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use App\Models\Profile;
use App\Models\Timeline;
use App\Models\Service;
use App\Models\Product;
use App\Models\Program;
use App\Models\Documentation;
use App\Models\ContactSetting;

class HomeController extends Controller
{
    public function index()
    {
        $hero = Hero::first() ?? new Hero([
            'subtitle' => 'CV. PRO ATS INDONESIA',
            'tagline' => 'Produsen & Distributor Alat Musik',
            'title' => 'Suara Presisi,<br>Kualitas Abadi',
            'description' => 'CV. Proats Indonesia adalah industri rumahan profesional yang bergerak di bidang produksi dan distribusi alat musik berkualitas tinggi sejak 1970. Kami menciptakan karya instrumen terbaik untuk kebutuhan lokal hingga pasar mancanegara.',
            'button1' => 'Jelajahi Produk',
            'button2' => 'Tentang Kami',
            'stat1' => '50+ Tahun',
            'stat2' => '10k+ Produk',
            'stat3' => '100% Indonesia'
        ]);

        $profile = Profile::first() ?? new Profile([
            'tag' => 'Profil Perusahaan',
            'title' => 'Profil Singkat CV. Proats Indonesia',
            'description' => "CV. PROATS INDONESIA adalah sebuah perusahaan (home industry) yang bergerak dalam bidang produksi dan distributor alat-alat musik.\n\nBerdiri sejak 1970 yang sebelumnya bernama UD. AS yang berlokasi di Jalan Jenderal Sudirman No. 29 Kaliwadas, Bumiayu, Jawa Tengah.\n\nMemiliki Office Representative yang berlokasi di Jl. Mercedes Benz Komplek Villa Asri 1 Blok I No. 10-11 Cicadas, Gunung Putri, Kab. Bogor - Jawa Barat.",
            'legal_nib' => '0311210016087',
            'legal_kemenkumham' => 'Kemenkumham RI Approved',
            'legal_bkpm' => 'Standar BKPM'
        ]);

        $contact = ContactSetting::first() ?? new ContactSetting([
            'address_representative' => 'Jl. Mercedes Benz Komplek Villa Asri 1 Blok I No. 11-12, Cicadas, Gunung Putri, Kab. Bogor, Jawa Barat 16964',
            'address_workshop' => 'Jl. Jenderal Sudirman No. 29 Kaliwadas, Bumiayu, Jawa Tengah',
            'email' => 'info@proatsmusic.com',
            'whatsapp' => '6285216160770',
            'instagram' => 'https://instagram.com',
            'facebook' => 'https://facebook.com',
            'map_iframe_url' => 'https://maps.google.com/maps?q=Villa%20Asri%20Gunung%20Putri%20Bogor&t=&z=14&ie=UTF8&iwloc=&output=embed'
        ]);

        return view('home', [
            'hero' => $hero,
            'profile' => $profile,
            'timelines' => Timeline::orderBy('order')->get(),
            'services' => Service::orderBy('order')->get(),
            'products' => Product::orderBy('order')->get(),
            'programs' => Program::orderBy('order')->get(),
            'documentations' => Documentation::orderBy('order')->get(),
            'contact' => $contact,
        ]);
    }
}
