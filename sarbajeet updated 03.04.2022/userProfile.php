<?php
session_start();
require 'includes/dbh.inc.php';

require 'header.php';


if(isset($_SESSION['user_id']) ){
    
    
 $_SESSION['user_id'];

    $user = $_SESSION['user_id'];
    $role = $_SESSION['role'];
    
    //rolos pelati
    if($role==1){
    // $sql = "SELECT * FROM reservation WHERE user_fk = $user";
 $sql = "SELECT * FROM `users` WHERE user_id = '{$user}'";
    $result = mysqli_query($conn,$sql);
    if (mysqli_num_rows($result) > 0) {
        
        
        echo
        ' <div style="text-align:center;" class="mt-md-3 mt-lg-3">
          <h3> User Details</h3>
         </div>  
            <table class="table  mt-md-5 mt-lg-5  mb-md-5 mb-lg-5 table-hover table-bordered table-striped table-responsive-sm text-center">
           
            <thead>
                    <tr>
                        <th scope="col">Full Name</th>
                        <th scope="col">Reservation Date</th>
                        <th scope="col">Email</th>
                        <th scope="col">Address</th>
                        <th scope="col">Telephone</th>
                        <th scope="col">Update</th>
                        
                    </tr>
                </thead> ';
        while($row = $result->fetch_assoc()) {
        echo"
                <tbody>
                    <tr>
                
                    <input name='reserv_id' type='hidden' value=".$row["user_id"].">
                      <th scope='row'>".$row["uidUsers"]." </th>
                      <th scope='row'>".$row["reg_date"]." </th>
                      <td>".$row["emailUsers"]."</td>
                      <td>".$row["Address"]."</td>
                      <td>".$row["phone"]."</td>
                     
                      <td><a href='update.php?id=".$row["user_id"]."' class='btn btn-danger btn-sm'>update</a></td>
                         
                    </tr>
              </tbody>";
            
        }   
        echo "</table>";
    
    
    }
    else {    echo "<p class='text-white text-center bg-danger'>Your reservation list is empty!<p>"; }
    }
    
    
    //rolos upeuthinou 
    
    else if($role==2){
    $sql = "SELECT * FROM reservation";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        
        
        echo
        '
            <table class="table table-hover table-responsive-sm text-center">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Full Name</th>
                        <th scope="col">Guests</th>
                        <th scope="col">Tables</th>
                        <th scope="col">Reservation Date</th>
                        <th scope="col">Time Zone</th>
                        <th scope="col">Telephone</th>
                        <th scope="col">Register Date</th>
                        <th scope="col">Comments</th>
                        <th class="table-danger" scope="col"></th>
                    </tr>
                </thead> ';
        while($row = $result->fetch_assoc()) {
        echo"
                <tbody>
                    <tr>
                    <form action='includes/delete.php' method='POST'>
                      <input name='reserv_id' type='hidden' value=".$row["reserv_id"].">
                      <th scope='row'>".$row["reserv_id"]."</th> 
                      <td>".$row["f_name"]." ".$row["l_name"]."</td>
                      <td>".$row["num_guests"]."</td>
                      <td>".$row["num_tables"]."</td>
                      <td>".$row["rdate"]."</td>
                      <td>".$row["time_zone"]."</td>
                      <td>".$row["telephone"]."</td>
                      <td>".$row["reg_date"]."</td>
                      <td><textarea readonly>".$row["comment"]."</textarea></td>
                      <td class='table-danger'><button type='submit' name='delete-submit' class='btn btn-danger btn-sm'>Cancel</button></td>
                          </form>
                    </tr>
              </tbody>";
            
        }   
        echo "</table>";
    
     
    }
    else {    echo "<p class='text-white text-center bg-danger'>Your reservation list is empty!<p>"; }
    
    }
    
    require 'footer.php';

mysqli_close($conn);
}


