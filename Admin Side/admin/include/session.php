<?php
session_start();
if($_SESSION['type']!="admin"){
  header('location:logout.php?logout');
}
?>