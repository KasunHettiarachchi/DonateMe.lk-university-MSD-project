<?php
/**
 * Created by PhpStorm.
 * User: roshan
 * Date: 12/24/17
 * Time: 4:00 PM
 */

class AdminController
{
    private $connection;

    function __construct() {
        $this->connection = new DBConnection();
    }

    public function login(Admin $admin){
        $query = "SELECT `id`, `name`, `password` FROM `admin` WHERE `name`='".$admin->getName()."' AND `password`='".$admin->getPassword()."'";
        $admins = array();
        $this->connection->openConnection();
        if($result = $this->connection->executeRawQuery($query)) {
            while($row = $result->fetch_array()){
                $admin = new Admin;
                $admin->setId($row['id']);
                $admin->setName($row['name']);
                $admin->setPassword($row['password']);
                $admins[] = $admin;
            }
        }
        $this->connection->closeConnection();
        return $admins;
    }

}