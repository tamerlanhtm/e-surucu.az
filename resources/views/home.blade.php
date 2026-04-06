@php
    $heroBadge = $pageSettings->hero_badge ?? t('hero.badge');
    $heroTitle = $pageSettings->hero_title ?? t('hero.title');
    $heroSubtitle = $pageSettings->hero_subtitle ?? t('hero.subtitle');
    $heroDescription = $pageSettings->hero_description ?? t('hero.description');
@endphp

<x-guest-home-layout>
    <!-- Modern Hero Section with Aurora Background -->
    <div
        class="relative min-h-[40vh] md:min-h-[45vh] flex items-center justify-center overflow-hidden bg-slate-900 selection:bg-blue-500 selection:text-white">
        <!-- Background Elements -->
        <div class="absolute inset-0 z-0">
            <div class="absolute inset-0 bg-gradient-to-br from-blue-900/90 via-slate-900/95 to-slate-900"></div>
            <div class="absolute top-0 left-0 w-full h-full bg-[url('/images/pattern.svg')] opacity-10"></div>

            <!-- Animated Blobs -->
            <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-blue-500/20 rounded-full blur-3xl animate-blob"></div>
            <div
                class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-indigo-500/20 rounded-full blur-3xl animate-blob animation-delay-2000">
            </div>
            <div
                class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-purple-500/20 rounded-full blur-3xl animate-blob animation-delay-4000">
            </div>
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full z-10 py-6 md:py-8">

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12 items-center">
                <!-- Text Content -->
                <div class="text-left animate-fade-in">
                    <div
                        class="inline-flex items-center gap-2 mb-4 md:mb-6 px-4 py-2 rounded-full bg-white/5 border border-white/10 backdrop-blur-md">
                        <span class="relative flex h-2 w-2">
                            <span
                                class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-2 w-2 bg-blue-500"></span>
                        </span>
                        <span class="text-blue-200 text-sm font-medium tracking-wide">{{ $heroBadge }}</span>
                    </div>

                    <h1
                        class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-extrabold text-white tracking-tight mb-6 leading-[1.1]">
                        {{ $heroTitle }} <br>
                        <span
                            class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 via-cyan-400 to-purple-400">{{ $heroSubtitle }}</span>
                    </h1>

                    <p class="text-lg md:text-xl text-slate-300 mb-6 md:mb-8 max-w-lg leading-relaxed font-light">
                        {{ $heroDescription }}
                    </p>

                    <div class="flex flex-col sm:flex-row gap-3 md:gap-4">
                        <a href="{{ route('quiz.index') }}"
                            class="group relative inline-flex items-center justify-center px-6 py-3 md:px-8 md:py-4 text-base md:text-lg font-bold text-white transition-all duration-300 bg-blue-600 rounded-2xl hover:bg-blue-500 hover:scale-105 shadow-[0_0_40px_-10px_rgba(37,99,235,0.5)]">
                            <span>{{ t('hero.start_test_btn') }}</span>
                            <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </a>
                        <a href="{{ route('ai.index') }}"
                            class="inline-flex items-center justify-center px-6 py-3 md:px-8 md:py-4 text-base md:text-lg font-bold text-white transition-all duration-300 bg-white/5 border border-white/10 rounded-2xl hover:bg-white/10 backdrop-blur-sm">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                            </svg>
                            {{ t('hero.ai_assistant_btn') }}
                        </a>
                    </div>

                    <!-- Stats -->
                    <div class="mt-8 md:mt-12 grid grid-cols-3 gap-4 md:gap-6 border-t border-white/10 pt-6 md:pt-8">
                        <div>
                            <div class="text-2xl md:text-3xl font-bold text-white mb-1">{{ \App\Models\Question::count() }}+</div>
                            <div class="text-xs md:text-sm text-slate-400">{{ t('hero.question_bank') }}</div>
                        </div>
                        <div>
                            <div class="text-2xl md:text-3xl font-bold text-white mb-1">100%</div>
                            <div class="text-xs md:text-sm text-slate-400">{{ t('hero.free') }}</div>
                        </div>
                        <div>
                            <div class="text-2xl md:text-3xl font-bold text-white mb-1">
                                <svg class="w-8 h-8 md:w-10 md:h-10 inline-block text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                            <div class="text-xs md:text-sm text-slate-400">{{ t('hero.no_registration') }}</div>
                        </div>
                    </div>
                </div>

                <!-- 3D Illustration -->
                <div class="relative animate-slide-up perspective-1000 hidden lg:block max-w-lg mx-auto">
                    <div class="relative z-10 animate-float">
                        <div
                            class="absolute inset-0 bg-gradient-to-tr from-blue-500/20 to-purple-500/20 rounded-[3rem] blur-3xl -z-10">
                        </div>
                        <img src="{{ asset('images/hero-3d-modern.png') }}" alt="Modern Driver Education"
                            class="w-full h-auto max-h-[400px] object-contain drop-shadow-2xl transform hover:scale-105 transition-transform duration-700">

                        <!-- Glass Card 1 -->
                        <div class="absolute top-4 left-2 bg-white/10 backdrop-blur-xl p-3 rounded-2xl border border-white/20 shadow-2xl animate-float"
                            style="animation-delay: 1s;">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full bg-green-500/20 flex items-center justify-center">
                                    <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <div>
                                    <div class="text-xs text-slate-300">{{ t('hero.status') }}</div>
                                    <div class="text-sm font-bold text-white">{{ t('hero.licensed') }}</div>
                                </div>
                            </div>
                        </div>

                        <!-- Glass Card 2 -->
                        <div class="absolute bottom-8 right-2 bg-white/10 backdrop-blur-xl p-3 rounded-2xl border border-white/20 shadow-2xl animate-float"
                            style="animation-delay: 2s;">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full bg-blue-500/20 flex items-center justify-center">
                                    <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div>
                                    <div class="text-xs text-slate-300">{{ t('hero.save_time') }}</div>
                                    <div class="text-sm font-bold text-white">{{ t('hero.online') }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Legal Resources Section - Prominent Banner -->
    <div class="bg-slate-50 dark:bg-slate-900 py-16 relative z-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <div class="inline-flex items-center gap-2 mb-4 px-4 py-2 rounded-full bg-amber-100 dark:bg-amber-500/20 border border-amber-300 dark:border-amber-500/30">
                    <svg class="w-5 h-5 text-amber-600 dark:text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                    <span class="text-amber-700 dark:text-amber-300 text-sm font-semibold">{{ t('legal.important_docs') }}</span>
                </div>
                <h2 class="text-2xl md:text-4xl font-bold text-gray-900 dark:text-white mb-4">{{ t('legal.legislation') }}</h2>
                <p class="text-gray-600 dark:text-slate-300 text-base md:text-lg max-w-2xl mx-auto">{{ t('legal.legislation_desc') }}</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-5xl mx-auto">
                <!-- Administrative Violations Code Card -->
                <a href="{{ url('/inzibati-xetalar-mecellesi') }}"
                    class="group relative bg-white dark:bg-slate-800 rounded-3xl p-8 border-2 border-red-200 dark:border-red-500/50 hover:border-red-400 dark:hover:border-red-400 transition-all duration-300 hover:-translate-y-2 overflow-hidden block shadow-lg hover:shadow-2xl">
                    <div class="absolute inset-0 bg-gradient-to-br from-red-50 dark:from-red-500/10 to-transparent opacity-50 group-hover:opacity-100 transition-opacity duration-300"></div>

                    <!-- Corner Badge -->
                    <div class="absolute top-4 right-4 text-base font-black px-5 py-2.5 rounded-full shadow-2xl z-50" style="background-color: #dc2626 !important; color: white !important;">
                        {{ t('legal.code') }}
                    </div>

                    <div class="relative z-10">
                        <div class="w-16 h-16 bg-red-100 dark:bg-red-500/20 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-8 h-8 text-red-600 dark:text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">
                            {{ t('legal.admin_code') }}
                        </h3>
                        <p class="text-gray-700 dark:text-gray-200 leading-relaxed mb-6">
                            {{ t('legal.admin_code_desc') }}
                        </p>
                        <div class="flex items-center text-red-600 dark:text-red-400 font-semibold group-hover:gap-3 gap-2 transition-all">
                            <span>{{ t('legal.view_code') }}</span>
                            <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </div>
                    </div>
                </a>

                <!-- Traffic Law Card -->
                <a href="{{ url('/yol-hereketi-haqqinda-qanun') }}"
                    class="group relative bg-white dark:bg-slate-800 rounded-3xl p-8 border-2 border-emerald-200 dark:border-emerald-500/50 hover:border-emerald-400 dark:hover:border-emerald-400 transition-all duration-300 hover:-translate-y-2 overflow-hidden block shadow-lg hover:shadow-2xl">
                    <div class="absolute inset-0 bg-gradient-to-br from-emerald-50 dark:from-emerald-500/10 to-transparent opacity-50 group-hover:opacity-100 transition-opacity duration-300"></div>

                    <!-- Corner Badge -->
                    <div class="absolute top-4 right-4 text-base font-black px-5 py-2.5 rounded-full shadow-2xl z-50" style="background-color: #16a34a !important; color: white !important;">
                        {{ t('legal.law') }}
                    </div>

                    <div class="relative z-10">
                        <div class="w-16 h-16 bg-emerald-100 dark:bg-emerald-500/20 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-8 h-8 text-emerald-600 dark:text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">
                            {{ t('legal.traffic_law') }}
                        </h3>
                        <p class="text-gray-700 dark:text-gray-200 leading-relaxed mb-6">
                            {{ t('legal.traffic_law_desc') }}
                        </p>
                        <div class="flex items-center text-emerald-600 dark:text-emerald-400 font-semibold group-hover:gap-3 gap-2 transition-all">
                            <span>{{ t('legal.read_law') }}</span>
                            <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Quick Info Banner -->
            <div class="mt-8 max-w-5xl mx-auto">
                <div class="bg-blue-50 dark:bg-blue-500/10 border border-blue-200 dark:border-blue-500/30 rounded-2xl p-4 md:p-6">
                    <div class="flex items-start gap-4">
                        <div class="flex-shrink-0">
                            <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h4 class="text-gray-900 dark:text-white font-semibold mb-1">{{ t('legal.important_note') }}</h4>
                            <p class="text-gray-700 dark:text-gray-300 text-sm leading-relaxed">
                                {{ t('legal.important_note_desc') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modern Features Grid -->
    <div class="bg-slate-900 py-24 relative z-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-20">
                <h2 class="text-3xl md:text-5xl font-bold text-white mb-6">{{ t('home.why_esurucu') }}</h2>
                <p class="text-slate-400 text-lg max-w-2xl mx-auto">{{ t('home.why_desc') }}</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 max-w-5xl mx-auto">
                <!-- Feature 1: Tests -->
                <a href="{{ route('quiz.index') }}"
                    class="group relative bg-white/5 backdrop-blur-sm rounded-3xl p-8 border border-white/5 hover:border-blue-500/50 transition-all duration-500 hover:-translate-y-2 overflow-hidden block">
                    <div
                        class="absolute inset-0 bg-gradient-to-br from-blue-600/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                    </div>
                    <div class="relative z-10">
                        <div
                            class="w-14 h-14 bg-blue-600/20 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-500">
                            <svg class="w-7 h-7 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-3">{{ t('home.tests_title') }}</h3>
                        <p class="text-slate-400 leading-relaxed text-sm">
                            {{ t('home.tests_desc') }}
                        </p>
                    </div>
                </a>

                <!-- Feature 2: AI Assistant -->
                <a href="{{ route('ai.index') }}"
                    class="group relative bg-white/5 backdrop-blur-sm rounded-3xl p-8 border border-white/5 hover:border-cyan-500/50 transition-all duration-500 hover:-translate-y-2 overflow-hidden block">
                    <div
                        class="absolute inset-0 bg-gradient-to-br from-cyan-600/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                    </div>
                    <div class="relative z-10">
                        <div
                            class="w-14 h-14 bg-cyan-600/20 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-500">
                            <svg class="w-7 h-7 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-3">{{ t('home.ai_title') }}</h3>
                        <p class="text-slate-400 leading-relaxed text-sm">
                            {{ t('home.ai_desc') }}
                        </p>
                    </div>
                </a>

                <!-- Feature 4: News -->
                <a href="{{ route('news.index') }}"
                    class="group relative bg-white/5 backdrop-blur-sm rounded-3xl p-8 border border-white/5 hover:border-green-500/50 transition-all duration-500 hover:-translate-y-2 overflow-hidden block">
                    <div
                        class="absolute inset-0 bg-gradient-to-br from-green-600/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                    </div>
                    <div class="relative z-10">
                        <div
                            class="w-14 h-14 bg-green-600/20 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-500">
                            <svg class="w-7 h-7 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-3">{{ t('home.news_title') }}</h3>
                        <p class="text-slate-400 leading-relaxed text-sm">
                            {{ t('home.news_desc') }}
                        </p>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <!-- Featured Podcast Section -->
    @php
        $featuredPodcast = \App\Models\Podcast::getFeaturedPodcast();
    @endphp
    @if($featuredPodcast)
        <div class="py-8 bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="bg-gradient-to-r from-blue-600 to-purple-600 rounded-2xl p-4 md:p-6 shadow-lg">
                    <div class="flex flex-col md:flex-row items-center gap-4">
                        <!-- Cover Image -->
                        <div class="flex-shrink-0">
                            <div class="w-20 h-20 md:w-24 md:h-24 rounded-xl overflow-hidden shadow-lg">
                                <img src="{{ $featuredPodcast->cover_url }}" alt="{{ $featuredPodcast->title }}"
                                    class="w-full h-full object-cover">
                            </div>
                        </div>

                        <!-- Player -->
                        <div class="flex-1 w-full">
                            <div class="flex items-center gap-2 mb-2">
                                <span class="bg-white/20 text-white text-xs font-medium px-2 py-0.5 rounded-full">{{ t('podcast.title') }}</span>
                                <h3 class="text-white font-bold text-sm md:text-base truncate">{{ $featuredPodcast->title }}</h3>
                            </div>

                            <audio id="featuredAudio" style="display: none;" preload="metadata">
                                <source src="{{ $featuredPodcast->audio_url }}" type="audio/mpeg">
                            </audio>

                            <!-- Progress Bar -->
                            <div class="flex items-center gap-3">
                                <button id="playPauseBtn" class="w-10 h-10 bg-white rounded-full flex items-center justify-center text-blue-600 shadow-md hover:scale-105 transition-transform flex-shrink-0">
                                    <svg id="playIcon" class="w-5 h-5 ml-0.5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M8 5v14l11-7z"/>
                                    </svg>
                                    <svg id="pauseIcon" class="w-5 h-5 hidden" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M6 19h4V5H6v14zm8-14v14h4V5h-4z"/>
                                    </svg>
                                </button>

                                <div class="flex-1">
                                    <div id="progressContainer" class="h-2 bg-white/30 rounded-full cursor-pointer overflow-hidden">
                                        <div id="progressFill" class="h-full bg-white rounded-full transition-all duration-150" style="width: 0%"></div>
                                    </div>
                                    <div class="flex justify-between mt-1 text-xs text-white/80">
                                        <span id="currentTime">0:00</span>
                                        <span id="duration">{{ $featuredPodcast->formatted_duration }}</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Stats -->
                            <div class="flex items-center justify-between mt-2 text-xs text-white/80">
                                <span>{{ number_format($featuredPodcast->plays_count) }} {{ t('podcast.listens') }}</span>
                                <a href="{{ route('podcasts.index') }}" class="flex items-center gap-1 text-white hover:underline">
                                    {{ t('podcast.all') }}
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const audio = document.getElementById('featuredAudio');
                    const playPauseBtn = document.getElementById('playPauseBtn');
                    const playIcon = document.getElementById('playIcon');
                    const pauseIcon = document.getElementById('pauseIcon');
                    const progressContainer = document.getElementById('progressContainer');
                    const progressFill = document.getElementById('progressFill');
                    const currentTimeEl = document.getElementById('currentTime');
                    const durationEl = document.getElementById('duration');
                    let hasPlayed = false;

                    function formatTime(seconds) {
                        const mins = Math.floor(seconds / 60);
                        const secs = Math.floor(seconds % 60);
                        return `${mins}:${secs.toString().padStart(2, '0')}`;
                    }

                    audio.addEventListener('loadedmetadata', function() {
                        durationEl.textContent = formatTime(audio.duration);
                    });

                    audio.addEventListener('timeupdate', function() {
                        const progress = (audio.currentTime / audio.duration) * 100;
                        progressFill.style.width = progress + '%';
                        currentTimeEl.textContent = formatTime(audio.currentTime);
                    });

                    playPauseBtn.addEventListener('click', function() {
                        if (audio.paused) {
                            audio.play();
                            playIcon.classList.add('hidden');
                            pauseIcon.classList.remove('hidden');

                            if (!hasPlayed) {
                                hasPlayed = true;
                                fetch('/podcasts/{{ $featuredPodcast->id }}/play', {
                                    method: 'POST',
                                    headers: {
                                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                        'Accept': 'application/json'
                                    }
                                });
                            }
                        } else {
                            audio.pause();
                            playIcon.classList.remove('hidden');
                            pauseIcon.classList.add('hidden');
                        }
                    });

                    audio.addEventListener('ended', function() {
                        playIcon.classList.remove('hidden');
                        pauseIcon.classList.add('hidden');
                    });

                    progressContainer.addEventListener('click', function(e) {
                        const rect = progressContainer.getBoundingClientRect();
                        const pos = (e.clientX - rect.left) / rect.width;
                        audio.currentTime = pos * audio.duration;
                    });
                });
            </script>
        </div>
    @endif

    <!-- Featured Blog Section -->
    @if($featuredNews->count() > 0)
        <div class="py-16 bg-gradient-to-br from-slate-50 to-blue-50 dark:from-gray-900 dark:to-slate-900">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <div class="inline-flex items-center gap-2 mb-4 px-4 py-2 rounded-full bg-blue-100 dark:bg-blue-500/20 border border-blue-300 dark:border-blue-500/30">
                        <svg class="w-5 h-5 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                        </svg>
                        <span class="text-blue-700 dark:text-blue-300 text-sm font-semibold">{{ t('home.featured_blog') }}</span>
                    </div>
                    <h2 class="text-2xl md:text-4xl font-bold text-gray-900 dark:text-white mb-4">{{ t('home.recommended_articles') }}</h2>
                    <p class="text-gray-600 dark:text-slate-300 text-base md:text-lg max-w-2xl mx-auto">{{ t('home.recommended_articles_desc', 'Sizin üçün seçdiyimiz ən faydalı və maraqlı məqalələr') }}</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-5xl mx-auto">
                    @foreach($featuredNews as $news)
                        <article class="group relative bg-white dark:bg-slate-800 rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 border border-gray-100 dark:border-slate-700">
                            <!-- Featured Badge -->
                            <div class="absolute top-4 right-4 z-20">
                                <span class="inline-flex items-center gap-1 bg-gradient-to-r from-blue-600 to-purple-600 text-white text-xs font-bold px-3 py-1.5 rounded-full shadow-lg">
                                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                    </svg>
                                    {{ t('home.featured') }}
                                </span>
                            </div>

                            <!-- Image -->
                            <div class="relative h-56 overflow-hidden">
                                @if($news->image)
                                    <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}"
                                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                                @else
                                    <div class="w-full h-full bg-gradient-to-br from-blue-100 to-purple-100 dark:from-blue-900/30 dark:to-purple-900/30 flex items-center justify-center group-hover:scale-110 transition-transform duration-700">
                                        <svg class="w-16 h-16 text-blue-400 dark:text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                                        </svg>
                                    </div>
                                @endif
                                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>

                                <!-- Category Badge -->
                                <div class="absolute bottom-4 left-4">
                                    <span class="inline-block bg-white/90 dark:bg-gray-900/90 backdrop-blur-sm text-blue-600 dark:text-blue-400 text-xs font-bold px-3 py-1.5 rounded-full shadow-sm">
                                        {{ $news->category->name }}
                                    </span>
                                </div>
                            </div>

                            <!-- Content -->
                            <div class="p-6">
                                <div class="flex items-center text-sm text-gray-500 dark:text-gray-400 mb-3">
                                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    {{ $news->published_at->format('d.m.Y') }}
                                </div>

                                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3 line-clamp-2 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors">
                                    <a href="{{ route('news.show', $news->slug) }}">
                                        {{ $news->title }}
                                    </a>
                                </h3>

                                <p class="text-gray-600 dark:text-gray-400 mb-4 line-clamp-3">
                                    {{ Str::limit(strip_tags($news->content), 120) }}
                                </p>

                                <a href="{{ route('news.show', $news->slug) }}"
                                    class="inline-flex items-center text-blue-600 dark:text-blue-400 font-semibold hover:text-blue-700 dark:hover:text-blue-300 transition-colors group/link">
                                    {{ t('home.read_more') }}
                                    <svg class="w-4 h-4 ml-1 group-hover/link:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    <!-- Latest News Section -->
    @if($latestNews->count() > 0)
        <div class="py-24 bg-white dark:bg-gray-900">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-end mb-12">
                    <div>
                        <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-2">{{ t('home.latest_news') }}</h2>
                        <div class="h-1 w-20 bg-primary-500 rounded-full"></div>
                    </div>
                    <a href="{{ route('news.index') }}"
                        class="group inline-flex items-center text-primary-600 dark:text-primary-400 font-semibold hover:text-primary-700 dark:hover:text-primary-300 transition-colors">
                        {{ t('home.view_all') }}
                        <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </a>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @foreach($latestNews as $news)
                        <article
                            class="group flex flex-col bg-white dark:bg-gray-800 rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-100 dark:border-gray-700 hover:-translate-y-1 h-full">
                            <div class="relative h-56 overflow-hidden">
                                @if($news->image)
                                    <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}"
                                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                @else
                                    <div
                                        class="w-full h-full bg-gradient-to-br from-gray-100 to-gray-200 dark:from-gray-700 dark:to-gray-800 flex items-center justify-center group-hover:scale-105 transition-transform duration-500">
                                        <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                                        </svg>
                                    </div>
                                @endif
                                <div class="absolute top-4 left-4">
                                    <span
                                        class="inline-block bg-white/90 dark:bg-gray-900/90 backdrop-blur-sm text-secondary-600 dark:text-secondary-400 text-xs font-bold px-3 py-1.5 rounded-full shadow-sm">
                                        {{ $news->category->name }}
                                    </span>
                                </div>
                            </div>

                            <div class="flex-1 p-6 flex flex-col">
                                <div class="flex items-center text-sm text-gray-500 dark:text-gray-400 mb-3">
                                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    {{ $news->published_at->format('d.m.Y') }}
                                </div>

                                <h3
                                    class="text-xl font-bold text-gray-900 dark:text-white mb-3 line-clamp-2 group-hover:text-primary-600 dark:group-hover:text-primary-400 transition-colors">
                                    <a href="{{ route('news.show', $news->slug) }}">
                                        {{ $news->title }}
                                    </a>
                                </h3>

                                <p class="text-gray-600 dark:text-gray-400 mb-4 line-clamp-3 flex-1">
                                    {{ Str::limit(strip_tags($news->content), 100) }}
                                </p>

                                <a href="{{ route('news.show', $news->slug) }}"
                                    class="inline-flex items-center text-primary-600 dark:text-primary-400 font-semibold hover:underline mt-auto">
                                    {{ t('home.read_more') }}
                                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    <!-- Instagram Reels Section -->
    @if($instagramReels->count() > 0)
        <div class="py-24 bg-gray-50 dark:bg-gray-900 relative">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">{{ $instagramReelsHeading }}</h2>
                    <p class="text-lg text-gray-600 dark:text-gray-400">{{ $instagramReelsSubheading }}</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($instagramReels as $reel)
                        <div class="flex justify-center transform hover:scale-[1.02] transition-transform duration-300">
                            <blockquote class="instagram-media" data-instgrm-permalink="{{ $reel->reel_url }}"
                                data-instgrm-version="14"
                                style="background:#FFF; border:0; border-radius:16px; box-shadow:0 4px 20px rgba(0,0,0,0.1); margin: 1px; max-width:540px; min-width:326px; padding:0; width:99.375%; width:-webkit-calc(100% - 2px); width:calc(100% - 2px);">
                            </blockquote>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
</x-guest-home-layout>