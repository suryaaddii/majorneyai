<style>
    body {
        font-family: 'Inter', sans-serif;
    }

    .glow-text-strong {
        color: white;
        text-shadow:
            0 0 4px rgba(255, 255, 255, 0.6),
            0 0 8px rgba(99, 102, 241, 0.7),
            0 0 12px rgba(139, 92, 246, 0.6);
    }

    .glow-subtext {
        color: #e0e0ff;
        text-shadow:
            0 0 2px rgba(255, 255, 255, 0.5),
            0 0 4px rgba(99, 102, 241, 0.6);
    }

    .glass-morphism {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .glow-text {
        text-shadow: 0 0 6px rgba(255, 255, 255, 0.6), 0 0 10px rgba(99, 102, 241, 0.7);
    }

    .profile-name {
        transition: color 0.3s ease;
    }

    .navbar-transparent .profile-name {
        color: white;
    }

    .navbar-solid .profile-name {
        color: #1f2937;
        /* gray-800 */
    }

    .navbar-glass {
        transition: background 0.3s ease, backdrop-filter 0.3s ease, box-shadow 0.3s ease, border-bottom 0.3s ease;
    }

    .navbar-transparent {
        background: transparent;
        backdrop-filter: none;
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
        border-bottom: none;
    }

    .navbar-solid {
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(10px);
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
    }

    .glow-dark {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        animation: gradient-shift 3s ease-in-out infinite;
    }

    .glow-subtext-dark {
        color: #e434ff;
        text-shadow:
            0 0 2px rgba(0, 0, 0, 0.2),
            0 0 4px rgba(0, 0, 0, 0.3);
    }

    .navbar-solid .google-login-text {
        color: #1f2937 !important;
        /* gray-800 */
        text-shadow: none !important;
    }

    @media (max-width: 768px) {
        @media (max-width: 768px) {
            .navbar-container {
                padding: 0.75rem 1rem;
            }

            .mobile-logo-left {
                margin-right: auto;
            }

            .mobile-logo-text {
                font-size: 1.4rem;
            }

            .mobile-profile-button {
                padding: 0.4rem;
            }

            .mobile-avatar {
                width: 2rem;
                height: 2rem;
            }

            .mobile-status {
                width: 0.75rem;
                height: 0.75rem;
                bottom: -0.25rem;
                right: -0.25rem;
            }

            .mobile-dropdown {
                position: fixed;
                width: 100vw;
                left: 0;
                right: 0;
                top: 4rem;
                border-radius: 0;
                box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            }

            .mobile-google-button {
                padding: 0.6rem 0.8rem;
            }

            .mobile-google-text {
                display: none;
            }

            .mobile-chevron {
                display: none;
            }
        }
    }
</style>

<nav id="main-navbar" class="fixed top-0 left-0 right-0 z-50 navbar-glass navbar-transparent">
    <div class="max-w-7xl mx-auto px-4 py-3 navbar-container">
        <div class="flex items-center justify-between">
            <!-- Logo - Aligned left on mobile -->
            <div class="flex items-center md:space-x-8 mobile-logo-left">
                <a href="/" class="flex items-center group nav-hover">
                    <div class="relative">
                        <div
                            class="absolute -inset-2 bg-gradient-to-r from-blue-500 to-purple-600 rounded-2xl blur opacity-20 group-hover:opacity-40 transition duration-300">
                        </div>
                        <div
                            class="absolute -inset-1 bg-gradient-to-r from-blue-500 to-purple-600 rounded-lg blur opacity-20 group-hover:opacity-30 transition duration-300">
                        </div>
                    </div>
                    <div class="ml-3">
                        <h1 id="brandText" class="text-xl md:text-2xl font-bold glow-text-strong mobile-logo-text">
                            Majorney<span class="text-purple-300">AI</span>
                        </h1>
                        <p id="subText" class="text-xs font-medium glow-subtext -mt-1 hidden md:block">Powered by AI
                        </p>
                    </div>
                </a>
            </div>

            <!-- Profile Section -->
            <div class="flex items-center space-x-2 md:space-x-4">
                @if (Auth::user())
                    <div x-data="{ open: false }" class="relative">
                        <button @click="open = !open"
                            class="nav-hover flex items-center space-x-1 md:space-x-3 p-1 md:p-2 hover:bg-gray-100/50 rounded-2xl transition-all duration-200 focus:outline-none mobile-profile-button">
                            <div class="relative">
                                @if (auth()->user()->avatar)
                                    <img src="{{ auth()->user()->avatar }}" alt="Profile"
                                        class="w-8 h-8 md:w-9 md:h-9 rounded-full object-cover border-2 border-white shadow-sm mobile-avatar">
                                @else
                                    <div
                                        class="w-8 h-8 md:w-9 md:h-9 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full flex items-center justify-center mobile-avatar">
                                        <span
                                            class="text-white font-semibold text-xs md:text-sm">{{ substr(auth()->user()->name, 0, 1) }}</span>
                                    </div>
                                @endif
                                <span
                                    class="absolute -bottom-0.5 -right-0.5 w-3 h-3 md:w-4 md:h-4 bg-green-400 rounded-full border-2 border-white mobile-status"></span>
                            </div>
                            <div class="hidden md:block text-left">
                                <div class="text-sm font-semibold profile-name">{{ auth()->user()->name }}</div>
                            </div>
                            <svg class="hidden md:block w-4 h-4 text-gray-400 transform transition-transform duration-200"
                                :class="{ 'rotate-180': open }" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>

                        <!-- Fixed dropdown for mobile -->
                        <div x-show="open" @click.away="open = false"
                            x-transition:enter="transition ease-out duration-100"
                            x-transition:enter-start="transform opacity-0 translate-y-2"
                            x-transition:enter-end="transform opacity-100 translate-y-0"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="transform opacity-100 translate-y-0"
                            x-transition:leave-end="transform opacity-0 translate-y-2"
                            class="origin-top-right absolute right-0 mt-2 w-56 md:rounded-xl shadow-lg bg-white text-gray-900 divide-y divide-gray-200 ring-1 ring-black ring-opacity-5 z-50 mobile-dropdown">
                            <div class="px-4 py-3">
                                <p class="text-sm font-medium truncate">{{ auth()->user()->name }}</p>
                                <p class="text-xs opacity-80 truncate">{{ auth()->user()->email }}</p>
                            </div>
                            <div class="py-1">
                                <a href="{{ route('beranda') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900">
                                    <i class="fas fa-home mr-2 text-blue-500"></i> Beranda
                                </a>
                                <a href="{{ route('rekomendasi') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900">
                                    <i class="fas fa-check-circle mr-2 text-green-500"></i> Rekomendasi
                                </a>
                                <a href="{{ route('history') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900">
                                    <i class="fas fa-history mr-2 text-green-500"></i> Riwayat
                                </a>
                            </div>
                            <div class="py-1">
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit"
                                        class="block w-full text-left px-4 py-2 text-sm text-red-400 hover:bg-gray-100">
                                        <i class="fas fa-sign-out-alt mr-2"></i> Keluar
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @else
                    <!-- Google Login Button - Icon only on mobile -->
                    <a href="{{ route('google.redirect') }}"
                        class="flex items-center justify-center gap-2 md:gap-3 px-3 md:px-8 py-2 md:py-2 backdrop-blur-md bg-white/10 hover:bg-white/20 rounded-xl border border-white/20 hover:border-white/30 shadow-[0_4px_30px_rgba(0,0,0,0.1)] hover:shadow-[0_8px_30px_rgba(0,118,255,0.2)] transition-all duration-500 group relative overflow-hidden mobile-google-button">

                        <div class="p-1 rounded-lg bg-white/5 group-hover:bg-white/10 transition-all duration-300">
                            <svg class="w-5 h-5 md:w-6 md:h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48">
                                <path fill="#EA4335"
                                    d="M24 9.5c3.54 0 6.71 1.22 9.21 3.6l6.85-6.85C35.9 2.38 30.47 0 24 0 14.62 0 6.51 5.38 2.56 13.22l7.98 6.19C12.43 13.72 17.74 9.5 24 9.5z" />
                                <path fill="#4285F4"
                                    d="M46.98 24.55c0-1.57-.15-3.09-.38-4.55H24v9.02h12.94c-.58 2.96-2.26 5.48-4.78 7.18l7.73 6c4.51-4.18 7.09-10.36 7.09-17.65z" />
                                <path fill="#FBBC05"
                                    d="M10.53 28.59c-.48-1.45-.76-2.99-.76-4.59s.27-3.14.76-4.59l-7.98-6.19C.92 16.46 0 20.12 0 24c0 3.88.92 7.54 2.56 10.78l7.97-6.19z" />
                                <path fill="#34A853"
                                    d="M24 48c6.48 0 11.93-2.13 15.89-5.81l-7.73-6c-2.15 1.45-4.92 2.3-8.16 2.3-6.26 0-11.57-4.22-13.47-9.91l-7.98 6.19C6.51 42.62 14.62 48 24 48z" />
                            </svg>
                        </div>

                        <span
                            class="text-sm font-medium tracking-wider drop-shadow-sm group-hover:tracking-widest transition-all duration-500 google-login-text text-white hidden md:inline mobile-google-text">
                            Login with Google
                        </span>

                        <svg class="w-4 h-4 ml-1 opacity-0 -translate-x-1 group-hover:opacity-100 group-hover:translate-x-0 transition-all duration-300 hidden md:block mobile-chevron"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                @endif
            </div>
        </div>
    </div>
</nav>

<script>
    const nav = document.getElementById('main-navbar');
    const brandText = document.getElementById('brandText');
    const subText = document.getElementById('subText');

    function handleScroll() {
        const isScrolled = window.scrollY > 10 || window.location.pathname.includes('/rekomendasi') || window.location
            .pathname.includes('/quiz');

        nav.classList.toggle('navbar-solid', isScrolled);
        nav.classList.toggle('navbar-transparent', !isScrolled);

        if (isScrolled) {
            brandText.classList.remove('glow-text-strong');
            brandText.classList.add('glow-dark');
            subText.classList.remove('glow-subtext');
            subText.classList.add('glow-subtext-dark');
        } else {
            brandText.classList.remove('glow-dark');
            brandText.classList.add('glow-text-strong');
            subText.classList.remove('glow-subtext-dark');
            subText.classList.add('glow-subtext');
        }
    }


    window.addEventListener('scroll', handleScroll);
    window.addEventListener('load', handleScroll);
</script>
