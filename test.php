<?php
session_start();
print_r($_SESSION);
$fp = 'uploads/'.$_SESSION['rollno'].'.jpg';
echo (file_exists($fp));
unlink($fp);
echo (file_exists($fp));

?>