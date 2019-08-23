<?php
/**
 * Created by PhpStorm.
 * User: roshan
 * Date: 12/24/17
 * Time: 2:05 PM
 */

class Request
{
    private $id;
    private $state;
    private $quantity;
    private $itemId;
    private $studentId;
    private $letterUrl;

    public function getId() {
        return $this->id;
    }

    public function getState() {
        return$this->state;
    }

    public function getQuantity() {
        return $this->quantity;
    }

    public function getItemId() {
        return $this->itemId;
    }

    public function getStudentId() {
        return $this->studentId;
    }

    public function getLetterUrl() {
        return $this->letterUrl;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setState($state) {
        $this->state = $state;
    }

    public function setQuantity($quantity) {
        $this->quantity = $quantity;
    }

    public function setItemId($itemId) {
        $this->itemId = $itemId;
    }

    public function setStudentId($studentId) {
        $this->studentId = $studentId;
    }

    public function setLetterUrl($letterUrl) {
        $this->letterUrl = $letterUrl;
    }

}