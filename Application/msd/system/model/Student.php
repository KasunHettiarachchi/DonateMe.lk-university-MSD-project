<?php

class Student
{
    private $id;
    private $name;
    private $gender;
    private $address;
    private $school;
    private $password;

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getGender() {
        return $this->gender;
    }

    public function getAddress() {
        return $this->address;
    }

    public function getSchool() {
        return $this->school;
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

    public function setGender($gender) {
        $this->gender = $gender;
    }

    public function setAddress($address) {
        $this->address = $address;
    }

    public function setSchool($school) {
        $this->school = $school;
    }

    public function setPassword($password) {
        $this->password = $password;
    }
}