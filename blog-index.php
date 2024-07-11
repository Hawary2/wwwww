<?php
session_start();
include 'seo.php';

$page = 'blog';
$seo_data = get_seo_data($page);
?>
<?php require 'widget/cutes.php'; $cute = query("SELECT * FROM blog"); ?>
<?php include 'widget/headhome.php' ?>
<?php include 'mainNavbar.php';?>

<div class="container-fluid p-0">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link rel="icon" href="img/brouva.svg" type="image/x-icon">

    <!-- Google Web Fonts -->
    <link href="mcss/bootstrap.min.css" rel="stylesheet">
    <link href="mcss/style.css" rel="stylesheet">

    <div class="container">
        <div class="row">
            <?php $count = 0; ?>
            <?php foreach ($cute as $sweet) : ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <a href="blog.php?id=<?= $sweet['id']; ?>">
                            <img class="card-img-top" alt="<?= $sweet['title']; ?>" src="<?= $sweet['cover']; ?>" style="height: 200px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title"><?= $sweet["title"]; ?> ✏️</h5>
                                <p class="card-text"><?= $sweet["description"]; ?></p>
                            </div>
                        </a>
                    </div>
                </div>
                <?php $count++; ?>
                <?php if ($count % 3 == 0) : ?>
                    </div><div class="row">
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<?php include 'mainFooter.php'; ?>
