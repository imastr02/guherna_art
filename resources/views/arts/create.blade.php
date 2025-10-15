<x-layout>

    <div
        class="min-h-screen flex items-center justify-center bg-gradient-to-b from-purple-100 to-purple-200 px-4 py-10">
        <div class="w-full max-w-2xl bg-white/90 backdrop-blur-md rounded-2xl shadow-lg p-8">
            <h1 id="form-heading" class="text-3xl font-bold text-purple-800 mb-2 text-center">Upload New Artwork</h1>
            <p class="text-gray-600 text-center mb-8">
                Add the artwork title, a short description, and upload an image file.
                <br />
                <span class="text-sm text-gray-500">Only the owner/admin should have access to this form.</span>
            </p>

            <form id="art-form" action="/arts" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <!-- Title -->
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-1">
                        Title <span class="text-red-500">*</span>
                    </label>
                    <input id="title" name="title" type="text" placeholder="Artwork title" required
                        class="w-full border border-gray-300 focus:border-purple-500 focus:ring-2 focus:ring-purple-300 rounded-lg px-4 py-2 text-gray-800 placeholder-gray-400 outline-none transition-all" />
                    <div id="title-error" class="text-red-500 text-sm hidden mt-1"></div>
                </div>

                <!-- Art Type -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Art Type <span class="text-red-500">*</span>
                    </label>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <label
                            class="flex items-center gap-2 cursor-pointer bg-purple-50 hover:bg-purple-100 border border-purple-200 rounded-lg px-4 py-2 transition">
                            <input type="radio" name="art_type" value="digital art"
                                class="text-purple-600 focus:ring-purple-500" required>
                            <span class="text-gray-800 font-medium">Digital Art</span>
                        </label>

                        <label
                            class="flex items-center gap-2 cursor-pointer bg-purple-50 hover:bg-purple-100 border border-purple-200 rounded-lg px-4 py-2 transition">
                            <input type="radio" name="art_type" value="traditional art"
                                class="text-purple-600 focus:ring-purple-500" required>
                            <span class="text-gray-800 font-medium">Traditional Art</span>
                        </label>
                    </div>
                </div>

                <!-- Image Upload -->
                <div>
                    <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Image</label>
                    <div id="file-drop"
                        class="border-2 border-dashed border-purple-300 rounded-xl p-6 flex flex-col items-center justify-center text-center cursor-pointer hover:border-purple-500 hover:bg-purple-50 transition"
                        tabindex="0" aria-describedby="file-meta">
                        <input id="image" name="image" type="file" accept="image/png, image/jpeg, image/webp"
                            required />
                    </div>
                </div>

                <!-- Buttons -->
                <div class="flex items-center justify-center gap-4 pt-4">
                    <button type="submit"
                        class="bg-purple-600 hover:bg-purple-700 text-white font-semibold px-6 py-2 rounded-lg shadow-md transition">
                        Upload Art
                    </button>
                    <a href="/dashboard"
                        class="bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium px-6 py-2 rounded-lg transition">
                        Cancel
                    </a>
                </div>

                <div id="form-error" class="text-red-500 text-sm hidden text-center mt-2"></div>
            </form>
        </div>
    </div>

</x-layout>