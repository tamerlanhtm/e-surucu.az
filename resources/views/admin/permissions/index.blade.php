<x-admin-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                🔐 İstifadəçi Rolları və İcazələr
            </h2>
            @if(auth()->user()->role === 'admin')
                <form action="{{ route('admin.permissions.reset') }}" method="POST" onsubmit="return confirm('İcazələri default vəziyyətə qaytarmaq istədiyinizdən əminsiniz?')">
                    @csrf
                    <button type="submit" class="px-4 py-2 bg-orange-600 text-white rounded-lg hover:bg-orange-700 transition">
                        🔄 Reset to Defaults
                    </button>
                </form>
            @else
                <span class="px-4 py-2 bg-gray-100 text-gray-600 rounded-lg text-sm">
                    👀 Yalnız baxış rejimi
                </span>
            @endif
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if(session('success'))
                <div class="mb-6 bg-green-50 border border-green-200 text-green-800 px-6 py-4 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Role Overview Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <!-- Admin Card -->
                <div class="bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl shadow-lg p-6 text-white">
                    <div class="flex items-center mb-4">
                        <span class="text-4xl mr-3">🟣</span>
                        <div>
                            <h3 class="text-2xl font-bold">Admin</h3>
                            <p class="text-purple-100 text-sm">Tam sistem nəzarəti</p>
                        </div>
                    </div>
                    <p class="text-purple-50">İcazələri dəyişdirə bilər</p>
                </div>

                <!-- Moderator Card -->
                <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl shadow-lg p-6 text-white">
                    <div class="flex items-center mb-4">
                        <span class="text-4xl mr-3">🔵</span>
                        <div>
                            <h3 class="text-2xl font-bold">Moderator</h3>
                            <p class="text-blue-100 text-sm">Kontent meneceri</p>
                        </div>
                    </div>
                    <p class="text-blue-50">Fərdiləşdirilə bilən giriş</p>
                </div>

                <!-- User Card -->
                <div class="bg-gradient-to-br from-gray-500 to-gray-600 rounded-xl shadow-lg p-6 text-white">
                    <div class="flex items-center mb-4">
                        <span class="text-4xl mr-3">⚫</span>
                        <div>
                            <h3 class="text-2xl font-bold">İstifadəçi</h3>
                            <p class="text-gray-100 text-sm">Adi istifadəçi</p>
                        </div>
                    </div>
                    <p class="text-gray-50">Öyrənmə funksiyaları</p>
                </div>
            </div>

            <!-- Category Names Mapping -->
            @php
                $categoryNames = [
                    'user_management' => 'İstifadəçi İdarəetməsi',
                    'content_management' => 'Kontent İdarəetməsi',
                    'system_settings' => 'Sistem Parametrləri',
                ];
            @endphp

            <!-- Permissions Tables by Category -->
            <div class="space-y-6">
                @foreach(['user_management', 'content_management', 'system_settings'] as $category)
                    @php
                        // Get permissions for this category from all roles
                        $categoryPermissions = [];
                        foreach(['admin', 'moderator', 'user'] as $role) {
                            if (isset($permissionsByRole[$role][$category])) {
                                foreach ($permissionsByRole[$role][$category] as $perm) {
                                    $categoryPermissions[$perm->permission_key][$role] = $perm;
                                }
                            }
                        }
                    @endphp

                    @if(count($categoryPermissions) > 0)
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="bg-gray-50 px-6 py-4 border-b border-gray-200">
                                <h4 class="text-lg font-semibold text-gray-900 flex items-center">
                                    <span class="text-2xl mr-3">
                                        @if($category == 'user_management') 👥
                                        @elseif($category == 'content_management') 📰
                                        @else ⚙️
                                        @endif
                                    </span>
                                    {{ $categoryNames[$category] ?? $category }}
                                </h4>
                            </div>

                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-100">
                                        <tr>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                İcazə
                                            </th>
                                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                🟣 Admin
                                            </th>
                                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                🔵 Moderator
                                            </th>
                                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                ⚫ İstifadəçi
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach($categoryPermissions as $permKey => $roles)
                                            <tr class="hover:bg-gray-50">
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                    {{ $roles['admin']->permission_name ?? $roles['moderator']->permission_name ?? $roles['user']->permission_name }}
                                                </td>
                                                @foreach(['admin', 'moderator', 'user'] as $role)
                                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                                        @php
                                                            $permission = $roles[$role] ?? null;
                                                            $isGranted = $permission ? $permission->is_granted : false;
                                                            $isCritical = $role === 'admin' && in_array($permKey, ['permissions.edit', 'permissions.view']);
                                                            $isModerator = auth()->user()->role === 'moderator';
                                                            $isDisabled = $isCritical || $isModerator;
                                                        @endphp
                                                        
                                                        <label class="relative inline-flex items-center cursor-pointer">
                                                            <input type="checkbox"
                                                                   class="sr-only peer permission-toggle"
                                                                   data-role="{{ $role }}"
                                                                   data-permission="{{ $permKey }}"
                                                                   {{ $isGranted ? 'checked' : '' }}
                                                                   {{ $isDisabled ? 'disabled' : '' }}>
                                                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-green-600 {{ $isDisabled ? 'opacity-50 cursor-not-allowed' : '' }}"></div>
                                                        </label>
                                                        
                                                        @if($isCritical)
                                                            <span class="text-xs text-gray-400 block mt-1">Locked</span>
                                                        @endif
                                                    </td>
                                                @endforeach
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>

            <!-- Security Notes -->
            <div class="mt-6 bg-blue-50 border border-blue-200 rounded-lg p-6">
                <h4 class="text-lg font-semibold text-blue-900 mb-3 flex items-center">
                    <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                    </svg>
                    Təhlükəsizlik Qaydaları
                </h4>
                <ul class="space-y-2 text-blue-800">
                    <li class="flex items-start">
                        <span class="text-blue-600 mr-2">•</span>
                        <span>Admin rolunun icazələri locked (qırmızı) icazələri dəyişdirə bilməz</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-blue-600 mr-2">•</span>
                        <span>Toggle switch-ləri kliklə icazələri dəyişdirin</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-blue-600 mr-2">•</span>
                        <span>Dəyişikliklər dərhal tətbiq olunur</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-blue-600 mr-2">•</span>
                        <span>"Reset to Defaults" ilə bütün icazələri ilkin vəziyyətə qaytarın</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- JavaScript for Toggle Functionality -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggles = document.querySelectorAll('.permission-toggle');
            
            toggles.forEach(toggle => {
                toggle.addEventListener('change', async function() {
                    const role = this.dataset.role;
                    const permissionKey = this.dataset.permission;
                    const wasChecked = !this.checked; // Store previous state
                    
                    try {
                        const response = await fetch('{{ route('admin.permissions.toggle') }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify({
                                role: role,
                                permission_key: permissionKey
                            })
                        });
                        
                        const data = await response.json();
                        
                        if (!data.success) {
                            // Revert the toggle if failed
                            this.checked = wasChecked;
                            alert(data.message || 'İcazəni dəyişdirmək mümkün olmadı.');
                        } else {
                            // Show brief success indicator
                            const cell = this.closest('td');
                            cell.classList.add('bg-green-100');
                            setTimeout(() => {
                                cell.classList.remove('bg-green-100');
                            }, 500);
                        }
                    } catch (error) {
                        // Revert on error
                        this.checked = wasChecked;
                        alert('Xəta baş verdi. Yenidən cəhd edin.');
                    }
                });
            });
        });
    </script>
</x-admin-layout>