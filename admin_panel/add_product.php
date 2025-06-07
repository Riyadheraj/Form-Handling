<?php
include "../connection.php";
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Products</title>
  </head>
  <body>
    <h1 class="text-center mt-3">Add Products</h1>

    <div class="container">
      <div class="row">
        <div class="col-8 mx-auto">
        
          <form action="../code.php" method="post" enctype="multipart/form-data">
            <input type="text" placeholder="Enter Product Name" name="p_name" class="form-control mt-3">
            <input type="text" placeholder="Enter Product Description" name="p_descript" class="form-control mt-3">
            <input type="number" placeholder="Enter Product Quantity" name="p_qty" class="form-control mt-3">
            <input type="text" placeholder="Enter Product Price" name= "p_price" class="form-control mt-3">

            <select name="cat_id" id="" class="form-control mt-3">
            <option value="">Select Category</option>

          <?php
          $query = mysqli_query($con, "SELECT * FROM add_category");

          foreach($query as $value){
            
         ?>

         <option value="<?php echo $value['cat_id']?>"><?php echo $value ['cat_name'] ?></option>

         <?php
          }
         ?>

            </select>
            <input type="file" name="p_image" class="form-control mt-3">
            <button type="submit" class="btn btn-success mt-3" name="add_product">Add Product</button>
          
          </form>

                    <h1 class="text-center mt-3">View Product</h1>
          <table class="table-bordered table-striped table-hover mt-3 table" border="2">
          <tr>
            <th>Product Id</th>
            <th>Product Name</th>
            <th>Product Description</th>
            <th>Product Quantity</th>
            <th>Product Price</th>
            <th>Product Image</th>
            <th colspan="2" class="text-center">Action</th>
            
          
          </tr>
          
          <?php
          include "../connection.php";
          $myquery = mysqli_query($con, "SELECT * FROM add_product");
          foreach($myquery as $value){
          ?>
          
            <tr>
              <td><?php echo $value['p_id']?></td>
              <td><?php echo $value['p_name']?></td>
              <td><?php echo $value['p_description']?></td>
              <td><?php echo $value['p_qty']?></td>
              <td><?php echo $value['p_price']?></td>
              <td><img src="../image/<?php echo $value['p_image']?>" alt="" width="100" height="100"></td>

              <!-- button trigger model(update) -->
              <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#p_update<?php echo $value['p_id'];?>"> Update</button></td>


               <!-- button trigger model(delete) -->
                <td><button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#p_delete<?php echo $value['p_id'];?>">Delete</button>
              </tr>

      <!-- Start Update Modal -->
 <div class="modal fade" id="p_update<?php echo $value['p_id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="../code.php" method="POST">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Products</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <input type="hidden" class="form-control mt-3" name= "p_id" value= "<?php echo $value['p_id'];?>">
        <input type="text" class="form-control mt-3" name= "p_name" value= "<?php echo $value['p_name'];?>">
        <input type="text" class="form-control mt-3" name= "p_descript" value= "<?php echo $value['p_description'];?>">
        <input type="text" class="form-control mt-3" name= "p_qty" value= "<?php echo $value['p_qty'];?>">
        <input type="text" class="form-control mt-3" name= "p_price" value= "<?php echo $value['p_price'];?>">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-warning" name="p-update">Update</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- End Update Modal -->



<!-- Start Delete Modal -->
<div class="modal fade" id="p_delete<?php echo $value['p_id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="../code.php" method="POST">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete Product</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input class="form-control mt-3" type="hidden" name="p_id" value="<?php echo $value['p_id']; ?>">
          Do you really want to delete this?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-danger" name="p-delete">Delete</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- End Delete Modal -->       
            <?php
            }
            ?>

            
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