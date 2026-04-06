<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Yeni Reklam Yarat
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('admin.advertisements.store') }}" method="POST" enctype="multipart/form-data" x-data="{
                        type: '{{ old('type', 'image') }}',
                        position: '{{ old('position', '') }}',
                        positionInfo: {
                            'header': {
                                title: 'Header (Yuxarı)',
                                description: 'Saytın yuxarı hissəsində, naviqasiya menyusunun altında görünür.',
                                size: '728x90 px və ya 970x90 px',
                                icon: 'top'
                            },
                            'sidebar': {
                                title: 'Sidebar (Yan panel)',
                                description: 'Səhifənin sağ və ya sol tərəfindəki yan paneldə görünür.',
                                size: '300x250 px və ya 300x600 px',
                                icon: 'side'
                            },
                            'footer': {
                                title: 'Footer (Aşağı)',
                                description: 'Saytın aşağı hissəsində, footer-dən əvvəl görünür.',
                                size: '728x90 px',
                                icon: 'bottom'
                            },
                            'in-content': {
                                title: 'Məzmun daxili',
                                description: 'Xəbər və ya məqalə məzmununun ortasında görünür.',
                                size: '728x90 px və ya 300x250 px',
                                icon: 'content'
                            },
                            'popup': {
                                title: 'Popup',
                                description: 'Səhifə yükləndikdə və ya müəyyən vaxtdan sonra popup olaraq görünür.',
                                size: '600x400 px',
                                icon: 'popup'
                            },
                            'before-quiz': {
                                title: 'Test öncəsi',
                                description: 'Test başlamazdan əvvəl göstərilir.',
                                size: '728x90 px və ya 300x250 px',
                                icon: 'quiz'
                            },
                            'after-quiz': {
                                title: 'Test sonrası',
                                description: 'Test nəticələri səhifəsində göstərilir.',
                                size: '728x90 px və ya 300x250 px',
                                icon: 'quiz'
                            },
                            'home-banner': {
                                title: 'Ana səhifə banner',
                                description: 'Ana səhifədə böyük banner olaraq görünür.',
                                size: '1200x300 px və ya 970x250 px',
                                icon: 'banner'
                            }
                        }
                    }">
                        @csrf

                        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
                            <!-- Left Column - Form Fields -->
                            <div class="lg:col-span-2 space-y-4">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Ad *</label>
                                        <input type="text" name="name" id="name" value="{{ old('name') }}"
                                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50"
                                            required>
                                        @error('name')
                                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="position" class="block text-sm font-medium text-gray-700 mb-2">Mövqe *</label>
                                        <select name="position" id="position" x-model="position"
                                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50"
                                            required>
                                            <option value="">Seçin</option>
                                            @foreach($positions as $key => $label)
                                                <option value="{{ $key }}" {{ old('position') == $key ? 'selected' : '' }}>{{ $label }}</option>
                                            @endforeach
                                        </select>
                                        @error('position')
                                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Right Column - Position Preview -->
                            <div class="lg:col-span-1">
                                <div class="bg-gray-50 rounded-xl p-4 border-2 border-dashed border-gray-200 sticky top-24">
                                    <h4 class="text-sm font-semibold text-gray-700 mb-3 flex items-center">
                                        <svg class="w-4 h-4 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                        Mövqe Önizləməsi
                                    </h4>

                                    <!-- No Position Selected -->
                                    <div x-show="!position" class="text-center py-8">
                                        <svg class="w-16 h-16 mx-auto text-gray-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z" />
                                        </svg>
                                        <p class="text-sm text-gray-400">Mövqe seçin</p>
                                    </div>

                                    <!-- Position Info -->
                                    <div x-show="position && positionInfo[position]" x-cloak>
                                        <!-- Visual Preview -->
                                        <div class="bg-white rounded-lg border border-gray-200 p-3 mb-4">
                                            <!-- Website Layout Preview -->
                                            <div class="relative">
                                                <!-- Header Position -->
                                                <template x-if="position === 'header'">
                                                    <div class="space-y-1">
                                                        <div class="h-6 bg-gray-200 rounded"></div>
                                                        <div class="h-8 bg-blue-500 rounded animate-pulse flex items-center justify-center">
                                                            <span class="text-white text-xs font-medium">REKLAM</span>
                                                        </div>
                                                        <div class="h-20 bg-gray-100 rounded"></div>
                                                        <div class="h-16 bg-gray-100 rounded"></div>
                                                    </div>
                                                </template>

                                                <!-- Sidebar Position -->
                                                <template x-if="position === 'sidebar'">
                                                    <div class="flex gap-2">
                                                        <div class="flex-1 space-y-1">
                                                            <div class="h-6 bg-gray-200 rounded"></div>
                                                            <div class="h-32 bg-gray-100 rounded"></div>
                                                        </div>
                                                        <div class="w-1/3 space-y-1">
                                                            <div class="h-24 bg-blue-500 rounded animate-pulse flex items-center justify-center">
                                                                <span class="text-white text-xs font-medium">REKLAM</span>
                                                            </div>
                                                            <div class="h-12 bg-gray-100 rounded"></div>
                                                        </div>
                                                    </div>
                                                </template>

                                                <!-- Footer Position -->
                                                <template x-if="position === 'footer'">
                                                    <div class="space-y-1">
                                                        <div class="h-6 bg-gray-200 rounded"></div>
                                                        <div class="h-20 bg-gray-100 rounded"></div>
                                                        <div class="h-8 bg-blue-500 rounded animate-pulse flex items-center justify-center">
                                                            <span class="text-white text-xs font-medium">REKLAM</span>
                                                        </div>
                                                        <div class="h-10 bg-gray-200 rounded"></div>
                                                    </div>
                                                </template>

                                                <!-- In-Content Position -->
                                                <template x-if="position === 'in-content'">
                                                    <div class="space-y-1">
                                                        <div class="h-6 bg-gray-200 rounded"></div>
                                                        <div class="h-8 bg-gray-100 rounded"></div>
                                                        <div class="h-8 bg-blue-500 rounded animate-pulse flex items-center justify-center">
                                                            <span class="text-white text-xs font-medium">REKLAM</span>
                                                        </div>
                                                        <div class="h-8 bg-gray-100 rounded"></div>
                                                        <div class="h-12 bg-gray-100 rounded"></div>
                                                    </div>
                                                </template>

                                                <!-- Popup Position -->
                                                <template x-if="position === 'popup'">
                                                    <div class="relative">
                                                        <div class="space-y-1 opacity-50">
                                                            <div class="h-6 bg-gray-200 rounded"></div>
                                                            <div class="h-24 bg-gray-100 rounded"></div>
                                                        </div>
                                                        <div class="absolute inset-0 flex items-center justify-center">
                                                            <div class="bg-blue-500 rounded-lg p-4 shadow-lg animate-pulse">
                                                                <span class="text-white text-xs font-medium">POPUP REKLAM</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </template>

                                                <!-- Quiz Positions -->
                                                <template x-if="position === 'before-quiz' || position === 'after-quiz'">
                                                    <div class="space-y-1">
                                                        <div class="h-6 bg-gray-200 rounded"></div>
                                                        <template x-if="position === 'before-quiz'">
                                                            <div class="h-8 bg-blue-500 rounded animate-pulse flex items-center justify-center">
                                                                <span class="text-white text-xs font-medium">REKLAM</span>
                                                            </div>
                                                        </template>
                                                        <div class="h-16 bg-green-100 rounded flex items-center justify-center">
                                                            <span class="text-green-600 text-xs">TEST</span>
                                                        </div>
                                                        <template x-if="position === 'after-quiz'">
                                                            <div class="h-8 bg-blue-500 rounded animate-pulse flex items-center justify-center">
                                                                <span class="text-white text-xs font-medium">REKLAM</span>
                                                            </div>
                                                        </template>
                                                    </div>
                                                </template>

                                                <!-- Home Banner Position -->
                                                <template x-if="position === 'home-banner'">
                                                    <div class="space-y-1">
                                                        <div class="h-6 bg-gray-200 rounded"></div>
                                                        <div class="h-16 bg-blue-500 rounded animate-pulse flex items-center justify-center">
                                                            <span class="text-white text-xs font-medium">BÖYÜK BANNER REKLAM</span>
                                                        </div>
                                                        <div class="h-12 bg-gray-100 rounded"></div>
                                                        <div class="h-12 bg-gray-100 rounded"></div>
                                                    </div>
                                                </template>
                                            </div>
                                        </div>

                                        <!-- Position Details -->
                                        <div class="space-y-2">
                                            <h5 class="font-medium text-gray-900 text-sm" x-text="positionInfo[position]?.title"></h5>
                                            <p class="text-xs text-gray-600" x-text="positionInfo[position]?.description"></p>
                                            <div class="flex items-center text-xs text-blue-600 bg-blue-50 px-2 py-1 rounded">
                                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                                <span>Tövsiyə olunan: <strong x-text="positionInfo[position]?.size"></strong></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Növ *</label>
                            <div class="flex space-x-4">
                                <label class="inline-flex items-center">
                                    <input type="radio" name="type" value="image" x-model="type"
                                        class="rounded-full border-gray-300 text-primary shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">
                                    <span class="ml-2">Şəkil</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="radio" name="type" value="code" x-model="type"
                                        class="rounded-full border-gray-300 text-primary shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">
                                    <span class="ml-2">Kod (Google Ads, HTML)</span>
                                </label>
                            </div>
                            @error('type')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Image Section -->
                        <div x-show="type === 'image'" class="mb-4 p-4 bg-gray-50 rounded-lg">
                            <div class="mb-4">
                                <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Şəkil *</label>
                                <input type="file" name="image" id="image" accept="image/*"
                                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">
                                @error('image')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                                <p class="text-xs text-gray-500 mt-1" x-show="position && positionInfo[position]">
                                    Bu mövqe üçün tövsiyə olunan ölçü: <strong x-text="positionInfo[position]?.size"></strong>
                                </p>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="link" class="block text-sm font-medium text-gray-700 mb-2">Link (URL)</label>
                                    <input type="url" name="link" id="link" value="{{ old('link') }}"
                                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50"
                                        placeholder="https://example.com">
                                    @error('link')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="alt_text" class="block text-sm font-medium text-gray-700 mb-2">Alt Mətn</label>
                                    <input type="text" name="alt_text" id="alt_text" value="{{ old('alt_text') }}"
                                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50"
                                        placeholder="Şəkil açıqlaması">
                                    @error('alt_text')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="mt-4 flex items-center">
                                <input type="checkbox" name="open_in_new_tab" id="open_in_new_tab" value="1" {{ old('open_in_new_tab', true) ? 'checked' : '' }}
                                    class="rounded border-gray-300 text-primary shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">
                                <label for="open_in_new_tab" class="ml-2 block text-sm text-gray-900">Yeni tabda aç</label>
                            </div>
                        </div>

                        <!-- Code Section -->
                        <div x-show="type === 'code'" class="mb-4 p-4 bg-gray-50 rounded-lg">
                            <div>
                                <label for="code" class="block text-sm font-medium text-gray-700 mb-2">Reklam Kodu *</label>
                                <textarea name="code" id="code" rows="8"
                                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50 font-mono text-sm"
                                    placeholder="Google AdSense kodu və ya xüsusi HTML/JavaScript">{{ old('code') }}</textarea>
                                @error('code')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                                <p class="text-xs text-gray-500 mt-1">Google AdSense, özel HTML və ya JavaScript kodu buraya yapışdırın.</p>
                            </div>
                        </div>

                        <!-- Schedule -->
                        <div class="border-t pt-6 mt-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Tarix Aralığı (İxtiyari)</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="start_date" class="block text-sm font-medium text-gray-700 mb-2">Başlama Tarixi</label>
                                    <input type="date" name="start_date" id="start_date" value="{{ old('start_date') }}"
                                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">
                                    @error('start_date')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="end_date" class="block text-sm font-medium text-gray-700 mb-2">Bitmə Tarixi</label>
                                    <input type="date" name="end_date" id="end_date" value="{{ old('end_date') }}"
                                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">
                                    @error('end_date')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <p class="text-xs text-gray-500 mt-2">Boş buraxsanız, reklam limitsiz olaraq göstəriləcək.</p>
                        </div>

                        <!-- Settings -->
                        <div class="border-t pt-6 mt-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Parametrlər</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="order" class="block text-sm font-medium text-gray-700 mb-2">Sıra</label>
                                    <input type="number" name="order" id="order" value="{{ old('order', 0) }}"
                                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">
                                    @error('order')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                    <p class="text-xs text-gray-500 mt-1">Eyni mövqedə çoxlu reklam olduqda sıralama üçün istifadə olunur.</p>
                                </div>

                                <div class="flex items-center h-full pt-6">
                                    <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}
                                        class="rounded border-gray-300 text-primary shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">
                                    <label for="is_active" class="ml-2 block text-sm text-gray-900">Aktiv</label>
                                </div>
                            </div>
                        </div>

                        <div class="flex justify-end space-x-3 mt-6">
                            <a href="{{ route('admin.advertisements.index') }}"
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
