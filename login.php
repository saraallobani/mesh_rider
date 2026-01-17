<?php
session_start(); 
include 'includes/db.php';

$error = ''; 

if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['full_name'];
        $_SESSION['role'] = $user['role'];
        header("Location: index.php");
        exit();
    } else {
        $error = "البريد الإلكتروني أو كلمة المرور خاطئ!";
    }
}
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>تسجيل الدخول | MESHRIDER</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include 'includes/header.php'; ?>
    <div class="auth-box" style="max-width: 400px; margin: 80px auto; background: white; padding: 30px; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
        <h2 style="text-align:center; color:var(--dark-blue);">أهلاً بك مجدداً 👋</h2>

        <?php if(!empty($error)) : ?>
            <p style="color:red; text-align:center; margin-bottom:15px;"><?php echo $error; ?></p>
        <?php endif; ?>

        <form method="POST">
            <input type="email" name="email" placeholder="البريد الإلكتروني" required style="width: 100%; padding: 12px; margin: 10px 0; border: 1px solid #ddd; border-radius: 8px;">
            <input type="password" name="password" placeholder="كلمة المرور" required style="width: 100%; padding: 12px; margin: 10px 0; border: 1px solid #ddd; border-radius: 8px;">
            <button type="submit" name="login" class="btn" style="width:100%; border:none; cursor:pointer;">دخول</button>
        </form>
        <p style="text-align:center; margin-top:15px;">ما عندك حساب؟ <a href="register.php">سجل مجاناً</a></p>
    </div>
</body>
</html>
