@include('include.start')
@include('include.navbar')


<!-- halaman utama -->
<main data-aos="zoom-in" class="max-w-7xl mx-auto px-4 py-8 mt-24">
    <div
        class="bg-sky-950 py-8 px-6 md:px-16 flex flex-col md:flex-row items-center justify-between rounded-2xl shadow-2xl space-y-6 md:space-y-0 md:space-x-10">

        <div class="text-white md:w-1/2 space-y-8"> <!-- space-y-8 untuk jarak antar elemen -->
            <h2 class="text-2xl md:text-3xl font-semibold leading-snug">
                Ingin tahu jurusan yang cocok untukmu? <br />
                <span class="text-yellow-300 font-bold">Yuk Uji Potensimu!</span>
            </h2>

            <a href="{{ route('quiz.index') }}">
                <button
                    class="bg-yellow-300 text-gray-800 px-8 py-3 rounded-lg shadow-md hover:bg-yellow-400 transition-all duration-300 font-semibold mt-4">
                    Ikut Tes Gratis
                </button>
            </a>
        </div>


        <div class="md:w-1/2 mt-8 md:mt-0 relative">
            <img src="{{ asset('images/gambarilustrasi.jpg') }}" alt="tespotensi"
                class="w-full max-w-lg mx-auto aspect-video object-cover drop-shadow-lg rounded-xl" />
        </div>
    </div>

    @php use Illuminate\Support\Str; @endphp
    <!-- Jurusan Section -->
    <section id="jurusan" class="pt-12 pb-24">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-6">
                <h2 class="text-3xl font-bold text-gray-900">Jelajahi Pilihan Jurusan</h2>
                <p class="mt-4 text-lg text-gray-600 max-w-3xl mx-auto">
                    Temukan berbagai program studi dari berbagai fakultas yang mungkin cocok untukmu
                </p>
            </div>

            <div class="flex justify-center mb-8">
                <div class="inline-flex rounded-lg bg-gray-100 p-1">
                    <button
                        class="faculty-filter px-4 py-2 rounded-md font-medium text-sm bg-white shadow text-blue-600"
                        data-filter="all">
                        Semua Jurusan
                    </button>
                    <button
                        class="faculty-filter px-4 py-2 rounded-md font-medium text-sm text-gray-700 hover:text-gray-900"
                        data-filter="Fakultas Teknik">
                        Fakultas Teknik
                    </button>
                    <button
                        class="faculty-filter px-4 py-2 rounded-md font-medium text-sm text-gray-700 hover:text-gray-900"
                        data-filter="Sains & Humaniora">
                        Sains & Humaniora
                    </button>
                    <button
                        class="faculty-filter px-4 py-2 rounded-md font-medium text-sm text-gray-700 hover:text-gray-900"
                        data-filter="Sekolah Vokasi">
                        Sekolah Vokasi
                    </button>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ([
        ['name' => 'Informatika', 'desc' => 'Mempelajari pemrograman, algoritma, jaringan, dan teknologi komputer untuk mengembangkan solusi digital inovatif.', 'image' => 'jurusan1.png', 'faculty' => 'Fakultas Teknik'],
        ['name' => 'Sistem Informasi', 'desc' => 'Mempelajari pengelolaan data, teknologi, dan proses bisnis untuk mendukung pengambilan keputusan organisasi.', 'image' => 'jurusan2.jpg', 'faculty' => 'Fakultas Teknik'],
        ['name' => 'Rekayasa Komputer', 'desc' => 'Mempelajari perancangan perangkat keras dan perangkat lunak untuk mengembangkan sistem komputer yang efisien.', 'image' => 'jurusan3.jpeg', 'faculty' => 'Fakultas Teknik'],
        ['name' => 'Pendidikan Guru SD', 'desc' => 'Mempelajari teori dan praktik mengajar, pengembangan kurikulum, serta psikologi anak untuk mendidik siswa sekolah dasar.', 'image' => 'jurusan4.jpeg', 'faculty' => 'Sains & Humaniora'],
        ['name' => 'Psikologi', 'desc' => 'Mempelajari perilaku, pikiran, dan emosi manusia untuk memahami, menganalisis, dan memecahkan masalah mental dan sosial.', 'image' => 'jurusan5.jpeg', 'faculty' => 'Sains & Humaniora'],
        ['name' => 'Manajemen', 'desc' => 'Mempelajari perencanaan, pengorganisasian, pengarahan, dan pengendalian sumber daya untuk mencapai tujuan organisasi.', 'image' => 'jurusan6.jpeg', 'faculty' => 'Sains & Humaniora'],
        ['name' => 'Teknologi Informasi', 'desc' => 'Mempelajari penggunaan, pengelolaan, dan pengembangan sistem komputer dan jaringan untuk mengelola informasi.', 'image' => 'jurusan7.jpeg', 'faculty' => 'Sekolah Vokasi'],
        ['name' => 'Desain Komunikasi Visual', 'desc' => 'Mempelajari penyampaian pesan melalui elemen visual seperti gambar, tipografi, dan media digital dengan berbagai kreatifitas.', 'image' => 'jurusan8.jpeg', 'faculty' => 'Sekolah Vokasi'],
        ['name' => 'Desain Produk Tekstil', 'desc' => 'Mempelajari perancangan motif, bahan, dan teknik pembuatan tekstil untuk produk fungsional dan estetis.', 'image' => 'jurusan9.jpeg', 'faculty' => 'Sekolah Vokasi'],
    ] as $jurusan)
                    <div class="jurusan-card bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300 hover:shadow-xl hover:-translate-y-1 group"
                        data-faculty="{{ $jurusan['faculty'] }}">
                        <div class="relative">
                            <img src="{{ asset('images/' . $jurusan['image']) }}" alt="{{ $jurusan['name'] }}"
                                class="w-full h-48 object-cover group-hover:opacity-90 transition-opacity duration-300">
                        </div>
                        <div class="p-6">
                            <div class="flex items-center justify-between mb-2">
                                <span
                                    class="text-xs font-semibold text-blue-600 bg-blue-50 px-2 py-1 rounded">{{ $jurusan['faculty'] }}</span>

                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $jurusan['name'] }}</h3>
                            <p class="text-gray-600 text-sm mb-4">{{ Str::limit($jurusan['desc'], 100) }}</p>
                            <div class="flex justify-between items-center">
                                <a href="{{ route('jurusan.show', ['slug' => Str::slug($jurusan['name'])]) }}"
                                    class="text-blue-600 font-medium text-sm hover:underline flex items-center">
                                    Detail Jurusan
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</main>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const buttons = document.querySelectorAll(".faculty-filter");
        const jurusanCards = document.querySelectorAll(".jurusan-card");

        buttons.forEach(button => {
            button.addEventListener("click", function() {
                const filter = this.getAttribute("data-filter");

                // Update tampilan tombol aktif
                buttons.forEach(btn => {
                    btn.classList.remove("bg-white", "shadow", "text-blue-600");
                    btn.classList.add("text-gray-700", "hover:text-gray-900");
                });
                this.classList.add("bg-white", "shadow", "text-blue-600");
                this.classList.remove("text-gray-700", "hover:text-gray-900");

                // Filter kartu jurusan
                jurusanCards.forEach(card => {
                    if (filter === "all" || card.getAttribute("data-faculty") ===
                        filter) {
                        card.classList.remove("hidden");
                    } else {
                        card.classList.add("hidden");
                    }
                });
            });
        });
    });
</script>

@include('include.footer')
@include('include.end')
