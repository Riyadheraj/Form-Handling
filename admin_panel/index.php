<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Index page</title>
  </head>
  <body>
    
        <h1 class="text-center mt-3">User's Data</h1>

<div class="container">
  <div class="row">
    <div class="col-8 mx-auto">
    <button class="btn btn-danger"><a href= "../form.php" style = "color:white; text-decoration:none;" >Add User</a></button>
    <table class="table-bordered table-striped table-hover mt-3 table" border= "2">
    <tr>
    <th>Id</th>
    <th>Name</th>
    <th>Email</th>
    <th>Password</th>
    <th>Status</th>
    <th colspan="2" class="text-center">Action</th>

  <?php
  include "../connection.php";

 $query  = mysqli_query($con, "SELECT * FROM registration_form");
 foreach($query as $value){
  ?>
                
     <tr>
     <td><?php echo $value['Id'];?></td>
     <td><?php echo $value['Name'];?></td>
     <td><?php echo $value['Email'];?></td>
     <td><?php echo $value['Password'];?></td>
     <td><?php echo $value['Status'];?></td>

     <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#update<?php echo $value['Id'];?>"> Update</button></td>

     <td><button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#Delete<?php echo $value['Id'];?>">Delete</button>
    </td>
    </tr> 

<!-- Start Update Modal -->
 <div class="modal fade" id="update<?php echo $value['Id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="code.php" method="POST">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update User Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <input type="hidden" class="form-control mt-3" name= "id" value= "<?php echo $value['Id'];?>">
        <input type="text" class="form-control mt-3" name= "name" value= "<?php echo $value['Name'];?>">
        <input type="email" class="form-control mt-3" name= "email" value= "<?php echo $value['Email'];?>">
        <input type="text" class="form-control mt-3" name= "pass" value= "<?php echo $value['Password'];?>">
        <input type="text" class="form-control mt-3" name= "status" value= "<?php echo $value['Status'];?>">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-warning" name="update">Update</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- End Update Modal -->



<!-- Start Delete Modal -->
<div class="modal fade" id="Delete<?php echo $value['Id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="code.php" method="POST">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete Data</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="id" value="<?php echo $value['Id']; ?>">
          Do you really want to delete this?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-danger" name="delete">Delete</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- End Delete Modal -->

<?php

}
?>
</tr>
</table>
</div>
</div>
</div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
   
  </body>
</html>
           