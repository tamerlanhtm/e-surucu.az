<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Yeni Başlıq Yarat
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('admin.headlines.store') }}" method="POST">
                        @csrf

                        <div class="mb-4">
                            <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Başlıq Mətni</label>
                            <input type="text" name="title" id="title" value="{{ old('title') }}"
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50"
                                required>
                            @error('title')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="link" class="block text-sm font-medium text-gray-700 mb-2">Link (İxtiyari)</label>
                            <input type="url" name="link" id="link" value="{{ old('link') }}"
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50"
                                placeholder="https://example.com">
                            @error('link')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                            <p class="text-xs text-gray-500 mt-1">Başlığa klikləndikdə açılacaq URL.</p>
                        </div>

                        <div class="mb-4">
                            <label for="order" class="block text-sm font-medium text-gray-700 mb-2">Sıra Nömrəsi</label>
                            <input type="number" name="order" id="order" value="{{ old('order', 0) }}" min="0"
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">
                            @error('order')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                            <p class="text-xs text-gray-500 mt-1">Kiçik nömrə daha öncə göstərilir.</p>
                        </div>

                        <div class="mb-4 flex items-center">
                            <input type="checkbox" name="open_in_new_tab" id="open_in_new_tab" value="1" {{ old('open_in_new_tab', true) ? 'checked' : '' }}
                                class="rounded border-gray-300 text-primary shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">
                            <label for="open_in_new_tab" class="ml-2 block text-sm text-gray-900">
                                Yeni pəncərədə aç
                            </label>
                        </div>

                        <div class="mb-4 flex items-center">
                            <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}
                                class="rounded border-gray-300 text-primary shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">
                            <label for="is_active" class="ml-2 block text-sm text-gray-900">
                                Aktiv
                            </label>
                        </div>

                        <div class="flex justify-end space-x-3">
                            <a href="{{ route('admin.headlines.index') }}"
                                class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50">
                                Ləğv et
                            </a>
                            <button type="submit" class="px-4 py-2 bg-primary text-white rounded-md hover:bg-blue-800">
                                Yadda saxla
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
