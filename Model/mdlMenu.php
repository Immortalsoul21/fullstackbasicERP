<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mdlGroup
 *
 * @author Girish
 */
class clsMenu {

  
    public $pdo;

    public function __construct() {
        $this->pdo = $this->dbconnect();
    }

    public function dbconnect() {
//        $dsn = "mysql:host=localhost;dbname=DBNAME";
//        $user = "root";
//        $passwd = "";
//
//        try {
//            $pdo = new PDO($dsn, $user, $passwd);
//            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//        } catch (PDOException $e) {
//            die('Could not connect to the database: ' . $e->getMessage());
//            //echo "Connection failed: " . $e->getMessage();
//        }
//        return $pdo;
    }

    public function save() {
//        $cSql = " INSERT Query";
//        $this->pdo->query($cSql);

//        
    }

}
