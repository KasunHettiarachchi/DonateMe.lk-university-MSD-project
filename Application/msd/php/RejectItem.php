<?php
    include "../LoadClass.php";

    $itemId = $_POST['itemId'];

    $itemController = new ItemController();
    $itemController->rejectItem($itemId);

    header("Location: ../AdminControlPanel.php");