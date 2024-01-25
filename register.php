<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register page</title>
    <link rel="stylesheet" href="register_style.css">
</head>

<body>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="container">
            <h2>Registration page</h2>
            <div class="input_field">
            <label for="" class="">File Upload: </label>
           <input type="file" name="file" id=""><br><br>

                <label for="">Name:</label>
                <input type="text" name="name" class="name"><br><br>

                <label for="">Email:</label>
                <input type="email" name="email" class="email"><br><br>

                <label for="">Password:</label>
                <input type="password" name="password" class="password"><br><br>


                <label for=""> Cofirm Password:</label>
                <input type="password" name="cpassword" class="cpassword"><br><br>

                <label for="">Address:</label>
                <input type="text" name="address" class="address"><br><br>

                <label for="">Mobile Number:</label>
                <input type="number" name="number" class="number"><br><br>

                <label for="">DOB:</label>
                <input type="date" name="dob" class="dob"><br><br>

                <label for="" class="">Gender: </label>
                <input type="radio" name="gender" value="male" class="male">Male
                <input type="radio" name="gender" value="female" class="Female">Female
                <input type="radio" name="gender" value="other" class="other">Other <br><br>

                <label for="">Language :</label>
                <input type="checkbox" name="language[]" class="language" value="Odia">Odia
                <input type="checkbox" name="language[]" class="language" value="Hindi">Hindi
                <input type="checkbox" name="language[]" class="language" value="English">English<br><br>

                <label for="" class="">Branch: </label>
                <select name="branch" class="selectbox">
                    <option value="mca">MCA</option>
                    <option value="bca">BCA</option>
                    <option value="btech">Btech</option>
                </select><br><br>

                <label for="">Comments :</label>
                <textarea name="comment" class="comment" cols="30" rows="5"></textarea><br><br>

                <input type="submit" value="submit" class="submit">

            </div>
        </div>

    </form>
</body>

<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    if (isset($_FILES["file"])) {
        $filename = $_FILES["file"]["name"];
        $filesize = $_FILES["file"]["size"];
        $tempname = $_FILES["file"]["tmp_name"];
        $filetype = $_FILES["file"]["type"];
        $folder = "images/" . $filename;
    
        // Move the uploaded file to the specified folder
        if (move_uploaded_file($tempname, $folder)) {
            // echo "<img src = '$folder' height = '100px' width = '100px'>";
        } 
    } else {
        echo "No file uploaded.";
    }

    // Language Array to String
    $language = implode(',', $_POST['language']);
    

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

    if ($name != "" && $email != "" && $password != "" && $cpassword != "" && $address != "" && $number != "" &&  $dob != "" &&  $gender != "" &&  $language != "" && $branch != "" && $comment != "") {

        // SQL Query
        $insert = "INSERT INTO `login_data` (`file`, `name`, `email`, `password`, `cpassword`, `address`, `number`, `dob`, `gender`, `language`, `branch`, `comment`) 
             VALUES ('$folder', '$name', '$email', '$password', '$cpassword', '$address', '$number', '$dob', '$gender', '$language', '$branch', '$comment');";

        // Execute Query
        $data = mysqli_query($conn, $insert);

        // Check Result
        if ($data) {
            echo "<script>alert('Insert successful')</script>";
        } else {
            echo "<script>alert('Failed')</script>" . mysqli_errno($conn);
        }
    }
}
?>