
<?php
session_start();
session_unset();
session_destroy();

header('Location: ../Admin page/login.php');
exit();
?>
