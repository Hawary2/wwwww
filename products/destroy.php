<?php
require 'cutes.php';
$id = $_GET["id"];
if( broken($id) > 0 ) {
	echo "
	<script>
	alert('This is post is successfully deleted 😈');
	document.location.href ='cuteproducts.php';
	</script>
	";
	} else {
	echo "
	<script>
	alert('Whoopps... cant delete this post 😭 ');
	document.location.href ='cuteproducts.php';
	</script>
	";
	}
?>