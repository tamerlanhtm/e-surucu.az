<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Səhifəni Redaktə Et: {{ $page->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('admin.pages.update', $page) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Başlıq *</label>
                                <input type="text" name="title" id="title" value="{{ old('title', $page->title) }}"
                                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50"
                                    required>
                                @error('title')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="slug" class="block text-sm font-medium text-gray-700 mb-2">Slug (URL)</label>
                                <input type="text" name="slug" id="slug" value="{{ old('slug', $page->slug) }}"
                                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">
                                @error('slug')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="content" class="block text-sm font-medium text-gray-700 mb-2">Məzmun</label>
                            <textarea name="content" id="content" rows="15"
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">{{ old('content', $page->content) }}</textarea>
                            @error('content')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                            <div>
                                <label for="order" class="block text-sm font-medium text-gray-700 mb-2">Sıra</label>
                                <input type="number" name="order" id="order" value="{{ old('order', $page->order) }}"
                                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">
                                @error('order')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="flex items-center h-full pt-6">
                                <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', $page->is_active) ? 'checked' : '' }}
                                    class="rounded border-gray-300 text-primary shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">
                                <label for="is_active" class="ml-2 block text-sm text-gray-900">Aktiv</label>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div class="flex items-center">
                                <input type="checkbox" name="show_in_header" id="show_in_header" value="1" {{ old('show_in_header', $page->show_in_header) ? 'checked' : '' }}
                                    class="rounded border-gray-300 text-primary shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">
                                <label for="show_in_header" class="ml-2 block text-sm text-gray-900">Header-də göstər</label>
                            </div>

                            <div class="flex items-center">
                                <input type="checkbox" name="show_in_footer" id="show_in_footer" value="1" {{ old('show_in_footer', $page->show_in_footer) ? 'checked' : '' }}
                                    class="rounded border-gray-300 text-primary shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">
                                <label for="show_in_footer" class="ml-2 block text-sm text-gray-900">Footer-də göstər</label>
                            </div>
                        </div>

                        <!-- SEO Section -->
                        <div class="border-t pt-6 mt-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">SEO Parametrləri (İxtiyari)</h3>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div class="mb-4">
                                    <label for="meta_title" class="block text-sm font-medium text-gray-700 mb-2">Meta Başlıq</label>
                                    <input type="text" name="meta_title" id="meta_title" value="{{ old('meta_title', $page->meta_title) }}"
                                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50"
                                        placeholder="50-60 simvol tövsiyə olunur">
                                </div>

                                <div class="mb-4">
                                    <label for="meta_keywords" class="block text-sm font-medium text-gray-700 mb-2">Açar Sözlər</label>
                                    <input type="text" name="meta_keywords" id="meta_keywords" value="{{ old('meta_keywords', $page->meta_keywords) }}"
                                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50"
                                        placeholder="Vergüllə ayırın">
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="meta_description" class="block text-sm font-medium text-gray-700 mb-2">Meta Açıqlama</label>
                                <textarea name="meta_description" id="meta_description" rows="3"
                                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50"
                                    placeholder="150-160 simvol tövsiyə olunur">{{ old('meta_description', $page->meta_description) }}</textarea>
                            </div>

                            <div class="mb-4">
                                <label for="og_image" class="block text-sm font-medium text-gray-700 mb-2">OG Şəkli (Sosial Media)</label>
                                @if($page->og_image)
                                    <div class="mb-2">
                                        <img src="{{ Storage::url($page->og_image) }}" alt="OG Image" class="h-32 w-auto rounded">
                                    </div>
                                @endif
                                <input type="file" name="og_image" id="og_image" accept="image/*"
                                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">
                                <p class="text-xs text-gray-500 mt-1">Sosial mediada paylaşım üçün xüsusi şəkil (1200x630 px tövsiyə olunur).</p>
                            </div>
                        </div>

                        <div class="flex justify-end space-x-3 mt-6">
                            <a href="{{ route('admin.pages.index') }}"
                                class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50">
                                Ləğv et
                            </a>
                            <button type="submit" class="px-4 py-2 bg-primary text-white rounded-md hover:bg-blue-800">
                                Yenilə
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
