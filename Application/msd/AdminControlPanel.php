<?php
    session_start();

    // Validate session
    if(isset($_SESSION['id']) and isset($_SESSION['type'])) {
        if($_SESSION['type'] != 'admin') {
            header("Location: ../ContinueAsAdmin.php");
        }
    } else {
        header("Location: ../ContinueAsAdmin.php");
    }

    include "LoadClass.php";
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>.:: Donate.lk ::.</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container">
<div class="row jumbotron bg-dark text-white">
    <h1>Admin Control Panel</h1>
</div>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="About.php">About</a>
        </li>
    </ul>
</nav>
<div class="row">
    <div class="col-md-12">
        <h3 align="center">Donations</h3>
        <table class="table">
            <tr class="btn-dark">
                <td colspan="7"></td>
            </tr>
            <tr>
                <th>Category</th>
                <th>Model</th>
                <th>Description</th>
                <th>Quantity</th>
                <th>Image</th>
                <th>Decision</th>
            </tr>
            <?php

            $itemController = new ItemController();
            $items = $itemController->getPendingItems();

            if(count($items) > 0) {
                foreach ($items as $item) {
                    echo '<tr>';
                    echo "<td>".$item->getCategory()."</td>";
                    echo "<td>".$item->getModel()."</td>";
                    echo "<td>".$item->getDescription()."</td>";
                    echo "<td>".$item->getQuantity()."</td>";
                    echo "<td><img class='rounded-circle' src='".$item->getImageUrl()."' style='width:50px;height:50px;'></td>";
                    ?>

                    <td>
                        <div class="row">
                            <div class="col-md-8">
                                <form action="php/ApproveItem.php" method="post">
                                    <input type="hidden" value="<?php echo $item->getId(); ?>" name="itemId">
                                    <input type="submit" value="Accept" class="btn btn-success col-md-12">
                                </form>
                            </div>
                            <div class="col-md-4">
                                <form action="php/RejectItem.php" method="post">
                                    <input type="hidden" value="<?php echo $item->getId(); ?>" name="itemId">
                                    <input type="submit" value="Reject" class="btn btn-danger col-md-12">
                                </form>
                            </div>
                        </div>

                    </td>
                    <?php
                    echo '</tr>';
                }
                echo '</table>';
            }
            ?>
        </table>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <h3 align="center">Requests</h3>
        <table class="table">
            <tr>
                <th>Category</th>
                <th>Model</th>
                <th>Description</th>
                <th>Quantity</th>
                <th>Condition</th>
                <th>State</th>
                <th>Attachment</th>
                <th>Image</th>
                <th>Decision</th>
                <th></th>
            </tr>
            <?php
            $requests = array();
            $requestController = new RequestController();
            $itemController = new ItemController();

            $requests = $requestController->getPendingRequests();
            foreach ($requests as $request) {
                echo "<tr>";
                $item = $itemController->getItemById($request->getItemId());
                echo "<td>".$item->getCategory()."</td>";
                echo "<td>".$item->getModel()."</td>";
                echo "<td>".$item->getDescription()."</td>";
                echo "<td>".$item->getQuantity()."</td>";
                echo "<td>".$item->getCondition()."</td>";

                if($request->getState() == 'Pending') {
                    echo "<td><a class='btn btn-info text-white'>".$request->getState()."</a></td>";
                } elseif ($request->getState() == 'Approved') {
                    echo "<td><a class='btn btn-success text-white'>".$request->getState()."</a></td>";
                } elseif ($request->getState() == 'Rejected') {
                    echo "<td><a class='btn btn-danger text-white'>".$request->getState()."</a></td>";
                } else {
                    echo "<td><a class='btn btn-info text-white'>".$request->getState()."</a></td>";
                }

                echo "<td><a href='".$request->getLetterUrl()."' class='btn btn-success'>Download</a></td>";
                echo "<td><img class='rounded-circle' src='".$item->getImageUrl()."' style='width:50px;height:50px;'></td>";
                ?>
                <td>
                    <div class="row">
                        <div class="col-md-6">
                            <form action="php/ApproveRequest.php" method="post">
                                <input type="hidden" value="<?php echo $request->getId(); ?>" name="requestId">
                                <input type="submit" value="Accept" class="btn btn-success col-md-12">
                            </form>
                        </div>
                        <div class="col-md-6">
                            <form action="php/RejectRequest.php" method="post">
                                <input type="hidden" value="<?php echo $request->getId(); ?>" name="requestId">
                                <input type="submit" value="Reject" class="btn btn-danger col-md-12">
                            </form>
                        </div>
                    </div>

                </td>
                <?php
                echo "</tr>";
            }
            ?>
        </table>
    </div>
</div>
<div class="row">
    <div class="col-md-2 bg-dark">
        <a href="php/Logout.php" class="btn btn-danger"><?php echo "Logout ".$_SESSION['name']; ?></a>
    </div>
    <div class="col-md-10 blockquote-footer bg-dark text-white">
        <h6 align="center"> www.donateme.lk </h6>
    </div>
</div>
</body>
</html>