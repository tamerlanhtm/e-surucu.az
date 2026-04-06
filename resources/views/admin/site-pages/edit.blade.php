@php
    $defaults = $pageInfo['defaults'] ?? [];

    // Use saved value if exists, otherwise use default
    $heroBadge = $settings->hero_badge ?? $defaults['hero_badge'] ?? '';
    $heroTitle = $settings->hero_title ?? $defaults['hero_title'] ?? '';
    $heroSubtitle = $settings->hero_subtitle ?? $defaults['hero_subtitle'] ?? '';
    $heroDescription = $settings->hero_description ?? $defaults['hero_description'] ?? '';
@endphp

<x-admin-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Səhifə Parametrləri: {{ $pageInfo['name'] }}
                </h2>
                <p class="text-sm text-gray-500 mt-1">
                    <a href="{{ $pageInfo['url'] }}" target="_blank" class="text-blue-600 hover:underline">
                        {{ $pageInfo['url'] }}
                    </a>
                </p>
            </div>
            <a href="{{ route('admin.site-pages.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-md text-sm">
                Geri
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    <ul class="list-disc list-inside">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.site-pages.update', $pageInfo['route']) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- SEO Section -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                    <div class="p-6">
                        <div class="flex items-center mb-4">
                            <svg class="w-6 h-6 text-blue-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                            <h3 class="text-lg font-semibold text-gray-900">SEO Parametrləri</h3>
                        </div>

                        <div class="space-y-4">
                            <!-- Meta Title -->
                            <div>
                                <label for="meta_title" class="block text-sm font-medium text-gray-700 mb-1">
                                    Meta Başlıq
                                    <span class="text-gray-400 font-normal">(50-60 simvol)</span>
                                </label>
                                <input type="text" name="meta_title" id="meta_title"
                                       value="{{ old('meta_title', $settings->meta_title) }}"
                                       maxlength="70"
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                       placeholder="{{ $pageInfo['name'] }} - E-Sürücü.az">
                            </div>

                            <!-- Meta Description -->
                            <div>
                                <label for="meta_description" class="block text-sm font-medium text-gray-700 mb-1">
                                    Meta Təsvir
                                    <span class="text-gray-400 font-normal">(150-160 simvol)</span>
                                </label>
                                <textarea name="meta_description" id="meta_description" rows="3"
                                          maxlength="200"
                                          class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                          placeholder="{{ $defaults['hero_description'] ?? 'Səhifənin meta təsviri...' }}">{{ old('meta_description', $settings->meta_description) }}</textarea>
                            </div>

                            <!-- Meta Keywords -->
                            <div>
                                <label for="meta_keywords" class="block text-sm font-medium text-gray-700 mb-1">
                                    Açar Sözlər
                                    <span class="text-gray-400 font-normal">(vergüllə ayrılmış)</span>
                                </label>
                                <input type="text" name="meta_keywords" id="meta_keywords"
                                       value="{{ old('meta_keywords', $settings->meta_keywords) }}"
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                       placeholder="sürücülük, imtahan, test, qaydalar">
                            </div>

                            <!-- OG Image -->
                            <div>
                                <label for="og_image" class="block text-sm font-medium text-gray-700 mb-1">
                                    Open Graph Şəkli
                                    <span class="text-gray-400 font-normal">(1200x630 px tövsiyə olunur)</span>
                                </label>
                                @if($settings->og_image)
                                    <div class="mb-2 flex items-center gap-4">
                                        <img src="{{ Storage::url($settings->og_image) }}" alt="OG Image" class="h-20 rounded border">
                                        <label class="flex items-center text-sm text-red-600 cursor-pointer">
                                            <input type="checkbox" name="remove_og_image" value="1" class="mr-2">
                                            Şəkli sil
                                        </label>
                                    </div>
                                @endif
                                <input type="file" name="og_image" id="og_image" accept="image/*"
                                       class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Hero Section -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center">
                                <svg class="w-6 h-6 text-purple-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <h3 class="text-lg font-semibold text-gray-900">Hero Bölməsi</h3>
                            </div>
                            <span class="text-xs text-gray-400">Boş buraxılan sahələr üçün defolt dəyərlər istifadə olunacaq</span>
                        </div>

                        <div class="space-y-4">
                            <!-- Hero Badge -->
                            <div>
                                <label for="hero_badge" class="block text-sm font-medium text-gray-700 mb-1">
                                    Badge (kiçik etiket)
                                </label>
                                <input type="text" name="hero_badge" id="hero_badge"
                                       value="{{ old('hero_badge', $heroBadge) }}"
                                       maxlength="100"
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            </div>

                            <!-- Hero Title -->
                            <div>
                                <label for="hero_title" class="block text-sm font-medium text-gray-700 mb-1">
                                    Başlıq
                                </label>
                                <input type="text" name="hero_title" id="hero_title"
                                       value="{{ old('hero_title', $heroTitle) }}"
                                       maxlength="255"
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            </div>

                            <!-- Hero Subtitle -->
                            <div>
                                <label for="hero_subtitle" class="block text-sm font-medium text-gray-700 mb-1">
                                    Alt Başlıq
                                </label>
                                <input type="text" name="hero_subtitle" id="hero_subtitle"
                                       value="{{ old('hero_subtitle', $heroSubtitle) }}"
                                       maxlength="255"
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            </div>

                            <!-- Hero Description -->
                            <div>
                                <label for="hero_description" class="block text-sm font-medium text-gray-700 mb-1">
                                    Təsvir
                                </label>
                                <textarea name="hero_description" id="hero_description" rows="3"
                                          maxlength="1000"
                                          class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('hero_description', $heroDescription) }}</textarea>
                            </div>

                            <!-- Hero Image -->
                            <div>
                                <label for="hero_image" class="block text-sm font-medium text-gray-700 mb-1">
                                    Hero Şəkli
                                </label>
                                @if($settings->hero_image)
                                    <div class="mb-2 flex items-center gap-4">
                                        <img src="{{ Storage::url($settings->hero_image) }}" alt="Hero Image" class="h-20 rounded border">
                                        <label class="flex items-center text-sm text-red-600 cursor-pointer">
                                            <input type="checkbox" name="remove_hero_image" value="1" class="mr-2">
                                            Şəkli sil
                                        </label>
                                    </div>
                                @endif
                                <input type="file" name="hero_image" id="hero_image" accept="image/*"
                                       class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-purple-50 file:text-purple-700 hover:file:bg-purple-100">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Info Box -->
                <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 mb-6">
                    <div class="flex">
                        <svg class="w-5 h-5 text-blue-500 mr-2 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <div class="text-sm text-blue-700">
                            <p class="font-medium">Qeyd:</p>
                            <p>Bu parametrlər səhifənin görünüşünü və SEO-nu təsir edir. Dəyişikliklər dərhal tətbiq olunacaq. Boş buraxılan sahələr üçün defolt dəyərlər istifadə olunacaq.</p>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="flex justify-end">
                    <button type="submit" class="bg-primary hover:bg-blue-800 text-white px-6 py-2 rounded-md text-sm font-medium">
                        Yadda Saxla
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>
