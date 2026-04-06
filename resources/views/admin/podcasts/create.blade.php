<x-admin-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Yeni Podcast
            </h2>
            <a href="{{ route('admin.podcasts.index') }}" class="text-gray-600 hover:text-gray-900">
                Geri
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form id="podcastForm" action="{{ route('admin.podcasts.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-6">
                            <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Başlıq *</label>
                            <input type="text" name="title" id="title" value="{{ old('title') }}"
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50" required>
                            @error('title')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Təsvir</label>
                            <textarea name="description" id="description" rows="4"
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">{{ old('description') }}</textarea>
                            @error('description')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="audio_file" class="block text-sm font-medium text-gray-700 mb-2">Audio Fayl *</label>
                            <input type="file" name="audio_file" id="audio_file" accept="audio/*"
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50" required>
                            <p class="text-xs text-gray-500 mt-1">MP3, WAV, OGG, M4A formatları dəstəklənir. Maksimum 100MB</p>
                            @error('audio_file')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="cover_image" class="block text-sm font-medium text-gray-700 mb-2">Üz Şəkli</label>
                            <input type="file" name="cover_image" id="cover_image" accept="image/*"
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">
                            <p class="text-xs text-gray-500 mt-1">JPEG, PNG, WebP formatları. Tövsiyə olunan: 400x400 piksel</p>
                            @error('cover_image')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="grid grid-cols-2 gap-6 mb-6">
                            <div>
                                <label for="order" class="block text-sm font-medium text-gray-700 mb-2">Sıra</label>
                                <input type="number" name="order" id="order" value="{{ old('order', 0) }}" min="0"
                                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">
                            </div>

                            <div class="flex items-center pt-6">
                                <label class="flex items-center cursor-pointer">
                                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}
                                        class="rounded border-gray-300 text-primary shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">
                                    <span class="ml-2 text-sm text-gray-700">Aktiv</span>
                                </label>
                            </div>
                        </div>

                        <!-- Progress Bar (Hidden by default) -->
                        <div id="uploadProgress" class="mb-6 hidden">
                            <div class="flex justify-between mb-1">
                                <span class="text-sm font-medium text-gray-700">Yüklənir...</span>
                                <span id="progressPercent" class="text-sm font-medium text-gray-700">0%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-4 overflow-hidden">
                                <div id="progressBar" class="bg-blue-600 h-4 rounded-full transition-all duration-300" style="width: 0%"></div>
                            </div>
                            <p id="uploadStatus" class="text-xs text-gray-500 mt-2"></p>
                        </div>

                        <div class="flex justify-end">
                            <button type="submit" id="submitBtn" class="px-4 py-2 bg-primary text-white rounded-md hover:bg-blue-800 disabled:opacity-50 disabled:cursor-not-allowed">
                                Yadda saxla
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('podcastForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const form = this;
            const formData = new FormData(form);
            const progressContainer = document.getElementById('uploadProgress');
            const progressBar = document.getElementById('progressBar');
            const progressPercent = document.getElementById('progressPercent');
            const uploadStatus = document.getElementById('uploadStatus');
            const submitBtn = document.getElementById('submitBtn');
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            // Show progress bar
            progressContainer.classList.remove('hidden');
            submitBtn.disabled = true;
            submitBtn.textContent = 'Yüklənir...';

            const xhr = new XMLHttpRequest();

            xhr.upload.addEventListener('progress', function(e) {
                if (e.lengthComputable) {
                    const percent = Math.round((e.loaded / e.total) * 100);
                    progressBar.style.width = percent + '%';
                    progressPercent.textContent = percent + '%';

                    // Show file size info
                    const loadedMB = (e.loaded / (1024 * 1024)).toFixed(2);
                    const totalMB = (e.total / (1024 * 1024)).toFixed(2);
                    uploadStatus.textContent = `${loadedMB} MB / ${totalMB} MB yükləndi`;
                }
            });

            xhr.addEventListener('load', function() {
                console.log('Response status:', xhr.status);
                console.log('Response:', xhr.responseText);

                if (xhr.status === 200) {
                    try {
                        const response = JSON.parse(xhr.responseText);
                        if (response.success) {
                            progressPercent.textContent = '100%';
                            uploadStatus.textContent = 'Yükləmə tamamlandı! Yönləndirilir...';
                            progressBar.classList.remove('bg-blue-600');
                            progressBar.classList.add('bg-green-600');
                            window.location.href = '{{ route("admin.podcasts.index") }}';
                            return;
                        }
                    } catch(e) {}

                    // If redirect response
                    if (xhr.responseText.includes('Redirecting') || xhr.responseURL.includes('/podcasts')) {
                        window.location.href = '{{ route("admin.podcasts.index") }}';
                        return;
                    }
                }

                // Handle errors
                let errorMsg = 'Xəta baş verdi (Status: ' + xhr.status + ')';
                try {
                    const response = JSON.parse(xhr.responseText);
                    if (response.message) {
                        errorMsg = response.message;
                    }
                    if (response.errors) {
                        const errors = Object.values(response.errors).flat();
                        errorMsg = errors.join(', ');
                    }
                } catch(e) {
                    console.log('Parse error:', e);
                }

                progressBar.classList.remove('bg-blue-600');
                progressBar.classList.add('bg-red-600');
                progressBar.style.width = '100%';
                uploadStatus.textContent = errorMsg;
                submitBtn.disabled = false;
                submitBtn.textContent = 'Yadda saxla';
            });

            xhr.addEventListener('error', function() {
                progressBar.classList.remove('bg-blue-600');
                progressBar.classList.add('bg-red-600');
                uploadStatus.textContent = 'Şəbəkə xətası. İnternet bağlantınızı yoxlayın.';
                submitBtn.disabled = false;
                submitBtn.textContent = 'Yadda saxla';
            });

            xhr.open('POST', form.action);
            xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken);
            xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
            xhr.setRequestHeader('Accept', 'application/json');
            xhr.send(formData);
        });
    </script>
</x-admin-layout>
