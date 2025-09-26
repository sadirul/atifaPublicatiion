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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/static/images/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="assets/static/images/favicon.ico" type="image/x-icon">
    <title><?php echo $product['title']; ?> - Quranghor Islamic Literature Store</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="assets/static/images/favicon.ico" type="image/x-icon">
        <link rel="shortcut icon" href="assets/static/images/favicon.ico" type="image/x-icon">

        <title><?php echo htmlspecialchars($product['title']); ?> - Quranghor Islamic Literature Store</title>

        <!-- SEO Meta Tags -->
        <meta name="description" content="<?php echo htmlspecialchars(substr($product['description'], 0, 160)); ?>">
        <meta name="keywords" content="Islamic books, <?php echo htmlspecialchars($product['title']); ?>, Quranghor, Islamic literature, Hadith, Quran, Sahih al-Bukhari">
        <meta name="author" content="Quranghor Islamic Literature Store">

        <!-- Open Graph / Facebook -->
        <meta property="og:title" content="<?php echo htmlspecialchars($product['title']); ?>">
        <meta property="og:description" content="<?php echo htmlspecialchars(substr($product['description'], 0, 160)); ?>">
        <meta property="og:type" content="product">
        <meta property="og:url" content="<?php echo 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>">
        <meta property="og:image" content="<?php echo 'https://' . $_SERVER['HTTP_HOST'] . '/assets/uploads/products/' . htmlspecialchars($product['image']); ?>">
        <meta property="og:site_name" content="Quranghor Islamic Literature Store">

        <!-- Twitter Card -->
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="<?php echo htmlspecialchars($product['title']); ?>">
        <meta name="twitter:description" content="<?php echo htmlspecialchars(substr($product['description'], 0, 160)); ?>">
        <meta name="twitter:image" content="<?php echo 'https://' . $_SERVER['HTTP_HOST'] . '/assets/uploads/products/' . htmlspecialchars($product['image']); ?>">
        <meta name="twitter:site" content="@Quranghor">

        <!-- WhatsApp & General Sharing -->
        <meta name="theme-color" content="#10b981">

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
                    "name": "Quranghor"
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

        <!-- Fonts & Tailwind -->
        <script src="https://cdn.tailwindcss.com"></script>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Poppins:wght@400;500;600;700&family=Amiri:wght@400;700&display=swap" rel="stylesheet">

        <!-- Tailwind Configuration (keep your existing) -->
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
                        }
                    }
                }
            }
        </script>
    </head>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Poppins:wght@400;500;600;700&family=Amiri:wght@400;700&display=swap" rel="stylesheet">
</head>

<body class="font-sans bg-gray-50 overflow-x-hidden">
    <!-- Header Navigation -->
    <header class="fixed w-full top-0 z-50 bg-white/80 backdrop-blur-md border-b border-gray-100">
        <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
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

                <!-- Back to Store Button -->
                <div class="flex items-center space-x-4">
                    <a href="index.php" class="px-4 py-2 text-emerald-600 hover:text-emerald-700 font-medium transition-all duration-200 flex items-center space-x-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        <span>Back to Store</span>
                    </a>
                </div>
            </div>
        </nav>
    </header>

    <!-- Product Details Section -->
    <section class="pt-24 pb-12 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">
                <!-- Product Image -->
                <div class="space-y-4">
                    <div class="relative rounded-3xl overflow-hidden shadow-2xl group">
                        <div class="aspect-w-4 aspect-h-5 h-96 md:h-[500px] flex items-center justify-center p-0">
                            <?php
                            $image = $product['image'] ?? 'placeholder.png'; // fallback if no image
                            ?>
                            <img src="assets/uploads/products/<?= htmlspecialchars($image) ?>" alt="<?= htmlspecialchars($product['title']) ?>" class="w-full h-full rounded-3xl">
                        </div>
                        <?php if (!empty($product['is_bestseller'])): ?>
                            <div class="absolute top-4 right-4">
                                <span class="bg-gold-500 text-emerald-900 px-4 py-2 rounded-full text-sm font-bold shadow-lg animate-pulse-slow">
                                    Bestseller
                                </span>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>


                <!-- Product Information -->
                <div class="space-y-8">
                    <!-- Title and Rating -->
                    <div>
                        <h1 class="text-4xl font-display font-bold text-gray-900 mb-4"><?php echo $product['title']; ?></h1>
                        <p class="text-xl text-gray-600 mb-4"><?php echo $product['description']; ?></p>

                        <!-- Rating -->
                        <div class="flex items-center space-x-4 mb-6">
                            <div class="flex text-gold-400 text-lg">
                                <span>★★★★★</span>
                            </div>
                            <!-- <span class="text-gray-600">(4.9/5 from 2,847 reviews)</span> -->
                        </div>

                        <!-- Price -->
                        <div class="flex items-center space-x-4 mb-8">
                            <?php
                            $price = $product['price'];
                            $delPrice = $product['del_price'];

                            // Calculate percentage off
                            $percentageOff = 0;
                            if ($delPrice > 0 && $delPrice > $price) {
                                $percentageOff = round((($delPrice - $price) / $delPrice) * 100);
                            }
                            ?>
                            <span class="text-4xl font-bold text-emerald-600">₹<?= number_format($price, 2) ?></span>

                            <?php if ($delPrice > $price): ?>
                                <span class="text-xl text-gray-500 line-through">₹<?= number_format($delPrice, 2) ?></span>
                                <span class="bg-red-100 text-red-800 px-3 py-1 rounded-full text-sm font-semibold">
                                    <?= $percentageOff ?>% OFF
                                </span>
                            <?php endif; ?>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- Order Form Section -->
    <section class="py-16 bg-gradient-to-br from-emerald-50 to-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-3xl shadow-2xl overflow-hidden">
                <!-- Form Header -->
                <div class="bg-gradient-to-r from-emerald-600 to-emerald-700 px-8 py-6">
                    <h2 class="text-3xl font-display font-bold text-white mb-2">Place Your Order</h2>
                    <p class="text-emerald-100">Fill in your details to order Sahih al-Bukhari</p>
                </div>
                <?php echo $user->get_alert(); ?>
                <!-- Order Form -->
                <form class="p-8 space-y-8" id="orderForm" action="action/buy.action.php" method="POST">
                    <!-- Personal Information -->
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-6 flex items-center">
                            <span class="w-8 h-8 bg-emerald-100 text-emerald-600 rounded-full flex items-center justify-center text-sm font-bold mr-3">1</span>
                            Personal Information
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-semibold text-gray-900 mb-3">Full Name *</label>
                                <input name="name" type="text" required class="w-full px-4 py-4 border border-gray-200 rounded-xl focus:outline-none focus:ring-4 focus:ring-emerald-100 focus:border-emerald-500 transition-all" placeholder="Enter your full name">
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-900 mb-3">Mobile Number *</label>
                                <input name="mobile" type="tel" required class="w-full px-4 py-4 border border-gray-200 rounded-xl focus:outline-none focus:ring-4 focus:ring-emerald-100 focus:border-emerald-500 transition-all" placeholder="+91 XXXXX XXXXX">
                            </div>
                            <div class="md:col-span-2">
                                <label class="block text-sm font-semibold text-gray-900 mb-3">Email Address (optional)</label>
                                <input name="email" type="email" class="w-full px-4 py-4 border border-gray-200 rounded-xl focus:outline-none focus:ring-4 focus:ring-emerald-100 focus:border-emerald-500 transition-all" placeholder="your.email@example.com">
                            </div>
                        </div>
                    </div>

                    <!-- Delivery Address -->
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-6 flex items-center">
                            <span class="w-8 h-8 bg-emerald-100 text-emerald-600 rounded-full flex items-center justify-center text-sm font-bold mr-3">2</span>
                            Delivery Address
                        </h3>
                        <div class="space-y-6">
                            <div>
                                <label class="block text-sm font-semibold text-gray-900 mb-3">Street Address *</label>
                                <textarea name="address" required class="w-full px-4 py-4 border border-gray-200 rounded-xl focus:outline-none focus:ring-4 focus:ring-emerald-100 focus:border-emerald-500 transition-all" rows="3" placeholder="House/Flat No., Building, Street, Area"></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Order Details -->
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-6 flex items-center">
                            <span class="w-8 h-8 bg-emerald-100 text-emerald-600 rounded-full flex items-center justify-center text-sm font-bold mr-3">3</span>
                            Order Details
                        </h3>
                        <div class="bg-gray-50 rounded-xl p-6">
                            <div class="flex items-center justify-between mb-6">
                                <div class="flex items-center space-x-4">
                                    <div class="w-16 h-16 bg-emerald-500 rounded-xl flex items-center justify-center text-white text-2xl">
                                        📖
                                    </div>
                                    <div>
                                        <h4 class="font-semibold text-gray-900"><?php echo $product['title']; ?></h4>
                                        <p class="text-gray-600 text-sm"><?php echo $product['description']; ?></p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <div class="text-2xl font-bold text-emerald-600">₹<?php echo $product['price']; ?></div>
                                    <div class="text-sm text-gray-500 line-through">₹<?php echo $product['del_price']; ?></div>
                                </div>
                            </div>

                            <div class="flex items-center justify-between">
                                <label class="block text-sm font-semibold text-gray-900">Quantity</label>
                                <div class="flex items-center space-x-4">
                                    <button type="button" class="quantity-btn minus w-10 h-10 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-colors font-bold">-</button>
                                    <input type="number" name="qty" id="quantity" value="1" min="1" max="10" class="w-20 text-center py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
                                    <button type="button" class="quantity-btn plus w-10 h-10 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-colors font-bold">+</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Order Summary -->
                    <div class="bg-emerald-50 rounded-xl p-6">
                        <h4 class="font-semibold text-gray-900 mb-4">Order Summary</h4>
                        <div class="space-y-3">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Item Price</span>
                                <span id="itemPrice" class="font-semibold"><?php echo $product['price']; ?></span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Quantity</span>
                                <span id="summaryQuantity" class="font-semibold">1</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Subtotal</span>
                                <span id="subtotal" class="font-semibold"><?php echo $product['price']; ?></span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Shipping</span>
                                <span class="font-semibold text-emerald-600">Free</span>
                            </div>
                            <div class="border-t border-emerald-200 pt-3">
                                <div class="flex justify-between">
                                    <span class="text-lg font-bold text-gray-900">Total</span>
                                    <span id="total" class="text-2xl font-bold text-emerald-600"><?php echo $product['price']; ?></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Payment Method -->
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-6 flex items-center">
                            <span class="w-8 h-8 bg-emerald-100 text-emerald-600 rounded-full flex items-center justify-center text-sm font-bold mr-3">4</span>
                            Payment Method
                        </h3>
                        <div class="space-y-4">
                            <label class="flex items-center space-x-4 p-4 border-2 border-gray-200 rounded-xl hover:border-emerald-300 cursor-pointer transition-all">
                                <input type="radio" name="payment" value="cod" checked class="text-emerald-600 focus:ring-emerald-500">
                                <div class="flex items-center space-x-3">
                                    <span class="text-2xl">💵</span>
                                    <div>
                                        <div class="font-semibold text-gray-900">Cash on Delivery</div>
                                        <div class="text-sm text-gray-600">Pay when you receive the product</div>
                                    </div>
                                </div>
                            </label>
                        </div>
                    </div>
                    <input type="hidden" name="placeOrder" value="<?php echo $user->escape($_GET['product_id']); ?>">
                    <!-- Place Order Button -->
                    <div class="pt-6">
                        <button type="submit" class="w-full bg-gradient-to-r from-emerald-600 to-emerald-700 text-white py-5 px-8 rounded-2xl hover:from-emerald-700 hover:to-emerald-800 transition-all duration-300 font-bold text-xl shadow-xl hover:shadow-2xl hover:scale-105">
                            Place Order - <span id="finalTotal">₹<?php echo $product['price']; ?></span>
                        </button>
                        <p class="text-center text-gray-600 text-sm mt-4">
                            By placing this order, you agree to our Terms & Conditions
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Product Description -->
    <section class="py-16 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-gray-50 rounded-3xl p-8">
                <h3 class="text-2xl font-bold text-gray-900 mb-6">About This Book</h3>
                <div class="prose prose-lg max-w-none text-gray-700 space-y-4">
                    <p><?php echo $product['full_description']; ?></p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="flex items-center justify-center space-x-3 mb-6">
                <div class="w-10 h-10 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-xl flex items-center justify-center">
                    <span class="text-white text-lg font-bold">📖</span>
                </div>
                <div>
                    <h3 class="text-xl font-display font-bold">Quranghor</h3>
                    <p class="text-gray-400 text-sm">Islamic Literature & Knowledge</p>
                </div>
            </div>
            <p class="text-gray-300 mb-6">Dedicated to spreading authentic Islamic knowledge</p>
            <div class="font-arabic text-gold-400 text-lg mb-4">بارك الله فيكم</div>
            <p class="text-gray-400 text-sm">&copy; 2025 Quranghor. All rights reserved.</p>
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
                $('#subtotal').text('₹' + subtotal.toLocaleString());
                $('#total').text('₹' + subtotal.toLocaleString());
                console.log($('#finalTotal').text());
                $('#finalTotal').text('₹' + subtotal.toLocaleString());
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

                // Show loading state
                submitBtn.html(`
            <div class="flex items-center justify-center space-x-2">
                <div class="animate-spin rounded-full h-6 w-6 border-b-2 border-white"></div>
                <span>Processing Order...</span>
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
                            <div class="bg-white rounded-3xl p-8 max-w-md w-full text-center animate-scale-in">
                                <div class="w-20 h-20 bg-emerald-500 rounded-full flex items-center justify-center mx-auto mb-6">
                                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                </div>
                                <h3 class="text-2xl font-bold text-gray-900 mb-4">Order Placed Successfully!</h3>
                                <p class="text-gray-600 mb-6">${data.message}</p>
                                <div class="bg-emerald-50 rounded-xl p-4 mb-6">
                                    <p class="text-emerald-800 font-semibold">Order ID: #${data.order_id}</p>
                                </div>
                                <button class="w-full bg-emerald-600 text-white py-3 px-6 rounded-xl hover:bg-emerald-700 transition-colors">
                                    Continue Shopping
                                </button>
                            </div>
                        </div>
                    `);

                            $('body').append(successMessage);

                            successMessage.find('button').on('click', function() {
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
            $('.aspect-w-1').on('click', function() {
                $('.aspect-w-1').removeClass('ring-2 ring-emerald-500');
                $(this).addClass('ring-2 ring-emerald-500');

                const index = $(this).index();
                const images = ['📖', '📚', '📜', '✨'];
                $('.text-8xl').text(images[index]);
            });

            // Smooth scrolling for better UX
            $(window).on('scroll', function() {
                const header = $('header');
                if ($(this).scrollTop() > 100) {
                    header.addClass('backdrop-blur-lg bg-white/90');
                } else {
                    header.removeClass('backdrop-blur-lg bg-white/90');
                }
            });

            // Form validation enhancements
            $('input[required], textarea[required], select[required]').on('blur', function() {
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

            console.log('📖 Quranghor Product View Page Loaded Successfully');
            console.log('🛒 Ready to process orders for authentic Islamic literature');

        });
    </script>

</body>

</html>