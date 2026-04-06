<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-white leading-tight">
            Test Nəticələri
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <!-- Results Summary Card -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg mb-8">
                <div class="p-8">
                    <div class="text-center">
                        <!-- Score Circle -->
                        <div class="inline-flex items-center justify-center w-40 h-40 rounded-full mb-6 {{ $percentage >= 70 ? 'bg-green-100 dark:bg-green-900' : ($percentage >= 50 ? 'bg-yellow-100 dark:bg-yellow-900' : 'bg-red-100 dark:bg-red-900') }}">
                            <div class="text-center">
                                <div class="text-5xl font-bold {{ $percentage >= 70 ? 'text-green-600 dark:text-green-400' : ($percentage >= 50 ? 'text-yellow-600 dark:text-yellow-400' : 'text-red-600 dark:text-red-400') }}">
                                    {{ $percentage }}%
                                </div>
                                <div class="text-sm text-gray-600 dark:text-gray-400">Nəticə</div>
                            </div>
                        </div>

                        <!-- Result Message -->
                        <h3 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">
                            @if($percentage >= 70)
                                Əla nəticə!
                            @elseif($percentage >= 50)
                                Yaxşı nəticə!
                            @else
                                Daha çox məşq edin
                            @endif
                        </h3>

                        <!-- Statistics -->
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-8">
                            <div class="p-4 bg-gray-50 dark:bg-gray-700 rounded-lg">
                                <div class="text-2xl font-bold text-gray-900 dark:text-white">{{ $totalQuestions }}</div>
                                <div class="text-sm text-gray-600 dark:text-gray-400 mt-1">Ümumi sual</div>
                            </div>
                            <div class="p-4 bg-green-50 dark:bg-green-900/20 rounded-lg">
                                <div class="text-2xl font-bold text-green-600 dark:text-green-400">{{ $correctAnswers }}</div>
                                <div class="text-sm text-gray-600 dark:text-gray-400 mt-1">Düzgün</div>
                            </div>
                            <div class="p-4 bg-red-50 dark:bg-red-900/20 rounded-lg">
                                <div class="text-2xl font-bold text-red-600 dark:text-red-400">{{ $totalQuestions - $correctAnswers }}</div>
                                <div class="text-sm text-gray-600 dark:text-gray-400 mt-1">Səhv</div>
                            </div>
                            <div class="p-4 bg-blue-50 dark:bg-blue-900/20 rounded-lg">
                                <div class="text-2xl font-bold text-blue-600 dark:text-blue-400">{{ $timeTakenFormatted }}</div>
                                <div class="text-sm text-gray-600 dark:text-gray-400 mt-1">Sərf olunan vaxt</div>
                            </div>
                        </div>

                        <!-- Motivational Message -->
                        <div class="mt-8 p-6 bg-blue-50 dark:bg-blue-900/20 rounded-lg border-l-4 border-blue-500">
                            <p class="text-blue-900 dark:text-blue-200">
                                @if($percentage >= 70)
                                    Siz çox yaxşı hazırlaşmısınız! Davam edin və daha çox praktika edin.
                                @elseif($percentage >= 50)
                                    Yaxşı gedirsiniz! Bir az daha məşq edin və mükəmməl olacaqsınız.
                                @else
                                    Narahat olmayın! Daha çox məşq edin və mütləq uğur qazanacaqsınız.
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Detailed Results -->
            @if(count($quizResults) > 0)
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-8">
                        <h4 class="text-xl font-bold text-gray-900 dark:text-white mb-6">Ətraflı Nəticələr</h4>

                        <div class="space-y-4">
                            @foreach($quizResults as $index => $result)
                                <div class="border border-gray-200 dark:border-gray-700 rounded-lg p-6 {{ $result['is_correct'] ? 'bg-green-50 dark:bg-green-900/10' : 'bg-red-50 dark:bg-red-900/10' }}">
                                    <div class="flex items-start">
                                        <div class="flex-shrink-0">
                                            @if($result['is_correct'])
                                                <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                            @else
                                                <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                            @endif
                                        </div>

                                        <div class="ml-4 flex-1">
                                            <div class="flex items-center justify-between mb-2">
                                                <span class="text-sm font-semibold text-gray-600 dark:text-gray-400">Sual {{ $index + 1 }}</span>
                                                <div class="flex items-center gap-2">
                                                    @if($result['time_expired'])
                                                        <span class="text-sm font-semibold text-orange-600 dark:text-orange-400">
                                                            Vaxt bitdi
                                                        </span>
                                                    @else
                                                        <span class="text-sm font-semibold {{ $result['is_correct'] ? 'text-green-600 dark:text-green-400' : 'text-red-600 dark:text-red-400' }}">
                                                            {{ $result['is_correct'] ? 'Düzgün' : 'Səhv' }}
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <p class="text-gray-900 dark:text-white font-medium mb-3">
                                                {{ $result['question_text'] }}
                                            </p>

                                            @if($result['time_expired'])
                                                <p class="text-sm text-orange-700 dark:text-orange-300 mb-2">
                                                    <span class="font-semibold">Cavab verilmədi</span> (vaxt bitdi)
                                                </p>
                                            @elseif($result['selected_answer_text'])
                                                <p class="text-sm {{ $result['is_correct'] ? 'text-green-700 dark:text-green-300' : 'text-red-700 dark:text-red-300' }} mb-2">
                                                    <span class="font-semibold">Sizin cavabınız:</span>
                                                    {{ $result['selected_answer_text'] }}
                                                </p>
                                            @endif

                                            @if(!$result['is_correct'])
                                                <p class="text-sm text-green-600 dark:text-green-400">
                                                    <span class="font-semibold">Düzgün cavab:</span>
                                                    {{ $result['correct_answer_text'] }}
                                                </p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif

            <!-- Action Buttons -->
            <div class="mt-8 flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('quiz.index') }}"
                    class="inline-flex items-center justify-center px-8 py-3 border-2 border-primary text-primary hover:bg-primary hover:text-white rounded-md font-semibold transition">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                    </svg>
                    Yenidən test et
                </a>
                <a href="{{ route('home') }}"
                    class="inline-flex items-center justify-center px-8 py-3 bg-secondary text-white hover:bg-green-600 rounded-md font-semibold transition shadow-lg hover:shadow-xl">
                    Ana səhifə
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
