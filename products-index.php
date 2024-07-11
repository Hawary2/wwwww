<?php
session_start();
include 'seo.php';

$page = 'products-index';
$seo_data = get_seo_data($page);
?>
<?php require 'products/cutes.php'; $cute = query("SELECT * FROM products LIMIT 27"); ?>
<?php include 'products/headhome.php' ?>
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
                <div class="col-md-4 p-2">
                    <div class="card p-1" style="max-width: 18rem; height: 100%;">
                        <a href="products.php?id=<?= $sweet['id']; ?>">
                            <img class="img-fluid card-img-top" alt="<?= $sweet['title']; ?>" src="<?= $sweet['cover']; ?>" style="width: 100%; height: auto;"/>
                        </a>
                        <div class="card-body" style="padding: 10px;">
                            <h5 class="card-title" style="font-size: 1rem;"><?= $sweet["title"]; ?> ✏️</h5>
                            <p class="card-text" style="font-size: 0.875rem;">📝 <?= $sweet["description"]; ?></p>
                            <a href="<?= $sweet["buy_now_link"]; ?>" class="btn btn-primary mt-3" target="_blank">Buy Now</a>
                        </div>
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
