<style>
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
</style>

<!-- Modern Centered Footer -->
<footer class="hero-gradient pt-16 pb-10 relative overflow-hidden">
    <div class="container mx-auto px-4 max-w-4xl text-center relative z-10">

        <!-- Brand & Tagline -->
        <h1 class="text-2xl font-extrabold text-white tracking-wide mb-2">
            Majorney<span class="text-indigo-400">AI</span>
        </h1>
        <p class="text-sm text-gray-400 max-w-md mx-auto mb-8">
            Rekomendasi jurusan berbasis AI untuk membantumu memilih masa depan yang tepat.
        </p>


        <!-- Social Media -->
        <div class="flex justify-center space-x-6 mb-8">
            <a href="#" class="text-gray-400 hover:text-indigo-400 transition text-xl"><i
                    class="fab fa-facebook-f"></i></a>
            <a href="#" class="text-gray-400 hover:text-indigo-400 transition text-xl"><i
                    class="fab fa-twitter"></i></a>
            <a href="https://www.instagram.com/suryaaddii/"
                class="text-gray-400 hover:text-indigo-400 transition text-xl"><i class="fab fa-instagram"></i></a>
            <a href="https://www.linkedin.com/in/surya-adi-sn"
                class="text-gray-400 hover:text-indigo-400 transition text-xl"><i class="fab fa-linkedin-in"></i></a>
        </div>

        <!-- Copyright -->
        <div class="border-t border-gray-700 pt-6 text-sm text-gray-500">
            © 2025 Majorney. Dibuat oleh
            <a href="https://wa.me/6282328410298" target="_blank" class="text-indigo-400 hover:underline">
                Surya Adi
            </a>
        </div>
    </div>

    <!-- Background Blur Effect -->
    <div class="absolute top-0 right-0 w-72 h-72 bg-indigo-500 rounded-full opacity-20 blur-3xl pointer-events-none">
    </div>
    <div class="absolute bottom-0 left-0 w-72 h-72 bg-pink-500 rounded-full opacity-20 blur-3xl pointer-events-none">
    </div>
</footer>
