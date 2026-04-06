<x-admin-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Podcastlar
            </h2>
            <a href="{{ route('admin.podcasts.create') }}" class="bg-primary hover:bg-blue-800 text-white px-4 py-2 rounded-md text-sm">
                Yeni Podcast
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
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Şəkil</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Başlıq</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Müddət</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Dinləmə</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Əməliyyatlar</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse($podcasts as $podcast)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $podcast->order }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <img src="{{ $podcast->cover_url }}" alt="{{ $podcast->title }}" class="h-12 w-12 rounded-lg object-cover">
                                    </td>
                                    <td class="px-6 py-4 text-sm">
                                        <div class="font-medium text-gray-900">{{ Str::limit($podcast->title, 40) }}</div>
                                        <div class="text-gray-500 text-xs">{{ $podcast->created_at->format('d.m.Y H:i') }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $podcast->formatted_duration }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">{{ number_format($podcast->plays_count) }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                                        <form action="{{ route('admin.podcasts.toggle-status', $podcast) }}" method="POST" class="inline">
                                            @csrf
                                            <button type="submit" class="px-2 py-1 rounded text-xs font-medium {{ $podcast->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                                {{ $podcast->is_active ? 'Aktiv' : 'Deaktiv' }}
                                            </button>
                                        </form>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                                        <a href="{{ route('admin.podcasts.edit', $podcast) }}" class="text-blue-600 hover:text-blue-900 mr-3">Redaktə</a>
                                        <form action="{{ route('admin.podcasts.destroy', $podcast) }}" method="POST" class="inline" onsubmit="return confirm('Bu podcastı silmək istədiyinizdən əminsiniz?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900">Sil</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="px-6 py-4 text-center text-gray-500">
                                        Heç bir podcast tapılmadı.
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        {{ $podcasts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
