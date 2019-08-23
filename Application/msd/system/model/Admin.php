<?php
/**
 * Created by PhpStorm.
 * User: roshan
 * Date: 12/24/17
 * Time: 3:57 PM
 */

class Admin
{
    private $id;
    private $name;
    private $password;

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setPassword($password) {
        $this->password = $password;
    }
}