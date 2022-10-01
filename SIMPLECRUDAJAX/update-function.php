<?php
include 'dbcon.php';

if(isset($_POST['sendfname']) && isset($_POST['sendlname']) && isset($_POST['sendid'])){
     $firstname = $_POST['sendfname'];
     $lastname = $_POST['sendlname'];
     $id = $_POST['sendid'];
    
    $stmnt = "UPDATE `members` SET `fname`=?,`lname`=? WHERE id = ?";
    
    $stmnt = $conn -> prepare($stmnt);
     $stmnt-> bind_param('ssi',$firstname , $lastname, $id);
    $stmnt ->execute();

}









?>