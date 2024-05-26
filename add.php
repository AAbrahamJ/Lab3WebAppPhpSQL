<?php
session_start();
if (!$_SESSION['user']) {
    header("location:index.php");
    exit; // Exit to prevent further execution
}

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

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $details = mysqli_real_escape_string($conn, $_POST['details']);

    // Set the timezone to the device's timezone
    date_default_timezone_set('Asia/Manila'); // Replace 'your_timezone_here' with the desired timezone, e.g., 'America/New_York'

    $time = date("H:i:s"); //time
    $date = date("F, d, Y"); //date
    $decision = "no";

    foreach ($_POST['public'] as &$each_check) { //gets the data from the checkbox
        if ($each_check != null) { //checks if checkbox is checked
            $decision = "yes"; // sets the value
        }
    }

    mysqli_query($conn, "INSERT INTO list_tbl(details, date_posted, time_posted, public) VALUES ('$details','$date','$time','$decision')"); //SQL query
    header("location:home.php");
    exit; // Exit to prevent further execution
} else {
    header("location:home.php");
    exit; // Exit to prevent further execution
}
?>
