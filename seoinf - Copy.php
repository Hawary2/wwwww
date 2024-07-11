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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - SEO Control</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h2>SEO Control Panel</h2>
        <div class="row mt-3">
            <div class="col-md-6">
                <h3>Edit SEO Information</h3>
                <form method="post">
                    <div class="mb-3">
                        <label for="page_select" class="form-label">Select Page:</label>
                        <select class="form-select" id="page_select" name="page_select" onchange="this.form.submit()">
                            <option value="">Select Page</option>
                            <?php foreach ($seo_data as $seo): ?>
                                <option value="<?php echo htmlspecialchars($seo['page']); ?>" <?php if ($page === $seo['page']) echo 'selected'; ?>>
                                    <?php echo htmlspecialchars($seo['page']); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </form>

                <?php if (!empty($page)): ?>
                    <form method="post">
                        <div class="mb-3">
                            <label for="edit_page" class="form-label">Page:</label>
                            <input type="text" class="form-control" id="edit_page" name="page" value="<?php echo htmlspecialchars($page); ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="edit_keywords" class="form-label">Keywords:</label>
                            <textarea class="form-control" id="edit_keywords" name="keywords" rows="3"><?php echo htmlspecialchars($existing_keywords); ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="edit_description" class="form-label">Description:</label>
                            <textarea class="form-control" id="edit_description" name="description" rows="5"><?php echo htmlspecialchars($existing_description); ?></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" name="edit_seo">Update SEO</button>
                    </form>
                <?php endif; ?>
            </div>
            <div class="col-md-6">
                <h3>Add New SEO Information</h3>
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
        <div class="row mt-5">
            <div class="col-md-6">
                <h3>Delete SEO Information</h3>
                <form method="post">
                    <div class="mb-3">
                        <label for="delete_page" class="form-label">Page:</label>
                        <input type="text" class="form-control" id="delete_page" name="page" required>
                    </div>
                    <button type="submit" class="btn btn-danger" name="delete_seo">Delete SEO</button>
                </form>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-12">
                <h3>Existing SEO Entries</h3>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Page</th>
                            <th>Keywords</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($seo_data as $seo): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($seo['page']); ?></td>
                                <td><?php echo htmlspecialchars($seo['keywords']); ?></td>
                                <td><?php echo htmlspecialchars($seo['description']); ?></td>							
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
