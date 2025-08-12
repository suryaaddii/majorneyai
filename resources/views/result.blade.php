<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Rekomendasi Jurusan</title>
    @vite('resources/css/app.css')
    @vite('resource/js/app.js')

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//unpkg.com/alpinejs" defer></script>

    <link rel="icon" href="images/majorney.png">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" rel="stylesheet">

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
</head>

@include('include.navbar')

<style>
    .fade-in {
        opacity: 0;
        transform: translateY(20px);
        transition: all 0.8s ease-in-out;
    }

    .fade-in.show {
        opacity: 1;
        transform: translateY(0);
    }

    .card-hover {
        transition: all 0.3s ease;
    }

    .card-hover:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
    }

    .progress-bar {
        background: linear-gradient(90deg, #4facfe 0%, #00f2fe 100%);
        transition: width 1s ease-in-out;
    }

    .modal-backdrop {
        backdrop-filter: blur(10px);
        background: rgba(0, 0, 0, 0.7);
    }

    .glass-effect {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .gradient-text {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
</style>

<body class="flex flex-col min-h-screen">
    <div class="relative overflow-hidden">
        <!-- Background Effects -->
        <div class="absolute inset-0 bg-gradient-to-r from-blue-600/5 via-purple-600/5 to-pink-600/5"></div>
        <div
            class="absolute top-20 left-1/4 w-72 h-72 bg-gradient-to-r from-blue-400/20 to-purple-400/20 rounded-full blur-3xl animate-pulse">
        </div>
        <div class="absolute top-32 right-1/4 w-96 h-96 bg-gradient-to-r from-purple-400/15 to-pink-400/15 rounded-full blur-3xl animate-pulse"
            style="animation-delay: 1s"></div>
        <div class="container mx-auto px-6 py-12 mt-20">
            <!-- Header Section -->
            <div class="text-center mb-10 fade-in">
                <div class="inline-block p-4 bg-white rounded-full shadow-lg mb-6">
                    <i class="fas fa-graduation-cap text-4xl text-blue-600"></i>
                </div>
                <h1 class="text-3xl font-bold gradient-text mb-4">
                    Hasil Rekomendasi Jurusan
                </h1>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    Berikut adalah rekomendasi jurusan yang paling cocok berdasarkan jawabanmu.
                </p>
            </div>

            <div class="max-w-[77rem] mx-auto grid grid-cols-1 lg:grid-cols-2 gap-6 items-stretch mb-24">
                {{-- Kesimpulan --}}
                <div
                    class="flex-1 bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden hover:shadow-xl transition-all duration-300 flex flex-col justify-between">
                    <div class="relative">
                        <div class="absolute top-4 right-4">
                            <span
                                class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd" />
                                </svg>
                                Analisis AI
                            </span>
                        </div>
                        <div class="pt-6 pb-4 px-6">
                            <div class="flex items-center space-x-3 mb-4">
                                <div
                                    class="w-10 h-10 bg-gradient-to-br from-purple-500 to-pink-500 rounded-full flex items-center justify-center">
                                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="text-xl font-bold text-gray-800">Hasil Analisis AI</h4>
                                    <p class="text-sm text-gray-500">Dipersonalisasi untuk Anda</p>
                                </div>
                            </div>
                        </div>
                        <div class="px-6 pb-6">
                            <div class="bg-gray-50 rounded-xl p-5 border-l-4 border-purple-500">
                                <p class="text-gray-700 leading-relaxed">
                                    {!! nl2br($response) !!}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col h-full justify-between space-y-6">
                    <div>
                        <!-- Top 3 Jurusan -->
                        <div class="flex-1 flex flex-col justify-between">
                            <div class="space-y-6 fade-in">
                                @php
                                    arsort($scores);
                                    $top3 = array_slice($scores, 0, 3, true);
                                    $prospekKerja = [
                                        'teknik informatika' =>
                                            'Memiliki peluang luas di bidang teknologi seperti software engineer, pengembang aplikasi, data analyst, AI engineer, dan spesialis keamanan siber di berbagai industri digital.',
                                        'teknologi informasi' =>
                                            'Karier mencakup pengelolaan sistem informasi, manajemen infrastruktur jaringan, cloud computing, pengembangan aplikasi bisnis, serta profesional di bidang keamanan TI.',
                                        'rekayasa komputer' =>
                                            'Terbuka kesempatan di bidang desain dan pengembangan perangkat keras, sistem tertanam (embedded systems), arsitektur komputer, robotika, dan jaringan komputer.',
                                        'sistem informasi' =>
                                            'Lulusan dapat bekerja sebagai analis sistem, manajer proyek TI, konsultan IT, spesialis ERP, dan pengembang sistem informasi manajemen untuk organisasi.',
                                        'psikologi' =>
                                            'Prospek kerja mencakup psikolog klinis, konselor pendidikan, HRD, psikolog industri dan organisasi, peneliti perilaku manusia, serta pengembang intervensi psikologis.',
                                        'pendidikan guru sd' =>
                                            'Berpeluang menjadi guru SD profesional, pengembang kurikulum, tenaga kependidikan, edukator inklusi, hingga fasilitator pelatihan guru dan pendampingan anak usia dini.',
                                        'manajemen' =>
                                            'Lulusan siap berkarier sebagai manajer bisnis, analis pasar, konsultan manajemen, profesional HR, pengusaha, serta spesialis operasional dan strategi perusahaan.',
                                        'desain komunikasi visual' =>
                                            'Memiliki prospek sebagai desainer grafis, ilustrator, UI/UX designer, creative director, animator, dan profesional branding di industri kreatif dan media digital.',
                                        'desain produk tekstil' =>
                                            'Peluang karier di industri fashion dan tekstil sebagai desainer produk, ahli material tekstil, pengembang pola, visual merchandiser, hingga wirausahawan kreatif.',
                                    ];

                                    $detailProgram = [
                                        'teknik informatika' => [
                                            'deskripsi' =>
                                                'Teknik Informatika adalah program studi yang berfokus pada penguasaan teori, desain, pengembangan, dan implementasi sistem komputer serta perangkat lunak. Mahasiswa akan mempelajari pemrograman, struktur data, algoritma, kecerdasan buatan, keamanan siber, hingga teknologi komputasi terbaru untuk menyelesaikan permasalahan di berbagai bidang industri dan kehidupan modern.',
                                            'prospek' =>
                                                'Software Developer, Web Developer, Mobile App Developer, System Analyst, Database Administrator, IT Consultant, Cybersecurity Specialist, Data Scientist, AI/ML Engineer',
                                            'kampus' => [
                                                'Tiga Serangkai University (TSU)',
                                                'Institut Teknologi Bandung (ITB)',
                                                'Universitas Indonesia (UI)',
                                                'Institut Teknologi Sepuluh Nopember (ITS)',
                                                'Universitas Gadjah Mada (UGM)',
                                                'Universitas Bina Nusantara (Binus)',
                                                'Universitas Telkom',
                                            ],
                                        ],

                                        'teknologi informasi' => [
                                            'deskripsi' =>
                                                'Program studi yang fokus pada penerapan teknologi informasi untuk mendukung kebutuhan bisnis dan organisasi, termasuk manajemen sistem informasi dan infrastruktur IT.',
                                            'prospek' =>
                                                'IT Manager, Network Administrator, System Administrator, IT Support Specialist, Cloud Engineer, IT Project Manager, ERP Consultant, IT Auditor',
                                            'kampus' => [
                                                'Tiga Serangkai University (TSU)',
                                                'Universitas Indonesia (UI)',
                                                'Institut Teknologi Sepuluh Nopember (ITS)',
                                                'Universitas Airlangga (Unair)',
                                                'Universitas Brawijaya (UB)',
                                                'Universitas Telkom',
                                                'Universitas Multimedia Nusantara (UMN)',
                                            ],
                                        ],
                                        'rekayasa komputer' => [
                                            'deskripsi' =>
                                                'Program studi yang menggabungkan ilmu komputer dan teknik elektro untuk merancang dan mengembangkan sistem komputer, perangkat keras, dan sistem embedded.',
                                            'prospek' =>
                                                'Hardware Engineer, Embedded Systems Developer, Computer Systems Analyst, Network Engineer, Robotics Engineer, IoT Developer, Firmware Developer',
                                            'kampus' => [
                                                'Tiga Serangkai University (TSU)',
                                                'Institut Teknologi Bandung (ITB)',
                                                'Universitas Indonesia (UI)',
                                                'Institut Teknologi Sepuluh Nopember (ITS)',
                                                'Universitas Gadjah Mada (UGM)',
                                                'Universitas Telkom',
                                            ],
                                        ],
                                        'sistem informasi' => [
                                            'deskripsi' =>
                                                'Program studi yang mempelajari perancangan, pengembangan, dan pengelolaan sistem informasi untuk mendukung operasional bisnis dan pengambilan keputusan organisasi.',
                                            'prospek' =>
                                                'Business Analyst, System Analyst, Project Manager, Database Administrator, ERP Specialist, IT Consultant, Product Manager, Data Analyst',
                                            'kampus' => [
                                                'Tiga Serangkai University (TSU)',
                                                'Universitas Indonesia (UI)',
                                                'Institut Teknologi Sepuluh Nopember (ITS)',
                                                'Universitas Gadjah Mada (UGM)',
                                                'Universitas Airlangga (Unair)',
                                                'Universitas Bina Nusantara (Binus)',
                                                'Universitas Telkom',
                                            ],
                                        ],
                                        'psikologi' => [
                                            'deskripsi' =>
                                                'Program studi yang mempelajari perilaku manusia, proses mental, dan faktor-faktor yang mempengaruhi kepribadian serta hubungan interpersonal.',
                                            'prospek' =>
                                                'Psikolog Klinis, Konselor, HRD Specialist, Psikolog Pendidikan, Psikolog Industri, Terapis, Peneliti Psikologi, Psikolog Sosial',
                                            'kampus' => [
                                                'Tiga Serangkai University (TSU)',
                                                'Universitas Indonesia (UI)',
                                                'Universitas Gadjah Mada (UGM)',
                                                'Universitas Airlangga (Unair)',
                                                'Universitas Padjadjaran (Unpad)',
                                                'Universitas Katolik Indonesia Atma Jaya',
                                                'Universitas Tarumanagara',
                                            ],
                                        ],
                                        'pendidikan guru sd' => [
                                            'deskripsi' =>
                                                'Program studi yang mempersiapkan calon guru sekolah dasar dengan kompetensi pedagogik, kepribadian, sosial, dan profesional untuk mendidik anak usia sekolah dasar.',
                                            'prospek' =>
                                                'Guru Sekolah Dasar, Kepala Sekolah, Pengawas Sekolah, Tutor, Penulis Buku Anak, Konsultan Pendidikan, Peneliti Pendidikan Dasar',
                                            'kampus' => [
                                                'Tiga Serangkai University (TSU)',
                                                'Universitas Negeri Jakarta (UNJ)',
                                                'Universitas Pendidikan Indonesia (UPI)',
                                                'Universitas Negeri Yogyakarta (UNY)',
                                                'Universitas Negeri Malang (UM)',
                                                'Universitas Negeri Semarang (Unnes)',
                                                'Universitas Negeri Surabaya (Unesa)',
                                            ],
                                        ],
                                        'manajemen' => [
                                            'deskripsi' =>
                                                'Program studi yang mempelajari prinsip-prinsip pengelolaan organisasi, perencanaan strategis, kepemimpinan, dan pengambilan keputusan bisnis.',
                                            'prospek' =>
                                                'Manager, Business Development, Marketing Manager, HR Manager, Financial Analyst, Operations Manager, Consultant, Entrepreneur',
                                            'kampus' => [
                                                'Tiga Serangkai University (TSU)',
                                                'Universitas Indonesia (UI)',
                                                'Universitas Gadjah Mada (UGM)',
                                                'Institut Teknologi Bandung (ITB)',
                                                'Universitas Airlangga (Unair)',
                                                'Universitas Padjadjaran (Unpad)',
                                                'Universitas Brawijaya (UB)',
                                            ],
                                        ],
                                        'desain komunikasi visual' => [
                                            'deskripsi' =>
                                                'Program studi yang mempelajari perancangan komunikasi visual melalui media grafis, digital, dan multimedia untuk menyampaikan pesan secara efektif dan menarik.',
                                            'prospek' =>
                                                'Graphic Designer, UI/UX Designer, Art Director, Brand Designer, Illustrator, Creative Director, Motion Graphics Designer, Web Designer',
                                            'kampus' => [
                                                'Tiga Serangkai University (TSU)',
                                                'Institut Teknologi Bandung (ITB)',
                                                'Institut Seni Budaya Indonesia (ISBI)',
                                                'Universitas Trisakti',
                                                'Universitas Bina Nusantara (Binus)',
                                                'Universitas Pelita Harapan (UPH)',
                                                'Universitas Multimedia Nusantara (UMN)',
                                            ],
                                        ],
                                        'desain produk tekstil' => [
                                            'deskripsi' =>
                                                'Program studi yang mempelajari perancangan dan pengembangan produk tekstil, mulai dari desain motif, pemilihan bahan, hingga proses produksi tekstil.',
                                            'prospek' =>
                                                'Fashion Designer, Textile Designer, Product Developer, Pattern Maker, Fashion Stylist, Merchandiser, Quality Control Specialist, Fashion Entrepreneur',
                                            'kampus' => [
                                                'Tiga Serangkai University (TSU)',
                                                'Institut Teknologi Bandung (ITB)',
                                                'Universitas Negeri Jakarta (UNJ)',
                                                'Institut Seni Budaya Indonesia (ISBI)',
                                                'Universitas Trisakti',
                                                'Politeknik STTT Bandung',
                                                'Universitas Sebelas Maret (UNS)',
                                            ],
                                        ],
                                    ];

                                    $colors = ['blue', 'purple', 'indigo'];
                                    $rankings = ['Paling Cocok', 'Alternatif Terbaik', 'Pilihan Ketiga'];
                                @endphp

                                @foreach ($top3 as $major => $score)
                                    @php
                                        $color = $colors[$loop->index];
                                        $ranking = $rankings[$loop->index];
                                    @endphp
                                    <div
                                        class="card-hover bg-white rounded-2xl shadow-xl p-6 border-l-4 border-{{ $color }}-500">
                                        <div class="flex items-center justify-between">
                                            <div class="flex items-center space-x-4">
                                                <div
                                                    class="w-16 h-16 bg-gradient-to-r from-{{ $color }}-500 to-{{ $color }}-600 rounded-full flex items-center justify-center text-white text-2xl font-bold">
                                                    {{ $loop->iteration }}
                                                </div>
                                                <div>
                                                    <h3 class="text-2xl font-bold text-gray-800 capitalize">
                                                        {{ $major }}
                                                    </h3>
                                                    <p class="text-gray-600">{{ $ranking }}</p>
                                                </div>
                                            </div>
                                            <div class="text-right">
                                                <div class="text-3xl font-bold text-{{ $color }}-600">
                                                    {{ number_format($score * 100, 1) }}%</div>
                                                <div class="w-32 bg-gray-200 rounded-full h-2 mt-2">
                                                    <div class="progress-bar bg-gradient-to-r from-{{ $color }}-500 to-{{ $color }}-600 h-2 rounded-full"
                                                        style="width: {{ $score * 100 }}%"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Prospek Kerja Top 3 -->
                        <div class="max-w-4xl mx-auto my-12 fade-in">
                            <div
                                class="bg-gradient-to-r from-blue-600 via-purple-600 to-indigo-600 rounded-2xl p-8 text-white shadow-xl">
                                <h3 class="text-2xl font-bold mb-6 flex items-center">
                                    <i class="fas fa-briefcase mr-3"></i>
                                    Ringkasan Prospek Kerja & Informasi Jurusan Teratas
                                </h3>
                                <div class="grid grid-cols-1 gap-6">
                                    @foreach ($top3 as $major => $score)
                                        @php $key = strtolower($major); @endphp
                                        <div class="glass-effect rounded-xl p-4">
                                            <h4 class="font-bold mb-2 capitalize">{{ $major }}</h4>
                                            <p class="text-sm opacity-90">
                                                {{ $prospekKerja[$key] ?? 'Informasi prospek kerja belum tersedia.' }}
                                            </p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="w-full space-y-4 mt-6 fade-in">
                            <!-- Baris Atas: Lihat Detail & Cetak PDF -->
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <!-- Tombol Lihat Detail -->
                                <button onclick="showDetailModal()"
                                    class="inline-flex items-center justify-center px-4 py-5 bg-gradient-to-r from-blue-600 to-purple-600 text-white text-sm font-semibold rounded-full shadow hover:shadow-md transform hover:scale-105 transition duration-300 w-full">
                                    <i class="fas fa-info-circle mr-2"></i>
                                    Lihat Detail
                                </button>

                                <!-- Tombol Cetak PDF -->
                                <button onclick="window.print()"
                                    class="inline-flex items-center justify-center px-4 py-5 bg-gradient-to-r from-green-500 to-emerald-600 text-white text-sm font-semibold rounded-full shadow hover:shadow-md transform hover:scale-105 transition duration-300 w-full">
                                    <i class="fas fa-file-pdf mr-2"></i>
                                    Cetak PDF
                                </button>
                            </div>

                            <!-- Baris Bawah: Ulangi Quiz -->
                            <div class="w-full">
                                <a href="{{ route('quiz.index') }}"
                                    class="items-center justify-center px-4 py-4 rounded-full border border-blue-600 text-blue-600 text-sm font-semibold hover:bg-blue-600 hover:text-white transition duration-300 transform hover:scale-105 w-full sm:w-1/2 mx-auto block text-center">
                                    <i class="fas fa-redo mr-2"></i>
                                    Ulangi Quiz
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Detail Modal -->
            <div id="detailModal" class="fixed inset-0 modal-backdrop hidden z-50 items-center justify-center p-4">
                <div class="bg-white rounded-2xl shadow-2xl max-w-4xl w-full max-h-[90vh] overflow-y-auto">
                    <div class="p-6 border-b border-gray-200">
                        <div class="flex justify-between items-center">
                            <h2 class="text-3xl font-bold gradient-text">Detail Program Studi</h2>
                            <button onclick="closeDetailModal()" class="text-gray-500 hover:text-gray-700 text-2xl">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>

                    <div class="p-6 space-y-8" id="modalContent">
                        @foreach ($top3 as $major => $score)
                            @php
                                $key = strtolower($major);
                                $detail = $detailProgram[$key] ?? null;
                                $colors = ['blue', 'purple', 'indigo'];
                                $color = $colors[$loop->index];
                            @endphp

                            @if ($detail)
                                <div class="border-l-4 border-{{ $color }}-500 pl-6 mb-8">
                                    <div class="flex items-center mb-4">
                                        <div
                                            class="w-12 h-12 bg-{{ $color }}-500 rounded-full flex items-center justify-center text-white font-bold text-lg mr-4">
                                            {{ $loop->iteration }}
                                        </div>
                                        <div>
                                            <h3 class="text-2xl font-bold text-gray-800 capitalize">{{ $major }}
                                            </h3>
                                            <span
                                                class="text-{{ $color }}-600 font-semibold">{{ number_format($score * 100, 1) }}%
                                                Match</span>
                                        </div>
                                    </div>

                                    <div class="grid md:grid-cols-1 gap-6">
                                        <div class="bg-gray-50 rounded-xl p-6">
                                            <h4 class="text-lg font-bold text-gray-800 mb-3 flex items-center">
                                                <i class="fas fa-book text-{{ $color }}-500 mr-2"></i>
                                                Deskripsi Program Studi
                                            </h4>
                                            <p class="text-gray-700 leading-relaxed">{{ $detail['deskripsi'] }}</p>
                                        </div>

                                        <div class="bg-gray-50 rounded-xl p-6">
                                            <h4 class="text-lg font-bold text-gray-800 mb-3 flex items-center">
                                                <i class="fas fa-briefcase text-{{ $color }}-500 mr-2"></i>
                                                Prospek Karir
                                            </h4>
                                            <p class="text-gray-700 leading-relaxed">{{ $detail['prospek'] }}</p>
                                        </div>

                                        <div class="bg-gray-50 rounded-xl p-6">
                                            <h4 class="text-lg font-bold text-gray-800 mb-3 flex items-center">
                                                <i class="fas fa-university text-{{ $color }}-500 mr-2"></i>
                                                Rekomendasi Kampus
                                            </h4>
                                            <div class="grid md:grid-cols-2 gap-2">
                                                @foreach ($detail['kampus'] as $kampus)
                                                    <div class="flex items-center text-gray-700">
                                                        <i
                                                            class="fas fa-check-circle text-{{ $color }}-500 mr-2"></i>
                                                        {{ $kampus }}
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>

                    <div class="p-6 border-t border-gray-200 text-center">
                        <button onclick="closeDetailModal()"
                            class="px-6 py-3 bg-gradient-to-r from-blue-600 to-purple-600 text-white font-bold rounded-full hover:shadow-lg transition-all duration-300">
                            Tutup
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', () => {
                // Fade in animation
                setTimeout(() => {
                    document.querySelectorAll('.fade-in').forEach(el => {
                        el.classList.add('show');
                    });
                }, 100);

                // Animate progress bars
                setTimeout(() => {
                    document.querySelectorAll('.progress-bar').forEach(bar => {
                        const width = bar.style.width;
                        bar.style.width = '0%';
                        setTimeout(() => {
                            bar.style.width = width;
                        }, 500);
                    });
                }, 1000);
            });

            function showDetailModal() {
                const modal = document.getElementById('detailModal');
                modal.classList.remove('hidden');
                modal.classList.add('flex');
                document.body.style.overflow = 'hidden';
            }

            function closeDetailModal() {
                const modal = document.getElementById('detailModal');
                modal.classList.add('hidden');
                modal.classList.remove('flex');
                document.body.style.overflow = 'auto';
            }

            // Close modal when clicking outside
            document.getElementById('detailModal').addEventListener('click', function(e) {
                if (e.target === this) {
                    closeDetailModal();
                }
            });
        </script>


        @include('include.footer')
        @include('include.end')
