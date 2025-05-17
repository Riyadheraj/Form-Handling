<?php

$con = mysqli_connect("localhost", "root", "", "aptech_images");

// if($con){
//     echo "db connected";
// }

if(isset($_POST['upload'])){
    // echo "<pre>";
    // var_dump($_FILES['image']);
    // print_r($_FILES['image']);
    // echo "</pre>";

    $image_name = $_FILES['image']['name'];
     $image_type = $_FILES['image']['type'];
      $image_size = $_FILES['image']['size'];
       $tmp_name = $_FILES['image']['tmp_name'];

    //    echo $image_name;

    $destination = "image/". $image_name;

    if(move_uploaded_file($tmp_name, $destination)){

        if($image_type == 'jpg' || 'png' || 'jpeg'){

            if($image_size <= 1000000){

    
        $query = mysqli_query($con, "INSERT INTO image_uploading(image)VALUES('$image_name')");

        if($query){
            echo "<script>
            alert('Image uploaded');
            location.assign('image_uploading.php');
            </script>";
        }
    }
    else{
        echo "<script>
            alert('file size should be less than or equal to 2MB');
            location.assign('image_uploading.php');
            </script>";
    }

    }
    else{
        echo "<script>
            alert('Only allow jpg, png, jpeg, format');
            location.assign('image_uploading.php');
            </script>";
    }
}
    else{
          echo "<script>
            alert('Image not uploaded');
            location.assign('image_uploading.php');
            </script>";
    }
}
?>