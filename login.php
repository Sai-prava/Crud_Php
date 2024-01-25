<?php
 
 include 'connection.php';
 if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM `login_data` WHERE email = '$username' && password = '$password' ";

   $data = mysqli_query($conn,$query);

  $total = mysqli_num_rows($data);
  if ($total == 1) {
      $_SESSION['username'] = $username;
      $_SESSION['password'] = $password;
      header('location:display.php');
  }else{
    echo "login failed";
  }
 }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="" method="post">
        <div class="container">
             <h2>Login page</h2>
            <input type="email" placeholder="username" name="username" class="email"><br><br>
            <input type="password" name="password" class="password" placeholder="password"><br><br>
            <div class="forgetpass">
                <a href="" class="forgetpass" onclick="message()">forget password</a>
            </div>
            <input type="submit" value="login" name="login" class="login">
            <div class="signup">
                New member?
             <a href="register.php" class="signup">Signup here</a>   
            </div>
        </div>
    </form>
    <script>
        function message(){
            alert("remember again?");
        }
    </script>
</body>
</html>