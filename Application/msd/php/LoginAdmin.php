<?php
    session_start();
    include "../LoadClass.php";

    $name = $_POST['name'];
    $password = $_POST['password'];

    // Debug
    echo "Name     : ".$name."<br>";
    echo "Password : ".$password."<br>";

    // Create donor model
    $admin = new Admin();
    $admin->setName($name);
    $admin->setPassword(md5($name."".$password));

    // Create donor controller
    $donorController = new AdminController();
    $admins = $donorController->login($admin);

    if(count($admins) == 1) {
        $_SESSION['login_error'] = 0;
        $_SESSION['id'] = $admins[0]->getId();
        $_SESSION['name'] = $admins[0]->getName();
        $_SESSION['type'] = 'admin';

        header("Location: ../AdminControlPanel.php");

    } else {
        $_SESSION['login_error'] = 1;
        header("Location: ../ContinueAsAdmin.php");
    }
