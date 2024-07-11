<link href="mcss/bootstrap.min.css" rel="stylesheet">
<link href="mcss/style.css" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	
<?php
require 'connect.php'; // Assuming this is your database connection file

// Function to fetch SEO information
function getSEOInfo($page) {
    global $conn;
    $sql = "SELECT * FROM seo WHERE page = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $page);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

// Function to update SEO information
function updateSEOInfo($page, $keywords, $description) {
    global $conn;
    $sql = "UPDATE seo SET keywords = ?, description = ? WHERE page = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $keywords, $description, $page);
    return $stmt->execute();
}

// Function to insert new SEO information
function insertSEOInfo($page, $keywords, $description) {
    global $conn;
    $sql = "INSERT INTO seo (page, keywords, description) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $page, $keywords, $description);
    return $stmt->execute();
}

// Function to delete SEO information
function deleteSEOInfo($page) {
    global $conn;
    $sql = "DELETE FROM seo WHERE page = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $page);
    return $stmt->execute();
}

// Function to fetch all products
function fetchProducts($conn) {
    $sql = "SELECT * FROM products";
    $result = $conn->query($sql);
    $products = [];
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $products[] = $row;
        }
    }
    return $products;
}

// Function to fetch all blog posts
function fetchBlogPosts($conn) {
    $sql = "SELECT * FROM blog_posts";
    $result = $conn->query($sql);
    $blogPosts = [];
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $blogPosts[] = $row;
        }
    }
    return $blogPosts;
}

// Handle form submissions
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["edit_seo"])) {
        $page = $_POST["page"];
        $keywords = $_POST["keywords"];
        $description = $_POST["description"];
        
        if (updateSEOInfo($page, $keywords, $description)) {
            echo '<script>alert("SEO information updated successfully.");</script>';
        } else {
            echo '<script>alert("Failed to update SEO information.");</script>';
        }
    } elseif (isset($_POST["add_seo"])) {
        $page = $_POST["page"];
        $keywords = $_POST["keywords"];
        $description = $_POST["description"];
        
        if (insertSEOInfo($page, $keywords, $description)) {
            echo '<script>alert("SEO information added successfully.");</script>';
        } else {
            echo '<script>alert("Failed to add SEO information.");</script>';
        }
    } elseif (isset($_POST["delete_seo"])) {
        $page = $_POST["page"];
        
        if (deleteSEOInfo($page)) {
            echo '<script>alert("SEO information deleted successfully.");</script>';
        } else {
            echo '<script>alert("Failed to delete SEO information.");</script>';
        }
    } elseif (isset($_POST["add_product"])) {
        $name = $_POST["name"];
        $price = $_POST["price"];
        $description = $_POST["description"];
        
        $sql = "INSERT INTO products (name, price, description) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sds", $name, $price, $description);
        
        if ($stmt->execute()) {
            echo '<script>alert("Product added successfully.");</script>';
        } else {
            echo '<script>alert("Failed to add product.");</script>';
        }
    } elseif (isset($_POST["edit_product"])) {
        $id = $_POST["id"];
        $name = $_POST["name"];
        $price = $_POST["price"];
        $description = $_POST["description"];
        
        $sql = "UPDATE products SET name = ?, price = ?, description = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sdsi", $name, $price, $description, $id);
        
        if ($stmt->execute()) {
            echo '<script>alert("Product updated successfully.");</script>';
        } else {
            echo '<script>alert("Failed to update product.");</script>';
        }
    } elseif (isset($_POST["delete_product"])) {
        $id = $_POST["id"];
        
        $sql = "DELETE FROM products WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        
        if ($stmt->execute()) {
            echo '<script>alert("Product deleted successfully.");</script>';
        } else {
            echo '<script>alert("Failed to delete product.");</script>';
        }
    } elseif (isset($_POST["add_blog_post"])) {
        $title = $_POST["title"];
        $content = $_POST["content"];
        
        $sql = "INSERT INTO blog_posts (title, content) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $title, $content);
        
        if ($stmt->execute()) {
            echo '<script>alert("Blog post added successfully.");</script>';
        } else {
            echo '<script>alert("Failed to add blog post.");</script>';
        }
    } elseif (isset($_POST["edit_blog_post"])) {
        $id = $_POST["id"];
        $title = $_POST["title"];
        $content = $_POST["content"];
        
        $sql = "UPDATE blog_posts SET title = ?, content = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssi", $title, $content, $id);
        
        if ($stmt->execute()) {
            echo '<script>alert("Blog post updated successfully.");</script>';
        } else {
            echo '<script>alert("Failed to update blog post.");</script>';
        }
    } elseif (isset($_POST["delete_blog_post"])) {
        $id = $_POST["id"];
        
        $sql = "DELETE FROM blog_posts WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        
        if ($stmt->execute()) {
            echo '<script>alert("Blog post deleted successfully.");</script>';
        } else {
            echo '<script>alert("Failed to delete blog post.");</script>';
        }
    }
}
// Function to fetch all SEO data
function fetchSEODetails($conn) {
    $sql = "SELECT * FROM seo";
    $result = $conn->query($sql);
    $seo_data = [];
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $seo_data[] = $row;
        }
    }
    return $seo_data;
}

// Fetch SEO data for display
$seo_data = fetchSEODetails($conn);

// Initialize variables for form fields
$page = '';
$existing_keywords = '';
$existing_description = '';

// Check if page parameter is set for editing
if (isset($_POST['page_select'])) {
    $edit_page = $_POST['page_select'];
    $seoData = getSEOInfo($edit_page);
    if ($seoData) {
        $page = $seoData['page'];
        $existing_keywords = $seoData['keywords'];
        $existing_description = $seoData['description'];
    }
}
// Fetch SEO data for display
$seo_data = fetchSEODetails($conn);
// Fetch SEO data for display
$products_data = fetchproducts($conn);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - SEO, Products, Blog Posts</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h2>Admin Panel</h2>
        <!-- SEO Section -->
        <div class="row mt-5">
            <div class="col-md-6">
                <h3>SEO Management</h3>
                <!-- Edit SEO Form -->
                <form method="post">
                    <div class="mb-3">
                        <label for="page_select" class="form-label">Select Page:</label>
                        <select class="form-select" id="page_select" name="page_select" onchange="this.form.submit()">
                            <option value="">Select Page</option>
                            <?php foreach ($seo_data as $seo): ?>
                                <option value="<?php echo htmlspecialchars($seo['page']); ?>" <?php if (isset($_POST['page_select']) && $_POST['page_select'] == $seo['page']) echo 'selected'; ?>>
                                    <?php echo htmlspecialchars($seo['page']); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </form>
                <?php if (!empty($_POST['page_select'])): ?>
                    <?php
                    $selected_page = $_POST['page_select'];
                    $seo_info = getSEOInfo($selected_page);
                    ?>
                    <form method="post">
                        <input type="hidden" name="page" value="<?php echo htmlspecialchars($selected_page); ?>">
                        <div class="mb-3">
                            <label for="edit_keywords" class="form-label">Keywords:</label>
                            <textarea class="form-control" id="edit_keywords" name="keywords" rows="3"><?php echo htmlspecialchars($seo_info['keywords']); ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="edit_description" class="form-label">Description:</label>
                            <textarea class="form-control" id="edit_description" name="description" rows="5"><?php echo htmlspecialchars($seo_info['description']); ?></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" name="edit_seo">Update SEO</button>
                    </form>
                <?php endif; ?>
                <!-- Add SEO Form -->
                <div class="mt-4">
                    <h5>Add New SEO Information</h5>
                    <form method="post">
                        <div class="mb-3">
                            <label for="add_page" class="form-label">Page:</label>
                            <input type="text" class="form-control" id="add_page" name="page" required>
                        </div>
                        <div class="mb-3">
                            <label for="add_keywords" class="form-label">Keywords:</label>
                            <textarea class="form-control" id="add_keywords" name="keywords" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="add_description" class="form-label">Description:</label>
                            <textarea class="form-control" id="add_description" name="description" rows="5"></textarea>
                        </div>
                        <button type="submit" class="btn btn-success" name="add_seo">Add SEO</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Product Section -->
        <div class="row mt-5">
            <div class="col-md-6">
                <h3>Product Management</h3>
                <!-- Add Product Form -->
                <div>
                    <h5>Add New Product</h5>
                    <form method="post">
                        <div class="mb-3">
                            <label for="product_name" class="form-label">Name:</label>
                            <input type="text" class="form-control" id="product_name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="product_price" class="form-label">Price:</label>
                            <input type="number" class="form-control" id="product_price" name="price" step="0.01" required>
                        </div>
                        <div class="mb-3">
                            <label for="product_description" class="form-label">Description:</label>
                            <textarea class="form-control" id="product_description" name="description" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-success" name="add_product">Add Product</button>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <h3>Existing Products</h3>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($products as $product): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($product['name']); ?></td>
                                <td><?php echo htmlspecialchars($product['price']); ?></td>
                                <td><?php echo htmlspecialchars($product['description']); ?></td>
                                <td>
                                    <form method="post">
                                        <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
                                        <button type="submit" class="btn btn-primary btn-sm" name="edit_product">Edit</button>
                                        <button type="submit" class="btn btn-danger btn-sm" name="delete_product">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Blog Post Section -->
        <div class="row mt-5">
            <div class="col-md-6">
                <h3>Blog Post Management</h3>
                <!-- Add Blog Post Form -->
                <div>
                    <h5>Add New Blog Post</h5>
                    <form method="post">
                        <div class="mb-3">
                            <label for="blog_title" class="form-label">Title:</label>
                            <input type="text" class="form-control" id="blog_title" name="title" required>
                        </div>
                        <div class="mb-3">
                            <label for="blog_content" class="form-label">Content:</label>
                            <textarea class="form-control" id="blog_content" name="content" rows="5" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-success" name="add_blog_post">Add Blog Post</button>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <h3>Existing Blog Posts</h3>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($blogPosts as $post): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($post['title']); ?></td>
                                <td><?php echo htmlspecialchars($post['content']); ?></td>
                                <td>
                                    <form method="post">
                                        <input type="hidden" name="id" value="<?php echo $post['id']; ?>">
                                        <button type="submit" class="btn btn-primary btn-sm" name="edit_blog_post">Edit</button>
                                        <button type="submit" class="btn btn-danger btn-sm" name="delete_blog_post">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
