<?php
include 'dbcon.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMPLECRUDAJAX</title>
    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <h1 style="text-align:center">SIMPLECRUDAJAX</h1>
    <!-- <button type="button" class="btn btn-primary">Add</button> -->
    <div class="container">
        <div class ="row">
            <div class ="col-md-6">
                <center><h4>Add Member</h4></center>
                <form>
                        <div class="form-group">
                            <label for="exampleInputEmail1">First Name</label>
                            <input type="text" class="form-control" id="fname" placeholder="Enter First Name" >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Last Name</label>
                            <input type="text" class="form-control" id="lname" placeholder="Enter Last Name"  >
                        </div>
                        <button type="submit" class="btn btn-primary" onclick="add()">Submit</button>
                </form>
            </div>
            <div class ="col-md-6">
            <center><h4>All Members</h4></center>
                <table class="table my-3">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Firstname</th>
                    <th scope="col">Lastname</th>
                    <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody  id="display">
                    
                </tbody>
                </table>


            </div>
        </div>
        <div class="row">
             <div class ="col-md-6">
             <center><h4>Edit Member Information</h4></center>
                <form>
                    <div id="editdata">
                        
                    </div>
                </form>
             </div>
        </div>
    </div>
    






    <!-- JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



    <script>
          $(document).ready(function(){
            display();
        });
        function add(){ //this is for adding data to database
            var firstname = $('#fname').val();
            var lastname = $('#lname').val();
        $.ajax({
            url:"add-function.php",
            method:'POST',
            data:{
                sendfname:firstname,
                sendlname:lastname

            },
            success:function(data){
                display();
            }
        });
        }
        
      
        function display(){ //this is for displaying the data from database
            var display = "true";
            $.ajax({
                url:"display-function.php",
                method:'POST',
                data:{
                    displaysend:display
                },
                success:function(data){
                    console.log(data);
                    $('#display').html(data);
                }
            });
        }

        function deletedata(id){
            $.ajax({
                url:"delete-function.php",
                method:'POST',
                data:{
                    idsend:id
                },
                success:function(data){
                    display();
                   
                }
            });
        }


        
        function editdata(id){ 
           
            $.ajax({
                url:"editdata-function.php",
                method:'POST',
                data:{
                    idsend:id
                },
                success:function(data){
                    console.log(data);
                    $('#editdata').html(data);
                }
            });
        }

        function update(id){
            var firstname = $('#updatefname').val();
            var lastname = $('#updatelname').val();
        $.ajax({
            url:"update-function.php",
            method:'POST',
            data:{
                sendid:id,
                sendfname:firstname,
                sendlname:lastname

            },
            success:function(data){
                display();
            }
        }); 
        }
    </script>
   
</body>
</html>