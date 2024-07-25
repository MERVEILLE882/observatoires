<?php

class basedonnee{ 

private const DNS= "mysql:host=localhost;dbname=observatoire;port=3306;charset=utf8";
private const username="root";
private const password= "";
private $pdo;


function __construct(){
    $this->pdo = new PDO(self::DNS, self::username, self::password);
    $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}

function request($sql, $params = null)
{

    $req = $this->pdo->prepare($sql);
    if ($params == null) {
        $req->execute();
    } else {
        $req->execute($params);
    }
    return $req;
}

function recover($req, $one = true)
{
    $datas = null;

    //type de mode de recuperation
    $req->setFetchMode(PDO::FETCH_OBJ);

    if ($one == true) {
        $datas = $req->fetch();
    } else {
        $datas = $req->fetchAll();
    }
    return $datas;
}

}
?>