<?php

class StudentController
{
    private $connection;

    function __construct() {
        $this->connection = new DBConnection();
    }

    public function insert(Student $student) {
        $stmt = $this->connection->openConnection()->prepare("INSERT INTO `student`(`name`, `gender`, `address`, `school`, `password`) VALUES (?,?,?,?,?)");
        $stmt->bind_param("sssss", $student->getName(), $student->getGender(), $student->getAddress(), $student->getSchool(), $student->getPassword());
        $stmt->execute();
        $stmt->close();
        $this->connection->closeConnection();
    }

    public function login(Student $student) {
        $query = "SELECT `id`, `name`, `gender`, `address`, `school`, `password` FROM `student` WHERE `name`='".$student->getName()."' AND `password`='".$student->getPassword()."'";
        $students = array();
        $this->connection->openConnection();
        if($result = $this->connection->executeRawQuery($query)) {
            while($row = $result->fetch_array()){
                $student = new Student();
                $student->setId($row['id']);
                $student->setName($row['name']);
                $student->setGender($row['gender']);
                $student->setAddress($row['address']);
                $student->setSchool($row['school']);
                $student->setPassword($row['password']);
                $students[] = $student;
            }
        }
        $this->connection->closeConnection();
        return $students;
    }
}