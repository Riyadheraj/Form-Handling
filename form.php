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
    <h1 class="text-center mt-3">Registration Form</h1>

    <div class="container">
      <div class="row">
        <div class="col-8 mx-auto">
        <h6>Already have an account?<a href="login.php">Login</a></h6>
          <form action="code.php" method="post">
            <input type="text" placeholder="Enter Your Name" class="form-control mt-3" name="uname">
            <input type="email" placeholder="Enter Your Email" class="form-control mt-3" name="uemail">
            <input type="password" placeholder="Enter Your Password" class="form-control mt-3" name="upass">

            <select name="role" class="form-control mt-3">
            <option value="">Select Your Role</option>
            <option value="admin">Admin</option>
            <option value="user">User</option>
            </select>

            <button type="submit" class="btn btn-success mt-3" name="submit">Submit</button>
            <button type="view" class="btn btn-success mt-3" name="view"><a  style="color:white; text-decoration:none" href="view.php"  >View</a></button>
          </form>
        </div>
      </div>
    </div>

    

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>