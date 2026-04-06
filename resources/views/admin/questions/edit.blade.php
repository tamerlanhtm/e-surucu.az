<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Sualı Redaktə Et
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('admin.questions.update', $question) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="category_id" class="block text-sm font-medium text-gray-700 mb-2">Kateqoriya</label>
                            <select name="category_id" id="category_id" class="w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50" required>
                                <option value="">Seçin</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id', $question->category_id) == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="question_text" class="block text-sm font-medium text-gray-700 mb-2">Sual mətni</label>
                            <textarea name="question_text" id="question_text" rows="3" class="w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50" required>{{ old('question_text', $question->question_text) }}</textarea>
                            @error('question_text')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        @if($question->image)
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Mövcud şəkil</label>
                                <img src="{{ asset('storage/' . $question->image) }}" alt="Question image" class="w-48 h-32 object-cover rounded">
                            </div>
                        @endif

                        <div class="mb-4">
                            <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Yeni şəkil (ixtiyari)</label>
                            <input type="file" name="image" id="image" accept="image/*" class="w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">
                            @error('image')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="explanation" class="block text-sm font-medium text-gray-700 mb-2">İzahat</label>
                            <textarea name="explanation" id="explanation" rows="3" class="w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">{{ old('explanation', $question->explanation) }}</textarea>
                            @error('explanation')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6 border-t pt-4">
                            <h3 class="text-lg font-semibold mb-4">Cavablar</h3>

                            @php
                                $existingAnswers = $question->answers;
                                $correctAnswerIndex = $existingAnswers->search(fn($answer) => $answer->is_correct);
                            @endphp

                            <div id="answers-container">
                                @for($i = 0; $i < 4; $i++)
                                @php
                                    $answer = $existingAnswers[$i] ?? null;
                                @endphp
                                <div class="mb-4 p-4 border rounded">
                                    <div class="flex items-start gap-3">
                                        <div class="flex-1">
                                            <label class="block text-sm font-medium text-gray-700 mb-2">Cavab {{ $i + 1 }} {{ $i < 2 ? '' : '(ixtiyari)' }}</label>
                                            <input type="hidden" name="answers[{{ $i }}][id]" value="{{ $answer?->id }}">
                                            <input type="text" name="answers[{{ $i }}][text]" value="{{ old('answers.'.$i.'.text', $answer?->answer_text) }}" class="w-full rounded-md border-gray-300 shadow-sm" {{ $i < 2 ? 'required' : '' }}>
                                        </div>
                                        <div class="pt-8">
                                            <label class="flex items-center">
                                                <input type="radio" name="correct_answer" value="{{ $i }}" {{ old('correct_answer', $correctAnswerIndex) == $i ? 'checked' : '' }} class="rounded-full border-gray-300 text-primary shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50" required>
                                                <span class="ml-2 text-sm text-gray-600">Düzgün</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                @endfor
                            </div>
                            @error('answers')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                            @error('correct_answer')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex justify-end space-x-3">
                            <a href="{{ route('admin.questions.index') }}" class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50">
                                Ləğv et
                            </a>
                            <button type="submit" class="px-4 py-2 bg-primary text-white rounded-md hover:bg-blue-800">
                                Yenilə
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
