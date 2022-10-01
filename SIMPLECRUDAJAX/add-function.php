<?php
include 'dbcon.php';

if(isset($_POST['sendfname']) && isset($_POST['sendlname'])){
     $firstname = $_POST['sendfname'];
     $lastname = $_POST['sendlname'];

    $stmnt = "INSERT INTO `members`(`fname`, `lname`) VALUES ('$firstname','$lastname')";
    $stmnt = $conn -> prepare($stmnt);
    // $stmnt-> bind_param('',);
    $stmnt ->execute();

}









?>