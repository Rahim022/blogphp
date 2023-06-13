<?php
class Database {

    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'blogdb';
    private $connection;

    public function createdb(){
        //chek connection
        try {
            $this->connection = new PDO("mysql:host=$this->host", $this->username, $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e) {
            echo "Connection Failed: " . $e->getMessage();die;
        }
        //create database
        try{
            $sql = "CREATE DATABASE blogdb DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_general_ci";
            $this->connection->exec($sql);
            echo "Database created successfully";
        } catch(PDOException $e){
            die("ERROR: Could not able to execute $sql. " . $e->getMessage());
        }
    }
    public function createtbusers(){
        //chek connection
        try {
            $this->connection = new PDO("mysql:host=$this->host;dbname=$this->database", $this->username, $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e) {
            echo "Connection Failed: " . $e->getMessage();die;
        }
        //create table
        try{
            $sql = "CREATE TABLE users(
                id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
                firstname varchar(255) COLLATE utf8_persian_ci NOT NULL,
                lastname varchar(255) COLLATE utf8_persian_ci NOT NULL,
                codemeli int(10) DEFAULT NULL,
                phone int(13) NOT NULL,
                password varchar(25) COLLATE utf8_persian_ci NOT NULL
              )";    
            $this->connection->exec($sql);
            echo "Table created successfully.";
        } catch(PDOException $e){
            die("ERROR: Could not able to execute $sql. " . $e->getMessage());
        }
    }
   public function createtbcategories(){
        //chek connection
        try {
            $this->connection = new PDO("mysql:host=$this->host;dbname=$this->database", $this->username, $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e) {
            echo "Connection Failed: " . $e->getMessage();die;
        }
        //create table
        try{
            $sql = "CREATE TABLE categories (
                id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
                title varchar(100) COLLATE utf8_persian_ci NOT NULL
              )";    
            $this->connection->exec($sql);
            echo "Table categories created successfully.";
        } catch(PDOException $e){
            die("ERROR: Could not able to execute $sql. " . $e->getMessage());
        }
    }
    public function createtbinsertcat(){
        //chek connection
        try {
            $this->connection = new PDO("mysql:host=$this->host;dbname=$this->database", $this->username, $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e) {
            echo "Connection Failed: " . $e->getMessage();die;
        }
        //create table
        try{
            $sql = "INSERT INTO categories (id, title) VALUES
            (1, 'آهنگ و فیلم '),
            (2, 'ادبی'),
            (3, 'ورزشی'),
            (15, ' دانش و فناوری '),
            (16, ' سیاسی '),
            (17, 'گردشگری '),
            (18, 'آموزش ')";    
            $this->connection->exec($sql);
            echo "insert row in table categories successfully.";
        } catch(PDOException $e){
            die("ERROR: Could not able to execute $sql. " . $e->getMessage());
        }
    }
    public function createtbcomments(){
        //chek connection
        try {
            $this->connection = new PDO("mysql:host=$this->host;dbname=$this->database", $this->username, $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e) {
            echo "Connection Failed: " . $e->getMessage();die;
        }
        //create table
        try{
            $sql = "CREATE TABLE comments (
                id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
                name varchar(100) COLLATE utf8_persian_ci NOT NULL,
                comment text COLLATE utf8_persian_ci NOT NULL,
                post_id int(11) NOT NULL,
                status tinyint(1) NOT NULL DEFAULT 0
              )";    
            $this->connection->exec($sql);
            echo "comments Table created successfully.";
        } catch(PDOException $e){
            die("ERROR: Could not able to execute $sql. " . $e->getMessage());
        }
    }
    public function createtbpost(){
        //chek connection
        try {
            $this->connection = new PDO("mysql:host=$this->host;dbname=$this->database", $this->username, $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e) {
            echo "Connection Failed: " . $e->getMessage();die;
        }
        //create table
        try{
            $sql = "CREATE TABLE posts (
                id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
                title varchar(191) COLLATE utf8_persian_ci NOT NULL,
                category_id int(11) NOT NULL,
                body text COLLATE utf8_persian_ci NOT NULL,
                author varchar(191) COLLATE utf8_persian_ci NOT NULL,
                image varchar(191) COLLATE utf8_persian_ci NOT NULL,
                tags varchar(191) COLLATE utf8_persian_ci NOT NULL
              )";    
            $this->connection->exec($sql);
            echo "post Table created successfully.";
        } catch(PDOException $e){
            die("ERROR: Could not able to execute $sql. " . $e->getMessage());
        }
    }
    public function createtbsubscribers(){
        //chek connection
        try {
            $this->connection = new PDO("mysql:host=$this->host;dbname=$this->database", $this->username, $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e) {
            echo "Connection Failed: " . $e->getMessage();die;
        }
        //create table
        try{
            $sql = "CREATE TABLE subscribers (
                id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
                name varchar(191) COLLATE utf8_persian_ci NOT NULL,
                email varchar(191) COLLATE utf8_persian_ci NOT NULL
              )";    
            $this->connection->exec($sql);
            echo "subscribers Table created successfully.";
        } catch(PDOException $e){
            die("ERROR: Could not able to execute $sql. " . $e->getMessage());
        }
    }
    
    public function createkey3(){
        //chek connection
        try {
            $this->connection = new PDO("mysql:host=$this->host;dbname=$this->database", $this->username, $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e) {
            echo "Connection Failed: " . $e->getMessage();die;
        }
        //create table
        try{
            $sql = "ALTER TABLE posts
            ADD KEY category_id (category_id)";    
            $this->connection->exec($sql);
            echo "query key created3.";
        } catch(PDOException $e){
            die("ERROR: Could not able to execute $sql. " . $e->getMessage());
        }
    }
    public function createkey5(){
        //chek connection
        try {
            $this->connection = new PDO("mysql:host=$this->host;dbname=$this->database", $this->username, $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e) {
            echo "Connection Failed: " . $e->getMessage();die;
        }
        //create table
        try{
            $sql = "ALTER TABLE users
           ADD UNIQUE KEY codemeli (codemeli)";    
            $this->connection->exec($sql);
            echo "query key created5.";
        } catch(PDOException $e){
            die("ERROR: Could not able to execute $sql. " . $e->getMessage());
        }
    }
    public function createfkey1(){
        //chek connection
        try {
            $this->connection = new PDO("mysql:host=$this->host;dbname=$this->database", $this->username, $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e) {
            echo "Connection Failed: " . $e->getMessage();die;
        }
        //create table
        try{
            $sql = "ALTER TABLE comments
            ADD CONSTRAINT comments_ibfk_1 FOREIGN KEY (post_id) REFERENCES posts (id) ON DELETE CASCADE ON UPDATE CASCADE";    
            $this->connection->exec($sql);
            echo "query key created5.";
        } catch(PDOException $e){
            die("ERROR: Could not able to execute $sql. " . $e->getMessage());
        }
    }
    public function createfkey2(){
        //chek connection
        try {
            $this->connection = new PDO("mysql:host=$this->host;dbname=$this->database", $this->username, $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e) {
            echo "Connection Failed: " . $e->getMessage();die;
        }
        //create table
        try{
            $sql = "ALTER TABLE posts
            ADD CONSTRAINT posts_ibfk_1 FOREIGN KEY (category_id) REFERENCES categories (id) ON DELETE CASCADE ON UPDATE CASCADE";    
            $this->connection->exec($sql);
            echo "query key created5.";
        } catch(PDOException $e){
            die("ERROR: Could not able to execute $sql. " . $e->getMessage());
        }
    }
}

?>
