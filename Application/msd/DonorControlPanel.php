<?php
    session_start();

    // Validate session
    if(isset($_SESSION['id']) and isset($_SESSION['type'])) {
        if($_SESSION['type'] != 'donor') {
            header("Location: ../ContinueAsDonor.php");
        }
    } else {
        header("Location: ../ContinueAsDonor.php");
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
        <h1>Donor Control Panel</h1>
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
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <h3 align="center">Donate</h3>
            <form action="php/DonateItem.php" method="post" enctype="multipart/form-data">
                <table class="table">
                    <tr class="btn-dark">
                        <td colspan="2">

                        </td>
                    </tr>
                    <tr>
                        <td>Category</td>
                        <td>
                            <select name="category">
                                <option value="Shoes">Shoes</option>
                                <option value="Clothes">Clothes</option>
                                <option value="Bags">Bags</option>
                                <option value="Books">Books</option>
                                <option value="Notes">Notes</option>
                                <option value="Accessories">Accessories</option>
                                <option value="Others">Others</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Model</td>
                        <td><input type="text" name="model"></td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td><input type="text" name="description"></td>
                    </tr>
                    <tr>
                        <td>Quantity</td>
                        <td><input type="number" name="quantity" min="0"></td>
                    </tr>
                    <tr>
                        <td>Condition</td>
                        <td>
                            <select name="condition">
                                <option value="Used">Used</option>
                                <option value="New">New</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Upload Image</td>
                        <td><input type="file" name="image"></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="right">
                            <input type="hidden" value="<?php echo $_SESSION['id']; ?>" name="donorId">
                            <input type="submit" value="Submit" class="btn btn-success" name="submit">
                        </td>
                    </tr>
                    <tr class="btn-dark">
                        <td colspan="2">

                        </td>
                    </tr>
                </table>
            </form>
        </div>
        <div class="col-md-1">

        </div>
        <div class="col-md-2"></div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <?php

                $itemController = new ItemController();
                $items = $itemController->getItemsByDonorId($_SESSION['id']);

                if(count($items) > 0) {
                    echo '<h3 align="center">Donation Summary</h3>';
                    echo '<table class="table">';
                    echo '<tr class="btn-dark">';
                    echo '<td colspan="7"></td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<th>Category</th>';
                    echo '<th>Model</th>';
                    echo '<th>Description</th>';
                    echo '<th>Quantity</th>';
                    echo '<th>Condition</th>';
                    echo '<th>Status</th>';
                    echo '<th>Image</th>';
                    echo '</tr>';
                        foreach ($items as $item) {
                            echo '<tr>';
                            echo "<td>".$item->getCategory()."</td>";
                            echo "<td>".$item->getModel()."</td>";
                            echo "<td>".$item->getDescription()."</td>";
                            echo "<td>".$item->getQuantity()."</td>";
                            echo "<td>".$item->getCondition()."</td>";
                            if($item->getState() == 'Pending') {
                                echo "<td><a class='btn btn-info text-white'>".$item->getState()."</a></td>";
                            } elseif ($item->getState() == 'Approved') {
                                echo "<td><a class='btn btn-success text-white'>".$item->getState()."</a></td>";
                            } elseif ($item->getState() == 'Rejected') {
                                echo "<td><a class='btn btn-danger text-white'>".$item->getState()."</a></td>";
                            } else {
                                echo "<td><a class='btn btn-info text-white'>".$item->getState()."</a></td>";
                            }

                            echo "<td><img class='rounded-circle' src='".$item->getImageUrl()."' style='width:50px;height:50px;'></td>";
                            echo '</tr>';
                        }
                    echo '</table>';
                }
            ?>
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