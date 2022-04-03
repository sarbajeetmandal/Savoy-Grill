<?php
session_start();
// Report all PHP errors
error_reporting(E_ALL);

if(isset($_POST['update'])){

        include('../config/db.php');

         $userNewName  =    $_POST['updateUserName'];
         $userNewEmail =    $_POST['userEmail'];
         $userImage    =   $_FILES['userImage'];

        if(!empty($userNewName) && !empty($userNewEmail)){

            
            
            $imageName = $userImage ['name'];
            $fileType  = $userImage['type'];
            $fileSize  = $userImage['size'];
            $fileTmpName = $userImage['tmp_name'];
            $fileError = $userImage['error'];

            $fileImageData = explode('/',$fileType);
            $fileExtension = $fileImageData[count($fileImageData)-1];

            
            if($fileExtension == 'jpg' || $fileExtension == 'png' || $fileExtension == 'jpeg'){
                //Process Image
                
                if($fileSize < 5000000){
                    //var_dump(basename($imageName));

                    $fileNewName = "../public/userImages/".$imageName;
                    
                    $uploaded = move_uploaded_file($fileTmpName,$fileNewName);
                    
                    if($uploaded){
                        $loggedInUser = $_SESSION['user_name'];
                        
                        $sql = "UPDATE users SET user_name = '$userNewName', email ='$userNewEmail', user_image='$imageName' WHERE user_name = '$loggedInUser'";

                        $results = mysqli_query($connection,$sql);

                        header('Location:../pages/userProfile.php?success=userUpdated');
                    exit;
                    }


                }else{
                    header('Location:../pages/userProfile.php?error=invalidFileSize');
                    exit;
                }
                exit;
            }else{
                header('Location:../pages/userProfile.php?error=invalidFileType');
                exit;
            }
            


        }else{
            header('Location:../pages/userProfile.php?error=emptyNameAndEmail');
            exit;
        }
        



}

?>