<?php
    include 'errors.php';
    $errors = array();
    $fid = $_GET['fid'];

   $db = mysqli_connect('localhost', 'root', '', 'major');
   $del = "DELETE FROM `food_tbl` WHERE fid = '$fid'";

   $rslt = mysqli_query($db, $del);
   header("location:service.php");
   
   array_push($errors, "Delete Successfull");



?>