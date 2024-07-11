<?php
// Connect to your MySQL database
$db_host = 'localhost';
$db_name = 'jobportal';
$db_user = 'root';
$db_pass = 'Qweasdzxcrr11';

try {
    $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Fetch product links from your database
    $stmt = $pdo->query("SELECT id, link FROM products");
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $productId = $row['id'];
        $productLink = $row['link'];

        // Fetch product details from the product link
        $html = file_get_contents($productLink);

        // Parse HTML content to extract description and image URL
        $description = '';
        $imageURL = '';

        // Example: Extract description using regular expressions
        preg_match('/<meta[^>]*property="og:description"[^>]*content="([^"]+)"/', $html, $matches);
        if (isset($matches[1])) {
            $description = $matches[1];
        }

        // Example: Extract image URL using regular expressions
        preg_match('/<meta[^>]*property="og:image"[^>]*content="([^"]+)"/', $html, $matches);
        if (isset($matches[1])) {
            $imageURL = $matches[1];
        }

        // Update database with fetched data
        $updateStmt = $pdo->prepare("UPDATE products SET description = :description, image_url = :image_url WHERE id = :id");
        $updateStmt->execute([
            ':description' => $description,
            ':image_url' => $imageURL,
            ':id' => $productId,
        ]);
    }
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
?>
