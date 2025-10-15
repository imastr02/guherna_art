<x-layout>
    <div
        class="min-h-screen flex items-center justify-center bg-gradient-to-b from-purple-100 to-purple-200 px-4 py-10">
        <div class="w-full max-w-2xl bg-white/90 backdrop-blur-md rounded-2xl shadow-lg p-8">
            <h1 id="form-heading" class="text-3xl font-bold text-purple-800 mb-2 text-center">Log In</h1>
            <p class="text-gray-600 text-center mb-8">
                <br />
                <span class="text-sm text-gray-500">Enter Credentials to log in.</span>
            </p>

            <form id="art-form" action="/login" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <!-- Title -->
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-1">
                        Email<span class="text-red-500">*</span>
                    </label>
                    <input id="email" name="email" type="text" placeholder="ahmedisbest@gmail.com" required
                        class="w-full border border-gray-300 focus:border-purple-500 focus:ring-2 focus:ring-purple-300 rounded-lg px-4 py-2 text-gray-800 placeholder-gray-400 outline-none transition-all" />
                    <div id="title-error" class="text-red-500 text-sm hidden mt-1"></div>
                </div>

                <!-- Password -->
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-1">
                        Password<span class="text-red-500">*</span>
                    </label>
                    <input id="password" name="password" type="text" placeholder="I hope u did not forget it" required
                        class="w-full border border-gray-300 focus:border-purple-500 focus:ring-2 focus:ring-purple-300 rounded-lg px-4 py-2 text-gray-800 placeholder-gray-400 outline-none transition-all" />
                    <div id="title-error" class="text-red-500 text-sm hidden mt-1"></div>
                </div>


                <!-- Buttons -->
                <div class="flex items-center justify-center gap-4 pt-4">
                    <button type="submit"
                        class="bg-purple-600 hover:bg-purple-700 text-white font-semibold px-6 py-2 rounded-lg shadow-md transition">
                        Enter me &#128527;

                    </button>
                    <a href="/"
                        class="bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium px-6 py-2 rounded-lg transition">
                        cancel
                    </a>
                </div>

                <div id="form-error" class="text-red-500 text-sm hidden text-center mt-2"></div>
            </form>
        </div>
    </div>
</x-layout>