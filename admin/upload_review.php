<?php
require_once '../class/class.user.php';
$user = new User();

if (isset($_GET['delete']) && is_numeric($_GET['delete'])) {
    $review_id = $_GET['delete'];

    // Get image path
    $user->query("SELECT image_path FROM product_reviews WHERE id = :id");
    $user->bind(':id', $review_id);
    $review = $user->fetchOne(); // <-- use fetchOne() instead of fetch()

    if ($review) {
        $filePath = '../assets/uploads/reviews/' . $review['image_path'];
        if (file_exists($filePath)) {
            unlink($filePath); // Delete image from folder
        }

        // Delete from database
        $user->query("DELETE FROM product_reviews WHERE id = :id");
        $user->bind(':id', $review_id);
        $user->execute();

        $user->set_alert("Review image deleted successfully.", 'success');
    } else {
        $user->set_alert("Review not found.", 'error');
    }

    // Redirect to avoid resubmission
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

// Handle Upload Request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_id = $_POST['product_id'];

    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = '../assets/uploads/reviews/';
        $fileName = time() . '_' . basename($_FILES['image']['name']);
        $targetFile = $uploadDir . $fileName;

        $allowedTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/webp'];
        if (!in_array($_FILES['image']['type'], $allowedTypes)) {
            $user->set_alert("Only JPG, PNG, and WEBP images are allowed.", 'error');
        } else {
            if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
                $query = "INSERT INTO product_reviews (product_id, image_path) VALUES (:pid, :path)";
                $user->query($query);
                $user->bind(':pid', $product_id);
                $user->bind(':path', $fileName);
                $user->execute();

                $user->set_alert("Image uploaded successfully!", 'success');
                    // Redirect to prevent resubmission
                header("Location: " . $_SERVER['PHP_SELF']);
                exit();
            } else {
                $user->set_alert("Error uploading file.", 'error');
            }
        }
    } else {
        $user->set_alert("No file selected.", 'error');
    }
}

// Fetch products for dropdown
$user->query("SELECT id, title FROM products ORDER BY title ASC");
$products = $user->fetchAll();

// Fetch all review images (joined with product names)
$user->query("SELECT r.id, r.image_path, r.created_at, p.title 
              FROM product_reviews r 
              JOIN products p ON p.id = r.product_id 
              ORDER BY r.created_at DESC");
$reviews = $user->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Review Images</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gradient-to-br from-emerald-50 to-teal-50 min-h-screen py-4 sm:py-8">

    <div class="max-w-6xl mx-auto px-3 sm:px-4">
        <?php if (!empty($user->alert)): ?>
        <div class="mb-4 p-4 rounded-lg 
        <?= $user->alert['type'] === 'success' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' ?>">
        <?= htmlspecialchars($user->alert['message']) ?>
    </div>
<?php endif; ?>

        <!-- Header -->
        <div class="text-center mb-6 sm:mb-10">
            <h1 class="text-2xl sm:text-4xl font-bold text-emerald-800 mb-2 sm:mb-3">
                <i class="fas fa-images mr-2 sm:mr-3"></i>Manage Review Images
            </h1>
            <p class="text-gray-600 text-sm sm:text-base max-w-2xl mx-auto px-2">Upload and manage customer review images for your products</p>
        </div>

        <!-- Upload Card -->
        <div class="bg-white rounded-xl sm:rounded-2xl shadow-lg sm:shadow-xl p-4 sm:p-6 mb-6 sm:mb-10 border border-emerald-100">
            <h2 class="text-lg sm:text-xl font-semibold text-emerald-700 mb-3 sm:mb-4 flex items-center">
                <i class="fas fa-upload mr-2"></i>Upload New Review Image
            </h2>
            
            <form action="" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 gap-4">
                <!-- Product Selection -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fas fa-cube mr-1"></i>Select Product
                    </label>
                    <select name="product_id" required 
                            class="w-full border border-gray-300 rounded-lg sm:rounded-xl px-3 sm:px-4 py-2 sm:py-3 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all duration-200 text-sm sm:text-base">
                        <option value="" class="text-gray-400">-- Choose Product --</option>
                        <?php foreach ($products as $p): ?>
                            <option value="<?= $p['id'] ?>" class="text-gray-700"><?= htmlspecialchars($p['title']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- File Input -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fas fa-image mr-1"></i>Select Image
                    </label>
                    <input type="file" name="image" accept="image/*" required 
                           class="block w-full text-xs sm:text-sm text-gray-700 file:mr-2 sm:file:mr-4 file:py-1 sm:file:py-2 file:px-2 sm:file:px-4 file:rounded-full file:border-0 file:text-xs sm:file:text-sm file:font-semibold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100 transition-colors duration-200">
                </div>

                <!-- Submit Button -->
                <div class="flex items-end">
                    <button type="submit" 
                            class="w-full bg-white hover:bg-gray-50 text-black font-semibold px-4 sm:px-6 py-2 sm:py-3 rounded-lg sm:rounded-xl shadow-lg transition-all duration-300 transform hover:-translate-y-0.5 sm:hover:-translate-y-1 flex items-center justify-center text-sm sm:text-base border-2 border-gray-300">
                        <i class="fas fa-cloud-upload-alt mr-2"></i>Upload
                    </button>
                </div>
            </form>
        </div>

        <!-- Review Images Section -->
        <div class="bg-white rounded-xl sm:rounded-2xl shadow-lg sm:shadow-xl p-4 sm:p-6 border border-emerald-100">
            <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center mb-4 sm:mb-6 gap-2">
                <h2 class="text-xl sm:text-2xl font-semibold text-gray-800 flex items-center">
                    <i class="fas fa-photo-video mr-2 sm:mr-3 text-emerald-600"></i>Uploaded Review Images
                </h2>
                <span class="bg-emerald-100 text-emerald-800 px-2 sm:px-3 py-1 rounded-full text-xs sm:text-sm font-medium self-start sm:self-auto">
                    <?= count($reviews) ?> image(s)
                </span>
            </div>

            <?php if (empty($reviews)): ?>
                <div class="text-center py-8 sm:py-12">
                    <i class="fas fa-image text-gray-300 text-4xl sm:text-6xl mb-3 sm:mb-4"></i>
                    <p class="text-gray-500 text-base sm:text-lg">No review images uploaded yet.</p>
                    <p class="text-gray-400 text-xs sm:text-sm mt-1 sm:mt-2">Upload your first review image using the form above.</p>
                </div>
            <?php else: ?>
                <!-- Mobile Cards View -->
                <div class="block sm:hidden space-y-4">
                    <?php foreach ($reviews as $index => $r): ?>
                        <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm hover:shadow-md transition-shadow duration-200">
                            <div class="flex justify-between items-start mb-3">
                                <div>
                                    <span class="text-sm font-medium text-gray-500">#<?= $index + 1 ?></span>
                                    <h3 class="font-semibold text-gray-900 text-sm"><?= htmlspecialchars($r['title']) ?></h3>
                                </div>
                            </div>
                            
                            <div class="flex gap-3 mb-3">
                                <div class="flex-shrink-0">
                                    <img src="../assets/uploads/reviews/<?= htmlspecialchars($r['image_path']) ?>" 
                                         alt="Review Image" 
                                         class="w-16 h-16 object-cover rounded-lg border border-gray-200">
                                </div>
                                <div class="flex-grow">
                                    <div class="text-xs text-gray-600 mb-1">
                                        <i class="far fa-clock mr-1"></i>
                                        <?= date('M j, Y', strtotime($r['created_at'])) ?>
                                    </div>
                                    <div class="text-xs text-gray-400">
                                        <?= date('g:i A', strtotime($r['created_at'])) ?>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="flex justify-end">
                                <a href="?delete=<?= $r['id'] ?>" 
                                   onclick="return confirm('Are you sure you want to delete this review image? This action cannot be undone.')" 
                                   class="inline-flex items-center bg-red-500 hover:bg-red-600 text-white font-medium px-3 py-1.5 rounded-lg text-xs transition-all duration-300">
                                    <i class="fas fa-trash mr-1"></i>Delete
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- Desktop Table View -->
                <div class="hidden sm:block overflow-hidden rounded-xl border border-gray-200">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gradient-to-r from-emerald-600 to-teal-600">
                            <tr>
                                <th class="py-3 sm:py-4 px-4 sm:px-6 text-left text-white font-semibold text-sm sm:text-base">#</th>
                                <th class="py-3 sm:py-4 px-4 sm:px-6 text-left text-white font-semibold text-sm sm:text-base">Product</th>
                                <th class="py-3 sm:py-4 px-4 sm:px-6 text-left text-white font-semibold text-sm sm:text-base">Image Preview</th>
                                <th class="py-3 sm:py-4 px-4 sm:px-6 text-left text-white font-semibold text-sm sm:text-base">Uploaded On</th>
                                <th class="py-3 sm:py-4 px-4 sm:px-6 text-center text-white font-semibold text-sm sm:text-base">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <?php foreach ($reviews as $index => $r): ?>
                                <tr class="hover:bg-emerald-50 transition-colors duration-200">
                                    <td class="py-3 sm:py-4 px-4 sm:px-6 text-gray-700 font-medium text-sm sm:text-base"><?= $index + 1 ?></td>
                                    <td class="py-3 sm:py-4 px-4 sm:px-6">
                                        <span class="font-medium text-gray-900 text-sm sm:text-base"><?= htmlspecialchars($r['title']) ?></span>
                                    </td>
                                    <td class="py-3 sm:py-4 px-4 sm:px-6">
                                        <div class="relative group">
                                            <img src="../assets/uploads/reviews/<?= htmlspecialchars($r['image_path']) ?>" 
                                                 alt="Review Image" 
                                                 class="w-16 h-16 sm:w-20 sm:h-20 object-cover rounded-lg shadow-md border border-gray-200 transition-transform duration-300 group-hover:scale-105">
                                        </div>
                                    </td>
                                    <td class="py-3 sm:py-4 px-4 sm:px-6">
                                        <div class="text-xs sm:text-sm text-gray-600">
                                            <i class="far fa-clock mr-1"></i>
                                            <?= date('M j, Y', strtotime($r['created_at'])) ?>
                                        </div>
                                        <div class="text-xs text-gray-400">
                                            <?= date('g:i A', strtotime($r['created_at'])) ?>
                                        </div>
                                    </td>
                                    <td class="py-3 sm:py-4 px-4 sm:px-6 text-center">
                                        <a href="?delete=<?= $r['id'] ?>" 
                                           onclick="return confirm('Are you sure you want to delete this review image? This action cannot be undone.')" 
                                           class="inline-flex items-center bg-red-500 hover:bg-red-600 text-white font-medium px-3 sm:px-4 py-1.5 sm:py-2 rounded-lg shadow transition-all duration-300 transform hover:-translate-y-0.5 text-xs sm:text-sm">
                                            <i class="fas fa-trash mr-1 sm:mr-2"></i>Delete
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
        </div>

        <!-- Footer Note -->
        <div class="text-center mt-6 sm:mt-8 text-gray-500 text-xs sm:text-sm">
            <p>Supported formats: JPG, PNG, WEBP • Max file size: 5MB</p>
        </div>
    </div>

</body>
</html>