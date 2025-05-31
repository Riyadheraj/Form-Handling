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
        echo "<script>
        alert('Login Successfully');
        location.assign('welcome.php');
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
}

// Add Categories

if(isset($_POST['add_cat'])){
    $cat_name = $_POST['cat_name'];
    
    $query = mysqli_query($con, "INSERT INTO add_category(cat_name)VALUES('$cat_name')");
    
    if($query){
        echo "<script>
        alert('Data Inserted Successfully');
        location.assign('admin_panel/public.php?add_category');
        </script>"; 
    }
}

// Add Products






?>