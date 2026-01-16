<?php 
include 'includes/db.php'; 

?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>الرحلات | MESHRIDER</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        .trips-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 25px;
            padding: 40px 10%;
            background: #f8f9fa;
        }
        .trip-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 20px rgba(0,0,0,0.05);
            transition: 0.3s;
            position: relative;
        }
        .trip-card:hover { transform: translateY(-10px); }
        .trip-content { padding: 20px; }
        .trip-category {
            background: var(--orange);
            color: white;
            padding: 5px 12px;
            border-radius: 50px;
            font-size: 0.7rem;
            position: absolute;
            top: 15px;
            right: 15px;
        }
        .trip-price {
            font-size: 1.4rem;
            color: var(--dark-blue);
            font-weight: bold;
        }
        .trip-details {
            display: flex;
            justify-content: space-between;
            color: #777;
            font-size: 0.85rem;
            margin: 15px 0;
            border-top: 1px solid #eee;
            padding-top: 10px;
        }
    </style>
</head>
<body>
    <?php include 'includes/header.php'; ?>

    <div class="hero">
        <h1>استكشف الأردن ⛰️</h1>
        <p>اختر مغامرتك القادمة من بين 20 وجهة مميزة</p>
    </div>

    <div class="trips-container">
        <?php
        $result = mysqli_query($conn, "SELECT * FROM trips");
        while($row = mysqli_fetch_assoc($result)) {
            echo "
            <div class='trip-card'>
                <div class='trip-category'>{$row['category']}</div>
                <div class='trip-content'>
                    <h3 style='color:var(--dark-blue);'>{$row['title']}</h3>
                    <p style='color:#666; font-size:0.9rem; margin-top:5px;'>📍 {$row['location']}</p>
                    
                    <div class='trip-details'>
                        <span>⏳ {$row['duration']}</span>
                        <span class='trip-price'>{$row['price']} JOD</span>
                    </div>
                    
                    <a href='book.php?id={$row['id']}&type=trip' class='btn' style='display:block; text-align:center;'>احجز المغامرة الآن</a>
                </div>
            </div>";
        }
        ?>
    </div>
</body>
</html>