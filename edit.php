<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My first PHP website</title>
    <link rel="stylesheet" href="styledit.css">
</head>
<?php
session_start(); //starts the session
if(!$_SESSION['user']) { //checks if user is logged in
    header("location:index.php"); // redirects if user is not logged in
    exit; // exit to prevent further execution
}
$user = $_SESSION['user']; //assigns user value
$id_exists = false;
?>

<body>
    <h2>Edit Data</h2>
    <p style="font-size: 25px; padding-left: 30px;">Hello <?php print "$user"; ?>!</p>
    <p style="font-size: 20px; padding-left: 33px; line-height: 0.5px">You can Edit your data here.</p>
    <a style="position: absolute;top: 0px; right: 16px; font-size: 20px; color:gray" href="logout.php">Click here to logout</a><br/><br/>
    <a style="position: absolute;top: 20px; right: 16px; font-size: 20px; color:gray" href="home.php">Return to Home page</a>
    <h2 class="selected-title">Currently Selected</h2>
    <table class="selected-table">
        <tr>
            <th>Id</th>
            <th>Details</th>
            <th>Post Time</th>
            <th>Edit Time</th>
            <th>Public Post</th>
        </tr>
        <?php
        if(!empty($_GET['id'])) {
            $id = $_GET['id'];
            $_SESSION['id'] = $id;
            $id_exists = true;
            $servername = "localhost";
            $username_db = "root";
            $password_db = "";
            $db_name = "first_db";
            // Create connection
            $conn = mysqli_connect($servername, $username_db, $password_db, $db_name);
            // Check the connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            $query = mysqli_query($conn,"SELECT * FROM list_tbl WHERE id='$id'"); // SQL Query
            $count = mysqli_num_rows($query);
            if($count > 0) {
                while($row = mysqli_fetch_array($query)) {
                    Print "<tr>";
                    Print "<td>". $row['id'] . "</td>";
                    Print "<td>". $row['details'] . "</td>";
                    // Fetching time in Philippines timezone
                    date_default_timezone_set('Asia/Manila');
                    $post_time = date("F d, Y - H:i:s", strtotime($row['date_posted'] . ' ' . $row['time_posted']));
                    $edit_time = date("F d, Y - H:i:s", strtotime($row['date_edited'] . ' ' . $row['time_edited']));
                    Print "<td>". $post_time . "</td>";
                    Print "<td>". $edit_time . "</td>";
                    Print "<td>". $row['public']. "</td>";
                    Print "</tr>";
                }
            } else {
                $id_exists = false;
            }
        }
        ?>
    </table>
    <br/>
    <?php
    if($id_exists) {
        Print '
        <form action="edit.php" method="POST">
            <label for="details">Enter new detail:</label>
            <input  type="text" name="details" id="details"/><br/>
            <label for="public">Public post?</label>
            <input type="checkbox" name="public[]" value="yes" id="public"/><br/>
            <input type="submit" value="Update List"/>
        </form>
        ';
    } else {
        Print '<h2 class="no-data">There is no data to be edited.</h2>';
    }
    ?>
</body>
</html>

<?php
if($_SERVER['REQUEST_METHOD'] == "POST") {
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
    $details = mysqli_real_escape_string($conn, $_POST['details']);
    $public = "no";
    $id = $_SESSION['id'];

    // Fetching time in Philippines timezone
    date_default_timezone_set('Asia/Manila');
    $time = date("H:i:s");
    $date = date("F d, Y");
    
    foreach($_POST['public'] as $list) {
        if($list != null) {
            $public = "yes";
        }
    }

    mysqli_query($conn,"UPDATE list_tbl SET details='$details', public='$public', date_edited='$date', time_edited='$time' WHERE id='$id'");
    header("location: home.php");
    exit; // Exit to prevent further execution
}
?>
