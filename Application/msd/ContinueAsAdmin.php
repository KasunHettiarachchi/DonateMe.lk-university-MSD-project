<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>.:: Donate.lk ::.</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <script type="text/javascript">
        function validate() {
            var password = document.getElementById("password").value;
            var confirmPassword = document.getElementById("confirmPassword").value;
            if (password != confirmPassword) {
                alert("Passwords do not match.");
                return false;
            }
            return true;
        }
    </script>
</head>
<body class="container">
<div class="row jumbotron bg-dark text-white">
    <h1>Admin</h1>
</div>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="About.php">About</a>
        </li>
    </ul>
</nav>
<div class="row">
    <div class="col-md-4">

    </div>
    <div class="col-md-4">
        <form action="php/LoginAdmin.php" method="post">
            <table class="table">
                <tr class="btn-dark">
                    <td colspan="2">Sign In</td>
                </tr>
                <tr>
                    <td>User name</td>
                    <td><input type="text" name="name"></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="password"></td>
                </tr>
                <tr align="right">
                    <td colspan="2">
                        <input type="submit" class="btn btn-success" value="Login">
                    </td>
                </tr>
                <tr class="btn-dark">
                    <td colspan="2"></td>
                </tr>
            </table>
        </form>
    </div>
    <div class="col-md-4"></div>
</div>
<div class="row">
    <div class="col-md-12 blockquote-footer bg-dark text-white">
        <h6 align="center"> www.donateme.lk </h6>
    </div>
</div>
</body>
</html>