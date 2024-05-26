<!DOCTYPE html>
<html>
<head>
<title>My first PHP Website</title>
<link rel="stylesheet" href="stylelog.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>
<div class="login-container">

<a href="index.php" onclick="history.go(-1)">
        <i class="fas fa-arrow-left"></i>
    </a>
<h2>Login</h2>
<form action="checklogin.php" method="POST">
Enter Username: <input type="text" name="username"
required="required" /> <br/>
Enter password: <input type="password" name="password"
required="required" /> <br/>
<a style="text-decoration: none; color:gray" href="register.php">Don't have an account yet? Register now</a><br/><br/>

<button type="submit">Login</button> 
</form>
</div>
</body>
</html>