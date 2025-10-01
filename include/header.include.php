<header class="fixed w-full top-0 z-50 bg-white/90 backdrop-blur-md border-b border-gray-100">
    <nav class="max-w-7xl mx-auto px-4 sm:px-6">

        <div class="flex justify-between items-center h-16">
            <!-- Logo -->
            <div class="flex items-center space-x-2">
                <div class="w-10 h-10 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-xl flex items-center justify-center shadow-md">
                    <img src="assets/static/images/icon.png" alt="Atifa Publication Logo" class="w-full h-full rounded-lg object-cover">
                </div>
                <div>
                    <h1 class="text-xl sm:text-2xl font-display font-bold bg-gradient-to-r from-emerald-600 to-emerald-800 bg-clip-text text-transparent">Atifa Publication</h1>
                    <p class="text-xs text-gray-500 hidden sm:block">Islamic Literature</p>
                </div>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center space-x-1">
                <a href="index.php#home" class="px-3 py-2 text-emerald-600 font-medium bg-emerald-50 rounded-full text-sm">Home</a>
                <a href="index.php#books" class="px-3 py-2 text-gray-600 hover:text-emerald-600 hover:bg-emerald-50 rounded-full text-sm">Books</a>
                <a href="index.php#about" class="px-3 py-2 text-gray-600 hover:text-emerald-600 hover:bg-emerald-50 rounded-full text-sm">About</a>
                <a href="index.php#contact" class="px-3 py-2 text-gray-600 hover:text-emerald-600 hover:bg-emerald-50 rounded-full text-sm">Contact</a>
            </div>

            <!-- Mobile Menu Button -->
            <div class="md:hidden">
                <button id="mobile-menu-btn" class="p-2 text-gray-600 hover:text-emerald-600 hover:bg-emerald-50 rounded-full">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="md:hidden hidden bg-white/95 backdrop-blur-sm rounded-xl mt-2 shadow-lg border border-gray-100">
            <div class="px-2 py-3 space-y-2">
                <a href="index.php#home" class="block px-4 py-2 text-emerald-600 font-medium bg-emerald-50 rounded-lg text-base">Home</a>
                <a href="index.php#books" class="block px-4 py-2 text-gray-600 hover:text-emerald-600 hover:bg-emerald-50 rounded-lg text-base">Books</a>
                <a href="index.php#about" class="block px-4 py-2 text-gray-600 hover:text-emerald-600 hover:bg-emerald-50 rounded-lg text-base">About</a>
                <a href="index.php#contact" class="block px-4 py-2 text-gray-600 hover:text-emerald-600 hover:bg-emerald-50 rounded-lg text-base">Contact</a>
            </div>
        </div>
    </nav>
</header>
