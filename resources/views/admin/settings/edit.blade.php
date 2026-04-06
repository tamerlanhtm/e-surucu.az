<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Parametrlər
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-semibold mb-6 text-gray-800">Sayt Parametrləri</h3>

                    <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-8">
                            <h4 class="text-md font-semibold mb-4 text-gray-700 border-b pb-2">Logo</h4>
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Cari logo</label>
                                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-24 w-auto border rounded p-2">
                            </div>
                            <div>
                                <label for="logo" class="block text-sm font-medium text-gray-700 mb-2">Yeni logo yüklə (PNG şəkli)</label>
                                <input type="file" name="logo" id="logo" accept="image/png" class="w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">
                                <p class="text-xs text-gray-500 mt-1">Təvsiyə olunan: PNG format, şəffaf fon</p>
                                @error('logo')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-8">
                            <h4 class="text-md font-semibold mb-4 text-gray-700 border-b pb-2">Qeydiyyat</h4>
                            <div class="flex items-center justify-between">
                                <div>
                                    <label for="registration_enabled" class="text-sm font-medium text-gray-700">İstifadəçi qeydiyyatı</label>
                                    <p class="text-xs text-gray-500">Yeni istifadəçilərin saytda qeydiyyatdan keçməsinə icazə verin</p>
                                </div>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" name="registration_enabled" id="registration_enabled" value="1" class="sr-only peer" {{ $settings['registration_enabled'] == '1' ? 'checked' : '' }}>
                                    <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-primary/20 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary"></div>
                                </label>
                            </div>
                        </div>

                        <div class="mb-8">
                            <h4 class="text-md font-semibold mb-4 text-gray-700 border-b pb-2">Instagram Reels</h4>

                            <div class="flex items-center justify-between mb-6 p-4 rounded-lg border" id="instagram_reels_container" style="background-color: {{ $settings['instagram_reels_enabled'] == '1' ? '#f0fdf4' : '#fef2f2' }}; border-color: {{ $settings['instagram_reels_enabled'] == '1' ? '#bbf7d0' : '#fecaca' }};">
                                <div>
                                    <label for="instagram_reels_enabled" class="text-sm font-medium text-gray-700">Bölməni göstər</label>
                                    <p class="text-xs text-gray-500">Ana səhifədə Instagram Reels bölməsini göstər/gizlət</p>
                                </div>
                                <div class="flex items-center gap-3">
                                    <span id="instagram_status_label" class="text-sm font-bold px-3 py-1 rounded-full" style="background-color: {{ $settings['instagram_reels_enabled'] == '1' ? '#22c55e' : '#ef4444' }}; color: white;">
                                        {{ $settings['instagram_reels_enabled'] == '1' ? 'Aktiv' : 'Deaktiv' }}
                                    </span>
                                    <input type="checkbox" name="instagram_reels_enabled" id="instagram_reels_enabled" value="1" {{ $settings['instagram_reels_enabled'] == '1' ? 'checked' : '' }} onchange="updateInstagramStatus(this)" style="width: 24px; height: 24px; cursor: pointer; accent-color: #22c55e;">
                                </div>
                            </div>
                            <script>
                                function updateInstagramStatus(checkbox) {
                                    const container = document.getElementById('instagram_reels_container');
                                    const label = document.getElementById('instagram_status_label');
                                    if (checkbox.checked) {
                                        container.style.backgroundColor = '#f0fdf4';
                                        container.style.borderColor = '#bbf7d0';
                                        label.style.backgroundColor = '#22c55e';
                                        label.textContent = 'Aktiv';
                                    } else {
                                        container.style.backgroundColor = '#fef2f2';
                                        container.style.borderColor = '#fecaca';
                                        label.style.backgroundColor = '#ef4444';
                                        label.textContent = 'Deaktiv';
                                    }
                                }
                            </script>

                            <div class="mb-6">
                                <label for="instagram_reels_heading" class="block text-sm font-medium text-gray-700 mb-2">Başlıq</label>
                                <input type="text" name="instagram_reels_heading" id="instagram_reels_heading" value="{{ old('instagram_reels_heading', $settings['instagram_reels_heading']) }}" class="w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50" required>
                                @error('instagram_reels_heading')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-6">
                                <label for="instagram_reels_subheading" class="block text-sm font-medium text-gray-700 mb-2">Alt başlıq</label>
                                <input type="text" name="instagram_reels_subheading" id="instagram_reels_subheading" value="{{ old('instagram_reels_subheading', $settings['instagram_reels_subheading']) }}" class="w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50" required>
                                @error('instagram_reels_subheading')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="flex justify-end">
                            <button type="submit" class="px-4 py-2 bg-primary text-white rounded-md hover:bg-blue-800">
                                Yadda saxla
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Cache Management -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-6">
                <div class="p-6">
                    <h3 class="text-lg font-semibold mb-4 text-gray-800">Keş İdarəetməsi</h3>
                    <p class="text-sm text-gray-600 mb-4">
                        Saytda dəyişikliklər görünmürsə, keşləri təmizləyin. Bu əməliyyat bütün keşləri siləcək:
                    </p>
                    <ul class="text-sm text-gray-600 mb-4 list-disc list-inside space-y-1">
                        <li>Application Cache - Tətbiq keşi</li>
                        <li>View Cache - Şablon keşi</li>
                        <li>Route Cache - Marşrut keşi</li>
                        <li>Config Cache - Konfiqurasiya keşi</li>
                        <li>OPcache - PHP keşi (əgər aktivdirsə)</li>
                    </ul>
                    <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 mb-4">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm text-yellow-700">
                                    <strong>Qeyd:</strong> Keşləri təmizlədikdən sonra sayt bir neçə saniyə yavaş işləyə bilər, çünki keşlər yenidən yaradılmalıdır.
                                </p>
                            </div>
                        </div>
                    </div>
                    <form action="{{ route('admin.settings.clear-cache') }}" method="POST" onsubmit="return confirm('Bütün keşləri silmək istədiyinizdən əminsiniz?')">
                        @csrf
                        <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 inline-flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                            Bütün Keşləri Sil
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
