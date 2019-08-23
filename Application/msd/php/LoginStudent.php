<?php
    session_start();
    include "../LoadClass.php";

    // Receive data from client
    $name = $_POST['name'];
    $password = $_POST['password'];

    // Debug
    echo "Name     : ".$name."<br>";
    echo "Password : ".$password."<br>";

    // Create student model
    $student = new Student();
    $student->setName($name);
    $student->setPassword(md5($name."".$password));

    // Create student controller
    $studentController = new StudentController();
    $students = $studentController->login($student);

    if(count($students) == 1) {
        $_SESSION['login_error'] = 0;
        $_SESSION['id'] = $students[0]->getId();
        $_SESSION['name'] = $students[0]->getName();
        $_SESSION['type'] = 'student';
        header("Location: ../StudentControlPanel.php");

    } else {
        $_SESSION['login_error'] = 1;
        header("Location: ../ContinueAsStudent.php");
    }

