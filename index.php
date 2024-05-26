<!DOCTYPE html>
<html>
<head>
<title>My first PHP Website</title>
<link rel="stylesheet" href="stylex.css">

</head>
<body>
  
<?php
echo "<h2>My First PHP Website</h2>";
?>

<center><button onclick="document.location='login.php'">Click here to login</button></center> <br>
<center><button onclick="document.location='register.php'">Click here to Register</button></center> <br>


<h2 align="center">User's Posts</h2>
<table>
<tr>
<th>Id</th>
<th>Details</th>
<th>Post Time</th>
<th>Edit Time</th>
</tr>

<?php
$servername = "localhost";
$username_db = "root";
$password_db = "";
$db_name = "first_db";
// Create connection
$conn = mysqli_connect($servername, $username_db, $password_db,$db_name);

// Check connection
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}

$query = mysqli_query($conn, "SELECT * FROM `list_tbl` WHERE `public` = 'yes'"); //SQL Query

while($row = mysqli_fetch_array($query)) //Display all the rows from query
{
Print "<tr>";
Print "<td>".$row['id']."</td>";
Print "<td>".$row['details']."</td>";
Print "<td>".$row['date_posted']. "-

".$row['time_posted']."</td>";

Print "<td>".$row['date_edited']. "-

".$row['time_edited']."</td>";
Print "</tr>";
}
?>
</table>
</body>
</html>