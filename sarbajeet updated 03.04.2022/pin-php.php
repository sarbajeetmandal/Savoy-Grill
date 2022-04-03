<?php
include "includes/dbh.inc.php";
  $pin=$_POST["pin"]; 
 $userID=$_POST["username"];

 $sql="UPDATE `users`  SET  `pin-point`='{$pin}'  WHERE user_id='{$userID}'";

 $run=mysqli_query($conn,$sql);


if ($run) {
echo "<script>
alert('pin is updated')
</script>";

header("Refresh:1,url=pin-point.php");

    # code...
}
 
 ?>