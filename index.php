<?php
require_once './class/class.user.php';
$user = new User();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/static/images/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="assets/static/images/favicon.ico" type="image/x-icon">
    <title>Quranghor - Modern Islamic Literature Store</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'sans': ['Inter', 'system-ui', 'sans-serif'],
                        'display': ['Poppins', 'sans-serif'],
                        'arabic': ['Amiri', 'serif']
                    },
                    colors: {
                        'emerald': {
                            50: '#ecfdf5',
                            100: '#d1fae5',
                            200: '#a7f3d0',
                            300: '#6ee7b7',
                            400: '#34d399',
                            500: '#10b981',
                            600: '#059669',
                            700: '#047857',
                            800: '#065f46',
                            900: '#064e3b'
                        },
                        'gold': {
                            50: '#fffbeb',
                            100: '#fef3c7',
                            200: '#fde68a',
                            300: '#fcd34d',
                            400: '#fbbf24',
                            500: '#f59e0b',
                            600: '#d97706',
                            700: '#b45309',
                            800: '#92400e',
                            900: '#78350f'
                        }
                    },
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                        'fade-in': 'fade-in 0.5s ease-out',
                        'slide-up': 'slide-up 0.5s ease-out',
                        'scale-in': 'scale-in 0.3s ease-out'
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': {
                                transform: 'translateY(0px)'
                            },
                            '50%': {
                                transform: 'translateY(-10px)'
                            }
                        },
                        'fade-in': {
                            '0%': {
                                opacity: '0'
                            },
                            '100%': {
                                opacity: '1'
                            }
                        },
                        'slide-up': {
                            '0%': {
                                transform: 'translateY(20px)',
                                opacity: '0'
                            },
                            '100%': {
                                transform: 'translateY(0)',
                                opacity: '1'
                            }
                        },
                        'scale-in': {
                            '0%': {
                                transform: 'scale(0.95)',
                                opacity: '0'
                            },
                            '100%': {
                                transform: 'scale(1)',
                                opacity: '1'
                            }
                        }
                    },
                    backdropBlur: {
                        xs: '2px'
                    }
                }
            }
        }
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Poppins:wght@400;500;600;700&family=Amiri:wght@400;700&display=swap" rel="stylesheet">
</head>

<body class="font-sans bg-gray-50 overflow-x-hidden">
    <!-- Header Navigation -->
    <header class="fixed w-full top-0 z-50 bg-white/80 backdrop-blur-md border-b border-gray-100">
        <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <!-- Logo -->
                <div class="flex items-center space-x-3 group">
                    <div
                        style="border-radius: 50%; padding: 1px;" class="w-12 h-12 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-2xl flex items-center justify-center shadow-lg group-hover:shadow-xl transition-all duration-300 group-hover:scale-105">
                        <img src="assets/static/images/icon.png" alt="Quranghor Logo" class="w-full h-full rounded-full object-cover">
                    </div>

                    <div>
                        <h1 class="text-2xl font-display font-bold bg-gradient-to-r from-emerald-600 to-emerald-800 bg-clip-text text-transparent">Quranghor</h1>
                        <p class="text-xs text-gray-500 -mt-1">Islamic Literature</p>
                    </div>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center space-x-1">
                    <a href="#home" class="px-4 py-2 text-emerald-600 font-medium bg-emerald-50 rounded-full transition-all duration-200">Home</a>
                    <a href="#books" class="px-4 py-2 text-gray-600 hover:text-emerald-600 hover:bg-emerald-50 rounded-full transition-all duration-200">Books</a>
                    <a href="#about" class="px-4 py-2 text-gray-600 hover:text-emerald-600 hover:bg-emerald-50 rounded-full transition-all duration-200">About</a>
                    <a href="#contact" class="px-4 py-2 text-gray-600 hover:text-emerald-600 hover:bg-emerald-50 rounded-full transition-all duration-200">Contact</a>
                </div>

                <!-- Mobile menu button -->
                <div class="md:hidden">
                    <button id="mobile-menu-btn" class="p-2 text-gray-600 hover:text-emerald-600 hover:bg-emerald-50 rounded-full transition-all duration-200">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Mobile Menu -->
            <div id="mobile-menu" class="md:hidden hidden animate-slide-up">
                <div class="px-2 pt-2 pb-4 space-y-2 bg-white/95 backdrop-blur-sm rounded-2xl mt-2 shadow-xl border border-gray-100">
                    <a href="#home" class="block px-4 py-3 text-emerald-600 font-medium bg-emerald-50 rounded-xl">Home</a>
                    <a href="#books" class="block px-4 py-3 text-gray-600 hover:text-emerald-600 hover:bg-emerald-50 rounded-xl transition-colors">Books</a>
                    <a href="#about" class="block px-4 py-3 text-gray-600 hover:text-emerald-600 hover:bg-emerald-50 rounded-xl transition-colors">About</a>
                    <a href="#contact" class="block px-4 py-3 text-gray-600 hover:text-emerald-600 hover:bg-emerald-50 rounded-xl transition-colors">Contact</a>
                </div>
            </div>
        </nav>
    </header>

    <!-- Hero Section -->
    <!-- Hero Section -->
    <section id="home" class="relative w-full mt-20">
        <img src="./assets/static/images/atifa-publication.jpg" class="w-full h-auto object-cover">
    </section>

    <!-- Stats Section -->
    <section class="py-16 bg-white border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <div class="text-center group">
                    <div class="text-4xl md:text-5xl font-bold text-emerald-600 mb-2 group-hover:scale-110 transition-transform">1000+</div>
                    <p class="text-gray-600 font-medium">Islamic Books</p>
                </div>
                <div class="text-center group">
                    <div class="text-4xl md:text-5xl font-bold text-emerald-600 mb-2 group-hover:scale-110 transition-transform">50k+</div>
                    <p class="text-gray-600 font-medium">Happy Customers</p>
                </div>
                <div class="text-center group">
                    <div class="text-4xl md:text-5xl font-bold text-emerald-600 mb-2 group-hover:scale-110 transition-transform">100+</div>
                    <p class="text-gray-600 font-medium">Scholars</p>
                </div>
                <div class="text-center group">
                    <div class="text-4xl md:text-5xl font-bold text-emerald-600 mb-2 group-hover:scale-110 transition-transform">4.9★</div>
                    <p class="text-gray-600 font-medium">Rating</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Categories -->
    <section id="categories" class="py-20 bg-gradient-to-br from-emerald-50 to-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-display font-bold text-gray-900 mb-4">Browse Categories</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">Find the perfect Islamic literature for your spiritual journey</p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <div class="group cursor-pointer">
                    <div class="bg-white p-8 rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-500 border border-gray-100 hover:scale-105 hover:-translate-y-2">
                        <div class="text-5xl mb-4 group-hover:scale-110 transition-transform">📖</div>
                        <h3 class="font-semibold text-gray-900 mb-2">Quran & Tafseer</h3>
                        <p class="text-sm text-gray-600">Holy Quran with translations and commentary</p>
                    </div>
                </div>
                <div class="group cursor-pointer">
                    <div class="bg-white p-8 rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-500 border border-gray-100 hover:scale-105 hover:-translate-y-2">
                        <div class="text-5xl mb-4 group-hover:scale-110 transition-transform">📚</div>
                        <h3 class="font-semibold text-gray-900 mb-2">Hadith Collections</h3>
                        <p class="text-sm text-gray-600">Authentic sayings of Prophet Muhammad (PBUH)</p>
                    </div>
                </div>
                <div class="group cursor-pointer">
                    <div class="bg-white p-8 rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-500 border border-gray-100 hover:scale-105 hover:-translate-y-2">
                        <div class="text-5xl mb-4 group-hover:scale-110 transition-transform">🕌</div>
                        <h3 class="font-semibold text-gray-900 mb-2">Islamic History</h3>
                        <p class="text-sm text-gray-600">Stories and history of Islam</p>
                    </div>
                </div>
                <div class="group cursor-pointer">
                    <div class="bg-white p-8 rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-500 border border-gray-100 hover:scale-105 hover:-translate-y-2">
                        <div class="text-5xl mb-4 group-hover:scale-110 transition-transform">⭐</div>
                        <h3 class="font-semibold text-gray-900 mb-2">Islamic Ethics</h3>
                        <p class="text-sm text-gray-600">Moral guidance and spiritual development</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Books Section -->
    <section id="books" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <span class="text-emerald-600 font-semibold text-lg mb-2 block">Bestsellers</span>
                <h2 class="text-4xl md:text-5xl font-display font-bold text-gray-900 mb-6">Featured Islamic Books</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Carefully curated collection from renowned Islamic scholars and trusted publishers</p>
            </div>

            <!-- Books Grid -->
           <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
    <?php
    // Fetch all products
    $user->query("SELECT * FROM products");
    $products = $user->fetchAll();

    foreach ($products as $row):
        $price = $row['price'];
        $delPrice = $row['del_price'] ?? null;
        $isBestseller = $row['is_bestseller'] ?? 0;
        $rating = $row['rating'] ?? 5;

        // Fetch first product image if exists
        $user->query("SELECT image FROM product_images WHERE product_id = :pid ORDER BY id ASC LIMIT 1");
        $user->bind(':pid', $row['id']);
        $imgRow = $user->fetchOne();
        $image = $imgRow['image'] ?? $row['image'] ?? 'placeholder.png';
    ?>
        <div class="group cursor-pointer">
            <div class="bg-white rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-500 overflow-hidden border border-gray-100 hover:scale-105 hover:-translate-y-2">
                <div class="h-72 relative overflow-hidden">
                    <img src="assets/uploads/products/<?= htmlspecialchars($image) ?>" alt="<?= htmlspecialchars($row['title']) ?>" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-black/10"></div>
                    <div class="relative z-10 flex flex-col items-center justify-center h-full text-white p-6">
                        <div class="text-6xl mb-4 group-hover:scale-110 transition-transform">
                            <?= htmlspecialchars($row['icon'] ?? '📖') ?>
                        </div>
                        <div class="font-arabic text-2xl mb-2 text-center">
                            <?= htmlspecialchars($row['arabic_title'] ?? $row['title']) ?>
                        </div>
                        <div class="text-sm opacity-90"><?= htmlspecialchars($row['subtitle'] ?? '') ?></div>
                    </div>
                    <?php if ($isBestseller): ?>
                        <div class="absolute top-4 right-4">
                            <span class="bg-gold-500 text-emerald-900 px-3 py-1 rounded-full text-xs font-bold shadow-lg">
                                Bestseller
                            </span>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-900 mb-2 group-hover:text-emerald-600 transition-colors">
                        <?= htmlspecialchars($row['title']) ?>
                    </h3>
                    <p class="text-sm text-gray-600 mb-4"><?= htmlspecialchars($row['description']) ?></p>
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center space-x-2">
                            <span class="text-2xl font-bold text-emerald-600">₹<?= number_format($price, 2) ?></span>
                            <?php if ($delPrice): ?>
                                <span class="text-sm text-gray-500 line-through">₹<?= number_format($delPrice, 2) ?></span>
                            <?php endif; ?>
                        </div>
                        <div class="flex text-gold-400">
                            <span><?= str_repeat('★', $rating) ?><?= str_repeat('☆', 5 - $rating) ?></span>
                        </div>
                    </div>
                    <a href="product.php?product_id=<?= md5($row['id']) ?>" class="w-full bg-emerald-600 text-white py-3 px-4 rounded-2xl hover:bg-emerald-700 transition-all duration-300 font-medium group-hover:shadow-lg">
                        Buy Now
                    </a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="py-20 bg-gradient-to-br from-emerald-50 to-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-display font-bold text-gray-900 mb-6">What Our Readers Say</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">Join thousands of satisfied customers on their Islamic learning journey</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-8 rounded-3xl shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-100">
                    <div class="flex text-gold-400 mb-4">
                        <span>★★★★★</span>
                    </div>
                    <p class="text-gray-600 mb-6 italic">"Excellent collection of authentic Islamic books. The quality is outstanding and delivery was fast. Highly recommended!"</p>
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-emerald-500 rounded-full flex items-center justify-center text-white font-bold mr-4">
                            AM
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900">Ahmed Mohammed</h4>
                            <p class="text-sm text-gray-500">Student of Knowledge</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-8 rounded-3xl shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-100">
                    <div class="flex text-gold-400 mb-4">
                        <span>★★★★★</span>
                    </div>
                    <p class="text-gray-600 mb-6 italic">"Amazing selection of books with beautiful translations. This store has become my go-to for Islamic literature."</p>
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-purple-500 rounded-full flex items-center justify-center text-white font-bold mr-4">
                            SA
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900">Sister Aisha</h4>
                            <p class="text-sm text-gray-500">Islamic Teacher</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-8 rounded-3xl shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-100">
                    <div class="flex text-gold-400 mb-4">
                        <span>★★★★★</span>
                    </div>
                    <p class="text-gray-600 mb-6 italic">"Quranghor has helped me build an amazing Islamic library. Great customer service and authentic books."</p>
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center text-white font-bold mr-4">
                            MY
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900">Mohammed Yusuf</h4>
                            <p class="text-sm text-gray-500">Community Leader</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Us Section -->
    <section id="about" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div class="space-y-8">
                    <div>
                        <span class="text-emerald-600 font-semibold text-lg mb-2 block">Our Mission</span>
                        <h2 class="text-4xl md:text-5xl font-display font-bold text-gray-900 mb-6">Spreading Authentic Islamic Knowledge</h2>
                        <p class="text-xl text-gray-600 leading-relaxed">
                            <strong>Assalamu alaykum</strong><br>
                            বই জ্ঞানের আলো,হৃদয়ের সঙ্গী। আমরা বইকে দেখি শ্রেষ্ঠ উপহার হিসেবে,চিন্তাকে সমৃদ্ধ করে,জীবনের দিগন্ত প্রসারিত করে। আতিফা পাবলিকেশন আপনাদের হাতে পৌঁছে দিচ্ছে সেই অনন্য উপহার- বই,সমগ্র ভারত জুড়ে।
                            <br>
                            🌹Cash on delivery 🚚 Free Delevery 🎁 
                        </p>
                    </div>

                    <div class="grid grid-cols-2 gap-6">
                        <div class="text-center p-6 bg-emerald-50 rounded-2xl">
                            <div class="text-3xl font-bold text-emerald-600 mb-2">10+</div>
                            <p class="text-gray-700 font-medium">Years Experience</p>
                        </div>
                        <div class="text-center p-6 bg-gold-50 rounded-2xl">
                            <div class="text-3xl font-bold text-gold-600 mb-2">200+</div>
                            <p class="text-gray-700 font-medium">Verified Scholars</p>
                        </div>
                    </div>
                </div>

                <div class="relative">
                    <div class="bg-gradient-to-br from-emerald-500 to-emerald-700 rounded-3xl p-12 text-white relative overflow-hidden">
                        <div class="relative z-10">
                            <h3 class="text-2xl font-bold mb-6">Why Choose Quranghor?</h3>
                            <div class="space-y-4">
                                <div class="flex items-center space-x-4">
                                    <div class="w-8 h-8 bg-white/20 rounded-full flex items-center justify-center">
                                        <span class="text-lg">✓</span>
                                    </div>
                                    <span>Authenticated Islamic sources</span>
                                </div>
                                <div class="flex items-center space-x-4">
                                    <div class="w-8 h-8 bg-white/20 rounded-full flex items-center justify-center">
                                        <span class="text-lg">✓</span>
                                    </div>
                                    <span>Competitive pricing & discounts</span>
                                </div>
                                <div class="flex items-center space-x-4">
                                    <div class="w-8 h-8 bg-white/20 rounded-full flex items-center justify-center">
                                        <span class="text-lg">✓</span>
                                    </div>
                                    <span>Fast worldwide shipping</span>
                                </div>
                                <div class="flex items-center space-x-4">
                                    <div class="w-8 h-8 bg-white/20 rounded-full flex items-center justify-center">
                                        <span class="text-lg">✓</span>
                                    </div>
                                    <span>24/7 customer support</span>
                                </div>
                            </div>
                        </div>
                        <div class="absolute top-4 right-4 w-32 h-32 bg-white/10 rounded-full"></div>
                        <div class="absolute bottom-4 left-4 w-20 h-20 bg-white/10 rounded-full"></div>
                    </div>
                </div>
            </div>

            <!-- Islamic Quote -->
            <div class="mt-20 text-center bg-gradient-to-r from-emerald-50 to-gold-50 rounded-3xl p-12">
                <div class="font-arabic text-3xl md:text-4xl text-emerald-800 mb-6">
                    وَقُل رَّبِّ زِدْنِي عِلْمًا
                </div>
                <p class="text-xl text-emerald-700 font-semibold">
                    "And say: My Lord, increase me in knowledge"
                </p>
                <p class="text-emerald-600 mt-2">- Quran 20:114</p>
            </div>
        </div>
    </section>

    <!-- Newsletter Section -->
    <!-- <section class="py-20 bg-gradient-to-br from-emerald-600 to-emerald-800">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-4xl md:text-5xl font-display font-bold text-white mb-6">Stay Updated</h2>
            <p class="text-xl text-emerald-100 mb-10">Subscribe to get notified about new Islamic books and special offers</p>

            <div class="flex flex-col sm:flex-row gap-4 max-w-lg mx-auto">
                <input type="email" placeholder="Enter your email address" class="flex-1 px-6 py-4 rounded-2xl border-0 focus:outline-none focus:ring-4 focus:ring-emerald-300/50 text-gray-900">
                <button class="px-8 py-4 bg-gold-500 hover:bg-gold-600 text-emerald-900 font-semibold rounded-2xl transition-all duration-300 hover:scale-105 shadow-lg">
                    Subscribe
                </button>
            </div>

            <p class="text-emerald-200 text-sm mt-4">We respect your privacy. Unsubscribe at any time.</p>
        </div>
    </section> -->

    <!-- Contact Section -->
    <section id="contact" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-display font-bold text-gray-900 mb-6">Get In Touch</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Have questions about our Islamic books or need personalized recommendations? We're here to help you on your learning journey.</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
                <!-- Contact Form -->
                <div>
                    <div class="bg-gradient-to-br from-emerald-50 to-emerald-100 p-8 rounded-3xl">
                        <h3 class="text-2xl font-bold text-gray-900 mb-6">Contact Information</h3>

                        <div class="space-y-6">
                            <div class="flex items-center space-x-4">
                                <div class="w-12 h-12 bg-emerald-500 rounded-2xl flex items-center justify-center">
                                    <span class="text-white text-xl">📧</span>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900">Email</h4>
                                    <p class="text-gray-600">atifapublicationindia@gmail.com</p>
                                </div>
                            </div>

                            <div class="flex items-center space-x-4">
                                <div class="w-12 h-12 bg-emerald-500 rounded-2xl flex items-center justify-center">
                                    <span class="text-white text-xl">📱</span>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900">Call + WhatsApp</h4>
                                    <p class="text-gray-600"> +919477081723/+917003821823</p>
                                </div>
                            </div>

                            <div class="flex items-center space-x-4">
                                <div class="w-12 h-12 bg-emerald-500 rounded-2xl flex items-center justify-center">
                                    <span class="text-white text-xl">🌍</span>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900">Coverage</h4>
                                    <p class="text-gray-600">All India</p>
                                </div>
                            </div>

                            <div class="flex items-center space-x-4">
                                <div class="w-12 h-12 bg-emerald-500 rounded-2xl flex items-center justify-center">
                                    <span class="text-white text-xl">⏰</span>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900">Support Hours</h4>
                                    <p class="text-gray-600">24/7 Customer Service</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contact Info -->
                <div class="space-y-8">


                    <div class="bg-gradient-to-br from-gold-50 to-gold-100 p-8 rounded-3xl">
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Follow Us</h3>
                        <div class="flex space-x-4">
                            <a href="https://www.facebook.com/share/1EQ4svM5qE/" target="_blank" rel="noopener noreferrer">
                                <button class="w-12 h-12 bg-blue-500 text-white rounded-2xl hover:scale-110 transition-transform">f</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-12">
                <!-- Logo & Description -->
                <div class="md:col-span-2">
                    <div class="flex items-center space-x-3 mb-6">
                        <div class="w-12 h-12 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-2xl flex items-center justify-center">
                            <span class="text-white text-xl font-bold">📖</span>
                        </div>
                        <div>
                            <h3 class="text-2xl font-display font-bold">Quranghor</h3>
                            <p class="text-gray-400 text-sm">Islamic Literature & Knowledge</p>
                        </div>
                    </div>
                    <p class="text-gray-300 mb-6 max-w-md">
                        বই জ্ঞানের আলো,হৃদয়ের সঙ্গী। আমরা বইকে দেখি শ্রেষ্ঠ উপহার হিসেবে,চিন্তাকে সমৃদ্ধ করে,জীবনের দিগন্ত প্রসারিত করে। আতিফা পাবলিকেশন আপনাদের হাতে পৌঁছে দিচ্ছে সেই অনন্য উপহার- বই,সমগ্র ভারত জুড়ে।</p>
                    <!-- <div class="font-arabic text-gold-400 text-lg">
                        بارك الله فيكم
                    </div> -->
                </div>

                <!-- Quick Links -->
                <div>
                    <h4 class="font-bold text-lg mb-6">Quick Links</h4>
                    <ul class="space-y-3 text-gray-300">
                        <li><a href="#home" class="hover:text-emerald-400 transition-colors">Home</a></li>
                        <li><a href="#books" class="hover:text-emerald-400 transition-colors">All Books</a></li>
                        <li><a href="#categories" class="hover:text-emerald-400 transition-colors">Categories</a></li>
                        <li><a href="#about" class="hover:text-emerald-400 transition-colors">About Us</a></li>
                        <li><a href="#contact" class="hover:text-emerald-400 transition-colors">Contact</a></li>
                    </ul>
                </div>

                <!-- Categories -->
                <!-- <div>
                    <h4 class="font-bold text-lg mb-6">Categories</h4>
                    <ul class="space-y-3 text-gray-300">
                        <li><a href="#" class="hover:text-emerald-400 transition-colors">Quran & Tafseer</a></li>
                        <li><a href="#" class="hover:text-emerald-400 transition-colors">Hadith Collections</a></li>
                        <li><a href="#" class="hover:text-emerald-400 transition-colors">Islamic History</a></li>
                        <li><a href="#" class="hover:text-emerald-400 transition-colors">Fiqh & Jurisprudence</a></li>
                        <li><a href="#" class="hover:text-emerald-400 transition-colors">Islamic Ethics</a></li>
                    </ul>
                </div> -->
            </div>

            <!-- Bottom Bar -->
            <div class="border-t border-gray-700 pt-8 flex flex-col md:flex-row justify-between items-center">
                <p class="text-gray-400 text-sm mb-4 md:mb-0">
                    &copy; 2025 Quranghor. All rights reserved. Made with ❤️ for the Muslim Ummah.
                </p>
                <div class="flex space-x-6 text-sm text-gray-400">
                    <a href="#" class="hover:text-emerald-400 transition-colors">Privacy Policy</a>
                    <a href="#" class="hover:text-emerald-400 transition-colors">Terms of Service</a>
                    <a href="#" class="hover:text-emerald-400 transition-colors">Shipping Info</a>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Mobile menu toggle
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');

        mobileMenuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });

        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
                // Close mobile menu after clicking
                mobileMenu.classList.add('hidden');
            });
        });

        // Active navigation highlighting with glassmorphism effect
        window.addEventListener('scroll', () => {
            const sections = document.querySelectorAll('section[id]');
            const navLinks = document.querySelectorAll('nav a[href^="#"]');

            let current = '';
            sections.forEach(section => {
                const sectionTop = section.offsetTop - 100;
                const sectionHeight = section.clientHeight;
                if (scrollY >= sectionTop && scrollY < sectionTop + sectionHeight) {
                    current = section.getAttribute('id');
                }
            });

            navLinks.forEach(link => {
                link.classList.remove('text-emerald-600', 'bg-emerald-50');
                link.classList.add('text-gray-600');
                if (link.getAttribute('href') === `#${current}`) {
                    link.classList.remove('text-gray-600');
                    link.classList.add('text-emerald-600', 'bg-emerald-50');
                }
            });
        });

        // Add scroll animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-fade-in');
                }
            });
        }, observerOptions);

        // Observe elements for animations
        document.querySelectorAll('.group, .animate-slide-up').forEach(el => {
            observer.observe(el);
        });

        // Shopping cart functionality
        let cartCount = 3; // Initial cart count
        const cartButtons = document.querySelectorAll('button:contains("Add to Cart")');

        // Add to cart functionality
        document.addEventListener('click', (e) => {
            if (e.target.textContent === 'Add to Cart' || e.target.closest('button')?.textContent === 'Add to Cart') {
                cartCount++;
                document.querySelector('.absolute.-top-1.-right-1 span').textContent = cartCount;

                // Add animation feedback
                const button = e.target.closest('button');
                if (button) {
                    button.textContent = 'Added!';
                    button.classList.add('bg-green-600', 'hover:bg-green-700');
                    button.classList.remove('bg-emerald-600', 'hover:bg-emerald-700');

                    setTimeout(() => {
                        button.textContent = 'Add to Cart';
                        button.classList.remove('bg-green-600', 'hover:bg-green-700');
                        button.classList.add('bg-emerald-600', 'hover:bg-emerald-700');
                    }, 1500);
                }

                // Show success notification
                showNotification('Book added to cart successfully!');
            }
        });

        // Notification system
        function showNotification(message) {
            const notification = document.createElement('div');
            notification.className = 'fixed top-24 right-4 bg-emerald-600 text-white px-6 py-3 rounded-2xl shadow-lg z-50 transform translate-x-full opacity-0 transition-all duration-300';
            notification.textContent = message;
            document.body.appendChild(notification);

            // Animate in
            setTimeout(() => {
                notification.classList.remove('translate-x-full', 'opacity-0');
            }, 100);

            // Animate out and remove
            setTimeout(() => {
                notification.classList.add('translate-x-full', 'opacity-0');
                setTimeout(() => {
                    document.body.removeChild(notification);
                }, 300);
            }, 3000);
        }

        // Search functionality
        const searchButton = document.querySelector('button svg[d*="M21 21l-6-6"]')?.parentElement;
        if (searchButton) {
            searchButton.addEventListener('click', () => {
                const searchOverlay = document.createElement('div');
                searchOverlay.className = 'fixed inset-0 bg-black/50 backdrop-blur-sm z-50 flex items-center justify-center p-4';
                searchOverlay.innerHTML = `
                    <div class="bg-white rounded-3xl p-8 max-w-2xl w-full animate-scale-in">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-2xl font-bold text-gray-900">Search Islamic Books</h3>
                            <button class="close-search p-2 hover:bg-gray-100 rounded-full">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                            </button>
                        </div>
                        <div class="relative">
                            <input type="text" placeholder="Search for Quran, Hadith, Fiqh..." 
                                   class="w-full px-6 py-4 border border-gray-200 rounded-2xl focus:outline-none focus:ring-4 focus:ring-emerald-100 focus:border-emerald-500 pl-12">
                            <svg class="w-5 h-5 text-gray-400 absolute left-4 top-1/2 transform -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                        </div>
                        <div class="mt-6 grid grid-cols-2 gap-3">
                            <button class="px-4 py-2 bg-emerald-50 text-emerald-600 rounded-xl hover:bg-emerald-100 transition-colors">Quran</button>
                            <button class="px-4 py-2 bg-emerald-50 text-emerald-600 rounded-xl hover:bg-emerald-100 transition-colors">Hadith</button>
                            <button class="px-4 py-2 bg-emerald-50 text-emerald-600 rounded-xl hover:bg-emerald-100 transition-colors">Seerah</button>
                            <button class="px-4 py-2 bg-emerald-50 text-emerald-600 rounded-xl hover:bg-emerald-100 transition-colors">Fiqh</button>
                        </div>
                    </div>
                `;
                document.body.appendChild(searchOverlay);

                // Focus on input
                setTimeout(() => {
                    searchOverlay.querySelector('input').focus();
                }, 100);

                // Close functionality
                searchOverlay.querySelector('.close-search').addEventListener('click', () => {
                    document.body.removeChild(searchOverlay);
                });

                searchOverlay.addEventListener('click', (e) => {
                    if (e.target === searchOverlay) {
                        document.body.removeChild(searchOverlay);
                    }
                });
            });
        }

        // Newsletter subscription
        const newsletterForm = document.querySelector('section[class*="emerald-600"] div');
        if (newsletterForm) {
            const subscribeBtn = newsletterForm.querySelector('button');
            const emailInput = newsletterForm.querySelector('input[type="email"]');

            if (subscribeBtn && emailInput) {
                subscribeBtn.addEventListener('click', (e) => {
                    e.preventDefault();
                    const email = emailInput.value.trim();

                    if (email && email.includes('@')) {
                        subscribeBtn.textContent = 'Subscribed!';
                        subscribeBtn.classList.add('bg-green-500', 'hover:bg-green-600');
                        subscribeBtn.classList.remove('bg-gold-500', 'hover:bg-gold-600');
                        emailInput.value = '';

                        showNotification('Successfully subscribed to newsletter!');

                        setTimeout(() => {
                            subscribeBtn.textContent = 'Subscribe';
                            subscribeBtn.classList.remove('bg-green-500', 'hover:bg-green-600');
                            subscribeBtn.classList.add('bg-gold-500', 'hover:bg-gold-600');
                        }, 2000);
                    } else {
                        showNotification('Please enter a valid email address.');
                    }
                });
            }
        }

        // Contact form submission
        const contactForm = document.querySelector('#contact form');
        if (contactForm) {
            contactForm.addEventListener('submit', (e) => {
                e.preventDefault();
                const submitBtn = contactForm.querySelector('button[type="submit"]');
                const originalText = submitBtn.textContent;

                submitBtn.textContent = 'Sending...';
                submitBtn.disabled = true;

                // Simulate form submission
                setTimeout(() => {
                    submitBtn.textContent = 'Message Sent!';
                    submitBtn.classList.add('bg-green-600');
                    submitBtn.classList.remove('from-emerald-600', 'to-emerald-700');
                    contactForm.reset();

                    showNotification('Thank you! Your message has been sent successfully.');

                    setTimeout(() => {
                        submitBtn.textContent = originalText;
                        submitBtn.disabled = false;
                        submitBtn.classList.remove('bg-green-600');
                        submitBtn.classList.add('from-emerald-600', 'to-emerald-700');
                    }, 3000);
                }, 1000);
            });
        }

        // Parallax effect for hero section
        window.addEventListener('scroll', () => {
            const scrolled = window.pageYOffset;
            const heroElements = document.querySelectorAll('#home .animate-float');

            heroElements.forEach((element, index) => {
                const speed = 0.5 + (index * 0.1);
                element.style.transform = `translateY(${scrolled * speed}px)`;
            });
        });

        // Initialize AOS (Animate On Scroll) alternative
        const animateOnScroll = () => {
            const elements = document.querySelectorAll('.group');
            elements.forEach(element => {
                const elementTop = element.getBoundingClientRect().top;
                const elementVisible = 150;

                if (elementTop < window.innerHeight - elementVisible) {
                    element.classList.add('animate-fade-in');
                } else {
                    element.classList.remove('animate-fade-in');
                }
            });
        };

        window.addEventListener('scroll', animateOnScroll);

        // Loading animation for page
        window.addEventListener('load', () => {
            document.body.classList.add('animate-fade-in');
        });

        // Lazy loading for images (if real images were used)
        if ('IntersectionObserver' in window) {
            const imageObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        img.src = img.dataset.src;
                        img.classList.remove('lazy');
                        imageObserver.unobserve(img);
                    }
                });
            });

            document.querySelectorAll('img[data-src]').forEach(img => {
                imageObserver.observe(img);
            });
        }

        console.log('🕌 Quranghor - Modern Islamic Literature Store Loaded Successfully');
        console.log('📖 May Allah bless your journey of seeking knowledge');
    </script>
</body>

</html>