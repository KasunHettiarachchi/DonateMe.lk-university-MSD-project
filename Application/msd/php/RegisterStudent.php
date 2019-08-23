<?php
    include "../LoadClass.php";

     // Receive data from client
     $name = $_POST["name"];
     $gender = $_POST["gender"];
     $address = $_POST["address"];
     $school = $_POST["school"];
     $password = $_POST["password"];


    // Debug
    echo "Name     : ".$name."<br>";
    echo "Gender   : ".$gender."<br>";
    echo "Address  : ".$address."<br>";
    echo "School   : ".$school."<br>";
    echo "Password : ".$password."<br>";

    // Create student model
    $student = new Student();
    $student->setName($name);
    $student->setGender($gender);
    $student->setAddress($address);
    $student->setSchool($school);
    $student->setPassword(md5($name."".$password));


    // Create student controller
    $studentController = new StudentController();
    $studentController->insert($student);

    header("Location: ../ContinueAsStudent.php");
