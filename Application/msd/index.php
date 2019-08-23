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
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
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
                    <h3>About DonateMe</h3>
                    <p>GlobalGiving connects nonprofits, donors, and companies in nearly every country around the world. We help
                        local nonprofits access the funding, tools, training, and support they need to become more effective. </p>
                    <div class="row">
                        <div class="col-md-3"><a href="ContinueAsDonor.php" class="btn btn-success">Continue as donor</a></div>
                        <div class="col-md-3"><a href="ContinueAsStudent.php" class="btn btn-info">Continue as student</a></div>
                        <div class="col-md-3"><a href="ContinueAsAdmin.php" class="btn btn-danger">Continue as admin</a></div>
                    </div>
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