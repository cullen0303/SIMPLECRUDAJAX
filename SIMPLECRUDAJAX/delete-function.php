<?php
include 'dbcon.php';

if(isset($_POST['idsend'])){

     $id = $_POST['idsend'];
     

    $stmnt = "DELETE FROM `members` WHERE id = ?";
    $stmnt = $conn -> prepare($stmnt);
     $stmnt-> bind_param('i', $id);
    $stmnt ->execute();

}









?>