<?php
session_start();
 include '../connect.php';
 include_once 'check.php';

$user_id = $_SESSION['user_id'];
if(!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])){
    header('Location: ../logout.php');
}

   include 'head.php';
?>
<?php include_once 'nav.php'; ?><br><br>
<br>
<br><br>
<body class="w3-container" >

