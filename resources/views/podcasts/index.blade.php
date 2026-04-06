<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Podcastlar
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Page Header -->
            <div class="mb-8 text-center">
                <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-2">Podcastlar</h1>
                <p class="text-gray-600 dark:text-gray-400">Sürücülük haqqında maraqlı söhbətlər və məlumatlar</p>
            </div>

            @if($podcasts->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($podcasts as $podcast)
                        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                            <!-- Cover Image -->
                            <div class="relative aspect-square">
                                <img src="{{ $podcast->cover_url }}" alt="{{ $podcast->title }}"
                                    class="w-full h-full object-cover">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                                <div class="absolute bottom-4 left-4 right-4">
                                    <span class="inline-flex items-center px-2 py-1 bg-white/20 backdrop-blur-sm rounded-full text-white text-xs">
                                        <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd"/>
                                        </svg>
                                        {{ $podcast->formatted_duration }}
                                    </span>
                                </div>
                            </div>

                            <!-- Content -->
                            <div class="p-5">
                                <h3 class="font-bold text-lg text-gray-900 dark:text-white mb-2 line-clamp-2">
                                    {{ $podcast->title }}
                                </h3>
                                @if($podcast->description)
                                    <p class="text-gray-600 dark:text-gray-400 text-sm mb-4 line-clamp-2">
                                        {{ $podcast->description }}
                                    </p>
                                @endif

                                <!-- Audio Player -->
                                <div class="podcast-player" data-podcast-id="{{ $podcast->id }}">
                                    <audio class="w-full" controls preload="metadata">
                                        <source src="{{ $podcast->audio_url }}" type="audio/mpeg">
                                        Brauzeriniz audio dəstəkləmir.
                                    </audio>
                                </div>

                                <!-- Stats -->
                                <div class="flex items-center justify-between mt-4 pt-4 border-t border-gray-100 dark:border-gray-700">
                                    <div class="flex items-center text-gray-500 dark:text-gray-400 text-sm">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                        </svg>
                                        <span><span class="plays-count">{{ number_format($podcast->plays_count) }}</span> dinləmə</span>
                                    </div>
                                    <div class="text-gray-400 dark:text-gray-500 text-xs">
                                        {{ $podcast->created_at->format('d.m.Y') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-8">
                    {{ $podcasts->links() }}
                </div>
            @else
                <div class="text-center py-12">
                    <svg class="mx-auto h-16 w-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z"/>
                    </svg>
                    <h3 class="mt-4 text-lg font-medium text-gray-900 dark:text-white">Podcast tapılmadı</h3>
                    <p class="mt-2 text-gray-500 dark:text-gray-400">Tezliklə yeni podcastlar əlavə olunacaq.</p>
                </div>
            @endif
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const players = document.querySelectorAll('.podcast-player');

            players.forEach(player => {
                const audio = player.querySelector('audio');
                const podcastId = player.dataset.podcastId;
                let played = false;

                audio.addEventListener('play', function() {
                    if (!played) {
                        played = true;
                        // Increment play count
                        fetch(`/podcasts/${podcastId}/play`, {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                                'Accept': 'application/json'
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                const countEl = player.closest('.bg-white, .dark\\:bg-gray-800').querySelector('.plays-count');
                                if (countEl) {
                                    countEl.textContent = new Intl.NumberFormat().format(data.plays);
                                }
                            }
                        })
                        .catch(console.error);
                    }

                    // Pause other players
                    players.forEach(otherPlayer => {
                        if (otherPlayer !== player) {
                            const otherAudio = otherPlayer.querySelector('audio');
                            if (!otherAudio.paused) {
                                otherAudio.pause();
                            }
                        }
                    });
                });
            });
        });
    </script>
</x-app-layout>
