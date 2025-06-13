<?php
session_start();
include "connection.php";

// Registration Form
if(isset($_POST['submit'])){
    $name = $_POST['uname'];
    $email = $_POST['uemail'];
    $pass = $_POST['upass'];
    $role = $_POST['role'];

    $query = mysqli_query($con, "SELECT Email FROM registration_form WHERE Email = '$email'");

    if(mysqli_num_rows($query) > 0){
        echo "<script>
        alert('Email id already exists');
        location.assign('form.php');
        </script>";
    } else {
        $myquery = mysqli_query($con, "INSERT INTO registration_form (Name, Email, Password, Role) VALUES ('$name', '$email', '$pass', '$role')");

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

    if(mysqli_num_rows($query) == 1){
        $data = mysqli_fetch_assoc($query);

        if($data['Status'] == 'verified'){
            if($data['Role'] == 'admin'){
                $_SESSION['admin'] = $data['Name'];
                echo "<script>
                alert('Login Successfully');
                location.assign('admin_panel/public.php?index');
                </script>";
            } else {
                $_SESSION['user_id'] = $data['Id'];
                $_SESSION['user_name'] = $data['Name'];
                echo "<script>
                alert('Login Successfully');
                location.assign('index.php');
                </script>";
            }
        } else {
            echo "<script>
            alert('Please verify first');
            location.assign('login.php');
            </script>";
        }
    } else {
        echo "<script>
        alert('Email or password is incorrect');
        location.assign('login.php');
        </script>";
    }
}

// Update data
if(isset($_POST['update'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $status = $_POST['status'];

    $query = mysqli_query($con, "UPDATE registration_form SET Name = '$name', Email = '$email', Password = '$pass', Status = '$status' WHERE Id = '$id'");

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

// Add Categories
if(isset($_POST['add_cat'])){
    $cat_name = $_POST['cat_name'];
    $imgname = $_FILES['cat_image']['name'];
    $imgsize = $_FILES['cat_image']['size'];
    $tmp_name = $_FILES['cat_image']['tmp_name'];
    $imgtype = pathinfo($imgname, PATHINFO_EXTENSION);
    $destination = "./image/".$imgname;

    if($imgsize <= 2000000){ // 2MB limit
        if(in_array($imgtype, ['png', 'jpg', 'jpeg'])){
            if(move_uploaded_file($tmp_name, $destination)){
                $query = mysqli_query($con, "INSERT INTO add_category(cat_name, cat_image) VALUES('$cat_name', '$imgname')");

                if($query){
                    echo "<script>
                    alert('Category Inserted Successfully');
                    location.assign('admin_panel/public.php?add_category');
                    </script>";
                }
            } else {
                echo "<script>
                alert('Image upload failed');
                </script>";
            }
        } else {
            echo "<script>
            alert('Only PNG, JPG, JPEG allowed');
            location.assign('admin_panel/public.php?add_category');
            </script>";
        }
    } else {
        echo "<script>
        alert('Image size should be less than or equal to 2MB');
        location.assign('admin_panel/public.php?add_category');
        </script>";
    }
}

// Update Categories Data
if(isset($_POST['cat-update'])){
    $id = $_POST['cat_id'];
    $name = $_POST['cat_name'];

    $query = mysqli_query($con, "UPDATE add_category SET cat_name = '$name' WHERE cat_id = '$id'");

    if($query){
        echo "<script>
        alert('Category Updated Successfully');
        location.assign('admin_panel/public.php?add_category');
        </script>";
    }
}

// Delete Categories Data
if(isset($_POST['cat-delete'])){
    $id = $_POST['cat_id'];

    $query = mysqli_query($con, "DELETE FROM add_category WHERE cat_id = '$id'");

    if($query){
        echo "<script>
        alert('Category Deleted Successfully');
        location.assign('admin_panel/public.php?add_category');
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

    if($imgsize <= 10000000){ // 2MB limit
        if(in_array($imgtype, ['png', 'jpg', 'jpeg'])){
            if(move_uploaded_file($tmp_name, $destination)){
                $query = mysqli_query($con, "INSERT INTO add_product(p_name, p_description, p_qty, p_price, cat_id, p_image) VALUES('$pname', '$pdescript', '$pqty', '$pprice', '$cat_id', '$imgname')");

                if($query){
                    echo "<script>
                    alert('Product Inserted Successfully');
                    location.assign('admin_panel/public.php?add_product');
                    </script>";
                }
            } else {
                echo "<script>
                alert('Image upload failed');
                </script>";
            }
        } else {
            echo "<script>
            alert('Only PNG, JPG, JPEG allowed');
            location.assign('admin_panel/public.php?add_product');
            </script>";
        }
    } else {
        echo "<script>
        alert('Image size should be less than or equal to 10MB');
        location.assign('admin_panel/public.php?add_product');
        </script>";
    }
}

// Update Product Data
if(isset($_POST['p-update'])){
    $id = $_POST['p_id'];
    $name = $_POST['p_name'];
    $descript = $_POST['p_descript'];
    $qty = $_POST['p_qty'];
    $price = $_POST['p_price'];

    $query = mysqli_query($con, "UPDATE add_product SET p_name = '$name', p_description = '$descript', p_qty = '$qty', p_price = '$price' WHERE p_id = '$id'");

    if($query){
        echo "<script>
        alert('Product Updated Successfully');
        location.assign('admin_panel/public.php?add_product');
        </script>";
    }
}

// Delete Product Data
if(isset($_POST['p-delete'])){
    $id = $_POST['p_id'];

    $query = mysqli_query($con, "DELETE FROM add_product WHERE p_id = '$id'");

    if($query){
        echo "<script>
        alert('Product Deleted Successfully');
        location.assign('admin_panel/public.php?add_product');
        </script>";
    }

}
// Add to Cart

if(isset($_POST['add_to_cart'])){
    $user_id = $_SESSION['user_id'];
    $product_id = $_POST['p_id'];
    $product_price = $_POST['p_price'];
    $product_qty = $_POST['p_qty'];

    $addtocart = mysqli_query($con, "INSERT INTO add_to_cart(user_id, product_id, product_price, product_qty)VAlUES('$user_id', '$product_id', '$product_price', '$product_qty')");

    if($addtocart){
        // echo "<script>
        // alert('Your data add in your cart');
        // </script>';
        header("Location:product-detail.php?id=.$product_id");
    }

}


?>
