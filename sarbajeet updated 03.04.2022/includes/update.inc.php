<?php
session_start();
require 'dbh.inc.php';
//between function.. elenxei an oi xaraktires einai mesa sta oria p thetoume
function between($val, $x, $y){
    $val_len = strlen($val);
    return ($val_len >= $x && $val_len <= $y)?TRUE:FALSE;
}

if(isset($_POST['signup-submit'])) {//elenxw an exei bei sti selida mesw tou submit

    
    
    
    $username = $_POST['uid'];
    $email = $_POST['mail'];
    $Address = $_POST['Address'];
    $phone = $_POST['phone'];

    // $password = $_POST['pwd'];
    // $passwordRepeat = $_POST['pwd-repeat'];
    
    $userName = mysqli_real_escape_string($conn,strip_tags($_POST['uid']));
        $userEmail = mysqli_real_escape_string($conn,strip_tags($_POST['mail']));
        $Address = mysqli_real_escape_string($conn,strip_tags($_POST['Address']));
        $phone = mysqli_real_escape_string($conn,strip_tags($_POST['phone']));
        // $userPassword = password_hash(mysqli_real_escape_string($conn,$_POST['pwd']), PASSWORD_DEFAULT);

    
    if(empty($username) || empty($email) || empty($phone) || empty($Address)) {
        header("Location: ../login1.php?error=emptyfields");
        exit();
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)){
        header("Location: ../login1.php?error=invalidemailusername");
        exit();  
    }
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../login1.php?error=invalidemail");
        exit();
    }
    else if(!preg_match("/^[a-zA-Z0-9]*$/", $username) || !between($username,4,20)) {
        header("Location: ../login1.php?error=invalidusername");
        exit();
    }
    
   else {
       
    
   
//    =--=======================================
    function check($conn,$userEmail)

    {
        $usid= $_SESSION["user_id"];
     
        $sql = "SELECT * FROM users WHERE user_id != {$usid}";
    
        //    $stmt = mysqli_stmt_init($conn);
        $stmt= mysqli_query($conn,$sql);

        $num_rows= mysqli_num_rows($stmt);
        if($num_rows > 0){
            while($row=mysqli_fetch_assoc($stmt)){
                if ($row["emailUsers"] == $userEmail) {
                    
                    return false;
                   
                    
                }
                else{
                    return true; 

                }
    
    
            }
    
           }
    
    }
// ======================================
       if(check($conn,$userEmail)){
        $usid= $_SESSION["user_id"];
$sql="UPDATE `users` SET `uidUsers`='{$userName}',`emailUsers`='{$userEmail}',`Address`='{$Address}',`phone`='{$phone}' WHERE user_id= '{$usid}'";

        // $sql = "INSERT INTO `users`(`uidUsers`, `emailUsers`, `pwdUsers`, `reg_date`, `role_id`, `Address`, `phone`)
        //     VALUES ('$userName','$userEmail','$userPassword',now(),'1','$Address','$phone')";
   
           $inserted = mysqli_query($conn,$sql);
   
                 if(!$inserted){
                    header("Location: ../login1.php?error=error2");
                    exit();
                }
                else {
                    // $hashedPwd = password_hash($password, PASSWORD_DEFAULT);    //encrypting password
                            
                            
                    // mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPwd);
                    // mysqli_stmt_execute($stmt);
                    header("Location: ../login1.php?update=success");
                    exit();
                }


       }
       else {

        header("Location: ../login1.php?error=emailexist");
        exit();
         // $sql = "INSERT INTO users(uidUsers,phone,Address, emailUsers, pwdUsers) VALUES(?, ?, ?,?,?)";
            // $stmt = mysqli_stmt_init($conn);
            
           


        // //    mysqli_stmt_bind_param($stmt, "ss", $username, $email);     //elenxos an uparxei email kai username idi
        // //    mysqli_stmt_execute($stmt);
        // //    mysqli_stmt_store_result($stmt);
        //    $resultCheck = mysqli_stmt_num_rows($stmt);
        //      if($resultCheck != 0){
        //         header("Location: ../login1.php?error=usernameemailtaken");
        //         exit();
        //    }
          
           
        //    else {
           
                
        //    }
           
       }
   } 
   //kleinw to connection
//    mysqli_stmt_close($stmt);
   mysqli_close($conn);
   
}
else{
    header("Location: ../login1.php");
    exit();
    
}