<?php
session_start();
$_SESSION["pwd"] = getcwd();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>.:: Donate.lk ::.</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
</head>
<body class="container">
<div class="row">
    <div class="jumbotron bg-dark text-white col-md-12">
        <h1 align="center">DonateMe.lk</h1>
    </div>
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
    <div class="jumbotron col-md-12">
        <div class="row">
            <div class="col-md-3">
                <img src="data/images/logo/DonateMe.png" style="width:250px;height:250px;">
            </div>
            <div class="col-md-9">
                <h3>About Us</h3>
                <p>150071M H.D.R.Chamara</p>
                <p>150214G K.M.S.S.Hemachandra</p>
                <p>150225G K.S.S.Hettiarachchi</p>
                <p>150519V P.A.T.Rasanga</p>
                <p>150606K N.D.Solangarachchi</p>

            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 blockquote-footer bg-dark text-white">
        <h6 align="center"> www.donateme.lk </h6>
    </div>
</div>
</body>
</html>