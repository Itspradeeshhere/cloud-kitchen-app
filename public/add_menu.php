<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $date = trim($_POST['date'] ?? '');
    $mealType = trim($_POST['mealType'] ?? '');
    $itemName = trim($_POST['itemName'] ?? '');
    $quantity = intval($_POST['quantity'] ?? 0);
    $sufficientFor = trim($_POST['sufficientFor'] ?? '');
    $price = floatval($_POST['price'] ?? 0);

    // Validate input fields
    if (empty($date) || empty($mealType) || empty($itemName) || $quantity <= 0 || empty($sufficientFor) || $price <= 0) {
        echo "❌ Error: All fields are required!";
        exit();
    }

    // Use Prepared Statement to Prevent SQL Injection
    $query = "INSERT INTO menu (date, mealType, itemName, quantity, sufficientFor, price) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sssisd", $date, $mealType, $itemName, $quantity, $sufficientFor, $price);
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            echo "✅ Menu saved successfully!";
        } else {
            echo "❌ Database Error: " . mysqli_error($conn);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "❌ Error: Failed to prepare the statement!";
    }

    mysqli_close($conn);
}
?>
