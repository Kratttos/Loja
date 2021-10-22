<?php

namespace app\dao;
use PDO;

define("NOME_DO_BANCO", "mysql");
define("BANCO", "pw");
define("USUARIO", "pw");
define("SENHA", "123");
class Dao
{
    protected $con;
    function getConnection()
    {
        $con = new PDO("mysql:host=localhost;dbname=" . BANCO, USUARIO, SENHA);
        return $con;
    }
}