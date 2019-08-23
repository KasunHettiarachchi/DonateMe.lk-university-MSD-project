<?php
    session_start();
    include "../LoadClass.php";

    // Receive data from client
    $name = $_POST['name'];
    $password = $_POST['password'];

    // Debug
    echo "Name     : ".$name."<br>";
    echo "Password : ".$password."<br>";

    // Create donor model
    $donor = new Donor();
    $donor->setName($name);
    $donor->setPassword(md5($name."".$password));

    // Create donor controller
    $donorController = new DonorController();
    $donors = $donorController->login($donor);

    if(count($donors) == 1) {
        $_SESSION['login_error'] = 0;
        $_SESSION['id'] = $donors[0]->getId();
        $_SESSION['name'] = $donors[0]->getName();
        $_SESSION['type'] = 'donor';
        header("Location: ../DonorControlPanel.php");

    } else {
        $_SESSION['login_error'] = 1;
        header("Location: ../ContinueAsDonor.php");
    }

