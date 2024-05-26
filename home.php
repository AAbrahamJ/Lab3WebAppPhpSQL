<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <style>
        <?php
        session_start(); //starts the session
        if($_SESSION['user']){ // checks if the user is logged in
        }
        else{
            header("location: index.php"); // redirects if user is not logged in
        }
        $user = $_SESSION['user']; //assigns user value
        ?>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #e4e4e4; /* Dark gray background */
            color: #333; /* Light gray text color */
        }
        h2 {
            text-align: center;
            color: ##333; /* Light gray text color */
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #424242; /* Dark gray table background */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        th, td {
            border: 1px solid #555; /* Medium gray border */
            padding: 8px; /* Reduced padding */
            text-align: center;
            color: #f5f5f5; /* Light gray text color */
        }
        th {
            background-color: #616161; /* Medium dark gray header background */
        }
        tr {
            background-color: ##404040; 
        }
        form {
            margin-top: 20px;
            text-align: center;
        }
        input[type="text"], input[type="checkbox"], input[type="submit"] {
            margin-bottom: 10px;
            padding: 12px; /* Increased padding */
            border: 1px solid #555; /* Medium gray border */
            border-radius: 6px;
            box-sizing: border-box;
            transition: border-color 0.3s ease;
            font-size: 16px;
            background-color: #757575; /* Dark gray input background */
            color: #f5f5f5; /* Light gray text color */
        }
        input[type="text"]:focus, input[type="checkbox"]:focus, input[type="submit"]:focus {
            border-color: #90caf9; /* Light blue border color on focus */
        }
        a {
            text-decoration: none;
            color: #90caf9; /* Light blue link color */
            transition: color 0.3s ease;
        }
        a:hover {
            text-decoration: underline;
            color: #64b5f6; /* Slightly darker blue on hover */
        }
    </style>
</head>
<body>
    <h2>Home Page</h2>
    <p style="font-size: 35px; padding-left: 30px; padding-bootom: 50px ">Hello <br><strong style="font-size: 55px; padding-left: 34px; line-height: 5px"><?php Print "$user"?>!</strong></p>
    <a  style="position: absolute;top: 8px; right: 16px; font-size: 20px; color:gray" href="logout.php">Click here to logout</a>
    <form action="add.php" method="POST">
        <label for="details">Add more to list:</label> <br>
        <input style="background-color: white; color: black" type="text" name="details" id="details">
        <br>
        <label for="public">Public post?</label>
        <input type="checkbox" name="public[]" value="yes" id="public">
        <br>
        <input type="submit" value="Add to list">
    </form>
    <h2>My list</h2>
    <table>
        <tr>
            <th>Id</th>
            <th>Details</th>
            <th>Post Time</th>
            <th>Edit Time</th>
            <th>Edit</th>
            <th>Delete</th>
            <th>Public Post</th>
        </tr>
        <?php
        $servername = "localhost";
        $username_db = "root";
        $password_db = "";
        $db_name = "first_db";
        
        // Create connection
        $conn = mysqli_connect($servername, $username_db, $password_db, $db_name);
        
        // Check connection
        
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        
        }
        $query = mysqli_query($conn, "Select * from list_tbl"); //SQL Query
        while($row = mysqli_fetch_array($query)) //Display all the rows from query
        {
        
            
            Print "<tr>";
            Print "<td>".$row['id']."</td>";
            Print "<td>".$row['details']."</td>";
            Print "<td>".$row['date_posted']. "-". $row['time_posted']."</td>";
            Print "<td>".$row['date_edited']. "-". $row['time_edited']."</td>";
            Print '<td><a href="edit.php?id=' . $row['id'] . '">edit</a></td>';
            Print "<td><a href='#' onclick='myFunction(".$row['id'].")'>delete</a></td>";
            Print "<td>".$row['public']."</td>";
            Print "</tr>";
        }
        ?>
    </table>
    <script>
        function myFunction(id) {
            var r = confirm("Are you sure you want to delete this record?");
            if (r == true) {
                window.location.assign("delete.php?id=" + id);
            }
        }
    </script>
</body>
</html>
