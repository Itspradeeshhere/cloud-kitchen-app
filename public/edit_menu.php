<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = intval($_POST['id'] ?? 0);
    $date = trim($_POST['date'] ?? '');
    $mealType = trim($_POST['mealType'] ?? '');
    $itemName = trim($_POST['itemName'] ?? '');
    $quantity = intval($_POST['quantity'] ?? 0);
    $sufficientFor = trim($_POST['sufficientFor'] ?? '');
    $price = floatval($_POST['price'] ?? 0);

    if ($id <= 0 || empty($date) || empty($mealType) || empty($itemName) || $quantity <= 0 || empty($sufficientFor) || $price <= 0) {
        echo "❌ Error: Invalid or missing fields!";
        exit();
    }
    

    $query = "UPDATE menu SET date=?, mealType=?, itemName=?, quantity=?, sufficientFor=?, price=? WHERE id=?";
    $stmt = mysqli_prepare($conn, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sssidsi", $date, $mealType, $itemName, $quantity, $sufficientFor, $price, $id);
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            echo "✅ Menu updated successfully!";
        } else {
            echo "❌ Update failed: " . mysqli_error($conn);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "❌ Statement preparation failed!";
    }

    mysqli_close($conn);
}
?>
