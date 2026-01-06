<?php
session_start();
unset($_SESSION['s_name']);
echo "<script>location.replace('./3team_webpage.php')</script>";
?>