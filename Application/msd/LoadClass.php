<?php
/**
 * Created by PhpStorm.
 * User: roshan
 * Date: 12/22/17
 * Time: 6:09 PM
 */

$controller = 'system/controller/';
$model = 'system/model/';

// Load database
include 'system/database/DBConnection.php';

// Load models
include $model.'Donor.php';
include $model.'Student.php';
include $model.'Item.php';
include $model.'Request.php';
include $model.'Admin.php';


// Load controllers
include $controller.'DonorController.php';
include $controller.'StudentController.php';
include $controller.'ItemController.php';
include $controller.'RequestController.php';
include $controller.'AdminController.php';