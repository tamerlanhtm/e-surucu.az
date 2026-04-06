<x-admin-layout>
    <x-slot name="header">
        Xəbərlər İdarəsi
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-4">
                <div></div>
                <a href="{{ route('admin.news.create') }}" class="bg-primary hover:bg-blue-800 text-white px-4 py-2 rounded-md text-sm">
                    Yeni Xəbər
                </a>
            </div>

            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form id="bulk-delete-form" action="{{ route('admin.news.bulk-destroy') }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <div id="bulk-actions" class="hidden mb-4 items-center gap-4">
                            <span class="text-sm text-gray-600"><span id="selected-count">0</span> seçildi</span>
                            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-md text-sm" onclick="return confirm('Seçilmiş xəbərləri silmək istədiyinizdən əminsiniz?')">
                                Seçilmişləri Sil
                            </button>
                        </div>

                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-4 py-3 text-left">
                                            <input type="checkbox" id="select-all" class="rounded border-gray-300 text-primary focus:ring-primary">
                                        </th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Başlıq</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Kateqoriya</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tarix</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Əməliyyatlar</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @forelse($news as $item)
                                    <tr>
                                        <td class="px-4 py-4">
                                            <input type="checkbox" name="ids[]" value="{{ $item->id }}" class="news-checkbox rounded border-gray-300 text-primary focus:ring-primary">
                                        </td>
                                        <td class="px-6 py-4 text-sm">{{ $item->title }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $item->category->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $item->published_at?->format('d.m.Y') }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                                            <a href="{{ route('admin.news.edit', $item) }}" class="text-blue-600 hover:text-blue-900 mr-3">Redaktə</a>
                                            <form action="{{ route('admin.news.destroy', $item) }}" method="POST" class="inline" onsubmit="return confirm('Bu xəbəri silmək istədiyinizdən əminsiniz?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900">Sil</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                                            Heç bir xəbər tapılmadı.
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </form>

                    <div class="mt-4">
                        {{ $news->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const selectAll = document.getElementById('select-all');
            const checkboxes = document.querySelectorAll('.news-checkbox');
            const bulkActions = document.getElementById('bulk-actions');
            const selectedCount = document.getElementById('selected-count');

            function updateBulkActions() {
                const checked = document.querySelectorAll('.news-checkbox:checked').length;
                selectedCount.textContent = checked;
                if (checked > 0) {
                    bulkActions.classList.remove('hidden');
                    bulkActions.classList.add('flex');
                } else {
                    bulkActions.classList.add('hidden');
                    bulkActions.classList.remove('flex');
                }
            }

            selectAll.addEventListener('change', function() {
                checkboxes.forEach(cb => cb.checked = this.checked);
                updateBulkActions();
            });

            checkboxes.forEach(cb => {
                cb.addEventListener('change', function() {
                    selectAll.checked = document.querySelectorAll('.news-checkbox:checked').length === checkboxes.length;
                    updateBulkActions();
                });
            });
        });
    </script>
</x-admin-layout>
