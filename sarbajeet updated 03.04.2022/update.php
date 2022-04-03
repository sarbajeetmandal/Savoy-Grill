<?php
session_start();
require 'includes/dbh.inc.php';

require 'header.php';
$usid= $_SESSION["user_id"];
     
        $sql = "SELECT * FROM users WHERE user_id = {$usid}";
    
        //    $stmt = mysqli_stmt_init($conn);
        $stmt= mysqli_query($conn,$sql);

        $num_rows= mysqli_num_rows($stmt);
     
        if($num_rows > 0){
            $row=mysqli_fetch_assoc($stmt);
    
           }
?>

<div class="signup-form mt-md-5 mt-lg-5 mb-md-4 mb-lg-4">

                        <form action="includes/update.inc.php" method="post">
                            <p class="hint-text">Create your account. It's free and only takes a minute.</p>
                            <div class="form-group">
                                    <input type="text" class="form-control" name="uid" placeholder="Username" value="<?php echo $row["uidUsers"] ?>" required="required">
                                    <small class="form-text text-muted">Username must be 4-20 characters long</small>
                            </div>
                            <div class="form-group">
                                    <input type="email" class="form-control" name="mail" value="<?php echo $row["emailUsers"] ?>" placeholder="Email" required="required">
                            </div>
                            <div class="form-group">
                                    <input type="Address" value="<?php echo $row["Address"] ?>" class="form-control" name="Address" placeholder="Address" required="required">
                            </div>
                            <div class="form-group">
                                    <input type="text" value="<?php echo $row["phonex"] ?>" class="form-control" name="phone" placeholder="phone" required="required">
                            </div>
                            <!-- <div class="form-group">
                                <input type="password" class="form-control" name="pwd" placeholder="Password" required="required">
                                <small class="form-text text-muted">Password must be 6-20 characters long</small>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="pwd-repeat" placeholder="Confirm Password" required="required">
                            </div>         -->
                            <div class="form-group">
                                <label class="checkbox-inline"><input type="checkbox" required="required"> I accept the <a href="#">Terms of Use</a> &amp; <a href="#">Privacy Policy</a></label>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="signup-submit" class="btn btn-dark btn-lg btn-block">UPDATE Now</button>
                            </div>
                        </form>
                            <!-- <div class="text-center">Already have an account? <a href="#">Sign in</a></div> -->
                    </div>  
                </div>        


                <?php

require 'footer.php';

?>
