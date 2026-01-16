<?php
include 'includes/db.php';


if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$message = "";

if (isset($_POST['update_profile'])) {
    $full_name = mysqli_real_escape_string($conn, $_POST['full_name']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    
    $update_sql = "UPDATE users SET full_name='$full_name', phone='$phone' WHERE id='$user_id'";
    if (mysqli_query($conn, $update_sql)) {
        $_SESSION['user_name'] = $full_name; 
        $message = "<div style='color:green; margin-bottom:15px;'>✅ تم تحديث بياناتك بنجاح!</div>";
    }
}

$user_query = mysqli_query($conn, "SELECT * FROM users WHERE id='$user_id'");
$user_data = mysqli_fetch_assoc($user_query);
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>الملف الشخصي | MESHRIDER</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .profile-container { max-width: 800px; margin: 40px auto; padding: 20px; display: grid; grid-template-columns: 1fr 2fr; gap: 20px; }
        .profile-sidebar { background: white; padding: 30px; border-radius: 20px; text-align: center; box-shadow: 0 5px 15px rgba(0,0,0,0.05); }
        .profile-main { background: white; padding: 30px; border-radius: 20px; box-shadow: 0 5px 15px rgba(0,0,0,0.05); }
        .avatar-circle { width: 100px; height: 100px; background: var(--main-grad); color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 2.5rem; margin: 0 auto 15px; }
        .stats-box { background: #f8f9fa; padding: 15px; border-radius: 12px; margin-top: 20px; }
        .form-group { margin-bottom: 20px; }
        .form-group label { display: block; margin-bottom: 8px; font-weight: bold; color: var(--dark-blue); }
        .form-group input { width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px; font-family: inherit; }
        .readonly-input { background: #f1f3f5; cursor: not-allowed; }
    </style>
</head>
<body>
    <?php include 'includes/header.php'; ?>

    <div class="hero" style="padding: 40px 10%;">
        <h1>إعدادات الحساب ⚙️</h1>
    </div>

    <div class="profile-container">
        <aside class="profile-sidebar">
            <div class="avatar-circle">
                <?php echo mb_substr($user_data['full_name'], 0, 1, 'utf-8'); ?>
            </div>
            <h3><?php echo $user_data['full_name']; ?></h3>
            <p style="color: #888; font-size: 0.9rem;"><?php echo $user_data['email']; ?></p>
            
            <div class="stats-box">
                <div style="font-size: 0.8rem; color: #666;">رصيد النقاط</div>
                <div style="font-size: 1.5rem; font-weight: bold; color: var(--orange);">
                    <i class="fas fa-coins"></i> <?php echo $user_data['points']; ?> XP
                </div>
                <div style="margin-top: 10px; font-size: 0.85rem;">
                    رتبتك: <strong style="color: var(--dark-blue);">مستكشف فضي</strong>
                </div>
            </div>
        </aside>

        <main class="profile-main">
            <h3>تحديث البيانات الشخصية</h3>
            <hr style="margin: 20px 0; border: 0; border-top: 1px solid #eee;">
            
            <?php echo $message; ?>

            <form method="POST">
                <div class="form-group">
                    <label>الاسم الكامل</label>
                    <input type="text" name="full_name" value="<?php echo $user_data['full_name']; ?>" required>
                </div>

                <div class="form-group">
                    <label>البريد الإلكتروني (لا يمكن تغييره)</label>
                    <input type="email" class="readonly-input" value="<?php echo $user_data['email']; ?>" readonly>
                </div>

                <div class="form-group">
                    <label>رقم الهاتف</label>
                    <input type="text" name="phone" value="<?php echo $user_data['phone']; ?>" placeholder="07XXXXXXXX">
                </div>

                <div class="form-group">
                    <label>تاريخ الانضمام</label>
                    <input type="text" class="readonly-input" value="<?php echo date('Y-m-d', strtotime($user_data['created_at'])); ?>" readonly>
                </div>

                <button type="submit" name="update_profile" class="btn" style="width: 100%; border: none; cursor: pointer; font-size: 1rem;">حفظ التغييرات ✅</button>
            </form>
        </main>
    </div>
</body>
</html>