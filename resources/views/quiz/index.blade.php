<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-white leading-tight">
            Sürücülük Testləri
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Header Section -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-8 mb-8">
                <div class="text-center mb-8">
                    <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-4">Test Kateqoriyaları</h1>
                    <p class="text-gray-600 dark:text-gray-400 text-lg max-w-3xl mx-auto">
                        Sürücülük imtahanına hazırlaşmaq üçün test kateqoriyasını seçin və biliklərinizi yoxlayın
                    </p>
                </div>

                <!-- Info Card -->
                <div class="max-w-2xl mx-auto">
                    <div class="flex items-start p-4 bg-blue-50 dark:bg-blue-900/20 rounded-lg border border-blue-200 dark:border-blue-800">
                        <svg class="w-6 h-6 text-blue-600 dark:text-blue-400 mt-1 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <div>
                            <h4 class="font-semibold text-blue-900 dark:text-blue-300 mb-1">Vaxt məhdudiyyəti</h4>
                            <p class="text-sm text-blue-700 dark:text-blue-400">Hər sual üçün 60 saniyə vaxtınız var. Testin sonunda düzgün və səhv cavablarınızı görəcəksiniz.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Categories Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-4xl mx-auto">
                @foreach($categories as $category)
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-200 dark:border-gray-700">
                        <!-- Category Header -->
                        <div class="bg-gradient-to-br from-primary to-blue-600 dark:from-gray-700 dark:to-gray-800 p-6 text-white">
                            <div class="flex items-center justify-between mb-4">
                                <svg class="w-12 h-12 opacity-80" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                <div class="bg-white/20 backdrop-blur-sm px-4 py-2 rounded-full">
                                    <span class="font-bold text-lg">{{ $category->questions_count }}</span>
                                    <span class="text-sm ml-1">sual</span>
                                </div>
                            </div>
                            <h3 class="text-2xl font-bold">{{ $category->name }}</h3>
                        </div>

                        <!-- Category Body -->
                        <div class="p-6">
                            <p class="text-sm text-gray-500 dark:text-gray-400 mb-3 text-center">
                                Hər dəfə 10 təsadüfi sual seçilir
                            </p>
                            <a href="{{ route('quiz.start', ['categorySlug' => $category->slug]) }}"
                               class="group flex items-center justify-between w-full bg-primary hover:bg-blue-800 text-white px-5 py-4 rounded-lg transition-all duration-200 shadow-md hover:shadow-lg">
                                <span class="font-semibold text-lg">Başla (10 sual)</span>
                                <svg class="w-6 h-6 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                </svg>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
