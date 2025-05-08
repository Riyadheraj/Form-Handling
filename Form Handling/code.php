<?php
include "connection.php";


if(isset($_POST['submit'])){
    $name = $_POST['uname'];
    $email = $_POST['uemail'];
    $pass = $_POST['upass'];
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
    $myquery = mysqli_query($con, "INSERT INTO registration_form (Name, Email, Password) VALUES ('$name', '$email', '$pass')");

    if($myquery){
        echo "<script>
        alert('Data Inserted Successfully');
        location.assign('form.php');
        </script>";
    }
}
}

?>