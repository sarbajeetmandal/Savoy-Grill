
<?php
include "includes/dbh.inc.php";
include "header.php";
// session_start();
?>

<div class="container-fluid mt-md-5">
    <form  action="pin-point-user.php" method="POST">
       <div class="form-group">
           <label for="">User</label>
           <select class="custom-select" name="username" id="">
            
         
           <?php 
           
           $id= $_SESSION['user_id'];
            $sql="SELECT * FROM `users` where user_id='{$id}' ";
            $run=mysqli_query($conn,$sql);
            while($row=mysqli_fetch_assoc($run)){
           ?>
           <option value="<?php  echo $row["user_id"] ?>" selected><?php echo  $row["uidUsers"] ?> </option>
            <?php  }?>
           </select>
       </div>

       <div class="form-group">
           <label for="">Your Gaining point</label>
           <select class="custom-select"  id="">
            
         <?php
            if (isset($_SESSION['gain'])) {
                $gain=$_SESSION['gain'];
            }
            else{
                $gain=0;
            }
         ?>
           <option value="<?php  echo $gain ?>" selected><?php  echo $gain ?></option>
         
           </select>
       </div>
       <div class="form-group">
         <label for="">PIN</label>
         <input type="text"
           class="form-control" name="pin" id="pin" aria-describedby="helpId" placeholder="Enter pin here">
         <small id="helpId" class="form-text text-muted">pin must be in digits  ,Enter PIN without spaces </small>
       </div>
        <div class="form-group row">
            <div class="offset-sm-2 col-sm-10">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
</div>

<?php
include "footer.php";
?>