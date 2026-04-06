<x-admin-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Xəbər Kateqoriyaları
            </h2>
            <a href="{{ route('admin.news-categories.create') }}" class="bg-primary hover:bg-blue-800 text-white px-4 py-2 rounded-md text-sm">
                Yeni Kateqoriya
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

            @if(session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    {{ session('error') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Ad</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Slug</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Xəbər sayı</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Əməliyyatlar</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse($categories as $category)
                                <tr>
                                    <td class="px-6 py-4 text-sm font-medium">{{ $category->name }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-500">{{ $category->slug }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $category->news_count }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                                        <a href="{{ route('admin.news-categories.edit', $category) }}" class="text-blue-600 hover:text-blue-900 mr-3">Redaktə</a>
                                        <form action="{{ route('admin.news-categories.destroy', $category) }}" method="POST" class="inline" onsubmit="return confirm('Bu kateqoriyanı silmək istədiyinizdən əminsiniz?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900">Sil</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-4 text-center text-gray-500">
                                        Heç bir kateqoriya tapılmadı.
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
