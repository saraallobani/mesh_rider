<?php
include 'includes/db.php';
session_start();

if(isset($_SESSION['user_id']) && isset($_GET['id'])) {
    $booking_id = (int)$_GET['id'];
    $user_id = $_SESSION['user_id'];

    $sql = "UPDATE bookings SET status = 'cancelled' 
            WHERE id = '$booking_id' AND user_id = '$user_id' AND status = 'pending'";

    if(mysqli_query($conn, $sql)) {
        header("Location: my_bookings.php?msg=cancelled");
    } else {
        echo "حدث خطأ أثناء الإلغاء: " . mysqli_error($conn);
    }
} else {
    header("Location: my_bookings.php");
}
?>