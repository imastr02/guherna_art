<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>PurplePins — Art Gallery</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    @Vite(['resources/js/app.js'])

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

<body class="antialiased bg-purpley-50 text-purpley-900">

    <!-- NAVBAR -->
    <header class="fixed inset-x-0 top-0 z-50 bg-white/80 backdrop-blur-sm border-b border-purpley-100">
        <nav class="bg-purpley-700/50 shadow-lg sticky top-0 z-50">
            <div class="max-w-7xl mx-auto px-4">
                <div class="flex justify-between items-center py-4">
                    <!-- Logo -->
                    <div class="flex items-center space-x-2">
                        <div class="w-8 h-8  rounded-lg flex items-center justify-center">
                            <i class="fa-solid text-purple fa-palette text-2xl text-purpley-200"></i>
                        </div>
                        <span class="text-xl font-bold text-gray-700 hover:text-white transition-colors">Guherna</span>


                    </div>

                    <!-- Desktop Menu -->
                    <div class="hidden md:flex items-center space-x-8">
                        <a href="/" class="text-gray-700 hover:text-white-600 font-medium transition-colors">Home</a>
                        <a href="#about" class="text-gray-700 hover:text-white font-medium transition-colors">About
                            Me</a>
                        <a href="#myArt" class="text-gray-700 hover:text-white font-medium transition-colors">My Art</a>

                    </div>

                    <!-- Desktop Buttons -->
                    <div class="hidden md:flex items-center space-x-4">
                        @guest
                            <a href="/login"
                                class="px-4 py-2 text-purple-600 font-medium border border-purple-600 rounded-full hover:bg-purple-50 transition-colors">
                                Login
                            </a>
                        @endguest


                        @auth
                            <a class="px-4 py-2 bg-purple-600 text-white font-medium rounded-full hover:bg-purple-700 transition-colors shadow-md"
                                href="/dashboard">
                                Dashboard
                            </a>
                        @endauth

                    </div>

                    <!-- Mobile Menu Button -->
                    <div class="md:hidden">
                        <button id="mobile-menu-button" class="text-gray-700 hover:text-purple-600 focus:outline-none">
                            <i class="fas fa-bars text-xl"></i>
                        </button>
                    </div>
                </div>

                <!-- Mobile Menu -->
                <div id="mobile-menu" class="hidden md:hidden pb-4 border-t border-gray-200">
                    <div class="flex flex-col space-y-3 mt-4">
                        <a href="/" class="text-gray-700 hover:text-purple-600 font-medium py-2">Home</a>
                        <a href="#" class="text-gray-700 hover:text-purple-600 font-medium py-2">About</a>
                        <a href="#" class="text-gray-700 hover:text-purple-600 font-medium py-2">My Art</a>

                        <div class="flex space-x-4 pt-2">

                            @guest
                                <a href="/login"
                                    class="px-4 py-2 text-purple-600 font-medium border border-purple-600 rounded-full hover:bg-purple-50 transition-colors">
                                    Login
                                </a>
                            @endguest

                            @auth
                                <a class="px-4 py-2 bg-purple-600 text-white font-medium rounded-full hover:bg-purple-700 transition-colors shadow-md"
                                    href="/dashboard">
                                    Dashboard
                                </a>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <!-- CONTENT SLOT -->
    <main class="mt-10 max-w-[986px] mx-auto">
        {{ $slot }}
    </main>

    <!-- FOOTER -->
    <footer class="relative text-white py-12 overflow-hidden">
        <img src="{{ Vite::asset('resources/images/profile-pic.jpg') }}" alt="Artistic background"
            class="absolute inset-0 w-full h-full object-cover object-center" />

        <div class="absolute inset-0 bg-purple-900/70 backdrop-blur-sm"></div>

        <div class="relative z-10 flex flex-col items-center justify-center text-center space-y-4 px-6">
            <h2 class="text-2xl sm:text-3xl font-semibold tracking-wide drop-shadow-md">Stay Connected 💫</h2>
            <p class="text-purple-200 text-lg sm:text-xl">Follow my art journey on Instagram</p>

            <a href="https://www.instagram.com/guharne_/" target="_blank"
                class="flex items-center space-x-3 bg-white/10 hover:bg-white/20 px-5 py-3 rounded-full text-purple-100 hover:text-white transition-all duration-300 shadow-lg hover:shadow-2xl">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 sm:w-9 sm:h-9" fill="currentColor"
                    viewBox="0 0 24 24">
                    <path
                        d="M7.75 2h8.5A5.75 5.75 0 0 1 22 7.75v8.5A5.75 5.75 0 0 1 16.25 22h-8.5A5.75 5.75 0 0 1 2 16.25v-8.5A5.75 5.75 0 0 1 7.75 2zm0 1.5A4.25 4.25 0 0 0 3.5 7.75v8.5A4.25 4.25 0 0 0 7.75 20.5h8.5A4.25 4.25 0 0 0 20.5 16.25v-8.5A4.25 4.25 0 0 0 16.25 3.5h-8.5zM12 7a5 5 0 1 1 0 10a5 5 0 0 1 0-10zm0 1.5a3.5 3.5 0 1 0 0 7a3.5 3.5 0 0 0 0-7zm4.75-.75a1 1 0 1 1 0 2a1 1 0 0 1 0-2z" />
                </svg>
                <span class="text-lg sm:text-xl font-medium">@guharne_</span>
            </a>

            <div class="w-24 h-1 bg-gradient-to-r from-purple-300 to-purple-600 rounded-full animate-pulse"></div>
            <p class="text-sm text-purple-300 mt-6">© 2025 Your Name. All rights reserved.</p>
        </div>

        <div
            class="absolute inset-0 bg-gradient-to-t from-purple-800/40 via-transparent to-transparent opacity-70 animate-slowGlow">
        </div>

        <style>
            @keyframes slowGlow {

                0%,
                100% {
                    opacity: 0.7;
                }

                50% {
                    opacity: 0.9;
                }
            }

            .animate-slowGlow {
                animation: slowGlow 8s ease-in-out infinite;
            }
        </style>
    </footer>

    <script>
        document.getElementById('mobile-menu-button').addEventListener('click', function () {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });
    </script>
</body>

</html>