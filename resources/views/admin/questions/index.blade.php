<x-admin-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Suallar İdarəsi
            </h2>
            <a href="{{ route('admin.questions.create') }}" class="bg-primary hover:bg-blue-800 text-white px-4 py-2 rounded-md text-sm">
                Yeni Sual
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Filter by Category -->
            <div class="mb-4">
                <form method="GET" class="flex gap-2">
                    <select name="category" class="rounded-md border-gray-300 shadow-sm" onchange="this.form.submit()">
                        <option value="">Bütün kateqoriyalar</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}" {{ request('category') == $cat->id ? 'selected' : '' }}>
                                {{ $cat->name }}
                            </option>
                        @endforeach
                    </select>
                </form>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Sual</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Kateqoriya</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Cavablar</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Əməliyyatlar</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse($questions as $question)
                                <tr>
                                    <td class="px-6 py-4 text-sm">{{ Str::limit($question->question_text, 60) }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $question->category->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $question->answers->count() }} cavab</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                                        <a href="{{ route('admin.questions.edit', $question) }}" class="text-blue-600 hover:text-blue-900 mr-3">Redaktə</a>
                                        <form action="{{ route('admin.questions.destroy', $question) }}" method="POST" class="inline" onsubmit="return confirm('Bu sualı silmək istədiyinizdən əminsiniz?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900">Sil</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-4 text-center text-gray-500">
                                        Heç bir sual tapılmadı.
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        {{ $questions->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
