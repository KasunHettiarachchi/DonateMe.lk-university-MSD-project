<?php
/**
 * Created by PhpStorm.
 * User: roshan
 * Date: 12/23/17
 * Time: 11:52 AM
 */

class Item
{
    private $id;
    private $category;
    private $model;
    private $description;
    private $quantity;
    private $condition;
    private $state;
    private $date;
    private $imageUrl;
    private $donorId;

    public function getId() {
        return $this->id;
    }

    public function getCategory() {
        return $this->category;
    }

    public function getModel() {
        return $this->model;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getQuantity() {
        return $this->quantity;
    }

    public function getCondition() {
        return $this->condition;
    }

    public function getState() {
        return $this->state;
    }

    public function getDate() {
        return $this->date;
    }

    public function getImageUrl() {
        return $this->imageUrl;
    }

    public function getDonorId() {
        return $this->donorId;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setCategory($category) {
        $this->category = $category;
    }

    public function setModel($model) {
        $this->model = $model;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function setQuantity($quantity) {
        $this->quantity = $quantity;
    }

    public function setCondition($condition) {
        $this->condition = $condition;
    }

    public function setState($state) {
        $this->state = $state;
    }

    public function setDate($date) {
        $this->date = $date;
    }

    public function setImageUrl($imageUrl) {
        $this->imageUrl = $imageUrl;
    }

    public function setDonorId($donorId) {
        $this->donorId = $donorId;
    }
}