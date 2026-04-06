<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-white leading-tight">
            {{ __('AI Yol Qaydaları Köməkçisi') }}
        </h2>
    </x-slot>

    <div class="py-12" x-data="aiChat()">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <!-- Main Chat Container -->
            <div
                class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-2xl border border-gray-200 dark:border-gray-700 relative flex flex-col h-[600px]">

                <!-- Header -->
                <div
                    class="p-6 border-b border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900/50 flex items-center justify-between">
                    <div class="flex items-center gap-4">
                        <div
                            class="w-12 h-12 rounded-full bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center shadow-lg">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-xl font-bold text-gray-900 dark:text-white">AI Təlimatçı</h1>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Yol hərəkəti qaydaları üzrə ekspert</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="w-3 h-3 rounded-full bg-green-500 animate-pulse"></span>
                        <span class="text-xs font-medium text-green-500 uppercase tracking-wider">Online</span>
                    </div>
                </div>

                <!-- Chat Messages Area -->
                <div id="chat-messages"
                    class="flex-1 overflow-y-auto p-6 space-y-6 bg-gray-50 dark:bg-slate-900/50 scroll-smooth">
                    <!-- Welcome Message -->
                    <div class="flex items-start gap-4">
                        <div
                            class="w-8 h-8 rounded-full bg-gradient-to-br from-indigo-500 to-purple-600 flex-shrink-0 flex items-center justify-center">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        <div
                            class="bg-white dark:bg-gray-800 p-4 rounded-2xl rounded-tl-none shadow-sm border border-gray-100 dark:border-gray-700 max-w-[80%]">
                            <p class="text-gray-800 dark:text-gray-200">Salam! Mən sizin fərdi AI təlimatçınızam. Yol
                                hərəkəti qaydaları, nişanlar və ya cərimələr barədə istənilən sualı verə bilərsiniz.
                                Necə kömək edə bilərəm?</p>
                        </div>
                    </div>

                    <!-- History Loop -->
                    @auth
                        @foreach($history->reverse() as $chat)
                            <!-- User Message -->
                            <div class="flex items-start gap-4 flex-row-reverse">
                                <div
                                    class="w-8 h-8 rounded-full bg-gray-200 dark:bg-gray-700 flex-shrink-0 flex items-center justify-center overflow-hidden">
                                    @if(Auth::user()->profile_photo_path)
                                        <img src="{{ asset('storage/' . Auth::user()->profile_photo_path) }}"
                                            class="w-full h-full object-cover">
                                    @else
                                        <span
                                            class="text-xs font-bold text-gray-600 dark:text-gray-300">{{ substr(Auth::user()->name, 0, 2) }}</span>
                                    @endif
                                </div>
                                <div class="bg-indigo-600 text-white p-4 rounded-2xl rounded-tr-none shadow-md max-w-[80%]">
                                    <p>{{ $chat->question_text }}</p>
                                </div>
                            </div>

                            <!-- AI Response -->
                            <div class="flex items-start gap-4">
                                <div
                                    class="w-8 h-8 rounded-full bg-gradient-to-br from-indigo-500 to-purple-600 flex-shrink-0 flex items-center justify-center">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                                    </svg>
                                </div>
                                <div
                                    class="bg-white dark:bg-gray-800 p-4 rounded-2xl rounded-tl-none shadow-sm border border-gray-100 dark:border-gray-700 max-w-[80%]">
                                    <p class="text-gray-800 dark:text-gray-200">{{ $chat->answer_text }}</p>
                                </div>
                            </div>
                        @endforeach
                    @endauth

                    <!-- New Messages (Alpine) -->
                    <template x-for="msg in messages" :key="msg.id">
                        <div class="flex items-start gap-4" :class="msg.isUser ? 'flex-row-reverse' : ''">
                            <div class="w-8 h-8 rounded-full flex-shrink-0 flex items-center justify-center overflow-hidden"
                                :class="msg.isUser ? 'bg-gray-200 dark:bg-gray-700' : 'bg-gradient-to-br from-indigo-500 to-purple-600'">
                                <template x-if="msg.isUser">
                                    <span
                                        class="text-xs font-bold text-gray-600 dark:text-gray-300">@auth{{ substr(Auth::user()->name, 0, 2) }}@else??@endauth</span>
                                </template>
                                <template x-if="!msg.isUser">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                                    </svg>
                                </template>
                            </div>
                            <div class="p-4 rounded-2xl shadow-md max-w-[80%]"
                                :class="msg.isUser ? 'bg-indigo-600 text-white rounded-tr-none' : 'bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-200 rounded-tl-none border border-gray-100 dark:border-gray-700'">
                                <p x-text="msg.text"></p>
                            </div>
                        </div>
                    </template>

                    <!-- Loading Indicator -->
                    <div x-show="isLoading" class="flex items-start gap-4">
                        <div
                            class="w-8 h-8 rounded-full bg-gradient-to-br from-indigo-500 to-purple-600 flex-shrink-0 flex items-center justify-center">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        <div
                            class="bg-white dark:bg-gray-800 p-4 rounded-2xl rounded-tl-none shadow-sm border border-gray-100 dark:border-gray-700">
                            <div class="flex space-x-2">
                                <div class="w-2 h-2 bg-gray-400 rounded-full animate-bounce"></div>
                                <div class="w-2 h-2 bg-gray-400 rounded-full animate-bounce delay-100"></div>
                                <div class="w-2 h-2 bg-gray-400 rounded-full animate-bounce delay-200"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Input Area -->
                <div class="p-4 bg-white dark:bg-gray-800 border-t border-gray-200 dark:border-gray-700">
                    <form @submit.prevent="sendMessage" class="relative">
                        <div class="flex items-end gap-2">
                            <!-- Voice Button -->
                            <button type="button" @click="toggleRecording"
                                class="p-3 rounded-full transition-all duration-300 flex-shrink-0"
                                :class="isRecording ? 'bg-red-500 text-white animate-pulse shadow-red-500/50 shadow-lg' : 'bg-gray-100 dark:bg-gray-700 text-gray-500 dark:text-gray-400 hover:bg-gray-200 dark:hover:bg-gray-600'">
                                <svg x-show="!isRecording" class="w-6 h-6" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z" />
                                </svg>
                                <svg x-show="isRecording" class="w-6 h-6" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 10a1 1 0 011-1h4a1 1 0 011 1v4a1 1 0 01-1 1h-4a1 1 0 01-1-1v-4z" />
                                </svg>
                            </button>

                            <!-- Text Input -->
                            <div class="flex-1 relative">
                                <textarea x-model="input" @keydown.enter.prevent="if(!$event.shiftKey) sendMessage()"
                                    placeholder="Sualınızı yazın və ya mikrofon düyməsinə basın..."
                                    class="w-full bg-gray-50 dark:bg-gray-900 border-0 rounded-2xl px-4 py-3 pr-12 focus:ring-2 focus:ring-indigo-500 dark:text-white resize-none shadow-inner"
                                    rows="1" style="min-height: 48px; max-height: 120px;"></textarea>
                            </div>

                            <!-- Send Button -->
                            <button type="submit" :disabled="!input.trim() || isLoading"
                                class="p-3 bg-indigo-600 text-white rounded-full hover:bg-indigo-700 disabled:opacity-50 disabled:cursor-not-allowed transition shadow-lg flex-shrink-0">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 19l9-2-9-18-9 18 9-2zm0 0v-8" />
                                </svg>
                            </button>
                        </div>
                        <div x-show="isRecording"
                            class="absolute -top-8 left-14 text-xs text-red-500 font-bold animate-pulse">
                            Dinləyirəm...
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function aiChat() {
            return {
                input: '',
                messages: [],
                isLoading: false,
                isRecording: false,
                recognition: null,

                init() {
                    this.scrollToBottom();

                    // Initialize Web Speech API
                    if ('webkitSpeechRecognition' in window || 'SpeechRecognition' in window) {
                        const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;
                        this.recognition = new SpeechRecognition();
                        this.recognition.lang = 'az-AZ'; // Azerbaijani language
                        this.recognition.continuous = false;
                        this.recognition.interimResults = false;

                        this.recognition.onresult = (event) => {
                            const transcript = event.results[0][0].transcript;
                            this.input = transcript;
                            this.isRecording = false;
                            // Optional: Auto-send after voice
                            // this.sendMessage(); 
                        };

                        this.recognition.onerror = (event) => {
                            console.error('Speech recognition error', event.error);
                            this.isRecording = false;
                        };

                        this.recognition.onend = () => {
                            this.isRecording = false;
                        };
                    } else {
                        console.warn('Web Speech API not supported in this browser.');
                    }
                },

                toggleRecording() {
                    if (!this.recognition) {
                        alert('Sizin brauzeriniz səsli axtarışı dəstəkləmir.');
                        return;
                    }

                    if (this.isRecording) {
                        this.recognition.stop();
                    } else {
                        this.recognition.start();
                        this.isRecording = true;
                    }
                },

                async sendMessage() {
                    if (!this.input.trim() || this.isLoading) return;

                    const userText = this.input;
                    this.input = '';

                    // Add user message to UI immediately
                    this.messages.push({
                        id: Date.now(),
                        text: userText,
                        isUser: true
                    });

                    this.scrollToBottom();
                    this.isLoading = true;

                    try {
                        const response = await fetch('{{ route("ai.ask") }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify({ question: userText })
                        });

                        const data = await response.json();

                        if (data.success) {
                            this.messages.push({
                                id: Date.now() + 1,
                                text: data.answer,
                                isUser: false
                            });
                        }
                    } catch (error) {
                        console.error('Error:', error);
                        this.messages.push({
                            id: Date.now() + 1,
                            text: 'Xəta baş verdi. Zəhmət olmasa yenidən cəhd edin.',
                            isUser: false
                        });
                    } finally {
                        this.isLoading = false;
                        this.scrollToBottom();
                    }
                },

                scrollToBottom() {
                    this.$nextTick(() => {
                        const container = document.getElementById('chat-messages');
                        if (container) {
                            container.scrollTop = container.scrollHeight;
                        }
                    });
                }
            }
        }
    </script>
</x-app-layout>