<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuis Rekomendasi Jurusan</title>
    @vite('resources/css/app.css')
    @vite('resource/js/app.js')

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//unpkg.com/alpinejs" defer></script>

    <link rel="icon" href="images/majorney.png">

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <style>
        html {
            scroll-behavior: smooth;
        }

        /* Custom gradient background */
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .light-gradient-bg {
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
        }

        /* Animasi slider thumb */
        input[type=range]::-webkit-slider-thumb {
            transition: transform 0.2s ease;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            height: 22px;
            width: 22px;
            border-radius: 50%;
            cursor: pointer;
            box-shadow: 0 4px 12px rgba(102, 126, 234, 0.4);
            appearance: none;
        }

        input[type=range]:active::-webkit-slider-thumb {
            transform: scale(1.2);
        }

        input[type=range]::-webkit-slider-track {
            background: linear-gradient(90deg, #e2e8f0 0%, #cbd5e1 100%);
            height: 8px;
            border-radius: 4px;
            appearance: none;
        }

        input[type=range]::-moz-range-thumb {
            transition: transform 0.2s ease;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            height: 22px;
            width: 22px;
            border-radius: 50%;
            cursor: pointer;
            box-shadow: 0 4px 12px rgba(102, 126, 234, 0.4);
        }

        input[type=range]:active::-moz-range-thumb {
            transform: scale(1.2);
        }

        input[type=range]::-moz-range-track {
            background: linear-gradient(90deg, #e2e8f0 0%, #cbd5e1 100%);
            height: 8px;
            border-radius: 4px;
        }

        /* Animasi card hover */
        .card-animate:hover {
            transform: translateY(-6px);
            box-shadow: 0 25px 50px rgba(102, 126, 234, 0.15);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .card-animate {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.95);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        /* Animasi tombol */
        .btn-animate {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            box-shadow: 0 10px 20px rgba(102, 126, 234, 0.3);
            position: relative;
            overflow: hidden;
        }

        .btn-animate::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.5s;
        }

        .btn-animate:hover::before {
            left: 100%;
        }

        .btn-animate:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 30px rgba(102, 126, 234, 0.4);
        }

        .btn-animate:active {
            transform: translateY(-1px);
            transition-duration: 0.1s;
        }

        /* Progress bar animation */
        .progress-fill {
            transition: width 0.6s cubic-bezier(0.4, 0, 0.2, 1);
            background: linear-gradient(90deg, #10b981, #059669, #047857);
        }

        /* Question number indicators */
        .question-indicator {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border: 2px solid #e5e7eb;
        }

        .question-indicator.filled {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            color: white;
            border-color: #10b981;
            transform: scale(1.1);
            box-shadow: 0 4px 8px rgba(16, 185, 129, 0.3);
        }

        .question-indicator.current {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-color: #667eea;
            transform: scale(1.15);
            box-shadow: 0 6px 12px rgba(102, 126, 234, 0.4);
        }

        /* Custom radio and checkbox styling */
        .custom-radio:checked {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-color: #667eea;
        }

        .custom-checkbox:checked {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-color: #667eea;
        }

        /* Floating elements */
        .floating {
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {
            0% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-10px);
            }

            100% {
                transform: translateY(0px);
            }
        }

        /* Glassmorphism effect */
        .glass {
            background: rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.18);
        }

        /* Range value indicator */
        .range-value {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 8px 16px;
            border-radius: 25px;
            font-weight: 700;
            box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
            font-size: 14px;
        }

        .range-value.empty {
            background: #e2e8f0;
            color: #64748b;
        }

        /* Pulse animation for current question */
        .pulse-border {
            animation: pulse-border 2s infinite;
        }

        @keyframes pulse-border {
            0% {
                box-shadow: 0 0 0 0 rgba(102, 126, 234, 0.4);
            }

            70% {
                box-shadow: 0 0 0 10px rgba(102, 126, 234, 0);
            }

            100% {
                box-shadow: 0 0 0 0 rgba(102, 126, 234, 0);
            }
        }

        /* Modern checkbox and radio styling */
        input[type="checkbox"]:checked,
        input[type="radio"]:checked {
            background-size: 16px 16px;
            background-position: center;
            background-repeat: no-repeat;
        }

        /* Smooth scroll snap */
        .question-container {
            scroll-snap-type: y mandatory;
        }

        .question-card {
            scroll-snap-align: start;
        }

        /* Alert styling */
        .validation-alert {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1000;
            animation: slideIn 0.5s forwards, fadeOut 0.5s forwards 3s;
        }

        @keyframes slideIn {
            from {
                transform: translateX(100%);
                opacity: 0;
            }

            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        @keyframes fadeOut {
            from {
                opacity: 1;
            }

            to {
                opacity: 0;
            }
        }
    </style>
</head>

@include('include.navbar')

<body>
    <!-- Modern Text Hero Section -->
    <div class="relative pt-24 pb-8 overflow-hidden">
        <!-- Background Effects -->
        <div class="absolute inset-0 bg-gradient-to-r from-blue-600/5 via-purple-600/5 to-pink-600/5"></div>
        <div
            class="absolute top-20 left-1/4 w-72 h-72 bg-gradient-to-r from-blue-400/20 to-purple-400/20 rounded-full blur-3xl animate-pulse">
        </div>
        <div class="absolute top-32 right-1/4 w-96 h-96 bg-gradient-to-r from-purple-400/15 to-pink-400/15 rounded-full blur-3xl animate-pulse"
            style="animation-delay: 1s"></div>

        <!-- Main Heading -->
        <div class="relative z-10">
            <h1 class="text-center font-bold text-xl md:text-3xl lg:text-4xl leading-tight mb-2">
                <span
                    class="relative inline-block text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 animate-gradientShift">
                    <span class="animate-slideInUp">Kuis</span>
                    <span class="animate-slideInUp" style="animation-delay: 0.1s"> Rekomendasi</span>
                    <span class="animate-slideInUp" style="animation-delay: 0.2s"> Jurusan</span>
                    <!-- Glowing underline effect -->
                    <div
                        class="absolute -bottom-2 left-0 right-0 h-1 bg-gradient-to-r from-indigo-400 via-purple-400 to-pink-400 rounded-full opacity-50 animate-glow">
                    </div>
                </span>
            </h1>

            <!-- Floating particles effect -->
            <div
                class="absolute top-0 left-1/2 transform -translate-x-1/2 w-2 h-2 bg-indigo-400 rounded-full animate-float opacity-60">
            </div>
            <div class="absolute top-8 left-1/3 w-1 h-1 bg-purple-400 rounded-full animate-float opacity-40"
                style="animation-delay: 2s"></div>
            <div class="absolute top-6 right-1/3 w-1.5 h-1.5 bg-pink-400 rounded-full animate-float opacity-50"
                style="animation-delay: 1s"></div>
        </div>

        <!-- Enhanced Subheading -->
        <div class="text-center max-w-2xl mx-auto relative z-10 mt-6">
            <div class="backdrop-blur-sm bg-white/30 rounded-2xl p-6 border border-white/20 shadow-xl">
                <p class="text-lg md:text-xl text-gray-800 font-medium leading-relaxed">
                    <span
                        class="inline-block opacity-0 animate-wordReveal hover:scale-105 transition-transform duration-300">Temukan</span>
                    <span
                        class="inline-block opacity-0 animate-wordReveal hover:scale-105 transition-transform duration-300"
                        style="animation-delay: 0.1s">jurusan</span>
                    <span
                        class="inline-block opacity-0 animate-wordReveal hover:scale-105 transition-transform duration-300"
                        style="animation-delay: 0.2s">akademik</span>
                    <span
                        class="inline-block opacity-0 animate-wordReveal hover:scale-105 transition-transform duration-300"
                        style="animation-delay: 0.3s">yang</span>
                    <span
                        class="inline-block opacity-0 animate-wordReveal hover:scale-105 transition-transform duration-300"
                        style="animation-delay: 0.4s">paling</span>
                    <span
                        class="inline-block opacity-0 animate-wordReveal text-indigo-600 font-semibold bg-indigo-100/50 px-2 py-1 rounded-lg hover:scale-105 transition-all duration-300"
                        style="animation-delay: 0.5s">sesuai</span>
                </p>
                <p class="text-md md:text-lg text-gray-800 font-medium leading-relaxed mt-3">
                    <span
                        class="inline-block opacity-0 animate-wordReveal hover:scale-105 transition-transform duration-300"
                        style="animation-delay: 0.6s">dengan</span>
                    <span
                        class="inline-block opacity-0 animate-wordReveal text-purple-600 font-semibold bg-purple-100/50 px-2 py-1 rounded-lg hover:scale-105 transition-all duration-300"
                        style="animation-delay: 0.7s">minat</span>
                    <span
                        class="inline-block opacity-0 animate-wordReveal hover:scale-105 transition-transform duration-300"
                        style="animation-delay: 0.8s">dan</span>
                    <span
                        class="inline-block opacity-0 animate-wordReveal text-violet-600 font-semibold bg-violet-100/50 px-2 py-1 rounded-lg hover:scale-105 transition-all duration-300"
                        style="animation-delay: 0.9s">bakatmu</span>
                </p>

                <!-- Decorative elements -->
                <div
                    class="absolute -top-2 -left-2 w-6 h-6 border-2 border-indigo-300 rounded-full animate-spin-slow opacity-40">
                </div>
                <div class="absolute -bottom-2 -right-2 w-4 h-4 border-2 border-purple-300 rounded-full animate-spin-slow opacity-40"
                    style="animation-delay: 1s"></div>
            </div>
        </div>

        <!-- CTA hint with modern styling -->
        <div class="text-center mt-8 relative z-10">
            <div
                class="inline-flex items-center space-x-2 text-gray-600 text-sm bg-white/40 backdrop-blur-sm px-4 py-2 rounded-full border border-white/30">
                <div class="w-2 h-2 bg-gradient-to-r from-indigo-400 to-purple-400 rounded-full animate-pulse">
                </div>
                <span class="font-medium">Mulai perjalanan penemuan dirimu</span>
                <div class="w-2 h-2 bg-gradient-to-r from-purple-400 to-pink-400 rounded-full animate-pulse"
                    style="animation-delay: 0.5s"></div>
            </div>
        </div>

        <style>
            /* Enhanced Gradient Animation */
            @keyframes gradientShift {
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

            .animate-gradientShift {
                background-size: 200% 200%;
                animation: gradientShift 4s ease-in-out infinite;
            }

            /* Slide In Up Animation */
            @keyframes slideInUp {
                from {
                    opacity: 0;
                    transform: translateY(30px) scale(0.95);
                }

                to {
                    opacity: 1;
                    transform: translateY(0) scale(1);
                }
            }

            .animate-slideInUp {
                animation: slideInUp 0.8s cubic-bezier(0.22, 0.61, 0.36, 1) forwards;
            }

            /* Enhanced Glow Effect */
            @keyframes glow {

                0%,
                100% {
                    opacity: 0.5;
                    transform: scaleX(0.8);
                }

                50% {
                    opacity: 1;
                    transform: scaleX(1.1);
                }
            }

            .animate-glow {
                animation: glow 2s ease-in-out infinite;
            }

            /* Floating Animation */
            @keyframes float {

                0%,
                100% {
                    transform: translateY(0px) rotate(0deg);
                }

                33% {
                    transform: translateY(-10px) rotate(120deg);
                }

                66% {
                    transform: translateY(5px) rotate(240deg);
                }
            }

            .animate-float {
                animation: float 6s ease-in-out infinite;
            }

            /* Enhanced Word Reveal */
            @keyframes wordReveal {
                from {
                    opacity: 0;
                    transform: translateY(20px) scale(0.8);
                    filter: blur(4px);
                }

                to {
                    opacity: 1;
                    transform: translateY(0) scale(1);
                    filter: blur(0px);
                }
            }

            .animate-wordReveal {
                animation: wordReveal 1s cubic-bezier(0.22, 0.61, 0.36, 1) forwards;
            }

            /* Slow Spin */
            @keyframes spin-slow {
                from {
                    transform: rotate(0deg);
                }

                to {
                    transform: rotate(360deg);
                }
            }

            .animate-spin-slow {
                animation: spin-slow 8s linear infinite;
            }

            /* Custom scrollbar for modern look */
            ::-webkit-scrollbar {
                width: 6px;
            }

            ::-webkit-scrollbar-track {
                background: rgba(0, 0, 0, 0.1);
                border-radius: 10px;
            }

            ::-webkit-scrollbar-thumb {
                background: linear-gradient(45deg, #6366f1, #8b5cf6);
                border-radius: 10px;
            }

            /* Glass morphism effect enhancement */
            .backdrop-blur-sm {
                backdrop-filter: blur(12px);
                -webkit-backdrop-filter: blur(12px);
            }
        </style>

        <div class="max-w-4xl mx-auto p-6 pb-12">
            <!-- Progress Section -->
            <div class="mb-8 glass rounded-2xl p-6 shadow-lg">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-xl font-bold text-gray-700 flex items-center">
                        <span class="mr-2">📊</span>
                        Progress Pengisian
                    </h3>
                    <span class="text-sm font-bold text-gray-600 bg-white px-3 py-1 rounded-full shadow"
                        id="progress-text">0% selesai</span>
                </div>

                <!-- Progress Bar -->
                <div class="w-full bg-gray-200 rounded-full h-4 mb-6 overflow-hidden shadow-inner">
                    <div class="progress-fill h-4 rounded-full" style="width: 0%" id="progress-bar"></div>
                </div>

                <!-- Question Indicators -->
                <div class="flex flex-wrap gap-3 justify-center" id="question-indicators">
                    <!-- Indicators will be generated by JavaScript -->
                </div>
            </div>

            <!-- Error Message -->
            @if ($errors->any())
                <div class="bg-red-50 border-l-4 border-red-400 text-red-700 px-6 py-4 rounded-xl mb-6 shadow-lg">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="font-bold">⚠️ Perhatian!</p>
                            <p class="text-sm">Silakan lengkapi semua pertanyaan sebelum mengirim.</p>
                        </div>
                    </div>
                </div>
            @endif

            <form action="{{ route('quiz.submit') }}" method="POST" class="space-y-8 question-container"
                id="quiz-form">
                @csrf

                @foreach ($questions as $q)
                    <div class="question-card bg-white rounded-2xl shadow-xl p-8 card-animate"
                        data-question="{{ $loop->iteration }}" id="question-{{ $loop->iteration }}">
                        <div class="flex items-start space-x-4">
                            <div class="question-indicator w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center text-sm font-bold text-gray-600 flex-shrink-0"
                                data-number="{{ $loop->iteration }}">
                                {{ $loop->iteration }}
                            </div>
                            <div class="flex-1">
                                <p class="font-bold text-xl mb-6 text-gray-800 leading-relaxed">{{ $q['text'] }}</p>

                                @if ($q['type'] === 'single')
                                    <div class="space-y-3">
                                        @foreach ($q['options'] as $opt)
                                            <label
                                                class="flex items-cexnter space-x-3 cursor-pointer p-4 rounded-xl hover:bg-gray-50 transition-all duration-200 border-2 border-gray-100 hover:border-blue-200">
                                                <input type="radio" name="{{ $q['id'] }}"
                                                    value="{{ $opt }}"
                                                    id="{{ $q['id'] }}-{{ Str::slug($opt) }}"
                                                    class="w-5 h-5 text-blue-600 border-gray-300 focus:ring-blue-500 custom-radio"
                                                    {{ old($q['id']) === $opt ? 'checked' : '' }} />
                                                <span class="font-medium text-gray-700">{{ $opt }}</span>
                                            </label>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach


                <div class="text-center pt-8">
                    <button type="button" id="submit-btn"
                        class="btn-animate px-8 py-4 text-white font-bold rounded-2xl focus:outline-none focus:ring-4 focus:ring-blue-300 focus:ring-offset-2 text-lg relative">
                        🚀 Lihat Rekomendasi Jurusan
                    </button>
                </div>
            </form>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const totalQuestions = {{ count($questions) }};
                const questionCards = document.querySelectorAll('.question-card');
                const progressBar = document.getElementById('progress-bar');
                const progressText = document.getElementById('progress-text');
                const questionIndicators = document.getElementById('question-indicators');
                const submitBtn = document.getElementById('submit-btn');
                const quizForm = document.getElementById('quiz-form');

                // Track which range sliders have been interacted with
                const rangeInteracted = new Set();

                // Generate question indicators
                for (let i = 1; i <= totalQuestions; i++) {
                    const indicator = document.createElement('div');
                    indicator.className =
                        'question-indicator w-8 h-8 rounded-full bg-gray-200 flex items-center justify-center text-sm font-bold text-gray-600';
                    indicator.textContent = i;
                    indicator.setAttribute('data-number', i);
                    questionIndicators.appendChild(indicator);
                }

                // Handle range sliders
                document.querySelectorAll('.range-slider').forEach(slider => {
                    const id = slider.id.replace('range-', '');
                    const valueDisplay = document.getElementById('value-' + id);

                    // Set initial value to empty if not interacted yet
                    if (!rangeInteracted.has(slider.name)) {
                        valueDisplay.textContent = '-';
                        valueDisplay.classList.add('empty');
                    }

                    slider.addEventListener('input', (e) => {
                        const id = e.target.id.replace('range-', '');
                        const valueDisplay = document.getElementById('value-' + id);
                        valueDisplay.textContent = e.target.value;
                        valueDisplay.classList.remove('empty');

                        // Mark this range as interacted
                        rangeInteracted.add(e.target.name);
                        updateProgress();
                    });
                });

                // Handle checkboxes and radio buttons
                document.querySelectorAll('input[type="checkbox"], input[type="radio"]').forEach(input => {
                    input.addEventListener('change', updateProgress);
                });

                function updateProgress() {
                    let filledQuestions = 0;

                    questionCards.forEach((card, index) => {
                        const questionNumber = index + 1;
                        const indicator = document.querySelector(`[data-number="${questionNumber}"]`);

                        // Check if question is filled
                        const ranges = card.querySelectorAll('input[type="range"]');
                        const checkboxes = card.querySelectorAll('input[type="checkbox"]');
                        const radios = card.querySelectorAll('input[type="radio"]');

                        let isFilled = false;

                        // Check ranges (only considered filled if interacted with)
                        if (ranges.length > 0) {
                            isFilled = Array.from(ranges).some(range => rangeInteracted.has(range.name));
                        }

                        // Check checkboxes (at least one must be checked)
                        if (checkboxes.length > 0) {
                            isFilled = Array.from(checkboxes).some(cb => cb.checked);
                        }

                        // Check radios (one must be selected)
                        if (radios.length > 0) {
                            isFilled = Array.from(radios).some(radio => radio.checked);
                        }

                        if (isFilled) {
                            filledQuestions++;
                            indicator.classList.add('filled');
                            indicator.classList.remove('current');
                            card.classList.remove('pulse-border');
                        } else {
                            indicator.classList.remove('filled');
                            // Mark as current if it's the first unfilled question
                            if (filledQuestions === index) {
                                indicator.classList.add('current');
                                card.classList.add('pulse-border');
                            } else {
                                indicator.classList.remove('current');
                                card.classList.remove('pulse-border');
                            }
                        }
                    });

                    // Update progress bar (always starts from 0%)
                    const percentage = Math.round((filledQuestions / totalQuestions) * 100);
                    progressBar.style.width = percentage + '%';
                    progressText.textContent = percentage + '% selesai';

                    // Add completion celebration
                    if (percentage === 100) {
                        progressText.textContent = '🎉 100% selesai!';
                        progressText.classList.add('text-green-600');
                    } else {
                        progressText.classList.remove('text-green-600');
                    }
                }

                // Form validation before submit
                submitBtn.addEventListener('click', function(e) {
                    e.preventDefault();

                    let unansweredQuestions = [];
                    let firstUnanswered = null;

                    questionCards.forEach((card, index) => {
                        const questionNumber = index + 1;
                        const ranges = card.querySelectorAll('input[type="range"]');
                        const checkboxes = card.querySelectorAll('input[type="checkbox"]');
                        const radios = card.querySelectorAll('input[type="radio"]');

                        let isFilled = false;

                        // Check ranges
                        if (ranges.length > 0) {
                            isFilled = Array.from(ranges).some(range => rangeInteracted.has(range
                                .name));
                        }

                        // Check checkboxes
                        if (checkboxes.length > 0) {
                            isFilled = Array.from(checkboxes).some(cb => cb.checked);
                        }

                        // Check radios
                        if (radios.length > 0) {
                            isFilled = Array.from(radios).some(radio => radio.checked);
                        }

                        if (!isFilled) {
                            unansweredQuestions.push(questionNumber);
                            if (!firstUnanswered) {
                                firstUnanswered = card;
                            }
                        }
                    });

                    if (unansweredQuestions.length > 0) {
                        // Show alert
                        showAlert(`Harap lengkapi pertanyaan nomor: ${unansweredQuestions.join(', ')}`);

                        // Scroll to first unanswered question
                        if (firstUnanswered) {
                            firstUnanswered.scrollIntoView({
                                behavior: 'smooth',
                                block: 'center'
                            });

                            // Add highlight effect
                            firstUnanswered.classList.add('ring-4', 'ring-red-400');
                            setTimeout(() => {
                                firstUnanswered.classList.remove('ring-4', 'ring-red-400');
                            }, 2000);
                        }
                    } else {
                        // All questions answered, submit form
                        quizForm.submit();
                    }
                });

                function showAlert(message) {
                    // Remove existing alert if any
                    const existingAlert = document.querySelector('.validation-alert');
                    if (existingAlert) {
                        existingAlert.remove();
                    }

                    // Create alert element
                    const alertDiv = document.createElement('div');
                    alertDiv.className =
                        'validation-alert bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded-lg shadow-lg';
                    alertDiv.innerHTML = `
                    <div class="flex items-center">
                        <svg class="h-6 w-6 text-red-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <strong class="font-bold">Perhatian! </strong>
                        <span class="ml-1">${message}</span>
                    </div>
                `;

                    // Add to body
                    document.body.appendChild(alertDiv);

                    // Auto remove after 5 seconds
                    setTimeout(() => {
                        alertDiv.remove();
                    }, 5000);
                }

                // Set initial state - all questions unfilled
                // Mark first question as current
                const firstIndicator = document.querySelector('[data-number="1"]');
                const firstCard = document.querySelector('.question-card[data-question="1"]');
                if (firstIndicator && firstCard) {
                    firstIndicator.classList.add('current');
                    firstCard.classList.add('pulse-border');
                }

                // Initial progress is 0%
                progressBar.style.width = '0%';
                progressText.textContent = '0% selesai';
            });
        </script>
    </div>
</body>

@include('include.footer')
@include('include.end')
