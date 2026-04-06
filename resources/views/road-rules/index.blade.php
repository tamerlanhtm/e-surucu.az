@php
    $heroBadge = $pageSettings->hero_badge ?? 'Qanunvericilik';
    $heroTitle = $pageSettings->hero_title ?? '"Yol Hərəkəti Haqqında"';
    $heroSubtitle = $pageSettings->hero_subtitle ?? 'Azərbaycan Respublikasının Qanunu';
    $heroDescription = $pageSettings->hero_description ?? 'Yol hərəkəti qaydalarını öyrənmək, imtahana hazırlaşmaq və təhlükəsiz sürücü olmaq üçün qanunun tam mətni ilə tanış olun.';
@endphp

<x-app-layout>
    <!-- Hero Section -->
    <div class="relative bg-gradient-to-br from-blue-900 via-slate-900 to-slate-900">
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute top-0 left-0 w-full h-full bg-[url('/images/pattern.svg')] opacity-10"></div>
            <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-blue-500/20 rounded-full blur-3xl animate-blob"></div>
            <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-indigo-500/20 rounded-full blur-3xl animate-blob animation-delay-2000"></div>
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 md:py-24">
            <div class="text-center">
                <div class="inline-flex items-center gap-2 mb-6 px-4 py-2 rounded-full bg-white/5 border border-white/10 backdrop-blur-md">
                    <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                    <span class="text-blue-200 text-sm font-medium">{{ $heroBadge }}</span>
                </div>

                <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold text-white tracking-tight mb-6">
                    {{ $heroTitle }}<br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 via-cyan-400 to-purple-400">
                        {{ $heroSubtitle }}
                    </span>
                </h1>

                <p class="text-lg text-slate-300 max-w-2xl mx-auto mb-8">
                    {{ $heroDescription }}
                </p>

                <!-- Search Bar -->
                <div x-data="roadRulesSearch()" class="max-w-2xl mx-auto" style="position: relative; z-index: 100;">
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                        <input
                            type="text"
                            x-model="query"
                            @input.debounce.300ms="search()"
                            @focus="showResults = true"
                            @click.away="showResults = false"
                            @keydown.escape="showResults = false"
                            @keydown.arrow-down.prevent="navigateDown()"
                            @keydown.arrow-up.prevent="navigateUp()"
                            @keydown.enter.prevent="selectResult()"
                            placeholder="Maddə və ya açar söz axtar..."
                            class="w-full pl-12 pr-4 py-4 bg-white/10 backdrop-blur-md border border-white/20 rounded-2xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                        >
                        <div x-show="query.length > 0" class="absolute inset-y-0 right-0 pr-4 flex items-center">
                            <button @click="clearSearch()" class="text-gray-400 hover:text-white transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Search Results Dropdown -->
                    <div
                        x-show="showResults && results.length > 0"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 translate-y-2"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100 translate-y-0"
                        x-transition:leave-end="opacity-0 translate-y-2"
                        class="absolute w-full mt-2 bg-white dark:bg-gray-800 rounded-xl shadow-2xl border border-gray-200 dark:border-gray-700 max-h-96 overflow-y-auto"
                        style="z-index: 9999; position: absolute;"
                    >
                        <template x-for="(result, index) in results" :key="result.id">
                            <a
                                :href="'#article-' + result.chapterIndex + '-' + result.articleIndex"
                                @click="selectArticle(result)"
                                :class="{ 'bg-blue-50 dark:bg-blue-900/30': selectedIndex === index }"
                                class="block px-4 py-3 hover:bg-gray-50 dark:hover:bg-gray-700/50 border-b border-gray-100 dark:border-gray-700 last:border-0 transition-colors"
                            >
                                <div class="flex items-start gap-3">
                                    <span class="inline-flex items-center justify-center w-10 h-10 rounded-lg bg-blue-100 dark:bg-blue-900/50 text-blue-600 dark:text-blue-400 text-sm font-bold flex-shrink-0" x-text="result.number"></span>
                                    <div class="flex-1 min-w-0">
                                        <div class="text-xs text-gray-500 dark:text-gray-400" x-text="result.chapter"></div>
                                        <div class="font-medium text-gray-900 dark:text-white truncate" x-text="'Maddə ' + result.number + '. ' + result.title"></div>
                                        <div class="text-sm text-gray-500 dark:text-gray-400 line-clamp-2 mt-1" x-html="result.preview"></div>
                                    </div>
                                </div>
                            </a>
                        </template>
                    </div>

                    <!-- No Results -->
                    <div
                        x-show="showResults && query.length >= 2 && results.length === 0 && !isSearching"
                        class="absolute w-full mt-2 bg-white dark:bg-gray-800 rounded-xl shadow-2xl border border-gray-200 dark:border-gray-700 p-6 text-center"
                        style="z-index: 9999; position: absolute;"
                    >
                        <svg class="w-12 h-12 mx-auto text-gray-300 dark:text-gray-600 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <p class="text-gray-500 dark:text-gray-400">Heç bir nəticə tapılmadı</p>
                        <p class="text-sm text-gray-400 dark:text-gray-500 mt-1">Başqa açar sözlər sınayın</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Navigation -->
    <div class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 sticky top-16 z-40">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="py-4 overflow-x-auto">
                <div class="flex space-x-2 min-w-max">
                    @foreach($chapters as $index => $chapter)
                        <a href="#chapter-{{ $index }}"
                           class="inline-flex items-center px-4 py-2 rounded-full text-sm font-medium bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 hover:bg-blue-100 dark:hover:bg-blue-900 hover:text-blue-700 dark:hover:text-blue-300 transition-colors whitespace-nowrap">
                            {{ $chapter['chapter'] }}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="bg-gray-50 dark:bg-gray-900 py-12">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

            @foreach($chapters as $chapterIndex => $chapter)
                <!-- Chapter Section -->
                <div id="chapter-{{ $chapterIndex }}" class="mb-12 scroll-mt-32">
                    <!-- Chapter Header -->
                    <div class="bg-gradient-to-r from-blue-600 to-indigo-600 rounded-2xl p-6 mb-6 shadow-lg">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center">
                                <span class="text-white font-bold text-lg">{{ $chapterIndex + 1 }}</span>
                            </div>
                            <div>
                                <span class="text-blue-200 text-sm font-medium">{{ $chapter['chapter'] }}</span>
                                <h2 class="text-xl md:text-2xl font-bold text-white">{{ $chapter['title'] }}</h2>
                            </div>
                        </div>
                    </div>

                    <!-- Articles Accordion -->
                    <div x-data="{ openArticle: null }"
                         x-init="$watch('openArticle', value => { if(value !== null) { window.currentOpenArticles = window.currentOpenArticles || {}; window.currentOpenArticles[{{ $chapterIndex }}] = value; } })"
                         @open-article.window="if($event.detail.chapterIndex === {{ $chapterIndex }}) { openArticle = $event.detail.articleIndex }"
                         class="space-y-3">
                        @foreach($chapter['articles'] as $articleIndex => $article)
                            <div id="article-{{ $chapterIndex }}-{{ $articleIndex }}"
                                 class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden transition-all duration-300 scroll-mt-36"
                                 :class="{ 'ring-2 ring-blue-500 shadow-lg': openArticle === {{ $articleIndex }} }">

                                <!-- Article Button -->
                                <button @click="openArticle = openArticle === {{ $articleIndex }} ? null : {{ $articleIndex }}"
                                        class="w-full px-6 py-4 flex items-center justify-between hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors">
                                    <div class="flex items-center gap-4">
                                        <span class="inline-flex items-center justify-center w-10 h-10 rounded-lg text-sm font-bold transition-colors"
                                              :class="openArticle === {{ $articleIndex }} ? 'bg-blue-600 text-white' : 'bg-blue-100 dark:bg-blue-900/50 text-blue-600 dark:text-blue-400'">
                                            {{ $article['number'] }}
                                        </span>
                                        <div class="text-left">
                                            <span class="text-xs text-gray-500 dark:text-gray-400 font-medium">Maddə {{ $article['number'] }}</span>
                                            <h3 class="text-base md:text-lg font-semibold text-gray-900 dark:text-white">
                                                {{ $article['title'] }}
                                            </h3>
                                        </div>
                                    </div>
                                    <svg class="w-5 h-5 text-gray-400 transition-transform duration-300 flex-shrink-0"
                                         :class="{ 'rotate-180': openArticle === {{ $articleIndex }} }"
                                         fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>

                                <!-- Article Content -->
                                <div x-show="openArticle === {{ $articleIndex }}"
                                     x-transition:enter="transition ease-out duration-200"
                                     x-transition:enter-start="opacity-0 -translate-y-2"
                                     x-transition:enter-end="opacity-100 translate-y-0"
                                     x-transition:leave="transition ease-in duration-150"
                                     x-transition:leave-start="opacity-100 translate-y-0"
                                     x-transition:leave-end="opacity-0 -translate-y-2"
                                     class="border-t border-gray-200 dark:border-gray-700">
                                    <div class="px-6 py-5 bg-gray-100 dark:bg-gray-900">
                                        <div class="article-content max-w-none text-gray-800 dark:text-gray-200 leading-relaxed text-sm">
                                            {!! nl2br($article['content']) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach

            <!-- Source Info -->
            <div class="mt-12 p-6 bg-blue-50 dark:bg-blue-900/20 rounded-2xl border border-blue-200 dark:border-blue-800">
                <div class="flex items-start gap-4">
                    <div class="w-10 h-10 bg-blue-100 dark:bg-blue-900 rounded-lg flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-semibold text-blue-900 dark:text-blue-200 mb-1">Mənbə</h3>
                        <p class="text-sm text-blue-700 dark:text-blue-300">
                            Bu məlumatlar Azərbaycan Respublikasının "Yol Hərəkəti Haqqında" Qanunu əsasında hazırlanmışdır.
                            Qanunun tam mətni ilə tanış olmaq üçün
                            <a href="https://www.dyp.gov.az/index.php?/az/content/205" target="_blank" rel="noopener noreferrer"
                               class="underline hover:text-blue-900 dark:hover:text-blue-100 font-medium">
                                DYP rəsmi saytına
                            </a>
                            daxil ola bilərsiniz.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Back to Top Button -->
    <div x-data="{ showButton: false }"
         x-init="window.addEventListener('scroll', () => { showButton = window.scrollY > 500 })"
         class="fixed bottom-8 right-8 z-50">
        <button x-show="showButton"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 scale-90"
                x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-90"
                @click="window.scrollTo({ top: 0, behavior: 'smooth' })"
                class="w-12 h-12 bg-blue-600 hover:bg-blue-700 text-white rounded-full shadow-lg flex items-center justify-center transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
            </svg>
        </button>
    </div>

    <!-- Highlight Animation Style -->
    <style>
        @keyframes highlightPulse {
            0% {
                box-shadow: 0 0 0 0 rgba(59, 130, 246, 0.7);
                background-color: rgba(59, 130, 246, 0.1);
            }
            50% {
                box-shadow: 0 0 0 15px rgba(59, 130, 246, 0);
                background-color: rgba(59, 130, 246, 0.2);
            }
            100% {
                box-shadow: 0 0 0 0 rgba(59, 130, 246, 0);
                background-color: transparent;
            }
        }
        .article-highlight {
            animation: highlightPulse 1.5s ease-out;
        }
    </style>

    <!-- Search Data & Script -->
    <script>
        // Road rules search data
        const roadRulesData = @json($chapters);

        function roadRulesSearch() {
            return {
                query: '',
                results: [],
                showResults: false,
                selectedIndex: -1,
                isSearching: false,

                // Helper function to check if all words exist in text (anywhere, not adjacent)
                containsAllWords(text, words) {
                    const lowerText = text.toLowerCase();
                    return words.every(word => lowerText.includes(word));
                },

                // Helper function to highlight all search words in text
                highlightWords(text, words) {
                    let result = text;
                    words.forEach(word => {
                        const regex = new RegExp(`(${word.replace(/[.*+?^${}()|[\]\\]/g, '\\$&')})`, 'gi');
                        result = result.replace(regex, '<mark class="bg-yellow-200 dark:bg-yellow-800 px-0.5 rounded">$1</mark>');
                    });
                    return result;
                },

                // Helper function to generate preview with highlighted words
                generatePreview(content, words) {
                    const lowerContent = content.toLowerCase();
                    // Find the first occurrence of any word to center the preview
                    let firstIdx = content.length;
                    words.forEach(word => {
                        const idx = lowerContent.indexOf(word);
                        if (idx !== -1 && idx < firstIdx) {
                            firstIdx = idx;
                        }
                    });

                    if (firstIdx === content.length) return '';

                    const start = Math.max(0, firstIdx - 30);
                    const end = Math.min(content.length, firstIdx + 100);
                    let preview = content.substring(start, end);

                    // Highlight all words in the preview
                    preview = this.highlightWords(preview, words);

                    return (start > 0 ? '...' : '') + preview + (end < content.length ? '...' : '');
                },

                search() {
                    if (this.query.length < 2) {
                        this.results = [];
                        return;
                    }

                    this.isSearching = true;
                    const searchTerm = this.query.toLowerCase().trim();
                    const results = [];

                    // Split search query into individual words (filter out empty strings)
                    const searchWords = searchTerm.split(/\s+/).filter(word => word.length > 0);

                    // Check if searching for article number (e.g., "maddə 42" or just "42")
                    const articleNumberMatch = searchTerm.match(/(?:maddə\s*)?(\d+(?:-\d+)?)/i);
                    const searchNumber = articleNumberMatch ? articleNumberMatch[1] : null;

                    roadRulesData.forEach((chapter, chapterIndex) => {
                        chapter.articles.forEach((article, articleIndex) => {
                            let score = 0;
                            let matchType = '';
                            const contentStripped = article.content.replace(/<[^>]*>/g, '');

                            // Exact article number match (highest priority)
                            if (searchNumber && article.number === searchNumber) {
                                score = 100;
                                matchType = 'number';
                            }
                            // Article number starts with search
                            else if (searchNumber && article.number.startsWith(searchNumber)) {
                                score = 80;
                                matchType = 'number';
                            }
                            // Title contains exact search term (highest text priority)
                            else if (article.title.toLowerCase().includes(searchTerm)) {
                                score = 70;
                                matchType = 'title_exact';
                            }
                            // Title contains all words (flexible match)
                            else if (searchWords.length > 1 && this.containsAllWords(article.title, searchWords)) {
                                score = 60;
                                matchType = 'title_words';
                            }
                            // Content contains exact search term
                            else if (contentStripped.toLowerCase().includes(searchTerm)) {
                                score = 50;
                                matchType = 'content_exact';
                            }
                            // Content contains all words (flexible match - words can be anywhere in the sentence)
                            else if (searchWords.length > 1 && this.containsAllWords(contentStripped, searchWords)) {
                                score = 40;
                                matchType = 'content_words';
                            }

                            if (score > 0) {
                                // Generate preview with highlighted term(s)
                                let preview = '';
                                if (matchType === 'content_exact') {
                                    const content = contentStripped;
                                    const idx = content.toLowerCase().indexOf(searchTerm);
                                    if (idx !== -1) {
                                        const start = Math.max(0, idx - 40);
                                        const end = Math.min(content.length, idx + searchTerm.length + 60);
                                        preview = (start > 0 ? '...' : '') +
                                                  content.substring(start, idx) +
                                                  '<mark class="bg-yellow-200 dark:bg-yellow-800 px-0.5 rounded">' +
                                                  content.substring(idx, idx + searchTerm.length) +
                                                  '</mark>' +
                                                  content.substring(idx + searchTerm.length, end) +
                                                  (end < content.length ? '...' : '');
                                    }
                                } else if (matchType === 'content_words') {
                                    // For flexible word match, generate preview with all words highlighted
                                    preview = this.generatePreview(contentStripped, searchWords);
                                } else if (matchType === 'title_exact') {
                                    const title = article.title;
                                    const idx = title.toLowerCase().indexOf(searchTerm);
                                    preview = title.substring(0, idx) +
                                              '<mark class="bg-yellow-200 dark:bg-yellow-800 px-0.5 rounded">' +
                                              title.substring(idx, idx + searchTerm.length) +
                                              '</mark>' +
                                              title.substring(idx + searchTerm.length);
                                } else if (matchType === 'title_words') {
                                    // For flexible word match in title, highlight all words
                                    preview = this.highlightWords(article.title, searchWords);
                                } else {
                                    // For number match, show beginning of content
                                    const content = contentStripped;
                                    preview = content.substring(0, 100) + (content.length > 100 ? '...' : '');
                                }

                                results.push({
                                    id: `${chapterIndex}-${articleIndex}`,
                                    chapterIndex,
                                    articleIndex,
                                    chapter: chapter.chapter,
                                    number: article.number,
                                    title: article.title,
                                    preview,
                                    score,
                                    matchType
                                });
                            }
                        });
                    });

                    // Sort by score (highest first) and limit to 10 results
                    this.results = results.sort((a, b) => b.score - a.score).slice(0, 10);
                    this.selectedIndex = -1;
                    this.isSearching = false;
                },

                clearSearch() {
                    this.query = '';
                    this.results = [];
                    this.showResults = false;
                    this.selectedIndex = -1;
                },

                navigateDown() {
                    if (this.selectedIndex < this.results.length - 1) {
                        this.selectedIndex++;
                    }
                },

                navigateUp() {
                    if (this.selectedIndex > 0) {
                        this.selectedIndex--;
                    }
                },

                selectResult() {
                    if (this.selectedIndex >= 0 && this.selectedIndex < this.results.length) {
                        this.selectArticle(this.results[this.selectedIndex]);
                    }
                },

                selectArticle(result) {
                    const searchTerm = this.query.trim();
                    this.showResults = false;

                    // Dispatch event to open the article
                    window.dispatchEvent(new CustomEvent('open-article', {
                        detail: {
                            chapterIndex: result.chapterIndex,
                            articleIndex: result.articleIndex
                        }
                    }));

                    // Scroll to article after a short delay to allow accordion to open
                    setTimeout(() => {
                        const element = document.getElementById(`article-${result.chapterIndex}-${result.articleIndex}`);
                        if (element) {
                            element.scrollIntoView({ behavior: 'smooth', block: 'start' });

                            // Add highlight animation to the article card
                            element.classList.remove('article-highlight');
                            void element.offsetWidth;
                            element.classList.add('article-highlight');

                            // Highlight the search term in article content
                            setTimeout(() => {
                                this.highlightTextInContent(element, searchTerm);
                            }, 300);

                            // Remove highlight class after animation completes
                            setTimeout(() => {
                                element.classList.remove('article-highlight');
                            }, 1500);
                        }
                    }, 100);
                },

                highlightTextInContent(articleElement, searchTerm) {
                    if (!searchTerm || searchTerm.length < 2) return;

                    const contentDiv = articleElement.querySelector('.article-content');
                    if (!contentDiv) return;

                    // Remove any previous highlights
                    const oldHighlights = contentDiv.querySelectorAll('.search-highlight');
                    oldHighlights.forEach(el => {
                        const text = document.createTextNode(el.textContent);
                        el.parentNode.replaceChild(text, el);
                    });

                    // Normalize the content
                    contentDiv.normalize();

                    // Split search term into words for flexible matching
                    const searchWords = searchTerm.toLowerCase().trim().split(/\s+/).filter(word => word.length > 0);

                    // Search and highlight all words
                    const walker = document.createTreeWalker(
                        contentDiv,
                        NodeFilter.SHOW_TEXT,
                        null,
                        false
                    );

                    const nodesToHighlight = [];
                    let node;

                    while (node = walker.nextNode()) {
                        const text = node.textContent;
                        const lowerText = text.toLowerCase();

                        // Find all matches for each search word in this node
                        const matches = [];
                        searchWords.forEach(word => {
                            let startIndex = 0;
                            let index;
                            while ((index = lowerText.indexOf(word, startIndex)) !== -1) {
                                matches.push({ index, length: word.length });
                                startIndex = index + 1;
                            }
                        });

                        // Sort matches by index (descending) and remove overlaps
                        if (matches.length > 0) {
                            matches.sort((a, b) => b.index - a.index);
                            // Remove overlapping matches (keep the first one found)
                            const nonOverlapping = [];
                            matches.forEach(match => {
                                const overlaps = nonOverlapping.some(existing =>
                                    (match.index < existing.index + existing.length && match.index + match.length > existing.index)
                                );
                                if (!overlaps) {
                                    nonOverlapping.push(match);
                                }
                            });
                            nonOverlapping.forEach(match => {
                                nodesToHighlight.push({ node, index: match.index, length: match.length });
                            });
                        }
                    }

                    // Sort all highlights by node and index (process in reverse to maintain indices)
                    nodesToHighlight.sort((a, b) => {
                        if (a.node === b.node) {
                            return b.index - a.index; // Descending for same node
                        }
                        return 0;
                    });

                    // Group by node
                    const nodeGroups = new Map();
                    nodesToHighlight.forEach(item => {
                        if (!nodeGroups.has(item.node)) {
                            nodeGroups.set(item.node, []);
                        }
                        nodeGroups.get(item.node).push(item);
                    });

                    // Apply highlights for each node
                    nodeGroups.forEach((highlights, targetNode) => {
                        // Sort by index descending to process from end to start
                        highlights.sort((a, b) => b.index - a.index);

                        let text = targetNode.textContent;
                        const fragment = document.createDocumentFragment();
                        let lastIndex = text.length;

                        highlights.forEach(({ index, length }) => {
                            // Add text after this match
                            if (lastIndex > index + length) {
                                fragment.insertBefore(
                                    document.createTextNode(text.substring(index + length, lastIndex)),
                                    fragment.firstChild
                                );
                            }

                            // Add highlighted match
                            const mark = document.createElement('mark');
                            mark.className = 'search-highlight bg-yellow-300 dark:bg-yellow-600 px-1 py-0.5 rounded text-gray-900 dark:text-white font-medium';
                            mark.textContent = text.substring(index, index + length);
                            fragment.insertBefore(mark, fragment.firstChild);

                            lastIndex = index;
                        });

                        // Add text before first match
                        if (lastIndex > 0) {
                            fragment.insertBefore(
                                document.createTextNode(text.substring(0, lastIndex)),
                                fragment.firstChild
                            );
                        }

                        targetNode.parentNode.replaceChild(fragment, targetNode);
                    });

                    // Scroll to first highlight within the content
                    setTimeout(() => {
                        const firstHighlight = contentDiv.querySelector('.search-highlight');
                        if (firstHighlight) {
                            firstHighlight.scrollIntoView({ behavior: 'smooth', block: 'center' });

                            // Add pulse animation to first highlight
                            firstHighlight.classList.add('animate-pulse');
                            setTimeout(() => {
                                firstHighlight.classList.remove('animate-pulse');
                            }, 2000);
                        }
                    }, 100);
                }
            };
        }
    </script>
</x-app-layout>
