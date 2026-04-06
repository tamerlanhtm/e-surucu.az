<x-admin-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Instagram Reels
            </h2>
            <a href="{{ route('admin.instagram-reels.create') }}" class="bg-primary hover:bg-blue-800 text-white px-4 py-2 rounded-md text-sm">
                Yeni Reel
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

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Sıra</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Başlıq</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">URL</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Əməliyyatlar</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse($reels as $reel)
                                <tr>
                                    <td class="px-6 py-4 text-sm">{{ $reel->order }}</td>
                                    <td class="px-6 py-4 text-sm font-medium">{{ $reel->title }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        <a href="{{ $reel->reel_url }}" target="_blank" class="text-blue-600 hover:underline">
                                            {{ Str::limit($reel->reel_url, 50) }}
                                        </a>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                                        <span class="px-2 py-1 rounded-full text-xs {{ $reel->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                            {{ $reel->is_active ? 'Aktiv' : 'Deaktiv' }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                                        <a href="{{ route('admin.instagram-reels.edit', $reel) }}" class="text-blue-600 hover:text-blue-900 mr-3">Redaktə</a>
                                        <form action="{{ route('admin.instagram-reels.destroy', $reel) }}" method="POST" class="inline" onsubmit="return confirm('Bu reeli silmək istədiyinizdən əminsiniz?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900">Sil</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                                        Heç bir Instagram Reel tapılmadı.
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
