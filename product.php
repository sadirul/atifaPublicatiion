<?php
require_once './class/class.user.php';
$user = new User();

// Get product ID from URL
if (!isset($_GET['product_id']) || empty($_GET['product_id'])) {
    $user->set_alert("Invalid Product ID.", 'error');
    $user->redirect('index.php');
    exit();
}

$product_id = $_GET['product_id'];

// Fetch product data
$user->query("SELECT * FROM products WHERE MD5(id) = :id");
$user->bind(':id', $product_id);
$product = $user->fetchOne();

if (!$product) {
    $user->set_alert("Product not found.", 'error');
    $user->redirect('index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="theme-color" content="#059669">
    <link rel="icon" href="assets/static/images/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="assets/static/images/favicon.ico" type="image/x-icon">
    <title><?php echo htmlspecialchars($product['title']); ?> - Atifa Publication Islamic Literature Store</title>

    <!-- SEO Meta Tags -->
    <meta name="description" content="<?php echo htmlspecialchars(substr($product['description'], 0, 160)); ?>">
    <meta name="keywords" content="Islamic books, <?php echo htmlspecialchars($product['title']); ?>, Atifa Publication, Islamic literature, Hadith, Quran, Sahih al-Bukhari">
    <meta name="author" content="Atifa Publication Islamic Literature Store">

    <!-- Open Graph / Facebook -->
    <meta property="og:title" content="<?php echo htmlspecialchars($product['title']); ?>">
    <meta property="og:description" content="<?php echo htmlspecialchars(substr($product['description'], 0, 160)); ?>">
    <meta property="og:type" content="product">
    <meta property="og:url" content="<?php echo 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>">
    <meta property="og:image" content="<?php echo 'https://' . $_SERVER['HTTP_HOST'] . '/assets/uploads/products/' . htmlspecialchars($product['image']); ?>">
    <meta property="og:site_name" content="Atifa Publication Islamic Literature Store">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo htmlspecialchars($product['title']); ?>">
    <meta name="twitter:description" content="<?php echo htmlspecialchars(substr($product['description'], 0, 160)); ?>">
    <meta name="twitter:image" content="<?php echo 'https://' . $_SERVER['HTTP_HOST'] . '/assets/uploads/products/' . htmlspecialchars($product['image']); ?>">
    <meta name="twitter:site" content="@Atifa Publication">

    <!-- JSON-LD Structured Data for SEO -->
    <script type="application/ld+json">
        {
            "@context": "https://schema.org/",
            "@type": "Product",
            "name": "<?php echo addslashes($product['title']); ?>",
            "image": ["<?php echo 'https://' . $_SERVER['HTTP_HOST'] . '/assets/uploads/products/' . addslashes($product['image']); ?>"],
            "description": "<?php echo addslashes($product['description']); ?>",
            "sku": "<?php echo $product['id']; ?>",
            "mpn": "<?php echo $product['id']; ?>",
            "brand": {
                "@type": "Brand",
                "name": "Atifa Publication"
            },
            "offers": {
                "@type": "Offer",
                "url": "<?php echo 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>",
                "priceCurrency": "INR",
                "price": "<?php echo $product['price']; ?>",
                "availability": "https://schema.org/InStock",
                "itemCondition": "https://schema.org/NewCondition"
            }
        }
    </script>

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
                        emerald: {
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
                        gold: {
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
                        'scale-in': 'scale-in 0.3s ease-out',
                        'pulse-slow': 'pulse 3s ease-in-out infinite'
                    },
                    keyframes: {
                        float: {
                            '0%,100%': {
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

    <!-- Product Details Section -->
    <section class="pt-20 pb-12 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Product Image -->
                <div class="space-y-4">
                    <div class="relative rounded-2xl overflow-hidden shadow-md group">
                        <div class="aspect-w-4 aspect-h-5 h-80 sm:h-96 flex items-center justify-center">
                            <?php
                            $user->query("SELECT image FROM product_images WHERE product_id = :pid ORDER BY id ASC");
                            $user->bind(':pid', $product['id']);
                            $images = $user->fetchAll();
                            if (!$images) {
                                $images[] = ['image' => $product['image'] ?? 'placeholder.png'];
                            }
                            $mainImage = $images[0]['image'];
                            ?>
                            <img id="mainProductImage" src="assets/uploads/products/<?= htmlspecialchars($mainImage) ?>" alt="<?= htmlspecialchars($product['title']) ?>" class="w-full h-full rounded-2xl object-cover lazy" data-src="assets/uploads/products/<?= htmlspecialchars($mainImage) ?>">
                        </div>
                        <?php if (!empty($product['is_bestseller'])): ?>
                            <div class="absolute top-3 right-3">
                                <span class="bg-gold-500 text-emerald-900 px-3 py-1 rounded-full text-xs font-bold shadow-md animate-pulse-slow">
                                    Bestseller
                                </span>
                            </div>
                        <?php endif; ?>
                    </div>
                    <!-- Thumbnails -->
                    <div class="flex space-x-3 overflow-x-auto py-2">
                        <?php foreach ($images as $img): ?>
                            <div class="flex-shrink-0 w-16 h-16 rounded-lg overflow-hidden border-2 border-gray-200 cursor-pointer hover:border-emerald-500 transition-all">
                                <img src="assets/uploads/products/<?= htmlspecialchars($img['image']) ?>" alt="<?= htmlspecialchars($product['title']) ?>" class="w-full h-full object-cover thumbnail-image lazy" data-src="assets/uploads/products/<?= htmlspecialchars($img['image']) ?>">
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Product Information -->
                <div class="space-y-6">
                    <div>
                        <h1 class="text-2xl sm:text-3xl font-display font-bold text-gray-900 mb-3"><?php echo htmlspecialchars($product['title']); ?></h1>
                        <p class="text-sm sm:text-base text-gray-600 mb-3"><?php echo nl2br(htmlspecialchars($product['description'])); ?></p>
                        <div class="flex items-center space-x-3 mb-4">
                            <div class="flex text-gold-400 text-base">
                                <span>★★★★★</span>
                            </div>
                        </div>
                        <div class="flex items-center space-x-3 mb-4">
                            <?php
                            $price = $product['price'];
                            $delPrice = $product['del_price'] ?? 0;
                            $percentageOff = $delPrice > $price ? round((($delPrice - $price) / $delPrice) * 100) : 0;
                            ?>
                            <span class="text-2xl sm:text-3xl font-bold text-emerald-600">₹<?= number_format($price, 2) ?></span>
                            <?php if ($delPrice > $price): ?>
                                <span class="text-sm sm:text-base text-gray-500 line-through">₹<?= number_format($delPrice, 2) ?></span>
                                <span class="bg-red-100 text-red-800 px-2 py-1 rounded-full text-xs font-semibold">
                                    <?= $percentageOff ?>% OFF
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php if (!empty($product['embed_link'])): ?>
        <div class="border-t border-gray-200 flex justify-center p-5">
            <iframe
                class="rounded-xl overflow-hidden"
                width="560"
                height="315"
                src="https://www.youtube.com/embed/<?php echo $product['embed_link']; ?>?autoplay=1&mute=1"
                title="YouTube video player"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                referrerpolicy="strict-origin-when-cross-origin"
                allowfullscreen>
            </iframe>
        </div>
    <?php endif; ?>

    <!-- Order Form Section -->
    <section class="py-12 bg-gradient-to-br from-emerald-50 to-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6">
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                <div class="bg-gradient-to-r from-emerald-600 to-emerald-700 px-6 py-4">
                    <h2 class="text-2xl sm:text-3xl font-display font-bold text-white mb-2">Place Your Order</h2>
                    <p class="text-sm sm:text-base text-emerald-100">Fill in your details to order <?php echo htmlspecialchars($product['title']); ?></p>
                </div>
                <?php echo $user->get_alert(); ?>
                <form class="p-6 space-y-6" id="orderForm" action="action/buy.action.php" method="POST">
                    <div>
                        <h3 class="text-lg sm:text-xl font-semibold text-gray-900 mb-4 flex items-center">
                            <span class="w-6 h-6 bg-emerald-100 text-emerald-600 rounded-full flex items-center justify-center text-sm font-bold mr-2">1</span>
                            Personal Information
                        </h3>
                        <div class="grid grid-cols-1 gap-4">
                            <div>
                                <label class="block text-xs sm:text-sm font-semibold text-gray-900 mb-2">Full Name *</label>
                                <input name="name" type="text" required class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-100 focus:border-emerald-500 transition-all" placeholder="Enter your full name">
                            </div>
                            <div>
                                <label class="block text-xs sm:text-sm font-semibold text-gray-900 mb-2">Mobile Number *</label>
                                <input name="mobile" type="tel" required class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-100 focus:border-emerald-500 transition-all" placeholder="+91 XXXXX XXXXX">
                            </div>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-lg sm:text-xl font-semibold text-gray-900 mb-4 flex items-center">
                            <span class="w-6 h-6 bg-emerald-100 text-emerald-600 rounded-full flex items-center justify-center text-sm font-bold mr-2">2</span>
                            Delivery Address
                        </h3>

                        <!-- Flat/House No. -->
                        <!-- <div class="mb-3">
                            <label class="block text-xs sm:text-sm font-semibold text-gray-900 mb-2">Flat/House No.</label>
                            <input type="text" name="flat_no" placeholder="Flat/House No."
                                class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-100 focus:border-emerald-500 transition-all">
                        </div> -->

                        <!-- Village/City -->
                        <div class="mb-3">
                            <label class="block text-xs sm:text-sm font-semibold text-gray-900 mb-2">Village *</label>
                            <input type="text" name="city" required placeholder="Village"
                                class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-100 focus:border-emerald-500 transition-all">
                        </div>

                        <!-- P.O. -->
                        <div class="mb-3">
                            <label class="block text-xs sm:text-sm font-semibold text-gray-900 mb-2">P.O. *</label>
                            <input type="text" name="po" required placeholder="Post Office"
                                class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-100 focus:border-emerald-500 transition-all">
                        </div>

                        <!-- P.S. -->
                        <div class="mb-3">
                            <label class="block text-xs sm:text-sm font-semibold text-gray-900 mb-2">P.S. *</label>
                            <input type="text" name="ps" required placeholder="Police Station"
                                class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-100 focus:border-emerald-500 transition-all">
                        </div>

                        <!-- District -->
                        <div class="mb-3">
                            <label class="block text-xs sm:text-sm font-semibold text-gray-900 mb-2">District *</label>
                            <input type="text" name="district" required placeholder="District"
                                class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-100 focus:border-emerald-500 transition-all">
                        </div>

                        <!-- State -->
                        <div class="mb-3">
                            <label class="block text-xs sm:text-sm font-semibold text-gray-900 mb-2">State *</label>
                            <input type="text" name="state" required placeholder="State"
                                class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-100 focus:border-emerald-500 transition-all">
                        </div>

                        <!-- Pin -->
                        <div class="mb-3">
                            <label class="block text-xs sm:text-sm font-semibold text-gray-900 mb-2">PIN Code *</label>
                            <input type="text" name="pin" required placeholder="PIN Code"
                                class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-100 focus:border-emerald-500 transition-all">
                        </div>

                        <!-- Near -->
                        <div class="mb-3">
                            <label class="block text-xs sm:text-sm font-semibold text-gray-900 mb-2">Near (Landmark)</label>
                            <input type="text" name="near" placeholder="Near / Landmark"
                                class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-100 focus:border-emerald-500 transition-all">
                        </div>
                    </div>

                    <div>
                        <h3 class="text-lg sm:text-xl font-semibold text-gray-900 mb-4 flex items-center">
                            <span class="w-6 h-6 bg-emerald-100 text-emerald-600 rounded-full flex items-center justify-center text-sm font-bold mr-2">3</span>
                            Order Details
                        </h3>
                        <div class="bg-gray-50 rounded-lg p-4">
                            <div class="flex items-center justify-between mb-4">
                                <div class="flex items-center space-x-3">
                                    <div class="w-12 h-12 bg-emerald-500 rounded-lg flex items-center justify-center text-white text-xl">
                                        📖
                                    </div>
                                    <div>
                                        <h4 class="font-semibold text-gray-900 text-sm sm:text-base"><?php echo htmlspecialchars($product['title']); ?></h4>
                                        <p class="text-xs sm:text-sm text-gray-600 line-clamp-2"><?php echo nl2br(htmlspecialchars($product['description'])); ?></p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <div class="text-lg sm:text-xl font-bold text-emerald-600">₹<?php echo number_format($product['price'], 2); ?></div>
                                    <?php if ($delPrice > $price): ?>
                                        <div class="text-xs sm:text-sm text-gray-500 line-through">₹<?php echo number_format($delPrice, 2); ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="flex items-center justify-between">
                                <label class="block text-xs sm:text-sm font-semibold text-gray-900">Quantity</label>
                                <div class="flex items-center space-x-3">
                                    <button type="button" class="quantity-btn minus w-8 h-8 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-colors font-bold">-</button>
                                    <input type="number" name="qty" id="quantity" value="1" min="1" max="10" class="w-16 text-center py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
                                    <button type="button" class="quantity-btn plus w-8 h-8 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-colors font-bold">+</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-emerald-50 rounded-lg p-4">
                        <h4 class="font-semibold text-gray-900 mb-3 text-sm sm:text-base">Order Summary</h4>
                        <div class="space-y-2">
                            <div class="flex justify-between text-xs sm:text-sm">
                                <span class="text-gray-600">Item Price</span>
                                <span id="itemPrice">₹<?php echo number_format($product['price'], 2); ?></span>
                            </div>
                            <div class="flex justify-between text-xs sm:text-sm">
                                <span class="text-gray-600">Quantity</span>
                                <span id="summaryQuantity">1</span>
                            </div>
                            <div class="flex justify-between text-xs sm:text-sm">
                                <span class="text-gray-600">Subtotal</span>
                                <span id="subtotal">₹<?php echo number_format($product['price'], 2); ?></span>
                            </div>
                            <div class="flex justify-between text-xs sm:text-sm">
                                <span class="text-gray-600">Shipping</span>
                                <span class="font-semibold text-emerald-600">Free</span>
                            </div>
                            <div class="border-t border-emerald-200 pt-2">
                                <div class="flex justify-between">
                                    <span class="text-sm sm:text-base font-bold text-gray-900">Total</span>
                                    <span id="total" class="text-lg sm:text-xl font-bold text-emerald-600">₹<?php echo number_format($product['price'], 2); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-lg sm:text-xl font-semibold text-gray-900 mb-4 flex items-center">
                            <span class="w-6 h-6 bg-emerald-100 text-emerald-600 rounded-full flex items-center justify-center text-sm font-bold mr-2">4</span>
                            Payment Method
                        </h3>
                        <div class="space-y-3">
                            <label class="flex items-center space-x-3 p-3 border-2 border-gray-200 rounded-lg hover:border-emerald-300 cursor-pointer transition-all">
                                <input type="radio" name="payment" value="cod" checked class="text-emerald-600 focus:ring-emerald-500">
                                <div class="flex items-center space-x-2">
                                    <span class="text-xl">💵</span>
                                    <div>
                                        <div class="font-semibold text-gray-900 text-sm sm:text-base">Cash on Delivery</div>
                                        <div class="text-xs sm:text-sm text-gray-600">Pay when you receive the product</div>
                                    </div>
                                </div>
                            </label>
                        </div>
                    </div>
                    <input type="hidden" name="placeOrder" value="<?php echo $user->escape($_GET['product_id']); ?>">
                    <div class="pt-4">
                        <button type="submit" class="w-full bg-gradient-to-r from-emerald-600 to-emerald-700 text-white py-3 px-6 rounded-lg hover:from-emerald-700 hover:to-emerald-800 transition-all duration-300 font-bold text-base sm:text-lg shadow-md hover:shadow-lg hover:scale-102">
                            Place Order - <span id="finalTotal">₹<?php echo number_format($product['price'], 2); ?></span>
                        </button>
                        <p class="text-center text-gray-600 text-xs sm:text-sm mt-3">
                            By placing this order, you agree to our Terms & Conditions
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Product Description -->
    <section class="py-12 bg-white pb-24 sm:pb-12">
        <div class="max-w-4xl mx-auto px-4 sm:px-6">
            <div class="bg-gray-50 rounded-2xl p-6">
                <h3 class="text-lg sm:text-xl font-bold text-gray-900 mb-4">About This Book</h3>
                <div class="prose prose-sm sm:prose-base max-w-none text-gray-700 space-y-3">
                    <p><?php echo nl2br(htmlspecialchars($product['full_description'])); ?></p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 text-center">
            <div class="flex items-center justify-center space-x-3 mb-4">
                <div class="w-10 h-10 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-lg flex items-center justify-center">
                    <span class="text-white text-base font-bold">📖</span>
                </div>
                <div>
                    <h3 class="text-xl sm:text-2xl font-display font-bold">Atifa Publication</h3>
                    <p class="text-gray-400 text-xs sm:text-sm">Islamic Literature & Knowledge</p>
                </div>
            </div>
            <p class="text-gray-300 text-xs sm:text-sm mb-4">Dedicated to spreading authentic Islamic knowledge</p>
            <div class="font-arabic text-gold-400 text-base sm:text-lg mb-4">بارك الله فيكم</div>
            <p class="text-gray-400 text-xs sm:text-sm">&copy; 2025 Atifa Publication. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
        $(document).ready(function() {
            const itemPrice = <?php echo $product['price']; ?>;

            // Quantity Management
            function updateOrderSummary() {
                const quantity = parseInt($('#quantity').val());
                const subtotal = itemPrice * quantity;
                $('#summaryQuantity').text(quantity);
                $('#subtotal').text('₹' + subtotal.toLocaleString('en-IN'));
                $('#total').text('₹' + subtotal.toLocaleString('en-IN'));
                $('#finalTotal').text('₹' + subtotal.toLocaleString('en-IN'));
            }

            $('.quantity-btn').on('click', function() {
                let currentQty = parseInt($('#quantity').val());
                if ($(this).hasClass('plus') && currentQty < 10) {
                    $('#quantity').val(currentQty + 1);
                } else if ($(this).hasClass('minus') && currentQty > 1) {
                    $('#quantity').val(currentQty - 1);
                }
                updateOrderSummary();
            });

            $('#quantity').on('change', updateOrderSummary);

            // Form Submission
            $('#orderForm').on('submit', function(e) {
                e.preventDefault();
                const form = $(this);
                const submitBtn = form.find('button[type="submit"]');
                const originalText = submitBtn.html();

                submitBtn.html(`
                    <div class="flex items-center justify-center space-x-2">
                        <div class="animate-spin rounded-full h-5 w-5 border-b-2 border-white"></div>
                        <span>Processing...</span>
                    </div>
                `).prop('disabled', true);

                const formData = new FormData(this);
                $.ajax({
                    url: 'action/buy.action.php',
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    success: function(data) {
                        if (data.status === 'success') {
                            const successMessage = $(`
                                <div class="fixed inset-0 bg-black/50 backdrop-blur-sm z-50 flex items-center justify-center p-4">
                                    <div class="bg-white rounded-2xl p-6 max-w-md w-full text-center animate-scale-in">
                                        <div class="w-16 h-16 bg-emerald-500 rounded-full flex items-center justify-center mx-auto mb-4">
                                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                            </svg>
                                        </div>
                                        <h3 class="text-lg sm:text-xl font-bold text-gray-900 mb-3">Order Placed Successfully!</h3>
                                        <p class="text-xs sm:text-sm text-gray-600 mb-4">${data.message}</p>
                                        <div class="bg-emerald-50 rounded-lg p-3 mb-4">
                                            <p class="text-emerald-800 font-semibold text-xs sm:text-sm">Order ID: #${data.order_id}</p>
                                        </div>
                                        <a href="index.php" class="block w-full bg-emerald-600 text-white py-2 px-4 rounded-lg hover:bg-emerald-700 transition-colors text-sm sm:text-base">
                                            Continue Shopping
                                        </a>
                                    </div>
                                </div>
                            `);
                            $('body').append(successMessage);
                            successMessage.find('a').on('click', function() {
                                successMessage.remove();
                            });
                            setTimeout(() => {
                                form[0].reset();
                                $('#quantity').val(1);
                                updateOrderSummary();
                            }, 1000);
                        } else {
                            alert(data.message || "Failed to place order. Please try again.");
                        }
                    },
                    error: function(err) {
                        console.error(err);
                    },
                    complete: function() {
                        submitBtn.html(originalText).prop('disabled', false);
                    }
                });
            });

            // Thumbnail image switching
            $('.thumbnail-image').on('click', function() {
                $('#mainProductImage').attr('src', $(this).attr('src'));
            });

            // Smooth scrolling
            $(window).on('scroll', function() {
                const header = $('header');
                if ($(this).scrollTop() > 100) {
                    header.addClass('backdrop-blur-lg bg-white/95');
                } else {
                    header.removeClass('backdrop-blur-lg bg-white/95');
                }
            });

            // Form validation enhancements
            $('input[required], textarea[required]').on('blur', function() {
                if ($(this).val().trim() === '') {
                    $(this).addClass('border-red-300 focus:border-red-500 focus:ring-red-100')
                        .removeClass('border-gray-200 focus:border-emerald-500 focus:ring-emerald-100');
                } else {
                    $(this).removeClass('border-red-300 focus:border-red-500 focus:ring-red-100')
                        .addClass('border-gray-200 focus:border-emerald-500 focus:ring-emerald-100');
                }
            });

            // Mobile number formatting
            $('input[type="tel"]').on('input', function() {
                let value = $(this).val().replace(/\D/g, '');
                if (value.length > 10) value = value.slice(0, 10);
                if (value.length >= 6) value = value.slice(0, 5) + ' ' + value.slice(5);
                $(this).val(value);
            });

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

            console.log('📖 Atifa Publication Product View Page Loaded Successfully');
            console.log('🛒 Ready to process orders for authentic Islamic literature');
        });
    </script>

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