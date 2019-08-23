<?php
    session_start();
    include "../LoadClass.php";

    $studentId = $_POST['studentId'];
    $quantity = $_POST['quantity'];
    $itemId = $_POST['itemId'];
    $path = "";
    $state = "Pending";

    // Debug
    echo "Student Id : ".$studentId."<br>";
    echo "Quantity   : ".$quantity."<br>";
    echo "Item Id    : ".$itemId."<br>";


    // Upload file to the server
    if(isset($_FILES['letter'])){
        $errors= array();
        $file_name = $_FILES['letter']['name'];
        $file_size =$_FILES['letter']['size'];
        $file_tmp =$_FILES['letter']['tmp_name'];
        $file_type=$_FILES['letter']['type'];
        $file_ext=strtolower(end(explode('.',$_FILES['letter']['name'])));

        echo "File   : ".$file_name."<br>";

        $extensions= array("pdf","doc","docx");

        if(in_array($file_ext,$extensions)=== false){
            $errors[]="extension not allowed, please choose a JPEG or PNG file.";
        }

        if(empty($errors)==true){
            // Path to server
            $path = $_SESSION['pwd']."/data/letters/".$file_name;
            move_uploaded_file($file_tmp, $path);

            //Path to database
            $path = "data/letters/".$file_name;
        }else{
            print_r($errors);
        }
    }

    $request = new Request();
    $request->setStudentId($studentId);
    $request->setQuantity($quantity);
    $request->setItemId($itemId);
    $request->setState("Pending");
    $request->setLetterUrl($path);

    $requestController = new RequestController();
    $requestController->insert($request);

    header("Location: ../StudentControlPanel.php");

