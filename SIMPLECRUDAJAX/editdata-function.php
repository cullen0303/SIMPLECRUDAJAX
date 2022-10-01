<?php
include 'dbcon.php';
error_reporting(0); // to hide the error because thge code is working but theres a error displayed
if(isset($_POST['idsend'])){
    $id = $_POST['idsend'];

    $stmnt = "SELECT * FROM `members` where id = ?";
    $stmnt = $conn -> prepare($stmnt);
    $stmnt-> bind_param('i',$id);
    $stmnt ->execute();
    $result = $stmnt ->get_result();

    while($row = $result ->fetch_assoc()){
        $display.='
                <div class="form-group">
                    <label for="">First Name</label>
                    <input type="text" class="form-control" id="updatefname" placeholder="Enter First Name" value="'.$row['fname'].'"  >
                 </div>
                 <div class="form-group">
                    <label for="">Last Name</label>
                    <input type="text" class="form-control" id="updatelname" placeholder="Enter Last Name" value="'.$row['lname'].'"  >
                  </div>
            <button type="submit" class="btn btn-primary" onclick="update('.$row['id'].')">Submit</button>
        
        ';
    }
    echo  $display;

}






                   



?>