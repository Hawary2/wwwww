<?php
$conn = mysqli_connect("localhost", "root", "Qweasdzxcrr11", "jobportal");

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function love($data) {
    global $conn;
    $title = htmlspecialchars($data["title"]);
    $description = htmlspecialchars($data["description"]);
    $cover = htmlspecialchars($data["cover"]);
    $content = htmlspecialchars($data["content"]);
    $buy_now_link = htmlspecialchars($data["buy_now_link"]); // New field for Buy Now link

    $query = "INSERT INTO products (title, description, cover, content, buy_now_link)
              VALUES ('$title', '$description', '$cover', '$content', '$buy_now_link')";

    mysqli_query($conn, $query);
    
    return mysqli_affected_rows($conn);
}

function broken($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM products WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function kiss($data) {
    global $conn;
    $id = $data["id"];
    $title = htmlspecialchars($data["title"]);
    $description = htmlspecialchars($data["description"]);
    $cover = htmlspecialchars($data["cover"]);
    $content = htmlspecialchars($data["content"]);
    $buy_now_link = htmlspecialchars($data["buy_now_link"]); // New field for Buy Now link

    $query = "UPDATE products SET
              title = '$title',
              description = '$description',
              cover = '$cover',
              content = '$content',
              buy_now_link = '$buy_now_link'
              WHERE id = $id";

    mysqli_query($conn, $query);
    
    return mysqli_affected_rows($conn);
}
?>
