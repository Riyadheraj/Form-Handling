<?php

include "../connection.php";

$search_value = $_POST['student_name'];
$query = mysqli_query($con, "SELECT * FROM registration_form WHERE Name LIKE '%$search_value%'");

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

    <?php
    
}
?>