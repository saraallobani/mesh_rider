<?php
include 'includes/db.php';

if (isset($_POST['register'])) {
    $full_name = mysqli_real_escape_string($conn, $_POST['full_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); 
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);

    $check_email = mysqli_query($conn, "SELECT id FROM users WHERE email='$email'");
    if(mysqli_num_rows($check_email) > 0) {
        $error = "الإيميل مسجل مسبقاً!";
    } else {
        $sql = "INSERT INTO users (full_name, email, password, phone, role) 
                VALUES ('$full_name', '$email', '$password', '$phone', 'user')";
        if (mysqli_query($conn, $sql)) {
            header("Location: login.php?msg=success");
            exit();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>تسجيل جديد | MESHRIDER</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        .auth-box { max-width: 400px; margin: 80px auto; background: white; padding: 30px; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); }
        .auth-box input { width: 100%; padding: 12px; margin: 10px 0; border: 1px solid #ddd; border-radius: 8px; }
    </style>
</head>
<body>
    <?php include 'includes/header.php'; ?>
    <div class="auth-box">
        <h2 style="text-align:center; color:var(--dark-blue);">إنشاء حساب جديد 👤</h2>
        <?php if(isset($error)) echo "<p style='color:red; text-align:center;'>$error</p>"; ?>
        <form method="POST">
            <input type="text" name="full_name" placeholder="الاسم الكامل" required>
            <input type="email" name="email" placeholder="البريد الإلكتروني" required>
            <input type="password" name="password" placeholder="كلمة المرور" required>
            <input type="text" name="phone" placeholder="رقم الهاتف">
            <button type="submit" name="register" class="btn" style="width:100%; border:none; cursor:pointer;">سجل الآن</button>
        </form>
        <p style="text-align:center; margin-top:15px;">عندك حساب؟ <a href="login.php">سجل دخول</a></p>
    </div>
</body>
</html>