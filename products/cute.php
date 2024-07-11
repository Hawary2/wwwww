<?php
require 'cutes.php';

if (isset($_POST["submit"])) {
    // Ensure proper handling of data, including sanitization and validation
    $data = [
        "title" => $_POST["title"],
        "description" => $_POST["description"],
        "cover" => $_POST["cover"],
        "content" => $_POST["content"],
        "buy_now_link" => $_POST["buy_now_link"] // New field for Buy Now link
    ];

    if (love($data) > 0) {
        echo "
        <script>
        alert('Cool.. your post is updated');
        document.location.href = 'cuteproducts.php';
        </script>
        ";
    } else {
        echo "
        <script>
        alert('Oops.. can't update data 😭');
        document.location.href = 'cuteproducts.php';
        </script>
        ";
    }
}
?>

<?php include 'headproducts.php' ?>
<div class="col-12 p-3">
    <div class="card shadow">
        <div class="card-body">
            <h3 class="card-title">Add New Product</h3>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input class="form-control" type="text" name="title" id="title" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <input class="form-control" type="text" name="description" id="description" required>
                </div>
                <div class="mb-3">
                    <label for="cover" class="form-label">Cover Image URL</label>
                    <input class="form-control" type="url" name="cover" id="cover">
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <textarea class="form-control" rows="5" name="content" id="content"></textarea>
                </div>
                <div class="mb-3">
                    <label for="buy_now_link" class="form-label">Buy Now Link</label>
                    <input class="form-control" type="url" name="buy_now_link" id="buy_now_link">
                </div>

                <div class="text-end">
                    <button class="btn btn-primary" type="submit" name="submit">Publish Product</button>
                </div>
            </form>
			<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link href="bootstrap.min.css" rel="stylesheet">
        </div>
    </div>
</div>
<?php include 'footer.php' ?>
