<?php
include 'db.php';

$id = intval($_GET['id'] ?? 0);

if ($id > 0) {
    $query = "DELETE FROM menu WHERE id=?";
    $stmt = mysqli_prepare($conn, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $id);
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            echo "✅ Menu deleted successfully!";
        } else {
            echo "❌ Deletion failed: " . mysqli_error($conn);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "❌ Failed to prepare delete statement!";
    }

    mysqli_close($conn);
} else {
    echo "❌ Invalid ID!";
}
?>
