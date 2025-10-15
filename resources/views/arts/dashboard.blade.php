<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>PurplePins — Art Gallery</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Alpine.js for interactivity -->
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    <!-- Tailwind theme extension -->
    <script>
        tailwind.config = {
            darkMode: false,
            theme: {
                extend: {
                    colors: {
                        purpley: {
                            50: '#faf7ff',
                            100: '#f3ebff',
                            200: '#e9dbff',
                            300: '#d7beff',
                            400: '#b68aff',
                            500: '#9b5bff',
                            600: '#7f39d6',
                            700: '#5e2ca3',
                            800: '#421c73',
                            900: '#301347'
                        }
                    }
                }
            }
        };
    </script>

    <style>
        .masonry {
            column-gap: 1rem;
        }
    </style>
</head>

<body class="antialiased bg-purpley-50 text-purpley-900" x-data="{ open: false }">

    <div class="flex min-h-screen">

        <!-- SIDEBAR -->
        <aside
            class="fixed md:static z-30 w-64 bg-purpley-800 text-white flex flex-col px-6 py-8 space-y-8 shadow-lg transform md:translate-x-0 transition-transform duration-300 ease-in-out"
            :class="open ? 'translate-x-0' : '-translate-x-full'">

            <!-- Logo + Close Button -->
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <i class="fa-solid fa-palette text-2xl text-purpley-200"></i>
                    <h1 class="text-2xl font-semibold">PurplePins</h1>
                </div>
                <button class="md:hidden text-purpley-100 hover:text-purpley-300" @click="open = false">
                    <i class="fa-solid fa-xmark text-2xl"></i>
                </button>
            </div>

            <!-- Navigation -->
            <nav class="flex flex-col space-y-4 text-sm">
                <a href="/" class="hover:text-purpley-200 transition">Home</a>
                <a href="/dashboard" class="hover:text-purpley-200 transition">Dashboard</a>
                <a href="/dashboard/create" class="hover:text-purpley-200 transition">Upload Art</a>

                <form method="POST" action="/logout">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-left hover:text-purpley-200 transition">Logout</button>
                </form>
            </nav>

            <!-- Upload Logo Form -->
            <div id="upload-logo" class="mt-auto border-t border-purpley-600 pt-6">
                <h2 class="text-sm font-medium mb-3 text-purpley-100">Upload Logo</h2>
                <form action="/logo" method="POST" enctype="multipart/form-data" class="space-y-3">
                    @csrf
                    <input type="file" name="logo" id="logo"
                        class="block w-full text-xs text-purpley-800 border border-purpley-300 rounded-md cursor-pointer bg-purpley-100 focus:outline-none focus:ring-2 focus:ring-purpley-400 focus:border-transparent">
                    <button type="submit"
                        class="w-full text-center px-3 py-2 bg-purpley-600 hover:bg-purpley-700 text-white text-sm rounded-md transition duration-200">
                        Upload
                    </button>
                </form>


            </div>
        </aside>

        <!-- MAIN CONTENT -->
        <main class="flex-1 md:ml-0 md:px-8 px-4 py-8 w-full">

            <!-- MOBILE HEADER -->
            <div class="flex items-center justify-between mb-6 md:hidden">
                <button class="text-purpley-800" @click="open = true">
                    <i class="fa-solid fa-bars text-2xl"></i>
                </button>
                <h1 class="text-lg font-semibold text-purpley-800">PurplePins</h1>
            </div>


            <!-- HEADER -->
            <div class="flex flex-col sm:flex-row items-center justify-between mb-6 text-sm text-purpley-700 gap-4">
                <div>Showing <strong>All Works</strong></div>

                <!-- FILTER BAR -->
                {{-- <div class="flex flex-wrap items-center justify-center gap-3">
                    <button
                        class="filter-btn px-4 py-2 rounded-full text-sm font-medium bg-purpley-100 text-purpley-800 border border-purpley-300 hover:bg-purpley-200 focus:outline-none focus:ring-2 focus:ring-purpley-400 transition-all duration-300">
                        All
                    </button>
                    <button
                        class="filter-btn px-4 py-2 rounded-full text-sm font-medium bg-purpley-50 text-purpley-700 border border-purpley-200 hover:bg-purpley-100 focus:outline-none focus:ring-2 focus:ring-purpley-300 transition-all duration-300">
                        Traditional Art
                    </button>
                    <button
                        class="filter-btn px-4 py-2 rounded-full text-sm font-medium bg-purpley-50 text-purpley-700 border border-purpley-200 hover:bg-purpley-100 focus:outline-none focus:ring-2 focus:ring-purpley-300 transition-all duration-300">
                        Digital Art
                    </button>
                </div> --}}

                <div class="flex flex-wrap items-center justify-center gap-3 mb-6">
                    <a href="{{ url('/dashboard?q=all') }}"
                        class="filter-btn px-4 py-2 rounded-full text-sm font-medium border border-purpley-200 {{ request('q') == 'all' || !request('q') ? 'bg-purpley-300 text-white' : 'bg-purpley-50 text-purpley-700 hover:bg-purpley-100' }}">
                        All
                    </a>

                    <a href="{{ url('/dashboard?q=traditional') }}"
                        class="filter-btn px-4 py-2 rounded-full text-sm font-medium border border-purpley-200 {{ request('q') == 'traditional' ? 'bg-purpley-300 text-white' : 'bg-purpley-50 text-purpley-700 hover:bg-purpley-100' }}">
                        Traditional Art
                    </a>

                    <a href="{{ url('/dashboard?q=digital') }}"
                        class="filter-btn px-4 py-2 rounded-full text-sm font-medium border border-purpley-200 {{ request('q') == 'digital' ? 'bg-purpley-300 text-white' : 'bg-purpley-50 text-purpley-700 hover:bg-purpley-100' }}">
                        Digital Art
                    </a>
                </div>


            </div>

            @if (session('success'))
                <div
                    class="mb-6 p-4 rounded-lg border border-purple-300 bg-purple-50 text-purple-800 flex items-center justify-between shadow-sm animate-fade-in">
                    <span>{{ session('success') }}</span>
                    <button onclick="this.parentElement.style.display='none'" class="text-purple-600 hover:text-purple-800">
                        ✕
                    </button>
                </div>
            @endif

            <!-- MASONRY GRID -->
            <section id="explore" class="masonry columns-1 md:columns-2 lg:columns-3 gap-6">
                @foreach ($arts as $art)
                    <article
                        class="mb-6 break-inside-avoid rounded-xl overflow-hidden bg-white border border-purpley-100 shadow-sm hover:shadow-xl transform transition hover:-translate-y-1">
                        <figure class="relative">
                            <img src="{{ asset('storage/' . $art->image_path) }}" alt="{{ $art->title }}"
                                class="w-full h-auto object-contain bg-white">
                            <span
                                class="absolute top-3 left-3 bg-purpley-100 text-purpley-800 text-xs font-medium px-2 py-1 rounded-md shadow">
                                {{ $art->art_type ?? 'Art' }}
                            </span>
                        </figure>

                        <!-- Delete Form -->
                        <div class="p-4 flex justify-end">
                            <form action="/delete/{{ $art->id }}" method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this artwork?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-purple-600 hover:bg-purple-700 text-white text-sm font-medium px-4 py-2 rounded-md shadow-md transition">
                                    <i class="fas fa-trash-alt mr-1"></i> Delete
                                </button>
                            </form>
                        </div>
                    </article>

                @endforeach
            </section>
        </main>
    </div>

</body>

</html>