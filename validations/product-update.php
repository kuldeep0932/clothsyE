
<?php
include '../database/connection.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    exit('Invalid request.');
}

$id = filter_input(INPUT_POST, 'product_id', FILTER_VALIDATE_INT);

if (!$id || $id < 1) {
    exit('Invalid product ID.');
}

$check = mysqli_prepare(
    $conn,
    "SELECT main_image FROM products WHERE id = ?"
);
mysqli_stmt_bind_param($check, 'i', $id);
mysqli_stmt_execute($check);
$current = mysqli_fetch_assoc(mysqli_stmt_get_result($check));
mysqli_stmt_close($check);

if (!$current) {
    exit('Product not found.');
}

$name = trim($_POST['productName'] ?? '');
$sku = trim($_POST['sku'] ?? '');
$category = trim($_POST['category'] ?? '');
$collection = trim($_POST['collection'] ?? '');
$description = trim($_POST['description'] ?? '');
$price = (float) ($_POST['price'] ?? 0);
$oldPrice = ($_POST['old_price'] ?? '') !== ''
    ? (float) $_POST['old_price']
    : null;
$stock = (int) ($_POST['stock_quantity'] ?? 0);
$status = $_POST['status'] ?? 'active';

if (
    $name === '' ||
    $sku === '' ||
    $price < 0 ||
    !in_array($status, ['active', 'draft', 'inactive'], true)
) {
    exit('Please enter valid product details.');
}

$imagePath = $current['main_image'];
$newDestination = null;

if (
    isset($_FILES['main_image']) &&
    $_FILES['main_image']['error'] !== UPLOAD_ERR_NO_FILE
) {
    if ($_FILES['main_image']['error'] !== UPLOAD_ERR_OK) {
        exit('Image upload failed.');
    }

    $file = $_FILES['main_image'];

    if ($file['size'] > 5 * 1024 * 1024) {
        exit('Image must be 5 MB or smaller.');
    }

    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $mime = $finfo->file($file['tmp_name']);

    $allowedTypes = [
        'image/jpeg' => 'jpg',
        'image/png'  => 'png',
        'image/webp' => 'webp',
        'image/gif'  => 'gif'
    ];

    if (!isset($allowedTypes[$mime])) {
        exit('Only JPG, PNG, WEBP, and GIF images are allowed.');
    }

    $uploadDir = '../uploads/products/';

    if (!is_dir($uploadDir) &&
        !mkdir($uploadDir, 0755, true)) {
        exit('Could not create upload directory.');
    }

    $imageName = bin2hex(random_bytes(16))
        . '.' . $allowedTypes[$mime];

    $newDestination = $uploadDir . $imageName;

    if (!move_uploaded_file($file['tmp_name'], $newDestination)) {
        exit('Image upload failed.');
    }

    $imagePath = 'uploads/products/' . $imageName;
}

$sql = "UPDATE products SET
    name = ?,
    sku = ?,
    category = ?,
    collection = ?,
    description = ?,
    price = ?,
    old_price = ?,
    stock_quantity = ?,
    main_image = ?,
    status = ?
    WHERE id = ?";

$stmt = mysqli_prepare($conn, $sql);

if (!$stmt) {
    if ($newDestination) {
        @unlink($newDestination);
    }
    exit('Could not prepare database query.');
}

mysqli_stmt_bind_param(
    $stmt,
    'sssssddissi',
    $name,
    $sku,
    $category,
    $collection,
    $description,
    $price,
    $oldPrice,
    $stock,
    $imagePath,
    $status,
    $id
);

if (mysqli_stmt_execute($stmt)) {
    mysqli_stmt_close($stmt);

    // Remove the previous image only after a successful update.
    if ($newDestination && !empty($current['main_image'])) {
        $oldPath = '../' . $current['main_image'];
        $realOldPath = realpath($oldPath);
        $realUploadDir = realpath('../uploads/products/');

        if (
            $realOldPath &&
            $realUploadDir &&
            strpos(
                $realOldPath,
                $realUploadDir . DIRECTORY_SEPARATOR
            ) === 0 &&
            is_file($realOldPath)
        ) {
            @unlink($realOldPath);
        }
    }

    header('Location: ../dashboard/product.php');
    exit;
}

mysqli_stmt_close($stmt);

if ($newDestination) {
    @unlink($newDestination);
}

if (mysqli_errno($conn) === 1062) {
    exit('This SKU already exists. Please use a different SKU.');
}

exit('Could not update product.');
?>
