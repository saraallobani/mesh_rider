<?php
include 'includes/db.php';
session_start();

// 1. التحقق من أن المستخدم سجل دخوله
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// 2. التحقق من وصول البيانات الأساسية (المعرف والنوع)
if (isset($_GET['id']) && isset($_GET['type'])) {
    
    $user_id = $_SESSION['user_id'];
    $item_id = mysqli_real_escape_string($conn, $_GET['id']);
    $type = mysqli_real_escape_string($conn, $_GET['type']); // إما 'trip' أو 'vehicle'
    
    // 3. إدخال الحجز الأساسي في جدول الحجوزات
    // الحالة الافتراضية تكون 'pending' (بانتظار الموافقة)
    $sql1 = "INSERT INTO bookings (user_id, item_id, type, status) 
             VALUES ('$user_id', '$item_id', '$type', 'pending')";
    
    $query1 = mysqli_query($conn, $sql1);

    // 4. التحقق إذا قام المستخدم باختيار مركبة إضافية (اختياري)
    if (isset($_GET['extra_vehicle']) && !empty($_GET['extra_vehicle'])) {
        $extra_v_id = mysqli_real_escape_string($conn, $_GET['extra_vehicle']);
        
        // إدخال حجز المركبة الإضافية كطلب منفصل
        $sql2 = "INSERT INTO bookings (user_id, item_id, type, status) 
                 VALUES ('$user_id', '$extra_v_id', 'vehicle', 'pending')";
        
        mysqli_query($conn, $sql2);
    }

    // 5. التحويل إلى صفحة "حجوزاتي" بعد نجاح العملية
    if ($query1) {
        header("Location: my_bookings.php?msg=success");
        exit();
    } else {
        // في حال حدوث خطأ تقني في قاعدة البيانات
        echo "عذراً، حدث خطأ أثناء معالجة الحجز: " . mysqli_error($conn);
    }

} else {
    // إذا حاول شخص الدخول للملف مباشرة دون بيانات، نعيده للرئيسية
    header("Location: index.php");
    exit();
}
?>