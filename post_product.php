<?php
require 'cutes.php';

if (isset($_POST["submit"])) {
    // Extract form data
    $title = $_POST["title"];
    $description = $_POST["description"];
    $cover = $_POST["cover"];
    $content = $_POST["content"];

    // Example: Insert into products table
    $result = love([
        'title' => $title,
        'description' => $description,
        'cover' => $cover,
        'content' => $content
    ]);

    if ($result > 0) {
        echo "
        <script>
        alert('Cool.. your product is posted');
        document.location.href ='products.php';
        </script>
        ";
    } else {
        echo "
        <script>
        alert('Oops.. something went wrong 😭');
        document.location.href ='products.php';
        </script>
        ";
    }
}
?>

<?php include 'headblog.php'; ?>
<div class="col-12 p-3">
    <div class="card p-3 p-md-5">
        <h3>Add New Product</h3>
        <form action="" method="post" enctype="multipart/form-data">
            <label for="title">Title:</label>
            <input class="form-control" type="text" name="title" id="title" required>
            <label for="description">Description:</label>
            <input class="form-control" type="text" name="description" id="description" required>
            <label for="cover">Cover Image URL:</label>
            <input class="form-control" type="url" name="cover" id="cover">
            <label for="content">Content:</label>
            <textarea class="form-control" rows="5" name="content" id="content"></textarea>
            <div class="p-1 text-end">
                <button class="float-end btn btn-dark col-12 col-md-4 btn-lg" type="submit" name="submit">Publish Product</button>
            </div>
        </form>
    </div>
</div>

<?php include 'footer.php'; ?>
