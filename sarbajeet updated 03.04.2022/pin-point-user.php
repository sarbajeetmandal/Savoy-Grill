<?php
include "includes/dbh.inc.php";
  $pin=$_POST["pin"]; 
 $userID=$_POST["username"];
session_start();
 $sql="SELECT  *  FROM `users` WHERE user_id='{$userID}'";

 $run=mysqli_query($conn,$sql);

 $row=mysqli_fetch_assoc($run);
// print_r($row);
 if ($row["pin-point"] == $pin) {

if ($row["gain-point"] >= 1) {

if ($row["prev-pin-point"] == $pin) {

    echo "<script>
    alert('already gain by this pin')
    </script>";
   header("Refresh:1,url=Check-in-and-gain-points.php");

}
else{
   
    $gain = $row["gain-point"] +1;
    $sql="UPDATE `users`  SET  `gain-point`='{$gain}'  WHERE user_id='{$userID}'";

    $run=mysqli_query($conn,$sql);
   
    $sql_insert="UPDATE `users`  SET  `prev-pin-point`='{$pin}'  WHERE user_id='{$userID}' ";
    $run2=mysqli_query($conn,$sql_insert);
   if ($run2) {
    $sql="SELECT  *  FROM `users` WHERE user_id='{$userID}'";

 $run=mysqli_query($conn,$sql);

 $row=mysqli_fetch_assoc($run); 
 
$_SESSION["gain"]=$row["gain-point"];
   echo "<script>
   alert('gain is updated')
   </script>";
   
   header("Refresh:1,url=Check-in-and-gain-points.php");
   
       # code...
   }

}

   
}
else{



    $sql="UPDATE `users`  SET  `gain-point`='1'  WHERE user_id='{$userID}'";

    $run=mysqli_query($conn,$sql);
   
   
   if ($run) {
    $sql_insert="UPDATE `users`  SET  `prev-pin-point`='{$pin}'  WHERE user_id='{$userID}' ";
    $run2=mysqli_query($conn,$sql_insert);

    if ($run2) {
        
        $sql="SELECT  *  FROM `users` WHERE user_id='{$userID}'";

 $run=mysqli_query($conn,$sql);

 $row=mysqli_fetch_assoc($run); 
 
$_SESSION["gain"]=$row["gain-point"];
        echo "<script>
        alert('gain increase by 1')
        </script>";
   
        header("Refresh:1,url=Check-in-and-gain-points.php");
   
    }

    header("Refresh:1,url=Check-in-and-gain-points.php");
   
       # code...
   }
    
}
 
 }

// if ($run) {
// echo "<script>
// alert('pin is updated')
// </script>";

// header("Refresh:1,url=pin-point.php");

//     # code...
// }
 
 ?>