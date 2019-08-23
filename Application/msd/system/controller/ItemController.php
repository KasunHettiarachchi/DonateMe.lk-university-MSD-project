<?php

class ItemController
{
    private $connection;

    function __construct() {
        $this->connection = new DBConnection();
    }

    public function insert(Item $item) {
        $stmt = $this->connection->openConnection()->prepare("INSERT INTO `item`(`category`, `model`, `description`, `quantity`, `condition`, `state`, `imageUrl`, `donorId`) VALUES (?,?,?,?,?,?,?,?)");
        $stmt->bind_param("sssisssi", $item->getCategory(), $item->getModel(), $item->getDescription(), $item->getQuantity(), $item->getCondition(), $item->getState(), $item->getImageUrl(), $item->getDonorId());
        $stmt->execute();
        $stmt->close();
        $this->connection->closeConnection();
    }

    public function getItemsByDonorId($donorId) {
        $query = "SELECT `id`, `category`, `model`, `description`, `quantity`, `condition`, `state`, `imageUrl` FROM `item` WHERE `donorId`='".$donorId."'";
        $items = array();
        $this->connection->openConnection();
        if($result = $this->connection->executeRawQuery($query)){
            while($row = $result->fetch_array()){
                $item = new Item();
                $item->setId($row['id']);
                $item->setCategory($row['category']);
                $item->setModel($row['model']);
                $item->setDescription($row['description']);
                $item->setQuantity($row['quantity']);
                $item->setCondition($row['condition']);
                $item->setState($row['state']);
                $item->setImageUrl($row['imageUrl']);
                $items[] = $item;
            }
        }
        $this->connection->closeConnection();
        return $items;
    }

    public function getItemsByCategory($category) {
        $query = "";
        if($category == "") {
            $query = "SELECT `id`, `category`, `model`, `description`, `quantity`, `condition`, `state`, `imageUrl`, `donorId` FROM `item` WHERE `state`='Approved'";
        } else {
            $query = "SELECT `id`, `category`, `model`, `description`, `quantity`, `condition`, `state`, `imageUrl`, `donorId` FROM `item` WHERE `category`='".$category."' AND `state`='Approved'";
        }
        $items = array();
        $this->connection->openConnection();
        if($result = $this->connection->executeRawQuery($query)){
            while($row = $result->fetch_array()){
                $item = new Item();
                $item->setId($row['id']);
                $item->setCategory($row['category']);
                $item->setModel($row['model']);
                $item->setDescription($row['description']);
                $item->setQuantity($row['quantity']);
                $item->setCondition($row['condition']);
                $item->setState($row['state']);
                $item->setImageUrl($row['imageUrl']);
                $items[] = $item;
            }
        }
        $this->connection->closeConnection();
        return $items;
    }

    public function getItemById($id) {
        $query = "SELECT `id`, `category`, `model`, `description`, `quantity`, `condition`, `state`, `imageUrl` FROM `item` WHERE `id`='".$id."'";
        $items = array();
        $this->connection->openConnection();
        if($result = $this->connection->executeRawQuery($query)){
            while($row = $result->fetch_array()){
                $item = new Item();
                $item->setId($row['id']);
                $item->setCategory($row['category']);
                $item->setModel($row['model']);
                $item->setDescription($row['description']);
                $item->setQuantity($row['quantity']);
                $item->setCondition($row['condition']);
                $item->setState($row['state']);
                $item->setImageUrl($row['imageUrl']);
                $items[] = $item;
            }
        }
        $this->connection->closeConnection();
        return $items[0];
    }

    public function getPendingItems() {
        $query = "SELECT `id`, `category`, `model`, `description`, `quantity`, `condition`, `state`, `imageUrl`, `donorId` FROM `item` WHERE `state`='Pending'";
        $items = array();
        $this->connection->openConnection();
        if($result = $this->connection->executeRawQuery($query)){
            while($row = $result->fetch_array()){
                $item = new Item();
                $item->setId($row['id']);
                $item->setCategory($row['category']);
                $item->setModel($row['model']);
                $item->setDescription($row['description']);
                $item->setQuantity($row['quantity']);
                $item->setCondition($row['condition']);
                $item->setState($row['state']);
                $item->setImageUrl($row['imageUrl']);
                $items[] = $item;
            }
        }
        $this->connection->closeConnection();
        return $items;
    }

    public function updateQuantity($itemId, $newQuantity) {
        $stmt = $this->connection->openConnection()->prepare("UPDATE `item` SET `quantity` = ? WHERE `item`.`id` = ?;");
        $stmt->bind_param("ii", $newQuantity, $itemId);
        $stmt->execute();
        $stmt->close();
        $this->connection->closeConnection();
    }

    public function approveItem($id) {
        $stmt = $this->connection->openConnection()->prepare("UPDATE `item` SET `state` = 'Approved' WHERE `item`.`id` = ?;");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
        $this->connection->closeConnection();
    }

    public function rejectItem($id) {
        $stmt = $this->connection->openConnection()->prepare("UPDATE `item` SET `state` = 'Rejected' WHERE `item`.`id` = ?;");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
        $this->connection->closeConnection();
    }
}