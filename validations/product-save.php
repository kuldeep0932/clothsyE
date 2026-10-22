
<?php
include '../database/connection.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    exit('Invalid request.');
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

$allowedStatuses = ['active', 'draft', 'inactive'];

if (!in_array($status, $allowedStatuses, true)) {
    exit('Invalid product status.');
}

if ($name === '' || $sku === '' || $price < 0) {
    exit('Please enter valid product details.');
}

if (
    !isset($_FILES['main_image']) ||
    $_FILES['main_image']['error'] !== UPLOAD_ERR_OK
) {
    exit('Please select a product image.');
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

$destination = $uploadDir . $imageName;

if (!move_uploaded_file($file['tmp_name'], $destination)) {
    exit('Image upload failed.');
}

$imagePath = 'uploads/products/' . $imageName;

$sql = "INSERT INTO products
    (name, sku, category, collection, description,
     price, old_price, stock_quantity, main_image, status)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($conn, $sql);

if (!$stmt) {
    @unlink($destination);
    exit('Could not prepare database query.');
}

mysqli_stmt_bind_param(
    $stmt,
    'sssssddiss',
    $name,
    $sku,
    $category,
    $collection,
    $description,
    $price,
    $oldPrice,
    $stock,
    $imagePath,
    $status
);

if (mysqli_stmt_execute($stmt)) {
    mysqli_stmt_close($stmt);
    header('Location: /dashboard/product.php');
    exit;
}

@unlink($destination);
mysqli_stmt_close($stmt);

if (mysqli_errno($conn) === 1062) {
    exit('This SKU already exists. Please use a different SKU.');
}

exit('Could not save product.');
?>
