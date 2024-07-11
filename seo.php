<?php
include 'connect.php';

function get_seo_data($page) {
    global $conn;
    $sql = "SELECT keywords, description FROM seo WHERE page='$page'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return ['keywords' => '', 'description' => ''];
    }
}
?>
