<x-admin-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center gap-4">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                İstifadəçi Məlumatları
            </h2>
            <a href="{{ route('admin.users.index') }}"
                class="px-4 py-2 bg-gray-600 text-white rounded-md hover:bg-gray-700 whitespace-nowrap">
                ← Geri
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!-- User Info Card -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="flex items-center space-x-6 mb-6">
                        <div
                            class="flex-shrink-0 h-24 w-24 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center text-white text-4xl font-bold">
                            {{ strtoupper(substr($user->name, 0, 1)) }}
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-gray-900">{{ $user->name }}</h3>
                            <p class="text-gray-600">{{ $user->email }}</p>
                            <div class="mt-2">
                                @if($user->role === 'admin')
                                    <span
                                        class="px-3 py-1 text-sm font-semibold rounded-full bg-purple-100 text-purple-800">
                                        🟣 Admin
                                    </span>
                                @elseif($user->role === 'moderator')
                                    <span class="px-3 py-1 text-sm font-semibold rounded-full bg-blue-100 text-blue-800">
                                        🔵 Moderator
                                    </span>
                                @else
                                    <span class="px-3 py-1 text-sm font-semibold rounded-full bg-gray-100 text-gray-800">
                                        ⚫ İstifadəçi
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="p-4 bg-gray-50 rounded-lg">
                            <p class="text-sm text-gray-500">Qeydiyyat Tarixi</p>
                            <p class="text-lg font-semibold text-gray-900">{{ $user->created_at->format('d.m.Y H:i') }}
                            </p>
                        </div>
                        <div class="p-4 bg-gray-50 rounded-lg">
                            <p class="text-sm text-gray-500">Son E-mail Təsdiqi</p>
                            <p class="text-lg font-semibold text-gray-900">
                                {{ $user->email_verified_at ? $user->email_verified_at->format('d.m.Y H:i') : 'Təsdiqlənməyib' }}
                            </p>
                        </div>
                        <div class="p-4 bg-gray-50 rounded-lg">
                            <p class="text-sm text-gray-500">Son Fəaliyyət</p>
                            <p class="text-lg font-semibold text-gray-900">
                                {{ $user->last_activity_at ? $user->last_activity_at->format('d.m.Y H:i') : 'Məlumat yoxdur' }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Gamification Stats -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Oyunlaşdırma Statistikası</h3>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <!-- Level Card -->
                        <div class="p-6 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl text-white">
                            <p class="text-sm opacity-80 mb-1">Səviyyə</p>
                            <p class="text-4xl font-bold">{{ $level }}</p>
                        </div>

                        <!-- XP Card -->
                        <div class="p-6 bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl text-white">
                            <p class="text-sm opacity-80 mb-1">Təcrübə Xal</p>
                            <p class="text-4xl font-bold">{{ $user->xp }}</p>
                            <div class="mt-3">
                                <div class="w-full bg-purple-400 rounded-full h-2">
                                    <div class="bg-white h-2 rounded-full" style="width: {{ $xpProgressPercent }}%">
                                    </div>
                                </div>
                                <p class="text-xs mt-1 opacity-80">{{ $xpProgress }}/100 sonrakı səviyyəyə</p>
                            </div>
                        </div>

                        <!-- Streak Card -->
                        <div class="p-6 bg-gradient-to-br from-orange-500 to-orange-600 rounded-xl text-white">
                            <p class="text-sm opacity-80 mb-1">Ardıcıllıq</p>
                            <div class="flex items-center">
                                <svg class="w-8 h-8 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M12.395 2.553a1 1 0 00-1.45-.385c-.345.23-.614.558-.822.88-.214.33-.403.713-.57 1.116-.334.804-.614 1.768-.84 2.734a31.365 31.365 0 00-.613 3.58 2.64 2.64 0 01-.945-1.067c-.328-.68-.398-1.534-.398-2.654A1 1 0 005.05 6.05 6.981 6.981 0 003 11a7 7 0 1011.95-4.95c-.592-.591-.98-.985-1.348-1.467-.363-.476-.724-1.063-1.207-2.03zM12.12 15.12A3 3 0 017 13s.879.5 2.5.5c0-1 .5-4 1.25-4.5.5 1 .786 1.293 1.371 1.879A2.99 2.99 0 0113 13a2.99 2.99 0 01-.879 2.121z" />
                                </svg>
                                <p class="text-4xl font-bold">{{ $user->streak_count }}</p>
                            </div>
                            <p class="text-sm opacity-80 mt-2">günlük seriya</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Actions -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Əməliyyatlar</h3>
                    <div class="flex flex-wrap gap-3">
                        <a href="{{ route('admin.users.edit', $user) }}"
                            class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                            Redaktə et
                        </a>
                        @if($user->id !== auth()->id())
                            <form action="{{ route('admin.users.toggle-admin', $user) }}" method="POST" class="inline">
                                @csrf
                                <button type="submit"
                                    class="px-6 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition-colors">
                                    {{ $user->is_admin ? 'Admin Hüququnu Al' : 'Admin Hüququ Ver' }}
                                </button>
                            </form>
                            <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="inline"
                                onsubmit="return confirm('Bu istifadəçini silmək istədiyinizdən əminsiniz?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="px-6 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors">
                                    İstifadəçini Sil
                                </button>
                            </form>
                        @else
                            <p class="text-sm text-gray-500 py-2">Öz hesabınız üzərində bu əməliyyatları edə bilməzsiniz.
                            </p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>