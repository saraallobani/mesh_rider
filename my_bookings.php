<?php 
include 'includes/db.php';


if(!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>حجوزاتي | MESHRIDER</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        .bookings-container { max-width: 1000px; margin: 40px auto; padding: 0 20px; }
        .booking-card {
            background: white;
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
            border-right: 6px solid var(--orange);
        }
        .item-info h3 { margin: 0; color: var(--dark-blue); }
        .item-info p { margin: 5px 0; color: #777; font-size: 0.9rem; }
        
        .status-label {
            padding: 5px 15px;
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: bold;
        }
        .status-pending { background: #fff4e6; color: #fd7e14; }
        .status-confirmed { background: #ebfbee; color: #40c057; }
        .status-cancelled { background: #f1f3f5; color: #868e96; }

        .cancel-btn {
            background: #fff5f5;
            color: #fa5252;
            border: 1px solid #fa5252;
            padding: 8px 15px;
            border-radius: 8px;
            text-decoration: none;
            transition: 0.3s;
        }
        .cancel-btn:hover { background: #fa5252; color: white; }
    </style>
</head>
<body>
    <?php include 'includes/header.php'; ?>

    <div class="hero">
        <h1>رحلاتي وحجوزاتي 🎒</h1>
        <p>تتبع حالة طلباتك أو قم بإلغائها بكل سهولة</p>
    </div>

    <div class="bookings-container">
        <?php
        $sql = "SELECT b.id as booking_id, b.type, b.status, b.booking_date, 
                       t.title as trip_name, v.name as vehicle_name
                FROM bookings b
                LEFT JOIN trips t ON b.item_id = t.id AND b.type = 'trip'
                LEFT JOIN vehicles v ON b.item_id = v.id AND b.type = 'vehicle'
                WHERE b.user_id = '$user_id'
                ORDER BY b.booking_date DESC";

        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                $display_name = ($row['type'] == 'trip') ? $row['trip_name'] : $row['vehicle_name'];
                $icon = ($row['type'] == 'trip') ? "⛰️" : "🚙";
                ?>
                
                <div class="booking-card">
                    <div class="item-info">
                        <h3><?php echo $icon . " " . $display_name; ?></h3>
                        <p>تاريخ الحجز: <?php echo date('Y-m-d', strtotime($row['booking_date'])); ?></p>
                        <span class="status-label status-<?php echo $row['status']; ?>">
                            <?php 
                                if($row['status'] == 'pending') echo "قيد الانتظار";
                                elseif($row['status'] == 'confirmed') echo "مؤكد ✅";
                                else echo "ملغي";
                            ?>
                        </span>
                    </div>

                    <div class="actions">
                        <?php if($row['status'] == 'pending'): ?>
                            <a href="cancel_booking.php?id=<?php echo $row['booking_id']; ?>" 
                               class="cancel-btn" 
                               onclick="return confirm('هل أنت متأكد من إلغاء هذا الحجز؟')">إلغاء الحجز</a>
                        <?php endif; ?>
                    </div>
                </div>

                <?php
            }
        } else {
            echo "<div style='text-align:center; padding:50px;'>
                    <h3>لا يوجد لديك حجوزات حالياً</h3>
                    <a href='trips.php' class='btn'>ابدأ مغامرتك الأولى</a>
                  </div>";
        }
        ?>
    </div>
</body>
</html>