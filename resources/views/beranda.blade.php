@include('include.start')

<style>
    body {
        font-family: 'Inter', sans-serif;
        background: #0f0f23;
    }

    /* Modern Glass Morphism Effects */
    .glass-card {
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
    }

    .glass-card:hover {
        background: rgba(255, 255, 255, 0.08);
        transform: translateY(-8px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
        transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
    }

    /* Advanced Gradient Text */
    .gradient-text {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        animation: gradient-shift 3s ease-in-out infinite;
    }

    @keyframes gradient-shift {

        0%,
        100% {
            filter: hue-rotate(0deg);
        }

        50% {
            filter: hue-rotate(45deg);
        }
    }

    /* Floating Animation */
    .floating {
        animation: floating 6s ease-in-out infinite;
    }

    @keyframes floating {

        0%,
        100% {
            transform: translateY(0px);
        }

        50% {
            transform: translateY(-15px);
        }
    }

    /* Neon Glow Button */
    .neon-button {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border: none;
        position: relative;
        overflow: hidden;
        transition: all 0.3s ease;
        box-shadow: 0 0 20px rgba(102, 126, 234, 0.3);
    }

    .neon-button:hover {
        transform: translateY(-2px);
        box-shadow: 0 0 30px rgba(102, 126, 234, 0.6), 0 10px 20px rgba(0, 0, 0, 0.2);
    }

    .neon-button::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
        transition: left 0.5s;
    }

    .neon-button:hover::before {
        left: 100%;
    }

    /* Hero Background with Animated Gradient */
    .hero-gradient {
        background: linear-gradient(-45deg, #0061a2, #000000, #014e3e, #143d58);
        background-size: 400% 400%;
        animation: gradient-animation 15s ease infinite;
        position: relative;
    }

    @keyframes gradient-animation {
        0% {
            background-position: 0% 50%;
        }

        50% {
            background-position: 100% 50%;
        }

        100% {
            background-position: 0% 50%;
        }
    }

    /* Geometric Shapes Overlay */
    .hero-gradient::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-image:
            radial-gradient(circle at 20% 80%, rgba(120, 119, 198, 0.3) 0%, transparent 50%),
            radial-gradient(circle at 80% 20%, rgba(255, 119, 198, 0.3) 0%, transparent 50%),
            radial-gradient(circle at 40% 40%, rgba(120, 200, 255, 0.2) 0%, transparent 50%);
    }

    /* Card Icon Animation */
    .icon-bounce {
        transition: all 0.3s ease;
    }

    .glass-card:hover .icon-bounce {
        transform: scale(1.2) rotate(5deg);
        color: #667eea;
    }

    /* Modern Typography */
    .modern-heading {
        font-weight: 800;
        letter-spacing: -0.02em;
        line-height: 1.1;
    }

    .modern-text {
        font-weight: 400;
        line-height: 1.6;
        opacity: 0.9;
    }

    /* Particle Background */
    .particles {
        position: absolute;
        width: 100%;
        height: 100%;
        overflow: hidden;
        z-index: 1;
        pointer-events: none;
    }

    /* Mobile Optimizations */
    @media (max-width: 768px) {

        /* Hero Section */
        .hero-title {
            font-size: 2rem;
            line-height: 1.2;
        }

        .hero-subtitle {
            font-size: 1rem;
            margin-bottom: 1.5rem;
        }

        /* Button */
        .neon-button {
            padding: 0.8rem 1.5rem;
            width: 100%;
        }

        /* Features Grid */
        .feature-grid {
            grid-template-columns: 1fr;
            gap: 1rem;
        }

        /* Cards */
        .feature-card {
            padding: 1.5rem;
        }

        /* Trust Indicators */
        .trust-indicators {
            flex-direction: column;
            gap: 0.5rem;
        }

        .trust-item {
            font-size: 0.8rem;
        }

        /* Section Spacing */
        .section-py {
            padding: 2rem 1rem;
        }

        /* Hide particles on mobile */
        .particles {
            display: none;
        }
    }

    @media (max-width: 480px) {
        .hero-title {
            font-size: 1.8rem;
        }

        .hero-subtitle br {
            display: none;
        }
    }
</style>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">

<main class="min-h-screen hero-gradient relative overflow-hidden">
    <!-- Animated Particles -->
    <div class="particles">
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
    </div>

    <!-- Dark Overlay -->
    <div class="absolute inset-0 bg-black/20 z-2"></div>

    @include('include.navbar')

    <div class="relative z-10 flex items-center justify-center min-h-[80vh] text-center px-4 pt-32">
        <div data-aos="zoom-in-up" class="max-w-5xl floating">
            <div class="mb-6">
                <span
                    class="inline-block px-4 py-1 bg-white/10 backdrop-blur-md rounded-full text-white/90 text-sm font-medium border border-white/20 mb-8">
                    🚀 Platform Rekomendasi Terdepan
                </span>
            </div>

            <h1 class="hero-title text-3xl md:text-5xl modern-heading mb-6 md:mb-8 text-white leading-tight"
                data-aos="fade-up">
                Temukan <span class="gradient-text">Jurusan Ideal</span> untuk <br class="hidden md:block">
                <span class="text-white/90">Masa Depanmu</span>
            </h1>

            <p class="hero-subtitle text-lg md:text-xl text-white/80 mb-8 md:mb-12 max-w-3xl mx-auto modern-text leading-relaxed"
                data-aos="fade-up" data-aos-delay="200">
                Platform AI-powered yang menganalisis kepribadian, minat, dan bakatmu untuk memberikan rekomendasi
                jurusan kuliah yang tepat.
            </p>

            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center" data-aos="fade-up"
                data-aos-delay="400">
                @if (Auth::user())
                    <a href="{{ route('quiz.index') }}" class="w-full sm:w-auto">
                    @else
                        <a href="{{ route('google.redirect') }}" class="w-full sm:w-auto">
                @endif
                <button
                    class="neon-button text-white px-8 md:px-12 py-3 md:py-4 rounded-2xl font-semibold text-base md:text-lg w-full sm:w-auto relative z-10 group">
                    <span class="relative z-10 flex items-center justify-center gap-3">
                        <i class="fas fa-rocket"></i>
                        Mulai Tes Sekarang
                        <i class="fas fa-arrow-right group-hover:translate-x-1 transition-transform"></i>
                    </span>
                </button>
                </a>
                <a href="{{ route('prodi') }}" class="w-full sm:w-auto">
                    <button
                        class="neon-button text-white px-8 md:px-12 py-3 md:py-4 rounded-2xl font-semibold text-base md:text-lg w-full sm:w-auto relative z-10 group">
                        <span class="relative z-10 flex items-center justify-center gap-3">
                            <i class="fas fa-book-open"></i>
                            Lihat Artikel Prodi
                            <i class="fas fa-arrow-right group-hover:translate-x-1 transition-transform"></i>
                        </span>
                    </button>
                </a>
            </div>

            <!-- Trust Indicators -->
            <div class="mt-8 md:mt-12 flex flex-wrap justify-center items-center gap-4 md:gap-8 text-white/60 trust-indicators"
                data-aos="fade-up" data-aos-delay="600">
                <div class="flex items-center gap-2 trust-item">
                    <i class="fas fa-tools text-blue-300"></i>
                    <span class="text-xs md:text-sm">Masih dalam Pengembangan</span>
                </div>
                <div class="flex items-center gap-2 trust-item">
                    <i class="fas fa-robot text-yellow-300"></i>
                    <span class="text-xs md:text-sm">Didukung AI</span>
                </div>
                <div class="flex items-center gap-2 trust-item">
                    <i class="fas fa-user-check text-green-300"></i>
                    <span class="text-xs md:text-sm">Uji Coba Terbuka</span>
                </div>
            </div>
        </div>
    </div>
</main>

<section class="section-py py-16 md:py-24 bg-gray-50 relative overflow-hidden">
    <div data-aos="zoom-in" class="max-w-7xl mx-auto px-4 md:px-6 relative z-10">
        <div class="text-center mb-12 md:mb-20">
            <h2 class="text-xl md:text-3xl modern-heading text-gray-900 mb-4 md:mb-6">
                Mengapa <span class="gradient-text">Pilih Kami?</span>
            </h2>
            <p class="text-md md:text-lg text-gray-600 max-w-2xl mx-auto modern-text">
                Platform dengan teknologi AI untuk memberikan hasil terbaik.
            </p>
        </div>

        <div class="feature-grid grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
            <div class="feature-card glass-card p-6 md:p-8 rounded-3xl group" data-aos="fade-up" data-aos-delay="100">
                <div class="text-3xl md:text-4xl mb-4 md:mb-6 icon-bounce">
                    <i class="fas fa-brain text-purple-500"></i>
                </div>
                <h3 class="text-lg md:text-xl font-bold text-gray-800 mb-3 md:mb-4">
                    AI-Powered
                </h3>
                <p class="text-gray-600 modern-text leading-relaxed">
                    Menggunakan teknologi kecerdasan buatan untuk menganalisis kepribadian dan minatmu.
                </p>
            </div>

            <div class="feature-card glass-card p-6 md:p-8 rounded-3xl group" data-aos="fade-up" data-aos-delay="200">
                <div class="text-3xl md:text-4xl mb-4 md:mb-6 icon-bounce">
                    <i class="fas fa-user-graduate text-blue-500"></i>
                </div>
                <h3 class="text-lg md:text-xl font-bold text-gray-800 mb-3 md:mb-4">
                    Rekomendasi Personal
                </h3>
                <p class="text-gray-600 modern-text leading-relaxed">
                    Dapatkan rekomendasi jurusan yang dipersonalisasi berdasarkan analisis mendalam terhadap profil
                    kamu.
                </p>
            </div>

            <div class="feature-card glass-card p-6 md:p-8 rounded-3xl group" data-aos="fade-up" data-aos-delay="300">
                <div class="text-3xl md:text-4xl mb-4 md:mb-6 icon-bounce">
                    <i class="fas fa-chart-line text-green-500"></i>
                </div>
                <h3 class="text-lg md:text-xl font-bold text-gray-800 mb-3 md:mb-4">
                    Peluang Karir Masa Depan
                </h3>
                <p class="text-gray-600 modern-text leading-relaxed">
                    Temukan jurusan dengan prospek karir yang cerah dan sesuai dengan tren industri masa depan.
                </p>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Only initialize particles on desktop
        if (window.innerWidth > 768) {
            const container = document.querySelector('.particles');
            const particles = container.querySelectorAll('.particle');

            particles.forEach(p => {
                const x = Math.random() * window.innerWidth;
                const y = Math.random() * window.innerHeight;
                p.style.left = `${x}px`;
                p.style.top = `${y}px`;

                const moveX = (Math.random() - 0.5) * 200 + 'px';
                const moveY = (Math.random() - 0.5) * 200 + 'px';
                p.style.setProperty('--x', moveX);
                p.style.setProperty('--y', moveY);

                const duration = (Math.random() * 5 + 3).toFixed(2);
                p.style.animationDuration = `${duration}s`;
                p.style.animationDelay = `${Math.random() * 2}s`;
            });
        }
    });
</script>

@include('include.footer')
@include('include.end')
