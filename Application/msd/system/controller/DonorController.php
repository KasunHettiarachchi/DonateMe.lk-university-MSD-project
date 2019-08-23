<?php

class DonorController {
    /*
     *  class: DonorController
     *  purpose: Control Donor model
     *
     */

    private $connection;

    function __construct() {
        $this->connection = new DBConnection();
    }

    public function insert(Donor $donor) {
        $stmt = $this->connection->openConnection()->prepare("INSERT INTO `donor`(`name`, `email`, `address`, `password`) VALUES (?,?,?,?)");
        $stmt->bind_param("ssss", $donor->getName(), $donor->getEmail(), $donor->getAddress(), $donor->getPassword());
        $stmt->execute();
        $stmt->close();
        $this->connection->closeConnection();
    }

    public function login(Donor $donor) {
        $query = "SELECT `id`, `name`, `email`, `address`, `password` FROM `donor` WHERE `name`='".$donor->getName()."' AND `password`='".$donor->getPassword()."'";
        $donors = array();
        $this->connection->openConnection();
        if($result = $this->connection->executeRawQuery($query)) {
            while($row = $result->fetch_array()){
                $donor = new Donor();
                $donor->setId($row['id']);
                $donor->setName($row['name']);
                $donor->setEmail($row['email']);
                $donor->setAddress($row['address']);
                $donor->setPassword($row['password']);
                $donors[] = $donor;
            }
        }
        $this->connection->closeConnection();
        return $donors;
    }
}