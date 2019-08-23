<?php

/**
 * Created by PhpStorm.
 * User: roshan
 * Date: 12/22/17
 * Time: 6:17 PM
 */

    session_start();
    $targetFolder = $_SESSION["pwd"]."/data/letters";
    echo $targetFolder;

    $targetFolder = $targetFolder . basename( $_FILES['file']['name']) ;

    if(move_uploaded_file($_FILES['file']['tmp_name'], $targetFolder)) {
        echo "The file ". basename( $_FILES['file']['name']). " is uploaded";
    }

    else {
        echo "Problem uploading file";
    }

