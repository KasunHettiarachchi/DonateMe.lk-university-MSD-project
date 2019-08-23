<?php
    include "../LoadClass.php";

    // Receive data from the client
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $password = $_POST['password'];

    // Debug
    echo "Name     : ".$name."<br>";
    echo "Email    : ".$email."<br>";
    echo "Address  : ".$address."<br>";
    echo "Password : ".$password."<br>";

    // Create donor model
    $donor = new Donor();
    $donor->setName($name);
    $donor->setEmail($email);
    $donor->setAddress($address);
    $donor->setPassword(md5($name."".$password));

    // Create donor controller
    $donorController = new DonorController();
    $donorController->insert($donor);

    header("Location: ../ContinueAsDonor.php");