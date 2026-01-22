<?php 
include 'includes/db.php'; 


$is_logged_in = isset($_SESSION['user_id']);
$user_name = $is_logged_in ? $_SESSION['user_name'] : "رحالة";
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>MESHRIDER | الرئيسية</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root { --main-grad: linear-gradient(135deg, #1a2a6c, #b21f1f, #fdbb2d); }
        body { background-color: #f4f7f6; margin: 0; font-family: 'Cairo', sans-serif; }
        
        .welcome-section {
            background: var(--main-grad);
            padding: 80px 10%;
            color: white;
            border-radius: 0 0 50px 50px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        .btn-join {
            background: #fdbb2d;
            color: #1a2a6c;
            padding: 12px 30px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: bold;
            display: inline-block;
            margin-top: 20px;
            transition: 0.3s;
        }
        .btn-join:hover { transform: scale(1.1); background: white; }

        .dashboard-grid {
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: 30px;
            padding: 40px 10%;
            margin-top: -40px;
        }

        .side-card, .main-card {
            background: white;
            padding: 25px;
            border-radius: 20px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }

        .trip-suggest-card {
            background: white;
            border-radius: 20px;
            display: flex;
            align-items: center;
            padding: 15px;
            margin-bottom: 15px;
            transition: 0.3s;
            border-right: 6px solid var(--orange);
            text-decoration: none;
            color: inherit;
            box-shadow: 0 2px 8px rgba(0,0,0,0.02);
        }
        .trip-suggest-card:hover { transform: translateX(-10px); background: #fffcf9; }

        .price-tag {
            background: #fff5f0;
            color: var(--orange);
            padding: 10px;
            border-radius: 12px;
            font-weight: bold;
            min-width: 60px;
            text-align: center;
        }
    </style>
</head>
<body>
    <?php include 'includes/header.php'; ?>

    <section class="welcome-section">
        <?php if($is_logged_in): ?>
            <h1>أهلاً بك مجدداً، <span style="color: #fdbb2d;"><?php echo $user_name; ?></span> 👋</h1>
            <div style="background: rgba(255,255,255,0.2); padding: 10px 20px; border-radius: 50px; display: inline-block; margin-top: 15px;">
                <i class="fas fa-star"></i> لديك <strong>1,250 XP</strong> | مستكشف فضي
            </div>
        <?php else: ?>
            <h1 style="font-size: 2.5rem;">اكتشف أسرار الطبيعة مع <span style="color: #fdbb2d;">MESHRIDER</span></h1>
            <p>أكبر منصة لحجز رحلات الدفع الرباعي والمغامرات في الأردن</p>
            <a href="register.php" class="btn-join">ابدأ مغامرتك الآن 🚀</a>
        <?php endif; ?>
    </section>

    <div class="dashboard-grid">
        <aside>
            <div class="side-card" style="background: var(--dark-blue); color: white; margin-bottom: 20px;">
                <h3><i class="fas fa-map"></i> <?php echo $is_logged_in ? "حجزك القادم" : "لماذا نحن؟"; ?></h3>
                <?php if($is_logged_in): ?>
                    <p style="opacity: 0.8; font-size: 0.9rem; margin: 15px 0;">لا توجد رحلات مجدولة حالياً.</p>
                    <a href="trips.php" style="color: #fdbb2d; text-decoration: none;">استكشف الرحلات ←</a>
                <?php else: ?>
                    <p style="font-size: 0.85rem; line-height: 1.6;">نوفر لك أكثر من 40 خياراً بين رحلات جبلية وسيارات مجهزة للمهام الصعبة.</p>
                <?php endif; ?>
            </div>

            <div class="side-card">
                <h3>🎯 <?php echo $is_logged_in ? "مهامك اليومية" : "أكثر المناطق طلباً"; ?></h3>
                <ul style="list-style: none; padding: 0; font-size: 0.9rem;">
                    <li style="margin-bottom: 10px;"><i class="fas fa-fire" style="color: orange;"></i> وادي رم (120 حجز هذا الأسبوع)</li>
                    <li style="margin-bottom: 10px;"><i class="fas fa-water" style="color: blue;"></i> وادي الموجب (قريباً)</li>
                </ul>
            </div>
        </aside>

        <main class="main-card">
            <h3 style="margin-bottom: 20px; color: var(--dark-blue);"><i class="fas fa-compass"></i> رحلات نوصي بها</h3>
            
            <?php
            $res = mysqli_query($conn, "SELECT * FROM trips LIMIT 4");
            while($row = mysqli_fetch_assoc($res)) {
                echo "
                <a href='book.php?id={$row['id']}&type=trip' class='trip-suggest-card'>
                    <div class='price-tag'>{$row['price']} JOD</div>
                    <div style='flex-grow: 1; padding: 0 15px;'>
                        <h4 style='margin:0;'>{$row['title']}</h4>
                        <span style='font-size:0.8rem; color:#888;'>📍 {$row['location']}</span>
                    </div>
                    <i class='fas fa-chevron-left' style='color:#ddd;'></i>
                </a>";
            }
            ?>
            <a href="trips.php" style="display: block; text-align: center; margin-top: 20px; color: var(--orange); text-decoration: none; font-weight: bold;">عرض كافة الرحلات (20+)</a>
        </main>
    </div>
</body>
</html>
