<?php
include 'includes/db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if (isset($_GET['id']) && isset($_GET['type'])) {
    
    $user_id = $_SESSION['user_id'];
    $item_id = mysqli_real_escape_string($conn, $_GET['id']);
    $type = mysqli_real_escape_string($conn, $_GET['type']); 
    
    $sql1 = "INSERT INTO bookings (user_id, item_id, type, status) 
             VALUES ('$user_id', '$item_id', '$type', 'pending')";
    
    $query1 = mysqli_query($conn, $sql1);

    if (isset($_GET['extra_vehicle']) && !empty($_GET['extra_vehicle'])) {
        $extra_v_id = mysqli_real_escape_string($conn, $_GET['extra_vehicle']);
        
        $sql2 = "INSERT INTO bookings (user_id, item_id, type, status) 
                 VALUES ('$user_id', '$extra_v_id', 'vehicle', 'pending')";
        
        mysqli_query($conn, $sql2);
    }

    if ($query1) {
        header("Location: my_bookings.php?msg=success");
        exit();
    } else {
        echo "عذراً، حدث خطأ أثناء معالجة الحجز: " . mysqli_error($conn);
    }

} else {
    header("Location: index.php");
    exit();
}
?>