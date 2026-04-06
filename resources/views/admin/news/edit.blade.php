<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Xəbəri Redaktə Et
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('admin.news.update', $news) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="category_id"
                                class="block text-sm font-medium text-gray-700 mb-2">Kateqoriya</label>
                            <select name="category_id" id="category_id"
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50"
                                required>
                                <option value="">Seçin</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ (old('category_id', $news->category_id) == $category->id) ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Başlıq</label>
                            <input type="text" name="title" id="title" value="{{ old('title', $news->title) }}"
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50"
                                required>
                            @error('title')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="content" class="block text-sm font-medium text-gray-700 mb-2">Məzmun</label>
                            <textarea name="content" id="content" rows="10"
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50"
                                required>{{ old('content', $news->content) }}</textarea>
                            @error('content')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        @if($news->image)
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Mövcud şəkil</label>
                                <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}"
                                    class="w-48 h-32 object-cover rounded">
                            </div>
                        @endif

                        <div class="mb-4">
                            <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Yeni şəkil
                                (ixtiyari)</label>
                            <input type="file" name="image" id="image" accept="image/*"
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">
                            @error('image')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="instagram_embed" class="block text-sm font-medium text-gray-700 mb-2">Instagram
                                Post URL (məsələn: https://www.instagram.com/p/ABC123/)</label>
                            <input type="url" name="instagram_embed" id="instagram_embed"
                                value="{{ old('instagram_embed', $news->instagram_embed) }}"
                                placeholder="https://www.instagram.com/p/ABC123/"
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">
                            @error('instagram_embed')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                            <p class="text-xs text-gray-500 mt-1">Instagram postunun URL-ni daxil edin. Post avtomatik
                                olaraq embed ediləcək.</p>
                        </div>

                        <div class="mb-4">
                            <label for="published_at" class="block text-sm font-medium text-gray-700 mb-2">Nəşr
                                tarixi</label>
                            <input type="datetime-local" name="published_at" id="published_at"
                                value="{{ old('published_at', $news->published_at?->format('Y-m-d\TH:i')) }}"
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">
                            @error('published_at')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <div class="flex items-center">
                                <input type="checkbox" name="is_featured" id="is_featured" value="1" {{ old('is_featured', $news->is_featured) ? 'checked' : '' }}
                                    class="rounded border-gray-300 text-primary shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">
                                <label for="is_featured" class="ml-2 block text-sm text-gray-900">
                                    Ana səhifədə göstər (Seçilmiş bloq)
                                </label>
                            </div>
                            <p class="text-xs text-gray-500 mt-1">Bu xəbər ana səhifədə "Seçilmiş bloq" bölməsində göstəriləcək.</p>
                        </div>

                        <!-- SEO Section -->
                        <div class="border-t pt-6 mt-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">SEO Parametrləri (İxtiyari)</h3>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div class="mb-4">
                                    <label for="meta_title" class="block text-sm font-medium text-gray-700 mb-2">Meta
                                        Başlıq (Title)</label>
                                    <input type="text" name="meta_title" id="meta_title"
                                        value="{{ old('meta_title', $news->meta_title) }}"
                                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50"
                                        placeholder="50-60 simvol tövsiyə olunur">
                                    <p class="text-xs text-gray-500 mt-1">Boş buraxılsa, xəbər başlığı istifadə
                                        olunacaq.</p>
                                </div>

                                <div class="mb-4">
                                    <label for="canonical_url"
                                        class="block text-sm font-medium text-gray-700 mb-2">Canonical URL</label>
                                    <input type="url" name="canonical_url" id="canonical_url"
                                        value="{{ old('canonical_url', $news->canonical_url) }}"
                                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="meta_description" class="block text-sm font-medium text-gray-700 mb-2">Meta
                                    Açıqlama (Description)</label>
                                <textarea name="meta_description" id="meta_description" rows="3"
                                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50"
                                    placeholder="150-160 simvol tövsiyə olunur">{{ old('meta_description', $news->meta_description) }}</textarea>
                            </div>

                            <div class="mb-4">
                                <label for="meta_keywords" class="block text-sm font-medium text-gray-700 mb-2">Açar
                                    Sözlər (Keywords)</label>
                                <textarea name="meta_keywords" id="meta_keywords" rows="2"
                                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50"
                                    placeholder="Vergüllə ayırın">{{ old('meta_keywords', $news->meta_keywords) }}</textarea>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div class="mb-4">
                                    <label for="og_image" class="block text-sm font-medium text-gray-700 mb-2">OG Şəkli
                                        (Sosial Media)</label>
                                    @if($news->og_image)
                                        <div class="mb-2">
                                            <img src="{{ Storage::url($news->og_image) }}" alt="OG Image"
                                                class="h-20 w-auto rounded border">
                                        </div>
                                    @endif
                                    <input type="file" name="og_image" id="og_image" accept="image/*"
                                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">
                                    <p class="text-xs text-gray-500 mt-1">Sosial mediada paylaşım üçün xüsusi şəkil.</p>
                                </div>

                                <div class="mb-4 flex items-center h-full pt-6">
                                    <input type="checkbox" name="noindex" id="noindex" value="1" {{ old('noindex', $news->noindex) ? 'checked' : '' }}
                                        class="rounded border-gray-300 text-primary shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">
                                    <label for="noindex" class="ml-2 block text-sm text-gray-900">
                                        Noindex (Axtarış motorları indeksləməsin)
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="flex justify-end space-x-3">
                            <a href="{{ route('admin.news.index') }}"
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

    @vite('resources/js/quill-init.js')
    <script type="module">
        document.addEventListener('DOMContentLoaded', function() {
            if (typeof window.Quill !== 'undefined') {
                const element = document.querySelector('#content');

                if (element) {
                    // Create a container for Quill
                    const container = document.createElement('div');
                    container.style.marginBottom = '1rem';
                    element.parentNode.insertBefore(container, element);
                    element.style.display = 'none';

                    const quill = new window.Quill(container, {
                        theme: 'snow',
                        modules: {
                            toolbar: [
                                [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
                                ['bold', 'italic', 'underline', 'strike'],
                                [{ 'color': [] }, { 'background': [] }],
                                [{ 'align': [] }],
                                [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                                ['blockquote', 'code-block'],
                                ['link', 'image'],
                                ['clean']
                            ]
                        },
                        placeholder: 'Məzmunu daxil edin...'
                    });

                    // Set initial content from textarea
                    if (element.value) {
                        quill.root.innerHTML = element.value;
                    }

                    // Update textarea on content change
                    quill.on('text-change', function() {
                        element.value = quill.root.innerHTML;
                    });

                    // Set minimum height
                    quill.root.style.minHeight = '400px';
                }
            }
        });
    </script>
</x-admin-layout>