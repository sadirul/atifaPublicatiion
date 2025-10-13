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
    <style>
        @keyframes draw-check {
            0% {
                stroke-dasharray: 0, 100;
                stroke-dashoffset: 0;
            }

            100% {
                stroke-dasharray: 100, 100;
                stroke-dashoffset: -100;
            }
        }

        .checkmark {
            stroke-dasharray: 100;
            stroke-dashoffset: 0;
            stroke-width: 4;
            animation: draw-check 0.8s ease-in-out forwards;
        }
    </style>
</head>

<body class="bg-gradient-to-br from-green-50 to-blue-50 min-h-screen flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-xl p-8 max-w-md w-full text-center transform transition-all duration-500 scale-100">
        <!-- Animated Checkmark SVG -->
        <div class="mx-auto mb-6 w-24 h-24">
            <svg
                class="w-full h-full"
                viewBox="0 0 100 100"
                xmlns="http://www.w3.org/2000/svg">
                <!-- Animated Circle -->
                <circle
                    cx="50"
                    cy="50"
                    r="40"
                    fill="none"
                    stroke="#10B981"
                    stroke-width="4"
                    class="circle" />

                <!-- Checkmark -->
                <polyline
                    points="25,50 42,67 75,33"
                    fill="none"
                    stroke="#10B981"
                    stroke-width="4"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    class="checkmark" />
            </svg>
        </div>

        <style>
            .circle {
                stroke-dasharray: 251.2;
                /* 2 * π * 40 */
                stroke-dashoffset: 251.2;
                animation: drawCircle 1s ease-out forwards;
            }

            @keyframes drawCircle {
                to {
                    stroke-dashoffset: 0;
                }
            }

            .checkmark {
                stroke-dasharray: 80;
                stroke-dashoffset: 80;
                opacity: 0;
                animation: drawCheck 0.5s ease-out forwards;
                animation-delay: 1s;
                /* starts after the circle is drawn */
            }

            @keyframes drawCheck {
                to {
                    stroke-dashoffset: 0;
                    opacity: 1;
                }
            }
        </style>


        <!-- Title with fade-in -->
        <h1 class="text-3xl font-bold text-gray-900 mb-2 opacity-0 animate-[fadeIn_0.5s_ease-in-out_0.3s_forwards]">
            Order Confirmed!
        </h1>

        <!-- Subtitle with delay -->
        <p class="text-gray-600 mb-6 opacity-0 animate-[fadeIn_0.5s_ease-in-out_0.5s_forwards]">
            Thank you for your purchase. Your order has been successfully placed and will be processed shortly.
        </p>

        <!-- Order details table -->
        <div class="bg-gray-50 rounded-lg p-4 mb-6 opacity-0 animate-[fadeIn_0.5s_ease-in-out_0.7s_forwards]">
            <h3 class="text-sm font-semibold text-gray-900 mb-2">Order Summary</h3>
            <div class="space-y-1 text-sm text-gray-600">
                <div class="flex justify-between"><span>Order ID:</span><span><?php echo htmlspecialchars($_GET['order_id']) ?></span></div>
                <div class="flex justify-between"><span>Total:</span><span>₹<?php echo htmlspecialchars($_GET['totalAmount']) ?></span></div>
            </div>
        </div>

        <!-- CTA Button with hover animation -->
        <a href="/index.php" class="bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-6 rounded-lg transition-all duration-300 transform hover:scale-105 shadow-md opacity-0 animate-[fadeIn_0.5s_ease-in-out_1s_forwards]">
            Go Home
        </a>
    </div>

    <style>
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</body>

</html>