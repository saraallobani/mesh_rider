<?php
session_start();
session_unset();
session_destroy();
// توجيه المستخدم للصفحة الرئيسية بعد تسجيل الخروج
header("Location: index.php");
exit();
?>