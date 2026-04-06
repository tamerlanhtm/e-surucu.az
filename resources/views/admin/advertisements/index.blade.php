<x-admin-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Reklamlar İdarəsi
            </h2>
            <a href="{{ route('admin.advertisements.create') }}" class="bg-primary hover:bg-blue-800 text-white px-4 py-2 rounded-md text-sm">
                Yeni Reklam
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

            <!-- Filters -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                <div class="p-4">
                    <form method="GET" class="flex flex-wrap gap-4 items-end">
                        <div>
                            <label for="position" class="block text-sm font-medium text-gray-700 mb-1">Mövqe</label>
                            <select name="position" id="position" class="rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">
                                <option value="">Hamısı</option>
                                @foreach($positions as $key => $label)
                                    <option value="{{ $key }}" {{ request('position') == $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                            <select name="status" id="status" class="rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">
                                <option value="">Hamısı</option>
                                <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Aktiv</option>
                                <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Deaktiv</option>
                            </select>
                        </div>
                        <div>
                            <button type="submit" class="px-4 py-2 bg-gray-600 text-white rounded-md hover:bg-gray-700">
                                Filtr et
                            </button>
                            @if(request()->hasAny(['position', 'status']))
                                <a href="{{ route('admin.advertisements.index') }}" class="px-4 py-2 text-gray-600 hover:text-gray-900">
                                    Sıfırla
                                </a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Önizləmə</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Ad</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Mövqe</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Növ</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tarix</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Statistika</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Əməliyyatlar</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse($advertisements as $ad)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if($ad->type === 'image' && $ad->image)
                                            <img src="{{ Storage::url($ad->image) }}" alt="{{ $ad->alt_text }}" class="h-12 w-auto rounded">
                                        @else
                                            <span class="text-gray-400 text-xs">Kod</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-sm font-medium text-gray-900">
                                        {{ $ad->name }}
                                        <div class="text-xs text-gray-500">Sıra: {{ $ad->order }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                            {{ $positions[$ad->position] ?? $ad->position }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $ad->type === 'image' ? 'Şəkil' : 'Kod' }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        @if($ad->start_date || $ad->end_date)
                                            <div class="text-xs">
                                                @if($ad->start_date)
                                                    <span>{{ $ad->start_date->format('d.m.Y') }}</span>
                                                @else
                                                    <span>-</span>
                                                @endif
                                                <span class="mx-1">-</span>
                                                @if($ad->end_date)
                                                    <span>{{ $ad->end_date->format('d.m.Y') }}</span>
                                                @else
                                                    <span>-</span>
                                                @endif
                                            </div>
                                        @else
                                            <span class="text-gray-400">Limitsiz</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                                        <div class="text-xs">
                                            <div>Klik: <span class="font-medium">{{ number_format($ad->clicks) }}</span></div>
                                            <div>Göstərim: <span class="font-medium">{{ number_format($ad->impressions) }}</span></div>
                                            <div>CTR: <span class="font-medium">{{ $ad->ctr }}%</span></div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                                        @if($ad->is_running)
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                Aktiv
                                            </span>
                                        @elseif(!$ad->is_active)
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                                Deaktiv
                                            </span>
                                        @else
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                                Gözləyir
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                                        <div class="flex items-center space-x-2">
                                            <a href="{{ route('admin.advertisements.edit', $ad) }}" class="text-blue-600 hover:text-blue-900">Redaktə</a>
                                            <form action="{{ route('admin.advertisements.toggle-status', $ad) }}" method="POST" class="inline">
                                                @csrf
                                                <button type="submit" class="text-yellow-600 hover:text-yellow-900">
                                                    {{ $ad->is_active ? 'Dayandır' : 'Aktivləşdir' }}
                                                </button>
                                            </form>
                                            <form action="{{ route('admin.advertisements.destroy', $ad) }}" method="POST" class="inline" onsubmit="return confirm('Bu reklamı silmək istədiyinizdən əminsiniz?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900">Sil</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8" class="px-6 py-4 text-center text-gray-500">
                                        Heç bir reklam tapılmadı.
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        {{ $advertisements->withQueryString()->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
