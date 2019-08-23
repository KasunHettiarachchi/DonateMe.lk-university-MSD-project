<?php
    session_start();
    include "../LoadClass.php";

    // Receive data from the client
    $category = $_POST['category'];
    $model = $_POST['model'];
    $description = $_POST['description'];
    $quantity = $_POST['quantity'];
    $condition = $_POST['condition'];
    $donorId = $_POST['donorId'];
    $path = "";

    // Upload file to the server
    if(isset($_FILES['image'])){
        $errors= array();
        $file_name = $_FILES['image']['name'];
        $file_size =$_FILES['image']['size'];
        $file_tmp =$_FILES['image']['tmp_name'];
        $file_type=$_FILES['image']['type'];
        $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));

        $extensions= array("jpeg","jpg","png");

        if(in_array($file_ext,$extensions)=== false){
            $errors[]="extension not allowed, please choose a JPEG or PNG file.";
        }

        if($file_size > 2097152){
            $errors[]='File size must be excately 2 MB';
        }

        if(empty($errors)==true){
            // Path to server
            $path = $_SESSION['pwd']."/data/images/".$file_name;
            move_uploaded_file($file_tmp, $path);

            //Path to database
            $path = "data/images/".$file_name;
        }else{
            print_r($errors);
        }
    }

    // Debug
    echo "Category    : ".$category."<br>";
    echo "Model       : ".$model."<br>";
    echo "Description : ".$description."<br>";
    echo "Quantity    : ".$quantity."<br>";
    echo "Condition   : ".$condition."<br>";
    echo "Donor ID    : ".$donorId."<br>";
    echo "Target      : ".$path."<br>";

    // Create item model
    $item = new Item();
    $item->setCategory($category);
    $item->setModel($model);
    $item->setDescription($description);
    $item->setQuantity($quantity);
    $item->setState("Pending");
    $item->setCondition($condition);
    $item->setDonorId($donorId);
    $item->setImageUrl($path);

    // Create item controller
    $itemController = new ItemController();
    $itemController->insert($item);

    header("Location: ../DonorControlPanel.php");






