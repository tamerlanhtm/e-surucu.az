<x-app-layout>
    <x-slot name="seo_title">{{ $page->meta_title ?? $page->title }}</x-slot>
    <x-slot name="seo_description">{{ $page->meta_description }}</x-slot>
    <x-slot name="seo_keywords">{{ $page->meta_keywords }}</x-slot>
    @if($page->og_image)
        <x-slot name="og_image">{{ $page->og_image }}</x-slot>
    @endif

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <article class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-8 lg:p-12">
                    <!-- Title -->
                    <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-8">
                        {{ $page->title }}
                    </h1>

                    <!-- Content -->
                    <div class="prose prose-lg dark:prose-invert max-w-none">
                        <div class="text-gray-700 dark:text-gray-300 leading-relaxed ql-editor">
                            {!! $page->content !!}
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </div>
</x-app-layout>
