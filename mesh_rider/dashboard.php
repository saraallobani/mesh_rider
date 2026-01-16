<?php 
include 'includes/header.php'; 
if(!isset($_SESSION['user_id'])){ header("Location: login.php"); exit(); }
$uid = $_SESSION['user_id'];
$user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE id='$uid'"));
?>
<div class="hero"><h1>الملف الشخصي</h1><p>أهلاً يا <?php echo $user['full_name']; ?></p></div>
<div class="container">
    <div class="card" style="max-width: 450px; margin: auto;">
        <h3>تعديل بياناتي</h3>
        <form method="POST">
            <input type="text" name="new_name" value="<?php echo $user['full_name']; ?>" style="width:100%; padding:10px; margin:10px 0;">
            <input type="email" name="new_email" value="<?php echo $user['email']; ?>" style="width:100%; padding:10px; margin:10px 0;">
            <button type="submit" name="update" class="btn">حفظ التغييرات</button>
        </form>
        <?php
        if(isset($_POST['update'])){
            $n = $_POST['new_name']; $e = $_POST['new_email'];
            if(mysqli_query($conn, "UPDATE users SET full_name='$n', email='$e' WHERE id='$uid'")){
                echo "<p style='color:green;'>تم تحديث البيانات!</p>";
                echo "<meta http-equiv='refresh' content='1'>";
            }
        }
        ?>
    </div>
</div>
<?php include 'includes/footer.php'; ?>