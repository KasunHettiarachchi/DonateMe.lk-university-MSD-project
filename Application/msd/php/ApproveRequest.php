<?php
    include "../LoadClass.php";

    $requestId = $_POST['requestId'];

    $requestController = new RequestController();
    $itemController = new ItemController();

    $requestController->approveRequest($requestId);
    $request = $requestController->getRequestById($requestId);

    $item = $itemController->getItemById($request->getItemId());
    $newQuantity = $item->getQuantity() - $request->getQuantity();

    $itemController->updateQuantity($request->getItemId(), $newQuantity);

    header("Location: ../AdminControlPanel.php");