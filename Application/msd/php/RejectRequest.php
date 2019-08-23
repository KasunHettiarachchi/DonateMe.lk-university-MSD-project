<?php
    include "../LoadClass.php";

    $requestId = $_POST['requestId'];

    $requestController = new RequestController();
    $requestController->rejectRequest($requestId);

    header("Location: ../AdminControlPanel.php");