<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start(); 
}
?>
<nav>
    <a href="index.php" class="logo">MESHRIDER 🚀</a>
    <button class="openbtn" onclick="openNav()">☰ القائمة</button>
</nav>

<div id="mySidebar" class="sidebar">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    
    <?php if(isset($_SESSION['user_id'])): ?>
        <div style="padding: 20px; text-align: center; border-bottom: 1px solid rgba(255,255,255,0.1);">
            <img src="https://via.placeholder.com/60" style="border-radius: 50%; border: 2px solid #f39c12;">
            <h4 style="color: white; margin: 10px 0 5px;">أهلاً، <?php echo $_SESSION['user_name']; ?> 👋</h4>
            <span style="color: #f39c12; font-size: 14px;">نقاطك: 1250 XP</span>
        </div>
        <a href="profile.php">👤 الملف الشخصي</a>
        <a href="trips.php">🗺️ الرحلات</a>
        <a href="vehicles.php">🏍️ المركبات</a>
        <a href="my_bookings.php">📅 حجوزاتي</a>
        <a href="about.php">ℹ️ عن مش رايدر</a>
        <a href="contact.php">📞 الاتصال بنا</a>
        <a href="logout.php" style="color: #ff7675; border-top: 1px solid rgba(255,255,255,0.1);">🚪 تسجيل الخروج</a>
    <?php else: ?>
        <div style="padding: 20px; text-align: center; border-bottom: 1px solid rgba(255,255,255,0.1);">
            <h4 style="color: white;">أهلاً بك في مش رايدر ✨</h4>
        </div>
        <a href="login.php">🔑 تسجيل الدخول</a>
        <a href="register.php">📝 إنشاء حساب جديد</a>
        <a href="trips.php">🗺️ تصفح الرحلات</a>
        <a href="about.php">ℹ️ عن مش رايدر</a>
        <a href="contact.php">📞 الاتصال بنا</a>
    <?php endif; ?>
</div>

<script>
function openNav() { document.getElementById("mySidebar").style.width = "280px"; }
function closeNav() { document.getElementById("mySidebar").style.width = "0"; }
</script>