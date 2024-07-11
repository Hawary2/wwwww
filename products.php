<?php
session_start();
include 'seo.php';

$page = 'products';
$seo_data = get_seo_data($page);
?>
<?php include 'products/footer.php' ?>
<?php include 'mainNavbar.php';?>
<?php
require 'products/cutes.php';
$id = $_GET["id"];
$cute = query("SELECT * FROM products WHERE ID = $id")[0];
?>
<?php include 'products/headpost.php' ?>
<div class="col-12 p-3">
<div class="card p-1">
<main class="container">
<div class="col-md-4 p-3">
<img class="img-fluid card" title="<?= $cute["title"];?>" src="<?= $cute["cover"];?>"/>
<div class="p-3 p-md-5">
<h1><a href="products.php?id=<?= $cute["id"];?>"><?= $cute["title"];?></a> ✏️</h1>
<h3>📝 <?= $cute["description"];?></h3>
<p class="dotted"></p>
<p><?= $cute["content"];?></p>
<!-- Buy Now Button -->
            <a href="<?= $cute["buy_now_link"]; ?>" class="btn btn-primary mt-3" target="_blank">Buy Now</a>
        </div>
    </div>
</div>
</div></div>
<?php include 'mainFooter.php'; ?>
