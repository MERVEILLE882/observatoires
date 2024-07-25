<?php
include_once "basedonnee.php";
include_once "Contenir.php";

class ContenirManager{
    private $db;

    function __construct(){
        $this->db = new basedonnee();
    }

    function insert($contenir){
        $sql = "INSERT INTO Contenir (idP_Publication, codeD_document) VALUES (?, ?)";
        $params = [$contenir->getIdP_Publication(), $contenir->getCodeD_document()];
        $req = $this->db->request($sql, $params);
        return $req;
    }

    function delete($idP_Publication, $codeD_document){
        $sql = "DELETE FROM Contenir WHERE idP_Publication=? AND codeD_document=?";
        $params = [$idP_Publication, $codeD_document];
        $req = $this->db->request($sql, $params);
        return $req;
    }

    function readAll(){
        $sql = "SELECT * FROM Contenir";
        $req = $this->db->request($sql);
        $requete = $this->db->recover($req, false);
        return $requete;
    }

    function readById($idP_Publication, $codeD_document){
        $sql = "SELECT * FROM Contenir WHERE idP_Publication=? AND codeD_document=?";
        $params = [$idP_Publication, $codeD_document];
        $req = $this->db->request($sql, $params);
        $requete = $this->db->recover($req, true);
        return $requete;
    }
}
?>
