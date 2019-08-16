<?php

namespace app\dao;
use PDO;

define("NOME_DO_BANCO", "mysql");
define("BANCO", "epiz_24333696_pw");
define("USUARIO", "epiz_24333696");
define("SENHA", "dPbZQcpApbvC");
class Dao
{
    protected $con;
    function getConnection()
    {
        $con = new PDO("mysql:host=sql308.epizy.com;dbname=" . BANCO, USUARIO, SENHA);
        return $con;
    }
}