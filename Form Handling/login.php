<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Form</title>
  </head>
  <body>
    <h1 class="text-center mt-3">Login Form</h1>

    <div class="container">
      <div class="row">
        <div class="col-8 mx-auto">
            <h6>Create an account?<a href="form.php">Register</a></h6>
          <form action="code.php" method="post">
           
            <input type="email" placeholder="Enter Your Email" class="form-control mt-3" name="uemail">
            <input type="password" placeholder="Enter Your Password" class="form-control mt-3" name="upass">

            <button type="submit" class="btn btn-success mt-3" name="login">Login</button>
            
          </form>
      </div>
    </div>

    

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>