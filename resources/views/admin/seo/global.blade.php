<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            🌐 Global SEO Parametrləri
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="mb-6 bg-green-50 border border-green-200 text-green-800 px-6 py-4 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('admin.seo.global.update') }}" method="POST" enctype="multipart/form-data"
                class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- General Settings -->
                    <div class="space-y-6">
                        <h3 class="text-lg font-semibold text-gray-900 border-b pb-2">Ümumi Məlumatlar</h3>

                        <div>
                            <x-input-label for="site_title" value="Sayt Başlığı (Default Title)" />
                            <x-text-input id="site_title" name="site_title" type="text" class="mt-1 block w-full"
                                :value="old('site_title', $settings->site_title)" required />
                            <p class="text-sm text-gray-500 mt-1">Bütün səhifələrdə görünəcək əsas başlıq</p>
                        </div>

                        <div>
                            <x-input-label for="site_description" value="Meta Açıqlama (Description)" />
                            <textarea id="site_description" name="site_description" rows="4"
                                class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">{{ old('site_description', $settings->site_description) }}</textarea>
                            <p class="text-sm text-gray-500 mt-1">Sayt haqqında qısa məlumat (150-160 simvol)</p>
                        </div>

                        <div>
                            <x-input-label for="site_keywords" value="Açar Sözlər (Keywords)" />
                            <textarea id="site_keywords" name="site_keywords" rows="3"
                                class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">{{ old('site_keywords', $settings->site_keywords) }}</textarea>
                            <p class="text-sm text-gray-500 mt-1">Vergüllə ayıraraq yazın</p>
                        </div>
                    </div>

                    <!-- Social & Analytics -->
                    <div class="space-y-6">
                        <h3 class="text-lg font-semibold text-gray-900 border-b pb-2">Sosial Media və Analitika</h3>

                        <div>
                            <x-input-label for="og_image" value="Open Graph Şəkli (Default)" />
                            @if($settings->og_image)
                                <div class="mb-2">
                                    <img src="{{ Storage::url($settings->og_image) }}" alt="OG Image"
                                        class="h-32 w-auto rounded-lg border">
                                </div>
                            @endif
                            <input id="og_image" name="og_image" type="file"
                                class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100" />
                            <p class="text-sm text-gray-500 mt-1">Sosial mediada paylaşılan zaman görünəcək şəkil</p>
                        </div>

                        <div>
                            <x-input-label for="twitter_handle" value="Twitter Username" />
                            <div class="relative mt-1 rounded-md shadow-sm">
                                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                    <span class="text-gray-500 sm:text-sm">@</span>
                                </div>
                                <input type="text" name="twitter_handle" id="twitter_handle"
                                    class="block w-full rounded-md border-gray-300 pl-7 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    value="{{ old('twitter_handle', $settings->twitter_handle) }}"
                                    placeholder="username">
                            </div>
                        </div>

                        <div>
                            <x-input-label for="google_analytics_id" value="Google Analytics ID" />
                            <x-text-input id="google_analytics_id" name="google_analytics_id" type="text"
                                class="mt-1 block w-full" :value="old('google_analytics_id', $settings->google_analytics_id)" placeholder="G-XXXXXXXXXX" />
                        </div>

                        <div>
                            <x-input-label for="gtm_id" value="Google Tag Manager ID" />
                            <x-text-input id="gtm_id" name="gtm_id" type="text" class="mt-1 block w-full"
                                :value="old('gtm_id', $settings->gtm_id)" placeholder="GTM-XXXXXX" />
                        </div>

                        <div>
                            <x-input-label for="favicon" value="Favicon" />
                            @if($settings->favicon)
                                <div class="mb-2">
                                    <img src="{{ Storage::url($settings->favicon) }}" alt="Favicon" class="h-8 w-8">
                                </div>
                            @endif
                            <input id="favicon" name="favicon" type="file"
                                class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100" />
                        </div>
                    </div>
                </div>

                <div class="mt-8 flex justify-end">
                    <x-primary-button>
                        Yadda Saxla
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>