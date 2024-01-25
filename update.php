<?php
include 'connection.php';
session_start();
 $id = $_GET['id'];

//  $username = $_SESSION['username'];
//  if ($username == true) {
   
//  }else{
//     header('location:login.php');
//  }

$fetch = "SELECT * FROM `login_data` WHERE id = '$id'";
$result = mysqli_query($conn, $fetch);


$row = mysqli_fetch_assoc($result);
$language= $row['language'];
$language1 = explode(",",$language );


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update page</title>
    <link rel="stylesheet" href="register_style.css">
</head>

<body>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="container">
            <h2>Update page</h2>
            <div class="input_field">
    
                <label for="">Name:</label>
                <input type="text"  value="<?php echo $row['name'];?>" name="name" class="name" required><br><br>

                <label for="">Email:</label>
                <input type="email"  value="<?php echo $row['email'];?>" name="email" class="email" required><br><br>

                <label for="">Password:</label>
                <input type="password"  value="<?php echo $row['password'];?>" name="password" class="password" required><br><br>


                <label for=""> Cofirm Password:</label>
                <input type="password"  value="<?php echo $row['cpassword'];?>" name="cpassword" class="cpassword" required><br><br>

                <label for="">Address:</label>
                <input type="text"  value="<?php echo $row['address'];?>"  name="address" class="address" required><br><br>

                <label for="">Mobile Number:</label>
                <input type="number" value="<?php echo $row['number'];?>"  name="number" class="number" required><br><br>

                <label for="">DOB:</label>
                <input type="date"  value="<?php echo $row['dob'];?>" name="dob" class="dob" required><br><br>

                <label for="" class="">Gender: </label>
                <input type="radio" name="gender" value="male" class="male" required
                <?php
                     if ($row['gender']== "male") {
                        echo "checked";
                     }
                      ?>
                
                >Male
                <input type="radio" name="gender" value="female" class="Female" required
                <?php
                     if ($row['gender']== "female") {
                        echo "checked";
                     }
                      ?>
                >Female
                <input type="radio" name="gender" value="other" class="other" required
                <?php
                     if ($row['gender']== "other") {
                        echo "checked";
                     }
                      ?>
                
                >Other <br><br>

                <label for="">Language :</label>
                <input type="checkbox" name="language[]" class="language" value="Odia"
                <?php
                     if (in_array('Odia',$language1))
                      {
                        echo "checked";
                     }
                      ?>
                      >Odia
                <input type="checkbox" name="language[]" class="language" value="Hindi" 
                <?php
                     if (in_array('Hindi',$language1))
                      {
                        echo "checked";
                     }
                      ?>
                >Hindi
                <input type="checkbox" name="language[]" class="language" value="English" 
                <?php
                     if (in_array('English',$language1))
                      {
                        echo "checked";
                     }
                      ?>
                >English<br><br>

                <label for="" class="">Branch: </label>
                <select name="branch" class="selectbox" required>
                    <option value="mca" 
                    <?php
                       if ($row['branch'] == 'mca') {
                           echo "selected";
                       }
                    
                    ?>
                    
                    >MCA</option>
                    <option value="bca" 
                    <?php
                       if ($row['branch'] == 'bca') {
                           echo "selected";
                       }
                    
                    ?>
                    
                    >BCA</option>
                    <option value="btech"
                    <?php
                       if ($row['branch'] == 'btech') {
                           echo "selected";
                       }
                    
                    ?>
                    
                    >Btech</option>
                </select><br><br>

                <label for="">Comments :</label>
                <textarea name="comment"   class="comment" cols="30" rows="5" required><?php echo $row['comment'];?></textarea><br><br>

                <input type="submit" value="update" class="update">

            </div>
        </div>

    </form>
</body>

<?php


if ($_SERVER['REQUEST_METHOD'] == "POST") {

    // Form Data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $address = $_POST['address'];
    $number = $_POST['number'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $branch = $_POST['branch'];
    $comment = $_POST['comment'];
    $language = $_POST['language'];
    $language1 = implode(",",$language); // Language Array to String

    if ($name != "" && $email != "" && $password != "" && $cpassword != "" && $address != "" && $number != "" &&  $dob != "" &&  $gender != "" &&  $language1 != "" && $branch != "" && $comment != "") {

        // SQL Query
        $update = "UPDATE `login_data` SET name = '$name', email = '$email', password = '$password', cpassword = '$cpassword', address = '$address', number = '$number', dob = '$dob', gender = '$gender', language = '$language1', branch = '$branch', comment = '$comment' WHERE id = '$id'";

      
        // Check Result
        if ( mysqli_query($conn, $update)) {
            echo "<script>alert('Update successful')</script>";
            ?>
              <meta http-equiv="refresh" content="0; url = http://localhost/php_program/php_project/display.php" />
       <?php
        } else {
            echo "Connection failed." . mysqli_error($conn);
        }
     } else {
            echo "<script>alert('Fill the form first')</script>" ;
        }
    }

?>
