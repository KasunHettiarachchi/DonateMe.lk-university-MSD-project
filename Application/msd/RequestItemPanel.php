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
        <h1>Request Panel</h1>
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
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <table class="table">
                <tr>
                    <td colspan="2" align="center">
                        <h3 align="center">Requested Item</h3>
                    </td>
                </tr>
                <tr class="bg-dark">
                    <td colspan="2"></td>
                </tr>
                <?php
                    $itemId = $_POST['itemId'];
                    $itemController = new ItemController();
                    $item = $itemController->getItemById($itemId);

                    echo "<tr><td colspan='2' align='center'><img class='rounded-circle' src='".$item->getImageUrl()."' style='width:200px;height:200px;'></td></tr>";
                    echo "<tr><th>Category</th><td>".$item->getCategory()."</td></tr>";
                    echo "<tr><th>Model</th><td>".$item->getModel()."</td></tr>";
                    echo "<tr><th>Description</th><td>".$item->getDescription()."</td></tr>";
                    echo "<tr><th>Quantity</th><td>".$item->getQuantity()."</td></tr>";
                    echo "<tr><th>Condition</th><td>".$item->getCondition()."</td></tr>";

                ?>
                <tr class="bg-dark">
                    <td colspan="2"></td>
                </tr>
                <form action="php/RequestItem.php" method="post" enctype="multipart/form-data">
                    <tr>
                        <td>Required quantity</td>
                        <td><input type="number" name="quantity" min="1" max="<?php echo $item->getQuantity(); ?>"></td>
                    </tr>
                    <tr>
                        <td>Confirmation Letter</td>
                        <td><input type="file" name="letter"></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="hidden" name="itemId" value="<?php echo $item->getId(); ?>">
                            <input type="hidden" name="studentId" value="<?php echo $_SESSION['id']; ?>">
                            <input type="submit" value="Submit" class="btn btn-success col-md-12">
                        </td>
                    </tr>
                </form>
            </table>
        </div>
        <div class="col-md-4"></div>
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