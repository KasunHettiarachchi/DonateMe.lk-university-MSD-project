<?php
    include "../LoadClass.php";

    $itemId = $_POST['itemId'];

    $itemController = new ItemController();
    $itemController->approveItem($itemId);

    header("Location: ../AdminControlPanel.php");