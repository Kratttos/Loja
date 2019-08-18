<?php

namespace app\dao;
use PDO;

define("NOME_DO_BANCO", "mysql");
define("BANCO", "epiz_24333696_pw");
define("USUARIO", "epiz_24333696");
define("SENHA", "dPbZQcpApbvC");
<<<<<<< Updated upstream
=======
define("HOST","sql308.epizy.com");
>>>>>>> Stashed changes
class Dao
{
    protected $con;
    function getConnection()
    {
<<<<<<< Updated upstream
        $con = new PDO("mysql:host=sql308.epizy.com;dbname=" . BANCO, USUARIO, SENHA);
=======
        $con = new PDO("mysql:host=".HOST.";dbname=" . BANCO, USUARIO, SENHA);
>>>>>>> Stashed changes
        return $con;
    }
}