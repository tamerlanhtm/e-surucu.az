<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            📊 SEO İdarə Paneli
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="mb-6 bg-green-50 border border-green-200 text-green-800 px-6 py-4 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <!-- Sitemap Card -->
                <div class="bg-gradient-to-br from-green-500 to-green-600 rounded-xl shadow-lg p-6 text-white">
                    <div class="flex items-center mb-4">
                        <span class="text-4xl mr-3">🗺️</span>
                        <div>
                            <h3 class="text-2xl font-bold">{{ $newsCount + 1 }}</h3>
                            <p class="text-sm" style="color: white !important;">Sitemap səhifələri</p>
                        </div>
                    </div>
                    <form action="{{ route('admin.seo.sitemap.generate') }}" method="POST" class="mt-4">
                        @csrf
                        <button type="submit"
                            class="bg-white text-green-600 px-4 py-2 rounded-lg hover:bg-green-50 transition text-sm font-medium">
                            ↻ Yenilə
                        </button>
                    </form>
                </div>

                <!-- SEO Status Card -->
                <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl shadow-lg p-6 text-white">
                    <div class="flex items-center mb-4">
                        <span class="text-4xl mr-3">📈</span>
                        <div>
                            <h3 class="text-2xl font-bold">{{ $newsCount - $newsWithoutSeo }}</h3>
                            <p class="text-sm" style="color: white !important;">SEO optimizasiya olunmuş</p>
                        </div>
                    </div>
                    @if($newsWithoutSeo > 0)
                        <p class="text-sm" style="color: white !important;">⚠️ {{ $newsWithoutSeo }} xəbərdə SEO yoxdur</p>
                    @else
                        <p class="text-sm" style="color: white !important;">✅ Bütün xəbərlər optimizasiya olunub</p>
                    @endif
                </div>

                <!-- Analytics Card -->
                <div class="bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl shadow-lg p-6 text-white">
                    <div class="flex items-center mb-4">
                        <span class="text-4xl mr-3">📊</span>
                        <div>
                            <h3 class="text-2xl font-bold">Analytics</h3>
                            <p class="text-sm" style="color: white !important;">Tracking kodu</p>
                        </div>
                    </div>
                    @if($settings->google_analytics_id)
                        <p class="text-sm" style="color: white !important;">✅ {{ $settings->google_analytics_id }}</p>
                    @else
                        <p class="text-sm" style="color: white !important;">❌ Quraşdırılmayıb</p>
                    @endif
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Global Settings -->
                <a href="{{ route('admin.seo.global') }}"
                    class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 hover:shadow-md transition group">
                    <div class="flex items-center mb-3">
                        <span class="text-4xl mr-4">🌐</span>
                        <h3 class="text-lg font-semibold text-gray-900">Global Parametrlər</h3>
                    </div>
                    <p class="text-gray-600 text-sm">Site başlığı, açıqlama, Open Graph və s.</p>
                    <div class="mt-4 text-blue-600 group-hover:text-blue-700 font-medium">
                        Redaktə et →
                    </div>
                </a>

                <!-- Robots.txt -->
                <a href="{{ route('admin.seo.robots') }}"
                    class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 hover:shadow-md transition group">
                    <div class="flex items-center mb-3">
                        <span class="text-4xl mr-4">🤖</span>
                        <h3 class="text-lg font-semibold text-gray-900">Robots.txt</h3>
                    </div>
                    <p class="text-gray-600 text-sm">Axtarış motorları üçün qaydalar</p>
                    <div class="mt-4 text-blue-600 group-hover:text-blue-700 font-medium">
                        Redaktə et →
                    </div>
                </a>

                <!-- Sitemap -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <div class="flex items-center mb-3">
                        <span class="text-4xl mr-4">📄</span>
                        <h3 class="text-lg font-semibold text-gray-900">XML Sitemap</h3>
                    </div>
                    <p class="text-gray-600 text-sm">Avtomatik yaradılmış sitemap</p>
                    <div class="mt-4">
                        <a href="/storage/sitemap.xml" target="_blank"
                            class="text-blue-600 hover:text-blue-700 font-medium">
                            Göstər →
                        </a>
                    </div>
                </div>
            </div>

            <!-- SEO Best Practices -->
            <div class="mt-8 bg-indigo-50 border border-indigo-200 rounded-lg p-6">
                <h4 class="text-lg font-semibold text-indigo-900 mb-4 flex items-center">
                    <span class="text-2xl mr-2">💡</span>
                    SEO Best Practices
                </h4>
                <ul class="space-y-2 text-indigo-800">
                    <li class="flex items-start">
                        <span class="text-indigo-600 mr-2">•</span>
                        Meta başlıq: 50-60 simvol olmalıdır
                    </li>
                    <li class="flex items-start">
                        <span class="text-indigo-600 mr-2">•</span>
                        Meta açıqlama: 150-160 simvol optimal uzunluqdur
                    </li>
                    <li class="flex items-start">
                        <span class="text-indigo-600 mr-2">•</span>
                        Şəkillərdə ALT text istifadə edin
                    </li>
                    <li class="flex items-start">
                        <span class="text-indigo-600 mr-2">•</span>
                        Hər xəbər üçün unique meta tags yazın
                    </li>
                    <li class="flex items-start">
                        <span class="text-indigo-600 mr-2">•</span>
                        Open Graph şəkli sosial mediada paylaşım üçün vacibdir
                    </li>
                </ul>
            </div>
        </div>
    </div>
</x-admin-layout>