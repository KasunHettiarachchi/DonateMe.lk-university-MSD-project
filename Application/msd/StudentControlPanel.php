<?php
    session_start();

    // Validate session
    if(isset($_SESSION['id']) and isset($_SESSION['type'])) {
        if($_SESSION['type'] != 'student') {
            header("Location: ../ContinueAsStudent.php");
        }
    } else {
        header("Location: ../ContinueAsStudent.php");
    }

    $search = "";
    if(isset($_POST['category'])) {
        $search = $_POST['category'];
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
        <h1>Student Control Panel</h1>
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
            <h3 align="center">Inventory</h3>
        </div>
    </div>
    <div class="row" align="right">
        <form action="StudentControlPanel.php" method="post">
                <select name="category">
                    <option value="">--</option>
                    <option value="Shoes">Shoes</option>
                    <option value="Clothes">Clothes</option>
                    <option value="Bags">Bags</option>
                    <option value="Books">Books</option>
                    <option value="Notes">Notes</option>
                    <option value="Accessories">Accessories</option>
                    <option value="Others">Others</option>
                </select>
                <input type="submit" value="Search" class="btn btn-info">
        </form>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <tr>
                    <th>Category</th>
                    <th>Model</th>
                    <th>Description</th>
                    <th>Quantity</th>
                    <th>Condition</th>
                    <th>Image</th>
                    <th></th>
                </tr>
                <?php
                    $items = array();
                    $itemController = new ItemController();
                    if(isset($search)) {
                        $items = $itemController->getItemsByCategory($search);
                    } else {
                        $items = $itemController->getItemsByCategory("");
                    }

                    foreach ($items as $item) {
                        echo '<tr>';
                        echo "<td>".$item->getCategory()."</td>";
                        echo "<td>".$item->getModel()."</td>";
                        echo "<td>".$item->getDescription()."</td>";
                        echo "<td>".$item->getQuantity()."</td>";
                        echo "<td>".$item->getCondition()."</td>";
                        echo "<td><img class='rounded-circle' src='".$item->getImageUrl()."' style='width:50px;height:50px;'></td>";
                        ?>

                        <form action="RequestItemPanel.php" method="post">
                            <td><input type="hidden" name="itemId" value="<?php echo $item->getId(); ?>"></td>
                            <td><input type="submit" value="Request" class="btn btn-success"></td>
                        </form>

                        <?php
                        echo '</tr>';
                    }
                ?>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h3 align="center">Request History</h3>
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
                    <th></th>
                </tr>
                <?php
                    $requests = array();
                    $requestController = new RequestController();
                    $itemController = new ItemController();

                    $requests = $requestController->getRequestByStudentId($_SESSION['id']);
                    foreach ($requests as $request) {
                        echo "<tr>";
                        $item = $itemController->getItemById($request->getItemId());
                        echo "<td>".$item->getCategory()."</td>";
                        echo "<td>".$item->getModel()."</td>";
                        echo "<td>".$item->getDescription()."</td>";
                        echo "<td>".$request->getQuantity()."</td>";
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