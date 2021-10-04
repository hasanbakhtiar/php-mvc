<?php
class Model extends MysqliDb {

    public $db;

    public function __construct()
    {
       $this->db = new MysqliDb (HOST, USER, PASS, DBNAME);
    }


}