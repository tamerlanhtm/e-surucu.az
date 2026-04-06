<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Yeni tərcümə əlavə et
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('admin.translations.store') }}" method="POST">
                        @csrf

                        <div class="grid grid-cols-2 gap-6 mb-6">
                            <div>
                                <label for="key" class="block text-sm font-medium text-gray-700 mb-2">Açar</label>
                                <input type="text" name="key" id="key" value="{{ old('key') }}" class="w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50" required>
                                <p class="text-xs text-gray-500 mt-1">Məs: instagram_reels_heading</p>
                                @error('key')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="group" class="block text-sm font-medium text-gray-700 mb-2">Qrup</label>
                                <input type="text" name="group" id="group" value="{{ old('group', 'general') }}" class="w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50" required>
                                <p class="text-xs text-gray-500 mt-1">Məs: homepage, settings</p>
                                @error('group')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-6">
                            <label for="text_az" class="block text-sm font-medium text-gray-700 mb-2">🇦🇿 Azərbaycanca</label>
                            <textarea name="text_az" id="text_az" rows="3" class="w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">{{ old('text_az') }}</textarea>
                            @error('text_az')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="text_ru" class="block text-sm font-medium text-gray-700 mb-2">🇷🇺 Русский</label>
                            <textarea name="text_ru" id="text_ru" rows="3" class="w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">{{ old('text_ru') }}</textarea>
                            @error('text_ru')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="text_en" class="block text-sm font-medium text-gray-700 mb-2">🇬🇧 English</label>
                            <textarea name="text_en" id="text_en" rows="3" class="w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">{{ old('text_en') }}</textarea>
                            @error('text_en')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex justify-between">
                            <a href="{{ route('admin.translations.index') }}" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400">
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
