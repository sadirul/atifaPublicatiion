<?php
require_once './class/class.user.php';
$user = new User();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="theme-color" content="#059669">
    <link rel="icon" href="assets/static/images/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="assets/static/images/favicon.ico" type="image/x-icon">
    <title>Atifa Publication - Modern Islamic Literature Store</title>
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
                                transform: 'translateY(-8px)'
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
                                transform: 'translateY(16px)',
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
                    },
                    fontSize: {
                        'xs': ['0.75rem', {
                            lineHeight: '1rem'
                        }],
                        'sm': ['0.875rem', {
                            lineHeight: '1.25rem'
                        }],
                        'base': ['1rem', {
                            lineHeight: '1.5rem'
                        }],
                        'lg': ['1.125rem', {
                            lineHeight: '1.75rem'
                        }],
                        'xl': ['1.25rem', {
                            lineHeight: '1.75rem'
                        }],
                        '2xl': ['1.5rem', {
                            lineHeight: '2rem'
                        }],
                        '3xl': ['1.875rem', {
                            lineHeight: '2.25rem'
                        }],
                        '4xl': ['2.25rem', {
                            lineHeight: '2.5rem'
                        }],
                        '5xl': ['3rem', {
                            lineHeight: '1'
                        }],
                    }
                }
            }
        }
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Poppins:wght@400;500;600;700&family=Amiri:wght@400;700&display=swap" rel="stylesheet">
</head>

<body class="font-sans bg-gray-50 overflow-x-hidden">
    <!-- Header Navigation -->
    <?php include('include/header.include.php') ?>

    <!-- Bottom Navigation for Mobile -->
    <?php include('include/bottom-navigation.include.php') ?>

    <!-- Hero Section -->
    <section id="home" class="relative w-full mt-16 mb-16 sm:mb-0">
        <img src="./assets/static/images/atifa-publication.jpg" class="w-full h-auto object-cover lazy" data-src="./assets/static/images/atifa-publication.jpg">
    </section>

    <!-- Stats Section -->
    <section class="py-12 bg-white border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                <div class="text-center group">
                    <div class="text-3xl sm:text-4xl font-bold text-emerald-600 mb-1 group-hover:scale-105 transition-transform">1000+</div>
                    <p class="text-xs sm:text-sm text-gray-600 font-medium">Islamic Books</p>
                </div>
                <div class="text-center group">
                    <div class="text-3xl sm:text-4xl font-bold text-emerald-600 mb-1 group-hover:scale-105 transition-transform">50k+</div>
                    <p class="text-xs sm:text-sm text-gray-600 font-medium">Happy Customers</p>
                </div>
                <div class="text-center group">
                    <div class="text-3xl sm:text-4xl font-bold text-emerald-600 mb-1 group-hover:scale-105 transition-transform">100+</div>
                    <p class="text-xs sm:text-sm text-gray-600 font-medium">Scholars</p>
                </div>
                <div class="text-center group">
                    <div class="text-3xl sm:text-4xl font-bold text-emerald-600 mb-1 group-hover:scale-105 transition-transform">4.9★</div>
                    <p class="text-xs sm:text-sm text-gray-600 font-medium">Rating</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Categories -->
    <section id="categories" class="py-16 bg-gradient-to-br from-emerald-50 to-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <div class="text-center mb-12">
                <h2 class="text-3xl sm:text-4xl font-display font-bold text-gray-900 mb-3">Browse Categories</h2>
                <p class="text-base sm:text-lg text-gray-600 max-w-2xl mx-auto">Find the perfect Islamic literature for your spiritual journey</p>
            </div>

            <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                <div class="group cursor-pointer">
                    <div class="bg-white p-6 rounded-2xl shadow-md hover:shadow-lg transition-all duration-300 border border-gray-100 hover:scale-102">
                        <div class="text-4xl mb-3 group-hover:scale-105 transition-transform">📖</div>
                        <h3 class="font-semibold text-gray-900 text-sm sm:text-base mb-1">Quran & Tafseer</h3>
                        <p class="text-xs sm:text-sm text-gray-600">Holy Quran with translations and commentary</p>
                    </div>
                </div>
                <div class="group cursor-pointer">
                    <div class="bg-white p-6 rounded-2xl shadow-md hover:shadow-lg transition-all duration-300 border border-gray-100 hover:scale-102">
                        <div class="text-4xl mb-3 group-hover:scale-105 transition-transform">📚</div>
                        <h3 class="font-semibold text-gray-900 text-sm sm:text-base mb-1">Hadith Collections</h3>
                        <p class="text-xs sm:text-sm text-gray-600">Authentic sayings of Prophet Muhammad (PBUH)</p>
                    </div>
                </div>
                <div class="group cursor-pointer">
                    <div class="bg-white p-6 rounded-2xl shadow-md hover:shadow-lg transition-all duration-300 border border-gray-100 hover:scale-102">
                        <div class="text-4xl mb-3 group-hover:scale-105 transition-transform">🕌</div>
                        <h3 class="font-semibold text-gray-900 text-sm sm:text-base mb-1">Islamic History</h3>
                        <p class="text-xs sm:text-sm text-gray-600">Stories and history of Islam</p>
                    </div>
                </div>
                <div class="group cursor-pointer">
                    <div class="bg-white p-6 rounded-2xl shadow-md hover:shadow-lg transition-all duration-300 border border-gray-100 hover:scale-102">
                        <div class="text-4xl mb-3 group-hover:scale-105 transition-transform">⭐</div>
                        <h3 class="font-semibold text-gray-900 text-sm sm:text-base mb-1">Islamic Ethics</h3>
                        <p class="text-xs sm:text-sm text-gray-600">Moral guidance and spiritual development</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Books Section -->
    <section id="books" class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <div class="text-center mb-12">
                <span class="text-emerald-600 font-semibold text-base sm:text-lg mb-2 block">Bestsellers</span>
                <h2 class="text-3xl sm:text-4xl font-display font-bold text-gray-900 mb-4">Featured Islamic Books</h2>
                <p class="text-base sm:text-lg text-gray-600 max-w-3xl mx-auto">Carefully curated collection from renowned Islamic scholars and trusted publishers</p>
            </div>

            <!-- Books Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                <?php
                $user->query("SELECT * FROM products");
                $products = $user->fetchAll();
                foreach ($products as $row):
                    $price = $row['price'];
                    $delPrice = $row['del_price'] ?? null;
                    $isBestseller = $row['is_bestseller'] ?? 0;
                    $rating = $row['rating'] ?? 5;
                    $user->query("SELECT image FROM product_images WHERE product_id = :pid ORDER BY id ASC LIMIT 1");
                    $user->bind(':pid', $row['id']);
                    $imgRow = $user->fetchOne();
                    $image = $imgRow['image'] ?? $row['image'] ?? 'placeholder.png';
                ?>
                    <div class="group cursor-pointer">
                        <div class="bg-white rounded-2xl shadow-md hover:shadow-lg transition-all duration-300 overflow-hidden border border-gray-100 hover:scale-102">
                            <div class="h-64 sm:h-72 relative overflow-hidden">
                                <img src="assets/uploads/products/<?= htmlspecialchars($image) ?>" alt="<?= htmlspecialchars($row['title']) ?>" class="w-full h-full object-cover lazy" data-src="assets/uploads/products/<?= htmlspecialchars($image) ?>">
                                <div class="absolute inset-0 bg-black/10"></div>
                                <div class="relative z-10 flex flex-col items-center justify-center h-full text-white p-4">
                                    <div class="text-5xl mb-3 group-hover:scale-105 transition-transform">
                                        <?= htmlspecialchars($row['icon'] ?? '📖') ?>
                                    </div>
                                    <div class="font-arabic text-lg sm:text-xl text-center">
                                        <?= htmlspecialchars($row['arabic_title'] ?? $row['title']) ?>
                                    </div>
                                    <div class="text-xs sm:text-sm opacity-90"><?= htmlspecialchars($row['subtitle'] ?? '') ?></div>
                                </div>
                                <?php if ($isBestseller): ?>
                                    <div class="absolute top-3 right-3">
                                        <span class="bg-gold-500 text-emerald-900 px-2 py-1 rounded-full text-xs font-bold shadow-md">
                                            Bestseller
                                        </span>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="p-4">
                                <a href="product.php?product_id=<?= md5($row['id']) ?>">
                                    <h3 class="text-base sm:text-lg font-semibold text-gray-900 mb-2 group-hover:text-emerald-600 transition-colors">
                                        <?= htmlspecialchars($row['title']) ?>
                                    </h3>
                                </a>
                                <p class="text-xs sm:text-sm text-gray-600 mb-3 line-clamp-2"><?= htmlspecialchars($row['description']) ?></p>
                                <div class="flex items-center justify-between mb-3">
                                    <div class="flex items-center space-x-2">
                                        <span class="text-lg sm:text-xl font-bold text-emerald-600">₹<?= number_format($price, 2) ?></span>
                                        <?php if ($delPrice): ?>
                                            <span class="text-xs sm:text-sm text-gray-500 line-through">₹<?= number_format($delPrice, 2) ?></span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="flex text-gold-400 text-sm">
                                        <span><?= str_repeat('★', $rating) ?><?= str_repeat('☆', 5 - $rating) ?></span>
                                    </div>
                                </div>
                                <a href="product.php?product_id=<?= md5($row['id']) ?>" class="w-full bg-emerald-600 text-white py-2 px-4 rounded-lg hover:bg-emerald-700 transition-all duration-300 font-medium text-sm sm:text-base">
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
    <section class="py-16 bg-gradient-to-br from-emerald-50 to-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <div class="text-center mb-12">
                <h2 class="text-3xl sm:text-4xl font-display font-bold text-gray-900 mb-4">What Our Readers Say</h2>
                <p class="text-base sm:text-lg text-gray-600 max-w-2xl mx-auto">Join thousands of satisfied customers on their Islamic learning journey</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white p-6 rounded-2xl shadow-md hover:shadow-lg transition-all duration-300 border border-gray-100">
                    <div class="flex text-gold-400 mb-3 text-sm">
                        <span>★★★★★</span>
                    </div>
                    <p class="text-xs sm:text-sm text-gray-600 mb-4 italic">"Excellent collection of authentic Islamic books. The quality is outstanding and delivery was fast. Highly recommended!"</p>
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-emerald-500 rounded-full flex items-center justify-center text-white font-bold text-sm mr-3">
                            AM
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900 text-sm">Ahmed Mohammed</h4>
                            <p class="text-xs text-gray-500">Student of Knowledge</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-md hover:shadow-lg transition-all duration-300 border border-gray-100">
                    <div class="flex text-gold-400 mb-3 text-sm">
                        <span>★★★★★</span>
                    </div>
                    <p class="text-xs sm:text-sm text-gray-600 mb-4 italic">"Amazing selection of books with beautiful translations. This store has become my go-to for Islamic literature."</p>
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-purple-500 rounded-full flex items-center justify-center text-white font-bold text-sm mr-3">
                            SA
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900 text-sm">Sister Aisha</h4>
                            <p class="text-xs text-gray-500">Islamic Teacher</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-md hover:shadow-lg transition-all duration-300 border border-gray-100">
                    <div class="flex text-gold-400 mb-3 text-sm">
                        <span>★★★★★</span>
                    </div>
                    <p class="text-xs sm:text-sm text-gray-600 mb-4 italic">"Atifa Publication has helped me build an amazing Islamic library. Great customer service and authentic books."</p>
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center text-white font-bold text-sm mr-3">
                            MY
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900 text-sm">Mohammed Yusuf</h4>
                            <p class="text-xs text-gray-500">Community Leader</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Us Section -->
    <section id="about" class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div class="space-y-6">
                    <div>
                        <span class="text-emerald-600 font-semibold text-base sm:text-lg mb-2 block">Our Mission</span>
                        <h2 class="text-3xl sm:text-4xl font-display font-bold text-gray-900 mb-4">Spreading Authentic Islamic Knowledge</h2>
                        <p class="text-base sm:text-lg text-gray-600 leading-relaxed">
                            <strong>Assalamu alaykum</strong><br>
                            বই জ্ঞানের আলো,হৃদয়ের সঙ্গী। আমরা বইকে দেখি শ্রেষ্ঠ উপহার হিসেবে,চিন্তাকে সমৃদ্ধ করে,জীবনের দিগন্ত প্রসারিত করে। আতিফা পাবলিকেশন আপনাদের হাতে পৌঁছে দিচ্ছে সেই অনন্য উপহার- বই,সমগ্র ভারত জুড়ে।
                            <br>
                            🌹Cash on delivery 🚚 Free Delivery 🎁
                        </p>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="text-center p-4 bg-emerald-50 rounded-lg">
                            <div class="text-2xl font-bold text-emerald-600 mb-1">10+</div>
                            <p class="text-xs sm:text-sm text-gray-700 font-medium">Years Experience</p>
                        </div>
                        <div class="text-center p-4 bg-gold-50 rounded-lg">
                            <div class="text-2xl font-bold text-gold-600 mb-1">200+</div>
                            <p class="text-xs sm:text-sm text-gray-700 font-medium">Verified Scholars</p>
                        </div>
                    </div>
                </div>
                <div class="relative">
                    <div class="bg-gradient-to-br from-emerald-500 to-emerald-700 rounded-2xl p-8 text-white relative overflow-hidden">
                        <div class="relative z-10">
                            <h3 class="text-xl sm:text-2xl font-bold mb-4">Why Choose Atifa Publication?</h3>
                            <div class="space-y-3">
                                <div class="flex items-center space-x-3">
                                    <div class="w-6 h-6 bg-white/20 rounded-full flex items-center justify-center">
                                        <span class="text-base">✓</span>
                                    </div>
                                    <span class="text-sm sm:text-base">Authenticated Islamic sources</span>
                                </div>
                                <div class="flex items-center space-x-3">
                                    <div class="w-6 h-6 bg-white/20 rounded-full flex items-center justify-center">
                                        <span class="text-base">✓</span>
                                    </div>
                                    <span class="text-sm sm:text-base">Competitive pricing & discounts</span>
                                </div>
                                <div class="flex items-center space-x-3">
                                    <div class="w-6 h-6 bg-white/20 rounded-full flex items-center justify-center">
                                        <span class="text-base">✓</span>
                                    </div>
                                    <span class="text-sm sm:text-base">Fast worldwide shipping</span>
                                </div>
                                <div class="flex items-center space-x-3">
                                    <div class="w-6 h-6 bg-white/20 rounded-full flex items-center justify-center">
                                        <span class="text-base">✓</span>
                                    </div>
                                    <span class="text-sm sm:text-base">24/7 customer support</span>
                                </div>
                            </div>
                        </div>
                        <div class="absolute top-3 right-3 w-24 h-24 bg-white/10 rounded-full"></div>
                        <div class="absolute bottom-3 left-3 w-16 h-16 bg-white/10 rounded-full"></div>
                    </div>
                </div>
            </div>
            <div class="mt-12 text-center bg-gradient-to-r from-emerald-50 to-gold-50 rounded-2xl p-8">
                <div class="font-arabic text-2xl sm:text-3xl text-emerald-800 mb-4">
                    وَقُل رَّبِّ زِدْنِي عِلْمًا
                </div>
                <p class="text-base sm:text-lg text-emerald-700 font-semibold">
                    "And say: My Lord, increase me in knowledge"
                </p>
                <p class="text-sm sm:text-base text-emerald-600 mt-2">- Quran 20:114</p>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-16 bg-white pb-24 sm:pb-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <div class="text-center mb-12">
                <h2 class="text-3xl sm:text-4xl font-display font-bold text-gray-900 mb-4">Get In Touch</h2>
                <p class="text-base sm:text-lg text-gray-600 max-w-3xl mx-auto">Have questions about our Islamic books or need personalized recommendations? We're here to help you on your learning journey.</p>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <div>
                    <div class="bg-gradient-to-br from-emerald-50 to-emerald-100 p-6 rounded-2xl">
                        <h3 class="text-xl sm:text-2xl font-bold text-gray-900 mb-4">Contact Information</h3>
                        <div class="space-y-4">
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-10 bg-emerald-500 rounded-lg flex items-center justify-center">
                                    <span class="text-white text-base">📧</span>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900 text-sm sm:text-base">Email</h4>
                                    <p class="text-xs sm:text-sm text-gray-600">atifapublicationindia@gmail.com</p>
                                </div>
                            </div>
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-10 bg-emerald-500 rounded-lg flex items-center justify-center">
                                    <span class="text-white text-base">📱</span>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900 text-sm sm:text-base">Call + WhatsApp</h4>
                                    <p class="text-xs sm:text-sm text-gray-600">+919477081723/+917003821823</p>
                                </div>
                            </div>
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-10 bg-emerald-500 rounded-lg flex items-center justify-center">
                                    <span class="text-white text-base">🌍</span>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900 text-sm sm:text-base">Coverage</h4>
                                    <p class="text-xs sm:text-sm text-gray-600">All India</p>
                                </div>
                            </div>
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-10 bg-emerald-500 rounded-lg flex items-center justify-center">
                                    <span class="text-white text-base">⏰</span>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900 text-sm sm:text-base">Support Hours</h4>
                                    <p class="text-xs sm:text-sm text-gray-600">24/7 Customer Service</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="space-y-6">
                    <div class="bg-gradient-to-br from-gold-50 to-gold-100 p-6 rounded-2xl">
                        <h3 class="text-xl sm:text-2xl font-bold text-gray-900 mb-4">Follow Us</h3>
                        <div class="flex space-x-4">
                            <!-- Facebook -->
                            <a href="https://www.facebook.com/Atifapublicationin" target="_blank"
                                rel="noopener noreferrer">
                                <button
                                    class="w-10 h-10 bg-blue-500 text-white rounded-lg hover:scale-105 transition-transform flex items-center justify-center">
                                    <!-- Facebook SVG -->
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="w-5 h-5">
                                        <path
                                            d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.891h-2.33v6.987C18.343 21.128 22 16.991 22 12z" />
                                    </svg>
                                </button>
                            </a>

                            <!-- YouTube -->
                            <a href="https://www.youtube.com/@atifapublication" target="_blank"
                                rel="noopener noreferrer">
                                <button
                                    class="w-10 h-10 bg-red-600 text-white rounded-lg hover:scale-105 transition-transform flex items-center justify-center">
                                    <!-- YouTube SVG -->
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="w-5 h-5">
                                        <path
                                            d="M19.615 3.184a3.001 3.001 0 012.121 2.121C22 6.75 22 12 22 12s0 5.25-.264 6.695a3.001 3.001 0 01-2.121 2.121C18.25 21 12 21 12 21s-6.25 0-7.695-.264a3.001 3.001 0 01-2.121-2.121C2 17.25 2 12 2 12s0-5.25.264-6.695a3.001 3.001 0 012.121-2.121C5.75 3 12 3 12 3s6.25 0 7.615.184zM10 8.75v6.5L16 12l-6-3.25z" />
                                    </svg>
                                </button>
                            </a>

                            <!-- WhatsApp Community -->
                            <a href="https://chat.whatsapp.com/FK50qsZH66699EBn1zMALB?mode=ems_wa_t" target="_blank"
                                rel="noopener noreferrer">
                                <button
                                    class="w-10 h-10 bg-green-500 text-white rounded-lg hover:scale-105 transition-transform flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                                        <path d="M20.52 3.48A11.873 11.873 0 0012 0C5.372 0 0 5.372 0 12c0 2.121.556 4.102 1.524 5.832L0 24l6.408-1.518A11.936 11.936 0 0012 24c6.628 0 12-5.372 12-12 0-3.195-1.247-6.195-3.48-8.52zM12 21.818a9.822 9.822 0 01-5.163-1.469l-.37-.221-3.806.902.946-3.693-.239-.383A9.82 9.82 0 012.182 12 9.818 9.818 0 0112 2.182 9.818 9.818 0 0121.818 12 9.818 9.818 0 0112 21.818zm5.332-7.332c-.144-.072-1.065-.528-1.23-.588-.165-.06-.288-.072-.408.072s-.468.588-.576.708c-.108.12-.216.132-.396.048-.18-.084-.756-.276-1.44-.888-.532-.474-.892-1.062-.996-1.242-.108-.18-.012-.276.084-.36.084-.084.18-.216.264-.324.084-.108.108-.18.18-.3.072-.12.036-.216-.018-.288-.054-.072-.48-1.152-.66-1.584-.174-.432-.348-.372-.468-.378-.12-.006-.252-.006-.384-.006s-.288.036-.432.168c-.144.132-.552.54-.552 1.32s.564 1.536.644 1.644c.072.108 1.112 1.696 2.688 2.38 1.476.636 1.476.424 1.74.396.264-.024 1.065-.432 1.215-.852.144-.42.144-.78.108-.852-.036-.072-.132-.108-.276-.18z" />
                                    </svg>
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
                <div class="md:col-span-2">
                    <div class="flex items-center space-x-3 mb-4">
                        <div class="w-10 h-10 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-lg flex items-center justify-center">
                            <span class="text-white text-base font-bold">📖</span>
                        </div>
                        <div>
                            <h3 class="text-xl sm:text-2xl font-display font-bold">Atifa Publication</h3>
                            <p class="text-gray-400 text-xs sm:text-sm">Islamic Literature & Knowledge</p>
                        </div>
                    </div>
                    <p class="text-gray-300 text-xs sm:text-sm mb-4 max-w-md">
                        বই জ্ঞানের আলো,হৃদয়ের সঙ্গী। আমরা বইকে দেখি শ্রেষ্ঠ উপহার হিসেবে,চিন্তাকে সমৃদ্ধ করে,জীবনের দিগন্ত প্রসারিত করে। আতিফা পাবলিকেশন আপনাদের হাতে পৌঁছে দিচ্ছে সেই অনন্য উপহার- বই,সমগ্র ভারত জুড়ে।
                    </p>
                </div>
                <div>
                    <h4 class="font-bold text-base sm:text-lg mb-4">Quick Links</h4>
                    <ul class="space-y-2 text-gray-300 text-xs sm:text-sm">
                        <li><a href="#home" class="hover:text-emerald-400 transition-colors">Home</a></li>
                        <li><a href="#books" class="hover:text-emerald-400 transition-colors">All Books</a></li>
                        <li><a href="#categories" class="hover:text-emerald-400 transition-colors">Categories</a></li>
                        <li><a href="#about" class="hover:text-emerald-400 transition-colors">About Us</a></li>
                        <li><a href="#contact" class="hover:text-emerald-400 transition-colors">Contact</a></li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-700 pt-6 flex flex-col sm:flex-row justify-between items-center">
                <p class="text-gray-400 text-xs sm:text-sm mb-4 sm:mb-0">
                    &copy; 2025 Atifa Publication. All rights reserved. Made with ❤️ for the Muslim Ummah.
                </p>
                <div class="flex space-x-4 text-xs sm:text-sm text-gray-400">
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

        // Smooth scrolling
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
                mobileMenu.classList.add('hidden');
            });
        });

        // Active navigation highlighting
        window.addEventListener('scroll', () => {
            const sections = document.querySelectorAll('section[id]');
            const navLinks = document.querySelectorAll('nav a[href^="#"]');
            let current = '';
            sections.forEach(section => {
                const sectionTop = section.offsetTop - 100;
                if (scrollY >= sectionTop && scrollY < sectionTop + section.clientHeight) {
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

        // Intersection Observer for animations
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
        document.querySelectorAll('.group, .animate-slide-up').forEach(el => observer.observe(el));

        // Lazy loading images
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
            document.querySelectorAll('img[data-src]').forEach(img => imageObserver.observe(img));
        }

        // Notification system
        function showNotification(message) {
            const notification = document.createElement('div');
            notification.className = 'fixed bottom-20 sm:top-20 right-4 bg-emerald-600 text-white px-4 py-2 rounded-lg shadow-lg z-50 transform translate-x-full opacity-0 transition-all duration-300';
            notification.textContent = message;
            document.body.appendChild(notification);
            setTimeout(() => notification.classList.remove('translate-x-full', 'opacity-0'), 100);
            setTimeout(() => {
                notification.classList.add('translate-x-full', 'opacity-0');
                setTimeout(() => document.body.removeChild(notification), 300);
            }, 3000);
        }

        console.log('🕌 Atifa Publication - Modern Islamic Literature Store Loaded Successfully');
        console.log('📖 May Allah bless your journey of seeking knowledge');
    </script>
</body>

</html>