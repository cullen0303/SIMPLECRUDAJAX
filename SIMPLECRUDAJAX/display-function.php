<?php
include 'dbcon.php';
error_reporting(0); // to hide the error because thge code is working but theres a error displayed
if(isset($_POST['displaysend'])){

    $stmnt = "SELECT * FROM `members`";
    $stmnt = $conn -> prepare($stmnt);
    // $stmnt-> bind_param('',);
    $stmnt ->execute();
    $result = $stmnt ->get_result();

    while($row = $result ->fetch_assoc()){
        $display.='
                    <tr>
                        <th>1</th>
                        <td>'.$row['fname'].'</td>
                        <td>'.$row['lname'].'</td>
                        <td>
                            <button type="button" class="btn btn-success" onclick="editdata('.$row['id'].')">Edit</button>
                            <button type="button" class="btn btn-danger" onclick="deletedata('.$row['id'].')">Delete</button>
                        </td>
                     </tr> 
        
        ';
    }
    echo  $display;

}






                   



?>