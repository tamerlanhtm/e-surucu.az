<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            🤖 Robots.txt Redaktoru
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="mb-6 bg-green-50 border border-green-200 text-green-800 px-6 py-4 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="mb-6">
                    <h3 class="text-lg font-semibold text-gray-900">Robots.txt Faylının Məzmunu</h3>
                    <p class="text-sm text-gray-500 mt-1">Bu fayl axtarış motorlarına saytın hansı hissələrini
                        indeksləməli olduğunu bildirir.</p>
                </div>

                <form action="{{ route('admin.seo.robots.update') }}" method="POST">
                    @csrf

                    <div class="mb-6">
                        <textarea id="robots_txt" name="robots_txt" rows="15"
                            class="font-mono text-sm mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm bg-gray-50 p-4">{{ old('robots_txt', $settings->robots_txt) }}</textarea>
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="text-sm text-gray-500">
                            <span class="font-semibold">Qeyd:</span> Səhv konfiqurasiya saytınızın Google-dan
                            silinməsinə səbəb ola bilər.
                        </div>
                        <x-primary-button>
                            Yadda Saxla
                        </x-primary-button>
                    </div>
                </form>
            </div>

            <!-- Helper Info -->
            <div class="mt-6 bg-blue-50 border border-blue-200 rounded-lg p-6">
                <h4 class="text-lg font-semibold text-blue-900 mb-3">Nümunə Konfiqurasiya</h4>
                <pre class="bg-blue-100 p-4 rounded text-sm text-blue-800 font-mono">
User-agent: *
Allow: /
Disallow: /admin/
Disallow: /private/

Sitemap: {{ config('app.url') }}/sitemap.xml</pre>
            </div>
        </div>
    </div>
</x-admin-layout>