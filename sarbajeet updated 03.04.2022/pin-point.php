<?php
include "includes/dbh.inc.php";
include "header.php";
?>

<div class="container-fluid mt-md-5">
    <form  action="pin-php.php" method="POST">
       <div class="form-group">
           <label for="">User</label>
           <select class="custom-select" name="username" id="">
            
           <option selected>Select one</option>
           <?php 
            $sql="SELECT * FROM `users`";
            $run=mysqli_query($conn,$sql);
            while($row=mysqli_fetch_assoc($run)){
           ?>
           <option value="<?php  echo $row["user_id"] ?>"><?php echo  $row["uidUsers"] ?> </option>
            <?php  }?>
           </select>
       </div>

       <div class="form-group">
         <label for="">PIN</label>
         <input type="text"
           class="form-control" name="pin" id="pin" aria-describedby="helpId" placeholder="Enter pin here">
         <small id="helpId" class="form-text text-muted">pin must be in digits</small>
       </div>
        <div class="form-group row">
            <div class="offset-sm-2 col-sm-10">
                <button type="submit" class="btn btn-primary">Action</button>
            </div>
        </div>
    </form>
</div>

<?php
include "footer.php";
?>