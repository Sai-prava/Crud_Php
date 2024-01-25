<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            background-color: pink;   
        }
        table{
            background-color: white;
        }
        .update{
            background-color: green;
            color: white;
            border-radius: 5px;
            padding: 5px;
            cursor: pointer;
            margin: 5px;
            border: none;
            width: 90% ;
            
        }   
        .delete{
            background-color: red;
            color: white;
            border-radius: 5px;
            padding: 5px;
            cursor: pointer;
            margin: 5px;
            border: none;
            width: 90% ;
            
        }
        .logout{
            background-color: blue;
            color: white;
            border-radius: 5px;
            padding: 10px;
            cursor: pointer;
            margin: 10px;
            border: none;
            width: 7%;
           
        }
        .text{
            color: black;
             
        }
    </style>
</head>
<body>
    
</body>
</html>




<?php

include 'connection.php';
$fetch = "SELECT * FROM `login_data`";
$result = mysqli_query($conn, $fetch);

if (!$result) {
    echo "Query failed" . mysqli_error($conn);
}
$num = mysqli_num_rows($result);
echo "<h3 class = text>Total Number of rows are : $num </h3> " ;
if ($num > 0) {
?>
<h2 align = "center" ><mark>Displaying all Data</mark></h2>
<center> <table border="3" cellspacing = "7" width= "100%" >
         <tr>
            <th>Id</th>
            <th>Image</th>
            <th>Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Confirm password</th>
            <th>Address</th>
            <th>Number</th>
            <th>DOB</th>
            <th>Gender</th>
            <th>Language</th>
            <th>Branch</th>
            <th>Comment</th>
            <th>Operation</th>

         </tr>



<?php
    while ($row = mysqli_fetch_assoc($result)) {
      echo "<tr>
      <td>".$row['id']."</td>
      <td><img src= '".$row['file']."' height='100px' width='100px'></td>
      <td>".$row['name']."</td>
      <td>".$row['email']."</td>
      <td>".$row['password']."</td>
      <td>".$row['cpassword']."</td>
      <td>".$row['address']."</td>
      <td>".$row['number']."</td>
      <td>".$row['dob']."</td>
      <td>".$row['gender']."</td>
      <td>".$row['language']."</td>
      <td>".$row['branch']."</td>
      <td>".$row['comment']."</td>
      <td><a href='update.php ? id=$row[id]'>
      <input type='submit' value='update' class = 'update'></a>

      <a href='delete.php ? id=$row[id]'>
      <input type='submit' value='delete' class = 'delete' onclick = 'return checkdelete()'></a>
      
      </td>
    
       
      
      </tr>";
    }
}
?>
</table>
</center>
<a href="logout.php"> <input type='submit' value='logout' class = 'logout'></a>
<script>
    function checkdelete(){
        return confirm("Are you sure you delete the data?");
    }

</script>


