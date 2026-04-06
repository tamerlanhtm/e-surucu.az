<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Yeni Instagram Reel
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('admin.instagram-reels.store') }}" method="POST">
                        @csrf

                        <div class="mb-4">
                            <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Başlıq</label>
                            <input type="text" name="title" id="title" value="{{ old('title') }}" class="w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50" required>
                            @error('title')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Açıqlama (ixtiyari)</label>
                            <textarea name="description" id="description" rows="3" class="w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">{{ old('description') }}</textarea>
                            @error('description')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="reel_url" class="block text-sm font-medium text-gray-700 mb-2">Instagram Reel URL</label>
                            <input type="url" name="reel_url" id="reel_url" value="{{ old('reel_url') }}" placeholder="https://www.instagram.com/reel/ABC123/" class="w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50" required>
                            @error('reel_url')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                            <p class="text-xs text-gray-500 mt-1">Instagram Reel URL-ni daxil edin (məsələn: https://www.instagram.com/reel/ABC123/)</p>
                        </div>

                        <div class="mb-4">
                            <label for="order" class="block text-sm font-medium text-gray-700 mb-2">Sıra</label>
                            <input type="number" name="order" id="order" value="{{ old('order', 0) }}" class="w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">
                            @error('order')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                            <p class="text-xs text-gray-500 mt-1">Kiçik nömrə daha əvvəl göstərilir</p>
                        </div>

                        <div class="mb-4">
                            <label class="flex items-center">
                                <input type="checkbox" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }} class="rounded border-gray-300 text-primary shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">
                                <span class="ml-2 text-sm text-gray-700">Aktiv</span>
                            </label>
                        </div>

                        <div class="flex justify-end gap-2">
                            <a href="{{ route('admin.instagram-reels.index') }}" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300">
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
