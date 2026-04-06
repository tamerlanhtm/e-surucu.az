<x-admin-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Sürüşən Başlıqlar
            </h2>
            <a href="{{ route('admin.headlines.create') }}" class="bg-primary hover:bg-blue-800 text-white px-4 py-2 rounded-md text-sm">
                Yeni Başlıq
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

            <!-- Settings Section -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Parametrlər</h3>
                    <form action="{{ route('admin.headlines.settings.update') }}" method="POST">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                            <!-- Scroll Speed -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Sürüşmə Sürəti (saniyə)</label>
                                <input type="number" name="scroll_speed" value="{{ $settings->scroll_speed }}" min="5" max="120"
                                    class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                <p class="text-xs text-gray-500 mt-1">Aşağı = Daha sürətli (5-120)</p>
                            </div>

                            <!-- Font Size -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Şrift Ölçüsü (px)</label>
                                <input type="number" name="font_size" value="{{ $settings->font_size }}" min="10" max="24"
                                    class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                <p class="text-xs text-gray-500 mt-1">10-24 piksel arası</p>
                            </div>

                            <!-- Font Weight -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Şrift Qalınlığı</label>
                                <select name="font_weight" class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    <option value="normal" {{ $settings->font_weight === 'normal' ? 'selected' : '' }}>Normal</option>
                                    <option value="medium" {{ $settings->font_weight === 'medium' ? 'selected' : '' }}>Orta</option>
                                    <option value="semibold" {{ $settings->font_weight === 'semibold' ? 'selected' : '' }}>Yarı Qalın</option>
                                    <option value="bold" {{ $settings->font_weight === 'bold' ? 'selected' : '' }}>Qalın</option>
                                </select>
                            </div>

                            <!-- Order Type -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Sıralama</label>
                                <select name="order_type" class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    <option value="ordered" {{ $settings->order_type === 'ordered' ? 'selected' : '' }}>Sıralı</option>
                                    <option value="random" {{ $settings->order_type === 'random' ? 'selected' : '' }}>Təsadüfi</option>
                                </select>
                            </div>

                            <!-- Background Color -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Arxa Fon Rəngi</label>
                                <div class="flex items-center gap-2">
                                    <input type="color" name="background_color" value="{{ $settings->background_color }}"
                                        class="h-10 w-16 border-gray-300 rounded cursor-pointer">
                                    <input type="text" value="{{ $settings->background_color }}" readonly
                                        class="flex-1 border-gray-300 rounded-md shadow-sm bg-gray-50 text-sm">
                                </div>
                            </div>

                            <!-- Text Color -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Mətn Rəngi</label>
                                <div class="flex items-center gap-2">
                                    <input type="color" name="text_color" value="{{ $settings->text_color }}"
                                        class="h-10 w-16 border-gray-300 rounded cursor-pointer">
                                    <input type="text" value="{{ $settings->text_color }}" readonly
                                        class="flex-1 border-gray-300 rounded-md shadow-sm bg-gray-50 text-sm">
                                </div>
                            </div>

                            <!-- Is Enabled -->
                            <div class="flex items-center">
                                <label class="flex items-center cursor-pointer">
                                    <input type="checkbox" name="is_enabled" value="1" {{ $settings->is_enabled ? 'checked' : '' }}
                                        class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    <span class="ml-2 text-sm text-gray-700">Aktiv</span>
                                </label>
                            </div>

                            <!-- Pause on Hover -->
                            <div class="flex items-center">
                                <label class="flex items-center cursor-pointer">
                                    <input type="checkbox" name="pause_on_hover" value="1" {{ $settings->pause_on_hover ? 'checked' : '' }}
                                        class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    <span class="ml-2 text-sm text-gray-700">Üzərinə gələndə dayandır</span>
                                </label>
                            </div>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md text-sm">
                                Parametrləri Yadda Saxla
                            </button>
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
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Sıra</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Başlıq</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Link</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Əməliyyatlar</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse($headlines as $headline)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $headline->order }}</td>
                                    <td class="px-6 py-4 text-sm">{{ Str::limit($headline->title, 50) }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                                        @if($headline->link)
                                            <a href="{{ $headline->link }}" target="_blank" class="text-blue-600 hover:text-blue-900">
                                                {{ Str::limit($headline->link, 30) }}
                                            </a>
                                        @else
                                            <span class="text-gray-400">-</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                                        <form action="{{ route('admin.headlines.toggle-status', $headline) }}" method="POST" class="inline">
                                            @csrf
                                            <button type="submit" class="px-2 py-1 rounded text-xs font-medium {{ $headline->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                                {{ $headline->is_active ? 'Aktiv' : 'Deaktiv' }}
                                            </button>
                                        </form>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                                        <a href="{{ route('admin.headlines.edit', $headline) }}" class="text-blue-600 hover:text-blue-900 mr-3">Redaktə</a>
                                        <form action="{{ route('admin.headlines.destroy', $headline) }}" method="POST" class="inline" onsubmit="return confirm('Bu başlığı silmək istədiyinizdən əminsiniz?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900">Sil</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                                        Heç bir başlıq tapılmadı.
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        {{ $headlines->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
