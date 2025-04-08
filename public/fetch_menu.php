<?php
include 'db.php';

$query = "SELECT * FROM menu ORDER BY date ASC";
$result = mysqli_query($conn, $query);

$menus = [];

while ($row = mysqli_fetch_assoc($result)) {
    $menus[] = $row;
}

header('Content-Type: application/json');
echo json_encode($menus);

mysqli_close($conn);
?>
