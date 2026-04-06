<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-white leading-tight">
            Xəbərlər
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Category Filter -->
            <div class="mb-8 bg-white dark:bg-gray-800 rounded-lg shadow-md p-4">
                <div class="flex flex-wrap gap-3">
                    <a href="{{ route('news.index') }}" class="px-5 py-2.5 rounded-lg font-semibold transition {{ !request('category') ? 'bg-primary text-white shadow-lg' : 'bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-600' }}">
                        Hamısı
                    </a>
                    @foreach($categories as $category)
                        <a href="{{ route('news.index', ['category' => $category->slug]) }}"
                           class="px-5 py-2.5 rounded-lg font-semibold transition {{ request('category') == $category->slug ? 'bg-primary text-white shadow-lg' : 'bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-600' }}">
                            {{ $category->name }}
                        </a>
                    @endforeach
                </div>
            </div>

            <!-- News Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @forelse($news as $item)
                    <article class="group bg-white dark:bg-gray-800 rounded-xl shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-200 dark:border-gray-700">
                        @if($item->image)
                            <div class="relative h-48 overflow-hidden">
                                <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                <div class="absolute top-4 left-4">
                                    <span class="inline-block bg-secondary text-white text-xs font-semibold px-3 py-1 rounded-full">
                                        {{ $item->category->name }}
                                    </span>
                                </div>
                            </div>
                        @else
                            <div class="relative h-48 bg-gradient-to-br from-gray-100 to-gray-200 dark:from-gray-700 dark:to-gray-800 flex items-center justify-center">
                                <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                                </svg>
                                <div class="absolute top-4 left-4">
                                    <span class="inline-block bg-secondary text-white text-xs font-semibold px-3 py-1 rounded-full">
                                        {{ $item->category->name }}
                                    </span>
                                </div>
                            </div>
                        @endif

                        <a href="{{ route('news.show', $item->slug) }}" class="block p-6">
                            <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2 group-hover:text-primary dark:group-hover:text-blue-400 transition line-clamp-2">
                                {{ $item->title }}
                            </h3>
                            <p class="text-sm text-gray-600 dark:text-gray-400 mb-3 line-clamp-2">
                                {{ Str::limit(strip_tags($item->content), 100) }}
                            </p>
                            <div class="flex items-center justify-between">
                                <p class="text-sm text-gray-500 dark:text-gray-400 flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    {{ $item->published_at->format('d.m.Y') }}
                                </p>
                                <span class="text-primary dark:text-blue-400 font-semibold text-sm group-hover:underline">
                                    Daha ətraflı →
                                </span>
                            </div>
                        </a>
                    </article>
                @empty
                    <div class="col-span-3 text-center py-16 bg-white dark:bg-gray-800 rounded-xl">
                        <svg class="w-20 h-20 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <p class="text-gray-500 dark:text-gray-400 text-lg">Xəbər tapılmadı</p>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if($news->hasPages())
                <div class="mt-10">
                    {{ $news->links() }}
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
