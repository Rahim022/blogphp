<?php

class Database {
    private $_conn = null;
    public function getConnection() {
        if (!is_null($this->_conn)) {
            return $this->_conn;
        }
            $this->_conn = false;
        try {
            $this->_conn = new PDO('mysql:host=localhost;dbname=blogdb', 'root', '');
        } catch(PDOException $e) { }
        return $this->_conn;
    }
}

class User
{
    public function registration($fname,$lname,$codemeli,$phone,$password)
    {
        $db = new Database();
        $conn = $db->getConnection();
        $sql = $conn->query("INSERT INTO users(firstname,lastname,codemeli,phone,password) 
        VALUES('$fname','$lname','$codemeli','$phone','$password')");
        return $sql;
    }
        /*public function login($codemeliphone,$password){
            $db = new Database();
            $conn = $db->getConnection();
            $sql= $conn->prepare('SELECT id FROM users WHERE codemeli=:n OR phone=:n AND password:=p');
            $sql->bindValue(':n',$codemeliphone);
            $sql->bindValue(':p',$password);
            $sql->execute();
            if($sql->rowCount()>0){
                $b=$sql->fetch(PDO::FETCH_ASSOC);
                session_start();
                $_SESSION['id']=$b['id'];
            }else{
                echo 'something wrong';
            }
        }*/
}
