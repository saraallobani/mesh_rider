<?php
include 'includes/db.php';
session_start();
$id = (int)$_GET['id'];
// جلب بيانات الحجز والرحلة
$sql = "SELECT b.*, t.title, t.location, u.full_name FROM bookings b 
        JOIN trips t ON b.item_id = t.id 
        JOIN users u ON b.user_id = u.id 
        WHERE b.id = '$id'";
$res = mysqli_fetch_assoc(mysqli_query($conn, $sql));
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <title>تذكرة الرحلة #<?php echo $id; ?></title>
    <style>
        .ticket { border: 2px dashed #333; padding: 20px; width: 400px; margin: 50px auto; text-align: center; font-family: Arial; }
        .btn-print { background: #000; color: #fff; padding: 10px; cursor: pointer; border: none; }
        @media print { .btn-print { display: none; } }
    </style>
</head>
<body>
    <div class="ticket">
        <h2>MESHRIDER 🚀</h2>
        <hr>
        <p><strong>الاسم:</strong> <?php echo $res['full_name']; ?></p>
        <p><strong>الرحلة:</strong> <?php echo $res['title']; ?></p>
        <p><strong>الموقع:</strong> <?php echo $res['location']; ?></p>
        <p><strong>الحالة:</strong> مؤكدة ✅</p>
        <button class="btn-print" onclick="window.print()">تحميل / طباعة التذكرة</button>
    </div>
</body>
</html>