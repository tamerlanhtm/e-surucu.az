<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-white leading-tight">
                {{ $question->category->name }}
            </h2>
            <div class="text-sm text-gray-600 dark:text-gray-400">
                Sual {{ $index + 1 }} / {{ $totalQuestions }}
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <!-- Progress Bar and Timer -->
            <div class="mb-8">
                <div class="flex justify-between items-center mb-2">
                    <div class="flex items-center gap-4">
                        <span class="text-sm font-medium text-gray-700 dark:text-gray-300">İrəliləyiş</span>
                        <span class="text-sm text-gray-500 dark:text-gray-400">{{ round((($index + 1) / $totalQuestions) * 100) }}%</span>
                    </div>
                    <!-- Timer -->
                    <div x-data="timer()" x-init="startTimer()" class="flex items-center gap-2">
                        <svg class="w-5 h-5" :class="timeLeft <= 10 ? 'text-red-500 animate-pulse' : 'text-gray-500 dark:text-gray-400'" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="text-lg font-bold" :class="timeLeft <= 10 ? 'text-red-500' : 'text-gray-700 dark:text-gray-300'" x-text="formatTime(timeLeft)"></span>
                    </div>
                </div>
                <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-3">
                    <div class="bg-secondary h-3 rounded-full transition-all duration-300" style="width: {{ (($index + 1) / $totalQuestions) * 100 }}%"></div>
                </div>
            </div>

            <!-- Question Card -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-8">
                    <!-- Question Image -->
                    @if($question->image)
                        <div class="mb-6">
                            <img src="{{ asset('storage/' . $question->image) }}" alt="Sual şəkli" class="w-full max-h-96 object-contain rounded-lg border border-gray-200 dark:border-gray-700">
                        </div>
                    @endif

                    <!-- Question Text -->
                    <div class="mb-8">
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">
                            {{ $question->question_text }}
                        </h3>
                    </div>

                    <!-- Answer Options -->
                    <form id="quizForm" action="{{ route('quiz.submit') }}" method="POST">
                        @csrf
                        <input type="hidden" name="question_id" value="{{ $question->id }}">
                        <input type="hidden" name="category_slug" value="{{ $categorySlug }}">
                        <input type="hidden" name="time_expired" id="timeExpired" value="0">

                        <div class="space-y-4">
                            @foreach($question->answers as $answer)
                                <label class="group block cursor-pointer">
                                    <div class="flex items-start p-5 border-2 border-gray-200 dark:border-gray-700 rounded-lg hover:border-primary dark:hover:border-blue-500 hover:bg-gray-50 dark:hover:bg-gray-700 transition-all duration-200">
                                        <input type="radio" name="answer_id" value="{{ $answer->id }}" class="mt-1 h-5 w-5 text-primary dark:text-blue-500 focus:ring-primary dark:focus:ring-blue-500">
                                        <span class="ml-4 text-lg text-gray-900 dark:text-white">
                                            {{ $answer->answer_text }}
                                        </span>
                                    </div>
                                </label>
                            @endforeach
                        </div>

                        <!-- Navigation Buttons -->
                        <div class="mt-8 flex justify-between items-center">
                            <a href="{{ route('quiz.index') }}" class="px-6 py-3 border border-gray-300 dark:border-gray-600 rounded-md text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                                Çıxış
                            </a>
                            <button type="submit" class="px-8 py-3 bg-primary hover:bg-blue-800 text-white rounded-md font-semibold transition shadow-lg hover:shadow-xl">
                                @if($index + 1 < $totalQuestions)
                                    Növbəti sual →
                                @else
                                    Nəticələri gör
                                @endif
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function timer() {
            return {
                timeLeft: 60,
                timerInterval: null,

                startTimer() {
                    this.timerInterval = setInterval(() => {
                        this.timeLeft--;
                        if (this.timeLeft <= 0) {
                            clearInterval(this.timerInterval);
                            this.timeExpired();
                        }
                    }, 1000);
                },

                formatTime(seconds) {
                    const mins = Math.floor(seconds / 60);
                    const secs = seconds % 60;
                    return `${mins}:${secs.toString().padStart(2, '0')}`;
                },

                timeExpired() {
                    document.getElementById('timeExpired').value = '1';
                    document.getElementById('quizForm').submit();
                }
            };
        }
    </script>
</x-app-layout>
