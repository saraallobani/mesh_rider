<?php 
include 'includes/db.php'; 

?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>المركبات | MESHRIDER</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        .vehicles-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
            padding: 40px 10%;
        }
        .v-card {
            background: #fff;
            border: 1px solid #eee;
            border-radius: 15px;
            padding: 20px;
            text-align: center;
        }
        .v-type { color: var(--orange); font-weight: bold; font-size: 0.8rem; }
        .v-price { font-size: 1.2rem; margin: 15px 0; color: var(--dark-blue); }
        .v-specs { font-size: 0.8rem; color: #888; background: #f9f9f9; padding: 10px; border-radius: 8px; }
    </style>
</head>
<body>
    <?php include 'includes/header.php'; ?>

    <div class="hero" style="background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('images/cars-bg.jpg');">
        <h1>أسطول MESHRIDER 🚙</h1>
        <p>مركبات دفع رباعي، باصات سياحية، ودراجات جبلية</p>
    </div>

    <div class="vehicles-grid">
        <?php
        $result = mysqli_query($conn, "SELECT * FROM vehicles");
        while($row = mysqli_fetch_assoc($result)) {
            echo "
            <div class='v-card'>
                <span class='v-type'>{$row['type']}</span>
                <h3 style='margin:10px 0;'>{$row['name']}</h3>
                <div class='v-specs'>{$row['specs']}</div>
                <div class='v-price'><strong>{$row['price_per_day']} JOD</strong> / يوم</div>
                <a href='book.php?id={$row['id']}&type=vehicle' class='btn' style='width:100%;'>استئجار الآن</a>
            </div>";
        }
        ?>
    </div>
</body>
</html>