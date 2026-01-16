<?php
include 'includes/db.php';
session_start();

// 1. حماية الصفحة
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// 2. التحقق من وصول البيانات من صفحة الرحلات أو المركبات
if (!isset($_GET['id']) || !isset($_GET['type'])) {
    header("Location: index.php");
    exit();
}

$id = mysqli_real_escape_string($conn, $_GET['id']);
$type = mysqli_real_escape_string($conn, $_GET['type']);

// 3. جلب تفاصيل العنصر المختار
if ($type == 'trip') {
    $sql = "SELECT * FROM trips WHERE id = '$id'";
} else {
    $sql = "SELECT * FROM vehicles WHERE id = '$id'";
}

$result = mysqli_query($conn, $sql);
$item = mysqli_fetch_assoc($result);

if (!$item) {
    die("العنصر غير موجود في قاعدة البيانات.");
}
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>تأكيد حجزك | MESHRIDER</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        .book-container { max-width: 500px; margin: 50px auto; background: #fff; padding: 30px; border-radius: 20px; box-shadow: 0 10px 40px rgba(0,0,0,0.1); border-top: 10px solid var(--orange); }
        .summary-item { display: flex; justify-content: space-between; padding: 15px 0; border-bottom: 1px solid #f0f0f0; }
        .summary-item span { color: #666; }
        .summary-item strong { color: var(--dark-blue); }
        .total-price { background: #fff5f0; padding: 20px; border-radius: 12px; margin: 25px 0; text-align: center; }
        .total-price h3 { color: var(--orange); margin: 0; font-size: 1.8rem; }
        .confirm-btn { background: var(--orange); color: white; border: none; width: 100%; padding: 15px; border-radius: 10px; font-size: 1.2rem; font-weight: bold; cursor: pointer; transition: 0.3s; }
        .confirm-btn:hover { background: #e66000; transform: scale(1.02); }
        .cancel-link { display: block; text-align: center; margin-top: 15px; color: #888; text-decoration: none; }
    </style>
</head>
<body>

    <?php include 'includes/header.php'; ?>

    <div class="book-container">
        <h2 style="text-align: center; margin-bottom: 30px;">تأكيد تفاصيل الحجز ✨</h2>

        <div class="summary-box">
            <div class="summary-item">
                <span>اسم المغامرة:</span>
                <strong><?php echo ($type == 'trip' ? $item['title'] : $item['name']); ?></strong>
            </div>

            <?php if($type == 'trip'): ?>
                <div class="summary-item">
                    <span>الموقع:</span>
                    <strong><?php echo $item['location']; ?></strong>
                </div>
                <div class="summary-item">
                    <span>المدة:</span>
                    <strong><?php echo $item['duration']; ?></strong>
                </div>
            <?php endif; ?>

            <div class="summary-item">
                <span>نوع الحجز:</span>
                <strong><?php echo ($type == 'trip' ? 'رحلة استكشافية' : 'استئجار مركبة'); ?></strong>
            </div>

            <div class="total-price">
                <p>السعر الإجمالي المطلوب</p>
                <h3><?php echo ($type == 'trip' ? $item['price'] : $item['price_per_day']); ?> JOD</h3>
            </div>
        </div>

        <form action="book_action.php" method="GET">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="hidden" name="type" value="<?php echo $type; ?>">
            
            <?php if($type == 'trip'): ?>
                <div style="margin-bottom: 20px;">
                    <label style="display: block; margin-bottom: 10px; font-weight: bold;">إضافة مركبة مرافق (اختياري):</label>
                    <select name="extra_vehicle" style="width: 100%; padding: 12px; border-radius: 8px; border: 1px solid #ddd;">
                        <option value="">لا أريد مركبة إضافية</option>
                        <?php
                        $v_res = mysqli_query($conn, "SELECT id, name, price_per_day FROM vehicles");
                        while($v = mysqli_fetch_assoc($v_res)) {
                            echo "<option value='{$v['id']}'>{$v['name']} (+{$v['price_per_day']} JOD)</option>";
                        }
                        ?>
                    </select>
                </div>
            <?php endif; ?>

            <button type="submit" class="confirm-btn">تأكيد الحجز والإرسال 🚀</button>
            <a href="index.php" class="cancel-link">إلغاء، العودة للرئيسية</a>
        </form>
    </div>

</body>
</html>