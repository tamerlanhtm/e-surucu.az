<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-slate-800 leading-tight">
            Admin İdarə Paneli
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Left Column: Stats -->
                <div class="space-y-8">
                    <!-- Statistics Cards -->
                    <div class="bg-white rounded-2xl shadow-xl shadow-slate-200/50 p-6 border border-slate-100">
                        <h3 class="text-lg font-bold mb-6 text-slate-800 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                            Statistika
                        </h3>
                        <div class="space-y-4">
                            <a href="{{ route('admin.news.index') }}"
                                class="group flex items-center justify-between p-4 bg-slate-50 rounded-xl hover:bg-blue-50 transition-colors duration-300 cursor-pointer">
                                <div class="flex items-center space-x-4">
                                    <div
                                        class="p-3 bg-blue-500 rounded-xl shadow-lg shadow-blue-500/30 group-hover:scale-110 transition-transform duration-300">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-xs font-medium text-slate-500 uppercase tracking-wider">Xəbərlər
                                        </p>
                                        <p class="text-2xl font-bold text-slate-800">{{ \App\Models\News::count() }}</p>
                                    </div>
                                </div>
                                <div
                                    class="w-10 h-10 rounded-full bg-white flex items-center justify-center text-slate-300 group-hover:text-blue-500 transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7" />
                                    </svg>
                                </div>
                            </a>

                            <a href="{{ route('admin.questions.index') }}"
                                class="group flex items-center justify-between p-4 bg-slate-50 rounded-xl hover:bg-green-50 transition-colors duration-300 cursor-pointer">
                                <div class="flex items-center space-x-4">
                                    <div
                                        class="p-3 bg-emerald-500 rounded-xl shadow-lg shadow-emerald-500/30 group-hover:scale-110 transition-transform duration-300">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-xs font-medium text-slate-500 uppercase tracking-wider">Suallar
                                        </p>
                                        <p class="text-2xl font-bold text-slate-800">{{ \App\Models\Question::count() }}
                                        </p>
                                    </div>
                                </div>
                                <div
                                    class="w-10 h-10 rounded-full bg-white flex items-center justify-center text-slate-300 group-hover:text-emerald-500 transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7" />
                                    </svg>
                                </div>
                            </a>

                            <a href="{{ route('admin.news-categories.index') }}"
                                class="group flex items-center justify-between p-4 bg-slate-50 rounded-xl hover:bg-purple-50 transition-colors duration-300 cursor-pointer">
                                <div class="flex items-center space-x-4">
                                    <div
                                        class="p-3 bg-purple-500 rounded-xl shadow-lg shadow-purple-500/30 group-hover:scale-110 transition-transform duration-300">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-xs font-medium text-slate-500 uppercase tracking-wider">
                                            Kateqoriyalar</p>
                                        <p class="text-2xl font-bold text-slate-800">
                                            {{ \App\Models\NewsCategory::count() + \App\Models\QuestionCategory::count() }}
                                        </p>
                                    </div>
                                </div>
                                <div
                                    class="w-10 h-10 rounded-full bg-white flex items-center justify-center text-slate-300 group-hover:text-purple-500 transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7" />
                                    </svg>
                                </div>
                            </a>

                            <a href="{{ route('admin.users.index') }}"
                                class="group flex items-center justify-between p-4 bg-slate-50 rounded-xl hover:bg-gray-100 transition-colors duration-300 cursor-pointer">
                                <div class="flex items-center space-x-4">
                                    <div
                                        class="p-3 bg-slate-700 rounded-xl shadow-lg shadow-slate-700/30 group-hover:scale-110 transition-transform duration-300">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-xs font-medium text-slate-500 uppercase tracking-wider">
                                            İstifadəçilər</p>
                                        <p class="text-2xl font-bold text-slate-800">{{ \App\Models\User::count() }}</p>
                                    </div>
                                </div>
                                <div
                                    class="w-10 h-10 rounded-full bg-white flex items-center justify-center text-slate-300 group-hover:text-slate-700 transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7" />
                                    </svg>
                                </div>
                            </a>
                        </div>
                    </div>

                    <!-- Categories Info -->
                    <div class="bg-white rounded-2xl shadow-xl shadow-slate-200/50 p-6 border border-slate-100">
                        <h3 class="text-lg font-bold mb-6 text-slate-800 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-purple-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                            </svg>
                            Kateqoriya Statistikası
                        </h3>
                        <div class="space-y-6">
                            <div>
                                <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-3">Xəbər
                                    Kateqoriyaları</p>
                                <div class="space-y-2">
                                    @foreach(\App\Models\NewsCategory::all() as $category)
                                        <div
                                            class="flex items-center justify-between text-sm p-3 bg-blue-50/50 rounded-lg hover:bg-blue-50 transition-colors">
                                            <span class="text-slate-700 font-medium">{{ $category->name }}</span>
                                            <span
                                                class="px-2 py-1 bg-blue-100 text-blue-700 rounded-md text-xs font-bold">{{ $category->news->count() }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div>
                                <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-3">Test
                                    Kateqoriyaları</p>
                                <div class="space-y-2">
                                    @foreach(\App\Models\QuestionCategory::withCount('questions')->get() as $category)
                                        <div
                                            class="flex items-center justify-between text-sm p-3 bg-emerald-50/50 rounded-lg hover:bg-emerald-50 transition-colors">
                                            <span class="text-slate-700 font-medium">{{ $category->name }}</span>
                                            <span
                                                class="px-2 py-1 bg-emerald-100 text-emerald-700 rounded-md text-xs font-bold">{{ $category->questions_count }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column: Management & Activity -->
                <div class="lg:col-span-2 space-y-8">
                    <!-- Quick Actions -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <a href="{{ route('admin.news.create') }}"
                            class="group relative overflow-hidden p-6 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl shadow-lg shadow-blue-500/30 hover:shadow-blue-500/50 transition-all duration-300 transform hover:-translate-y-1">
                            <div
                                class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 bg-white opacity-10 rounded-full blur-2xl group-hover:scale-150 transition-transform duration-500">
                            </div>
                            <div class="relative flex items-center justify-between">
                                <div>
                                    <p class="text-blue-100 text-sm font-medium mb-1">Yeni məzmun</p>
                                    <h3 class="text-white text-xl font-bold">Xəbər əlavə et</h3>
                                </div>
                                <div
                                    class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center backdrop-blur-sm">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 4v16m8-8H4" />
                                    </svg>
                                </div>
                            </div>
                        </a>

                        <a href="{{ route('admin.questions.create') }}"
                            class="group relative overflow-hidden p-6 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-2xl shadow-lg shadow-emerald-500/30 hover:shadow-emerald-500/50 transition-all duration-300 transform hover:-translate-y-1">
                            <div
                                class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 bg-white opacity-10 rounded-full blur-2xl group-hover:scale-150 transition-transform duration-500">
                            </div>
                            <div class="relative flex items-center justify-between">
                                <div>
                                    <p class="text-emerald-100 text-sm font-medium mb-1">Yeni sual</p>
                                    <h3 class="text-white text-xl font-bold">Sual əlavə et</h3>
                                </div>
                                <div
                                    class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center backdrop-blur-sm">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 4v16m8-8H4" />
                                    </svg>
                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- Management Links -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <a href="{{ route('admin.news.index') }}"
                            class="group p-6 bg-white rounded-2xl shadow-lg shadow-slate-200/50 border border-slate-100 hover:border-blue-200 transition-all duration-300">
                            <div class="flex items-center justify-between mb-4">
                                <div class="p-3 bg-blue-50 rounded-xl group-hover:bg-blue-100 transition-colors">
                                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                                    </svg>
                                </div>
                                <svg class="w-5 h-5 text-slate-300 group-hover:text-blue-500 group-hover:translate-x-1 transition-all"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </div>
                            <h4 class="text-lg font-bold text-slate-800 mb-1">Xəbərləri idarə et</h4>
                            <p class="text-sm text-slate-500">Bütün xəbərlərə baxış, redaktə və silinmə</p>
                        </a>

                        <a href="{{ route('admin.questions.index') }}"
                            class="group p-6 bg-white rounded-2xl shadow-lg shadow-slate-200/50 border border-slate-100 hover:border-emerald-200 transition-all duration-300">
                            <div class="flex items-center justify-between mb-4">
                                <div class="p-3 bg-emerald-50 rounded-xl group-hover:bg-emerald-100 transition-colors">
                                    <svg class="w-8 h-8 text-emerald-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <svg class="w-5 h-5 text-slate-300 group-hover:text-emerald-500 group-hover:translate-x-1 transition-all"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </div>
                            <h4 class="text-lg font-bold text-slate-800 mb-1">Sualları idarə et</h4>
                            <p class="text-sm text-slate-500">İmtahan suallarına baxış və redaktə</p>
                        </a>

                        <a href="{{ route('admin.translations.index') }}"
                            class="group p-6 bg-white rounded-2xl shadow-lg shadow-slate-200/50 border border-slate-100 hover:border-purple-200 transition-all duration-300">
                            <div class="flex items-center justify-between mb-4">
                                <div class="p-3 bg-purple-50 rounded-xl group-hover:bg-purple-100 transition-colors">
                                    <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129" />
                                    </svg>
                                </div>
                                <svg class="w-5 h-5 text-slate-300 group-hover:text-purple-500 group-hover:translate-x-1 transition-all"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </div>
                            <h4 class="text-lg font-bold text-slate-800 mb-1">Tərcümələri idarə et</h4>
                            <p class="text-sm text-slate-500">Saytın dil tərcümələrinə baxış və redaktə</p>
                        </a>
                    </div>

                    <!-- Recent Activity -->
                    <div
                        class="bg-white rounded-2xl shadow-xl shadow-slate-200/50 border border-slate-100 overflow-hidden">
                        <div class="p-6 border-b border-slate-100 flex items-center justify-between">
                            <h3 class="text-lg font-bold text-slate-800">Son Fəaliyyət</h3>
                            <span class="px-3 py-1 bg-slate-100 text-slate-600 rounded-full text-xs font-medium">Son 5
                                xəbər</span>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-slate-100">
                                <thead class="bg-slate-50">
                                    <tr>
                                        <th
                                            class="px-6 py-4 text-left text-xs font-bold text-slate-500 uppercase tracking-wider">
                                            Xəbər</th>
                                        <th
                                            class="px-6 py-4 text-left text-xs font-bold text-slate-500 uppercase tracking-wider">
                                            Kateqoriya</th>
                                        <th
                                            class="px-6 py-4 text-left text-xs font-bold text-slate-500 uppercase tracking-wider">
                                            Tarix</th>
                                        <th
                                            class="px-6 py-4 text-right text-xs font-bold text-slate-500 uppercase tracking-wider">
                                            Əməliyyat</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-slate-100">
                                    @foreach(\App\Models\News::with('category')->latest()->take(5)->get() as $news)
                                        <tr class="hover:bg-slate-50/80 transition-colors">
                                            <td class="px-6 py-4 text-sm font-medium text-slate-800">
                                                {{ Str::limit($news->title, 50) }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                                <span
                                                    class="px-3 py-1 bg-blue-50 text-blue-600 rounded-full text-xs font-bold border border-blue-100">
                                                    {{ $news->category->name }}
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-500">
                                                {{ $news->published_at?->format('d.m.Y H:i') }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-right">
                                                <a href="{{ route('admin.news.edit', $news) }}"
                                                    class="text-blue-600 hover:text-blue-800 font-medium hover:underline">Redaktə</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>