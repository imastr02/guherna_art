<x-layout>
    <section
        class="relative min-h-[70vh] sm:min-h-[80vh] flex flex-col items-center justify-center text-center text-white overflow-hidden bg-purple-100">
        <!-- Background image (always fully visible) -->
        <div class="absolute inset-0 flex items-center justify-center bg-purple-200">
            <img src="{{ Vite::asset('resources/images/profile-pic.jpg') }}" alt="Background art"
                class="w-full h-full max-w-full max-h-full object-contain" />
        </div>

        <!-- Purplish overlay for readability -->
        <div
            class="absolute inset-0 bg-gradient-to-b from-purple-900/40 via-purple-800/40 to-purple-900/60 backdrop-blur-[2px]">
        </div>

        <!-- Animated text -->
        <div class="relative z-10 space-y-3 sm:space-y-4 px-3 sm:px-6">
            <h1
                class="text-4xl sm:text-5xl md:text-7xl font-serif font-extrabold opacity-0 animate-gentleLoop1 tracking-wide drop-shadow-lg">
                Welcome
            </h1>
            <h2 class="text-2xl sm:text-3xl md:text-5xl font-light italic opacity-0 animate-gentleLoop2 drop-shadow-md">
                to my site
            </h2>
            <p
                class="text-xl sm:text-2xl md:text-4xl font-semibold text-purple-100 opacity-0 animate-gentleLoop3 drop-shadow-sm">
                Enjoy 😊
            </p>
        </div>

        <style>
            /* Text animation (looping) */
            @keyframes gentleFadeFloat {

                0%,
                10% {
                    opacity: 0;
                    transform: translateY(25px);
                }

                15%,
                35% {
                    opacity: 1;
                    transform: translateY(0);
                }

                40%,
                100% {
                    opacity: 0;
                    transform: translateY(-25px);
                }
            }

            .animate-gentleLoop1 {
                animation: gentleFadeFloat 12s ease-in-out infinite;
            }

            .animate-gentleLoop2 {
                animation: gentleFadeFloat 12s ease-in-out infinite;
                animation-delay: 4s;
            }

            .animate-gentleLoop3 {
                animation: gentleFadeFloat 12s ease-in-out infinite;
                animation-delay: 8s;
            }
        </style>
    </section>




    <section id="about"
        class="relative bg-gradient-to-b from-purple-50 to-white text-purple-900 py-20 px-6 overflow-hidden">
        <!-- Decorative blurred background circles -->
        <div class="absolute top-10 left-10 w-64 h-64 bg-purple-200/40 rounded-full blur-3xl opacity-50"></div>
        <div class="absolute bottom-10 right-10 w-72 h-72 bg-purple-300/30 rounded-full blur-3xl opacity-50"></div>

        <div class="relative z-10 max-w-6xl mx-auto flex flex-col lg:flex-row items-center gap-12 animate-fadeUp">

            <!-- IMAGE -->
            <div class="flex-1 flex justify-center">
                <img src="{{ asset('storage/' . $user->logo) }}" alt="Meet Artist"
                    class="w-full max-w-md rounded-2xl shadow-xl border-4 border-purple-200 transform transition duration-500 hover:scale-105 hover:shadow-2xl">
            </div>



            <!-- TEXT -->
            <div class="flex-1 text-center lg:text-left">

                <p class="text-lg sm:text-xl text-purple-700 leading-relaxed mb-6">
                    Hi, I'm <strong>Guharne</strong> — passionate about turning emotions into color and light.
                </p>
                <a href="#myArt"
                    class="inline-block px-8 py-3 rounded-full bg-gradient-to-r from-purple-400 to-purple-600 text-white font-semibold shadow-lg hover:shadow-xl hover:scale-105 transition">
                    Explore My Art
                </a>
            </div>

        </div>

        <!-- Fade-up animation -->
        <style>
            @keyframes fadeUp {
                from {
                    opacity: 0;
                    transform: translateY(40px);
                }

                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            .animate-fadeUp {
                animation: fadeUp 1.2s ease-out both;
            }
        </style>
    </section>




    <!-- MAIN CONTENT -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <!-- Header Row -->
        <div class="flex flex-col sm:flex-row items-center justify-between mb-6 text-sm text-purple-700 gap-4">
            <div>Showing <strong>All Works</strong></div>

            <!-- FILTER BAR -->
            <div class="flex flex-wrap items-center justify-center gap-3 mb-6">
                <a href="{{ url('/?q=all') }}"
                    class="filter-btn px-4 py-2 rounded-full text-sm font-medium border border-purpley-200 {{ request('q') == 'all' || !request('q') ? 'bg-purpley-300 text-white' : 'bg-purpley-50 text-purpley-700 hover:bg-purpley-100' }}">
                    All
                </a>

                <a href="{{ url('/?q=traditional') }}"
                    class="filter-btn px-4 py-2 rounded-full text-sm font-medium border border-purpley-200 {{ request('q') == 'traditional' ? 'bg-purpley-300 text-white' : 'bg-purpley-50 text-purpley-700 hover:bg-purpley-100' }}">
                    Traditional Art
                </a>

                <a href="{{ url('/?q=digital') }}"
                    class="filter-btn px-4 py-2 rounded-full text-sm font-medium border border-purpley-200 {{ request('q') == 'digital' ? 'bg-purpley-300 text-white' : 'bg-purpley-50 text-purpley-700 hover:bg-purpley-100' }}">
                    Digital Art
                </a>
            </div>

        </div>

        <!-- MASONRY GRID -->
        <section id="myArt" class="masonry columns-1 md:columns-2 lg:columns-3 gap-6">

            @foreach($arts as $art)
                <article
                    class="mb-6 break-inside-avoid rounded-xl overflow-hidden bg-white border border-purple-100 shadow-sm hover:shadow-xl transform transition hover:-translate-y-1">
                    <figure class="relative">
                        <img src="{{ asset('storage/' . $art->image_path) }}" alt="{{ $art->title }}"
                            class="w-full h-auto object-contain bg-white">
                        <span
                            class="absolute top-3 left-3 bg-purple-100 text-purple-800 text-xs font-medium px-2 py-1 rounded-md shadow">
                            {{ $art->art_type ?? 'Art' }}
                        </span>
                    </figure>

                </article>
            @endforeach

        </section>
    </main>
</x-layout>