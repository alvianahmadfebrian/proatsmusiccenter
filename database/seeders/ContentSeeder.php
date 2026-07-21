<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Profile;
use App\Models\Timeline;
use App\Models\Service;
use App\Models\Product;
use App\Models\Program;
use App\Models\Documentation;
use App\Models\ContactSetting;

class ContentSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Profile
        Profile::create([
            'tag' => 'Profil Perusahaan',
            'title' => 'Profil Singkat CV. Proats Indonesia',
            'description' => "CV. PROATS INDONESIA adalah sebuah perusahaan (home industry) yang bergerak dalam bidang produksi dan distributor alat-alat musik.\n\nBerdiri sejak 1970 yang sebelumnya bernama UD. AS yang berlokasi di Jalan Jenderal Sudirman No. 29 Kaliwadas, Bumiayu, Jawa Tengah.\n\nMemiliki Office Representative yang berlokasi di Jl. Mercedes Benz Komplek Villa Asri 1 Blok I No. 10-11 Cicadas, Gunung Putri, Kab. Bogor - Jawa Barat.\n\nTelah terdaftar secara resmi dalam sistem Administrasi Badan Usaha yang diterbitkan oleh Kementerian Hukum dan Hak Asasi Manusia dan telah memperpanjang izin badan usaha dengan Nomor Induk Berusaha (NIB) 0311210016087 yang telah ditandatangani oleh Menteri Investasi/Kepala Badan Koordinasi Penanaman Modal.\n\nMemiliki pekerja yang profesional dan menciptakan alat musik berkualitas tinggi, sehingga dapat melayani permintaan pasar lokal bahkan luar negeri.",
            'image' => 'assets/images/profile_drum.jpg',
            'legal_nib' => '0311210016087',
            'legal_kemenkumham' => 'Kemenkumham RI Approved',
            'legal_bkpm' => 'Standar BKPM'
        ]);

        // 2. Timeline
        $timelines = [
            [
                'year' => '1970',
                'title' => 'Didirikan sebagai UD. AS',
                'description' => 'Memulai langkah pertama di Jl. Jend. Sudirman No. 29, Kaliwadas, Bumiayu, Jawa Tengah. Fokus pada pembuatan alat musik tradisional dan marching sederhana.',
                'order' => 1
            ],
            [
                'year' => '2010',
                'title' => 'Modernisasi & Ekspansi',
                'description' => 'Mulai memproduksi alat musik modern tiup (wind & brass) dan merambah pasar instrumen studio band dengan meningkatkan akurasi nada dan ketahanan bahan.',
                'order' => 2
            ],
            [
                'year' => '2020',
                'title' => 'Kantor Representative Bogor',
                'description' => 'Membuka perwakilan resmi di Jl. Mercedes Benz Komplek Villa Asri 1 Blok I No. 10-11, Cicadas, Gunung Putri, Bogor untuk lebih dekat melayani pasar Jabodetabek dan distribusi nasional.',
                'order' => 3
            ],
            [
                'year' => 'Kini',
                'title' => 'CV. Proats Indonesia',
                'description' => 'Terdaftar resmi di Kemenkumham RI dengan NIB legal, aktif menyediakan instrumen berkualitas tinggi bagi instansi sekolah (SIPLah), studio, dan musisi profesional.',
                'order' => 4
            ]
        ];
        foreach ($timelines as $t) {
            Timeline::create($t);
        }

        // 3. Services
        $services = [
            [
                'icon' => 'fas fa-tools',
                'title' => 'Reparasi & Service',
                'description' => 'Perbaikan instrumen musik marching, brass, hingga tradisional oleh teknisi ahli berpengalaman.',
                'order' => 1
            ],
            [
                'icon' => 'fas fa-sync-alt',
                'title' => 'Tukar Tambah',
                'description' => 'Tukarkan alat musik lama Anda dengan unit baru yang berkualitas lebih prima.',
                'order' => 2
            ],
            [
                'icon' => 'fas fa-cog',
                'title' => 'Sparepart Lengkap',
                'description' => 'Penyediaan suku cadang orisinal untuk menjamin kualitas suara instrumen Anda tetap maksimal.',
                'order' => 3
            ],
            [
                'icon' => 'fas fa-graduation-cap',
                'title' => 'Kepelatihan Musik',
                'description' => 'Program pelatihan khusus untuk unit marching band, grup perkusi, hingga aransemen musik.',
                'order' => 4
            ],
            [
                'icon' => 'fas fa-calendar-alt',
                'title' => 'Marching Organizer',
                'description' => 'Penyelenggara event, kompetisi, dan manajemen parade marching band tingkat regional & nasional.',
                'order' => 5
            ]
        ];
        foreach ($services as $s) {
            Service::create($s);
        }

        // 4. Products
        $products = [
            [
                'category' => 'marching',
                'title' => 'Drum Marching Band',
                'image' => 'assets/images/marching_drum.png',
                'features' => "Snare Drum HTS Premium\nBass Drum Ultra-Resonant\nTrio/Quarto/Quint Perkusi\nCymbals High-Grade",
                'order' => 1
            ],
            [
                'category' => 'brass',
                'title' => 'Wind & Wood Instrument',
                'image' => 'assets/images/brass_instrument.png',
                'features' => "Terompet Brass Gold/Chrome\nTrombone Presisi Tinggi\nMellophone & Baritone\nTuba Mewah",
                'order' => 2
            ],
            [
                'category' => 'studio',
                'title' => 'Music Studio Band',
                'image' => 'assets/images/studio_band.png',
                'features' => "Drum Kit Akustik & Elektrik\nGitar Elektrik & Bass\nKeyboard & Synthesizer\nAmplifikasi Studio",
                'order' => 3
            ],
            [
                'category' => 'traditional',
                'title' => 'Traditional Instrument',
                'image' => 'assets/images/traditional_instrument.png',
                'features' => "Angklung Bambu Pilihan\nKendang Kayu Nangka\nGamelan Perunggu/Kuningan\nRebana & Alat Hadroh",
                'order' => 4
            ]
        ];
        foreach ($products as $p) {
            Product::create($p);
        }

        // 5. Programs
        $programs = [
            [
                'num' => '01',
                'icon' => 'fas fa-drum',
                'title' => 'Drum & Marching Band',
                'description' => 'Pembinaan ekstrakurikuler sekolah, penyusunan aransemen display, dan pelatihan teknis perkusi lapangan secara intensif.',
                'perks' => "Pelatih Berlisensi\nKurikulum Terstruktur",
                'order' => 1
            ],
            [
                'num' => '02',
                'icon' => 'fas fa-guitar',
                'title' => 'Orchestra & Indie Band',
                'description' => 'Aransemen simfoni, pelatihan band indie, manajemen panggung, dan bimbingan harmonisasi musik ansambel.',
                'perks' => "Bimbingan Komposisi\nWorkshop Performans",
                'order' => 2
            ],
            [
                'num' => '03',
                'icon' => 'fas fa-music',
                'title' => 'Traditional Band Music',
                'description' => 'Pelestarian alat musik tradisional daerah melalui edukasi angklung interaktif dan grup gamelan sekolah/komunitas.',
                'perks' => "Pelatihan Guru & Siswa\nAransemen Etnik-Modern",
                'order' => 3
            ],
            [
                'num' => '04',
                'icon' => 'fas fa-microphone-alt',
                'title' => 'Recording Music',
                'description' => 'Studio tracking, mixing, mastering profesional untuk single, jingle instansi, musik mars sekolah, dan produksi komersial.',
                'perks' => "Sound Engineer Profesional\nPerlengkapan Analog & Digital",
                'order' => 4
            ],
            [
                'num' => '05',
                'icon' => 'fas fa-volume-up',
                'title' => 'Sound Installation',
                'description' => 'Perancangan, instalasi, dan kalibrasi sistem tata suara (sound system) untuk auditorium sekolah, studio, aula ibadah, dan gedung pertemuan.',
                'perks' => "Analisis Akustik Ruang\nGaransi Pemasangan",
                'order' => 5
            ],
            [
                'num' => '06',
                'icon' => 'fas fa-bullhorn',
                'title' => 'Music Event Organizer',
                'description' => 'Perencanaan dan eksekusi konser musik, kejuaraan marching band, festival musik daerah, dan konser akhir tahun sekolah.',
                'perks' => "Produksi Panggung & Lighting\nEvent Concept & Promosi",
                'order' => 6
            ],
            [
                'num' => '07',
                'icon' => 'fas fa-chalkboard-teacher',
                'title' => 'Lesson & Training Music',
                'description' => 'Kursus dan pelatihan musik privat maupun grup untuk berbagai instrumen, teori musik, sight-reading, dan teknik bermain dari dasar hingga mahir.',
                'perks' => "Instruktur Berpengalaman\nPrivat & Grup Kelas",
                'order' => 7
            ]
        ];
        foreach ($programs as $pr) {
            Program::create($pr);
        }

        // 6. Documentation
        $documentations = [
            [
                'image' => 'assets/images/activity_1.jpg',
                'title' => 'Pelatihan & Pembinaan Marching Band Unit Sekolah',
                'description' => 'Program pelatihan teknik instrumen perkusif dan tiup oleh tim instruktur profesional Proats untuk unit marching band sekolah.',
                'order' => 1
            ],
            [
                'image' => 'assets/images/activity_2.jpg',
                'title' => 'Proses Fabrikasi & Tuning Presisi Workshop',
                'description' => 'Pengawasan kualitas ketat dan penyesuaian nada presisi pada setiap snare, tenor, dan bass drum sebelum pengiriman.',
                'order' => 2
            ],
            [
                'image' => 'assets/images/activity_3.jpg',
                'title' => 'Pengadaan & Penyerahan Instrumen SIPLah Sekolah',
                'description' => 'Dokumentasi penyerahan paket lengkap alat musik marching band dan tradisional melalui sistem pengadaan resmi SIPLah.',
                'order' => 3
            ],
            [
                'image' => 'assets/images/activity_4.png',
                'title' => 'Klinik Musik & Workshop Perawatan Instrumen',
                'description' => 'Kegiatan pemeliharaan berkala, servis teknis, serta workshop perawatan alat musik bersama para komposer dan pembina.',
                'order' => 4
            ],
            [
                'image' => 'assets/images/activity_5.png',
                'title' => 'Dukungan Kejuaraan & Festival Marching Band Nasional',
                'description' => 'Partisipasi dan dukungan teknis Proats Music Center dalam kejuaraan drumband dan festival seni musik nasional.',
                'order' => 5
            ],
            [
                'image' => 'assets/images/activity_6.png',
                'title' => 'Distribusi & Ekspor Produk Alat Musik',
                'description' => 'Pengemasan standar ekspor dan proses pengiriman produk ke berbagai kota di Indonesia maupun mancanegara.',
                'order' => 6
            ]
        ];
        foreach ($documentations as $d) {
            Documentation::create($d);
        }

        // 7. ContactSettings
        ContactSetting::create([
            'address_representative' => 'Jl. Mercedes Benz Komplek Villa Asri 1 Blok I No. 11-12, Cicadas, Gunung Putri, Kab. Bogor, Jawa Barat 16964',
            'address_workshop' => 'Jl. Jenderal Sudirman No. 29 Kaliwadas, Bumiayu, Jawa Tengah',
            'email' => 'info@proatsmusic.com',
            'whatsapp' => '6281290174510',
            'instagram' => 'https://www.instagram.com/proats.marchingproduct?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==',
            'facebook' => 'https://www.facebook.com/people/Proats-Marching-Persuasion/',
            'map_iframe_url' => 'https://maps.google.com/maps?q=Villa%20Asri%20Gunung%20Putri%20Bogor&t=&z=14&ie=UTF8&iwloc=&output=embed'
        ]);
    }
}
