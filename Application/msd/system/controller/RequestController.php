<?php
/**
 * Created by PhpStorm.
 * User: roshan
 * Date: 12/24/17
 * Time: 2:10 PM
 */

class RequestController
{
    private $connection;

    function __construct() {
        $this->connection = new DBConnection();
    }

    public function insert(Request $request) {
        $stmt = $this->connection->openConnection()->prepare("INSERT INTO `request`(`state`, `quantity`, `itemId`, `studentId`, `letterUrl`) VALUES (?,?,?,?,?)");
        $stmt->bind_param("siiis", $request->getState(), $request->getQuantity(), $request->getItemId(), $request->getStudentId(), $request->getLetterUrl());
        $stmt->execute();
        $stmt->close();
        $this->connection->closeConnection();
    }

    public function getRequestByStudentId($studentId) {
        $query = "SELECT `id`, `state`, `quantity`, `itemId`, `studentId`, `letterUrl` FROM `request` WHERE `studentId`='".$studentId."'";
        $requests = array();
        $this->connection->openConnection();
        if($result = $this->connection->executeRawQuery($query)){
            while($row = $result->fetch_array()){
                $request = new Request();
                $request->setId($row['id']);
                $request->setState($row['state']);
                $request->setQuantity($row['quantity']);
                $request->setItemId($row['itemId']);
                $request->setStudentId($row['studentId']);
                $request->setLetterUrl($row['letterUrl']);
                $requests[] = $request;
            }
        }
        $this->connection->closeConnection();
        return $requests;
    }

    public function getRequestById($id) {
        $query = "SELECT `id`, `state`, `quantity`, `itemId`, `studentId`, `letterUrl` FROM `request` WHERE `id`='".$id."'";
        $requests = array();
        $this->connection->openConnection();
        if($result = $this->connection->executeRawQuery($query)){
            while($row = $result->fetch_array()){
                $request = new Request();
                $request->setId($row['id']);
                $request->setState($row['state']);
                $request->setQuantity($row['quantity']);
                $request->setItemId($row['itemId']);
                $request->setStudentId($row['studentId']);
                $request->setLetterUrl($row['letterUrl']);
                $requests[] = $request;
            }
        }
        $this->connection->closeConnection();
        return $requests[0];
    }

    public function getPendingRequests() {
        $query = "SELECT `id`, `state`, `quantity`, `itemId`, `studentId`, `letterUrl` FROM `request` WHERE `state`='Pending'";
        $requests = array();
        $this->connection->openConnection();
        if($result = $this->connection->executeRawQuery($query)){
            while($row = $result->fetch_array()){
                $request = new Request();
                $request->setId($row['id']);
                $request->setState($row['state']);
                $request->setQuantity($row['quantity']);
                $request->setItemId($row['itemId']);
                $request->setStudentId($row['studentId']);
                $request->setLetterUrl($row['letterUrl']);
                $requests[] = $request;
            }
        }
        $this->connection->closeConnection();
        return $requests;
    }

    public function approveRequest($id) {
        $stmt = $this->connection->openConnection()->prepare("UPDATE `request` SET `state` = 'Approved' WHERE `request`.`id` = ?;");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
        $this->connection->closeConnection();
    }

    public function rejectRequest($id) {
        $stmt = $this->connection->openConnection()->prepare("UPDATE `request` SET `state` = 'Rejected' WHERE `request`.`id` = ?;");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
        $this->connection->closeConnection();
    }
}