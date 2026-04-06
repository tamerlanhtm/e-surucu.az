<x-admin-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Podcast Redaktə
            </h2>
            <a href="{{ route('admin.podcasts.index') }}" class="text-gray-600 hover:text-gray-900">
                Geri
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('admin.podcasts.update', $podcast) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-6">
                            <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Başlıq *</label>
                            <input type="text" name="title" id="title" value="{{ old('title', $podcast->title) }}"
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50" required>
                            @error('title')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Təsvir</label>
                            <textarea name="description" id="description" rows="4"
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">{{ old('description', $podcast->description) }}</textarea>
                            @error('description')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Mövcud Audio</label>
                            <audio controls class="w-full mb-2">
                                <source src="{{ $podcast->audio_url }}" type="audio/mpeg">
                                Brauzeriniz audio dəstəkləmir.
                            </audio>

                            <label for="audio_file" class="block text-sm font-medium text-gray-700 mb-2 mt-4">Yeni Audio Fayl (ixtiyari)</label>
                            <input type="file" name="audio_file" id="audio_file" accept="audio/*"
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">
                            <p class="text-xs text-gray-500 mt-1">Yalnız yeni fayl yükləmək istəyirsinizsə seçin</p>
                            @error('audio_file')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Mövcud Üz Şəkli</label>
                            <img src="{{ $podcast->cover_url }}" alt="{{ $podcast->title }}" class="h-24 w-24 rounded-lg object-cover mb-2">

                            <label for="cover_image" class="block text-sm font-medium text-gray-700 mb-2 mt-4">Yeni Üz Şəkli (ixtiyari)</label>
                            <input type="file" name="cover_image" id="cover_image" accept="image/*"
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">
                            @error('cover_image')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="grid grid-cols-2 gap-6 mb-6">
                            <div>
                                <label for="order" class="block text-sm font-medium text-gray-700 mb-2">Sıra</label>
                                <input type="number" name="order" id="order" value="{{ old('order', $podcast->order) }}" min="0"
                                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">
                            </div>

                            <div class="flex flex-col justify-center pt-6 space-y-3">
                                <label class="flex items-center cursor-pointer">
                                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', $podcast->is_active) ? 'checked' : '' }}
                                        class="rounded border-gray-300 text-primary shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">
                                    <span class="ml-2 text-sm text-gray-700">Aktiv</span>
                                </label>
                                <label class="flex items-center cursor-pointer">
                                    <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $podcast->is_featured) ? 'checked' : '' }}
                                        class="rounded border-gray-300 text-yellow-500 shadow-sm focus:border-yellow-500 focus:ring focus:ring-yellow-500 focus:ring-opacity-50">
                                    <span class="ml-2 text-sm text-gray-700">Ana səhifədə göstər</span>
                                </label>
                            </div>
                        </div>

                        <div class="flex justify-end">
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
