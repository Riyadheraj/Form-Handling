<?php
session_start();
include "connection.php";

// Registration Form
if(isset($_POST['submit'])){
    $name = $_POST['uname'];
    $email = $_POST['uemail'];
    $pass = $_POST['upass'];
     $role = $_POST['role'];
    // echo $name, $email, $pass;

    $query = mysqli_query($con, "SELECT Email FROM registration_form where Email = '$email'");

// echo mysqli_num_rows($query);

if(mysqli_num_rows($query)>0){
    echo "<script>
    alert('Email id already exist');
    location.assign('form.php');
    </script>";
}
else{
    $myquery = mysqli_query($con, "INSERT INTO registration_form (Name, Email ,Password, Role) VALUES ('$name', '$email', '$pass', '$role')");

    if($myquery){
        echo "<script>
        alert('Data Inserted Successfully');
        location.assign('form.php');
        </script>"; 
    }
}
}


// Login Form

if(isset($_POST['login'])){
    $email = $_POST['uemail'];
    $pass = $_POST['upass'];

    $query = mysqli_query($con, "SELECT * FROM registration_form WHERE Email = '$email' AND Password = '$pass'");

    if (mysqli_num_rows($query) ==1){

        $data = mysqli_fetch_assoc($query);

        // echo $data ['role'];

        if($data['Status'] == 'verified'){
            if($data['Role'] == 'admin'){ 

                // create session
                $_SESSION['admin'] = $data ['Name'];

            echo "<script>
        alert('Login Successfully');
        location.assign('admin_panel/public.php?index');
        </script>"; 
       }

        else{
              // create session
                $_SESSION['user_id'] = $data ['Id'];
        echo "<script>
        alert('Login Successfully');
        location.assign('index.php');
        </script>";
            }
        }
            else{
        echo "<script>                                                        
        alert('Please verify first');
        location.assign('login.php');
        </script>";
        }

       
    }
  else{
    echo "<script>
    alert('Email id or password is incorrect');
    location.assign('login.php');
    </script>";

}
}

// Update data

if(isset($_POST['update'])){
    $id = $_POST ['id'];
    $name = $_POST ['name'];
    $email = $_POST ['email'];
    $pass = $_POST ['pass'];
    $status = $_POST ['status'];    

    $query = mysqli_query($con, "UPDATE registration_form SET Name = '$name', Email = '$email', Password = '$pass', Status = '$status' WHERE Id = '$id' ");

      if($query){
        echo "<script>
        alert('Data Updated Successfully');
        location.assign('view.php');
        </script>"; 
    }
    
}
// Delete Data
if(isset($_POST['delete'])){
    $id = $_POST['id'];

    $query = mysqli_query($con, "DELETE FROM registration_form WHERE Id = '$id'");

    if($query){
        echo "<script>
        alert('Data Deleted Successfully');
        location.assign('view.php');
        </script>"; 
    }
    
}

// Update Categories Data

if(isset($_POST['cat_update'])){
    $id = $_POST ['catid'];
    $name = $_POST ['catname'];
    
    $query = mysqli_query($con, "UPDATE add_category SET cat_name = '$name' WHERE cat_id = '$id'");

      if($query){
        echo "<script>
        alert('Categories Updated Successfully');
        location.assign('admin_panel/public.php?add_category');
        </script>"; 
    }


}



// Add Categories

if(isset($_POST['add_cat'])){
    $cat_name = $_POST['cat_name'];
    $imgname = $_FILES['cat_image']['name'];
    $imgsize = $_FILES['cat_image']['size'];
    $tmp_name = $_FILES['cat_image']['tmp_name'];
    $imgtype = pathinfo($imgname, PATHINFO_EXTENSION);
    $destination = "./image/".$imgname;

    if($imgsize <= 10000000){
        if($imgtype == 'png' || $imgtype == 'jpg' || $imgtype == 'jpeg'){
            if(move_uploaded_file($tmp_name, $destination)){
 $query = mysqli_query($con, "INSERT INTO add_category(cat_name,cat_image)VALUES('$cat_name' $cat)");
    
    if($query){
        echo "<script>
       location.assign('admin_panel/public.php?add_category');
         alert('Data Inserted Successfully');
        </script>"; 
    } 
                  
    }
    else{
                echo "<script>
        alert('Product Inserted Not Successfully');
       
        </script>";
    }

        }
        else{
        echo "<script>
        alert('Only allow png , jpg, or jpeg images');
        location.assign('admin_panel/public.php?add_product');
        </script>"; 
        }

    }
    else{
      echo  "<script>
        alert('Image size should be less than or equal to 2MB');
        location.assign('admin_panel/public.php?add_product');
        </script>"; 
    }
    
   
}

// Add Product

if(isset($_POST['add_product'])){
    $pname = $_POST['p_name'];
    $pdescript = $_POST['p_descript'];
    $pqty = $_POST['p_qty'];
    $pprice = $_POST['p_price'];
    $cat_id = $_POST['cat_id'];

    $imgname = $_FILES['p_image']['name'];
    $imgsize = $_FILES['p_image']['size'];
    $tmp_name = $_FILES['p_image']['tmp_name'];
    $imgtype = pathinfo($imgname, PATHINFO_EXTENSION);
    $destination = "./image/".$imgname;

    if($imgsize <= 10000000){
        if($imgtype == 'png' || $imgtype == 'jpg' || $imgtype == 'jpeg'){
            if(move_uploaded_file($tmp_name, $destination)){
                $query = mysqli_query($con, "INSERT INTO add_product(p_name, p_description, p_qty, p_price, cat_id, p_image)VALUES('$pname', '$pdescript', '$pqty', '$pprice', '$cat_id', '$imgname')");
    
    if($query){
        echo "<script>
        alert('Product Inserted Successfully');
          location.assign('admin_panel/public.php?add_product');
        </script>"; 
    }               
    }
    else{
                echo "<script>
        alert('Product Inserted Not Successfully');
       
        </script>";
    }

        }
        else{
        echo "<script>
        alert('Only allow png , jpg, or jpeg images');
        location.assign('admin_panel/public.php?add_product');
        </script>"; 
        }

    }
    else{
      echo  "<script>
        alert('Image size should be less than or equal to 2MB');
        location.assign('admin_panel/public.php?add_product');
        </script>"; 
    }
}

?>