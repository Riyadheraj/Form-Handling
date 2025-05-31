<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Category</title>
  </head>
  <body>
        <h1 class="text-center mt-3">Category</h1>
        <div class="container">
      <div class="row">
        <div class="col-8 mx-auto">
          <form action="../code.php" method="post">
           <input type="text" class="form-control mt-3" name="cat_name" placeholder="Enter Category Name">
            <button type="submit" class="btn btn-success mt-3" name="add_cat">Add Category</button>
          </form>
          <h1 class="text-center mt-3">View Category</h1>
          <table class="table-bordered table-striped table-hover mt-3 table" border="2">
          <tr>
            <th>Category Id</th>
            <th>Category Name</th>
          
          </tr>
          
          <?php
          include "../connection.php";
          $myquery = mysqli_query($con, "SELECT * FROM add_category");
          foreach($myquery as $value){
          ?>
          
            <tr>
              <td><?php echo $value['cat_id']?></td>
              <td><?php echo $value['cat_name']?></td>
            </tr>       
            <?php
            }
            ?>

            
          </table>
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