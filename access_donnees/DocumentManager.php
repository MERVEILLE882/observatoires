<?php
include_once "Document.php";

class DocumentManager{
    private $db;

    function __construct(){
        $this->db = new basedonnee();
    }

    function insert($document){
        $sql = "INSERT INTO Document (typeD, titreD, datePublication, contenuD) VALUES (?, ?, ?, ?)";
        $params = [$document->getTypeD(), $document->getTitreD(), $document->getDatePublication(), $document->getContenuD()];
        $req = $this->db->request($sql, $params);
        return $req;
    }

    function update($document, $id){
        $sql = "UPDATE Document SET typeD=?, titreD=?, datePublication=?, contenuD=? WHERE codeD=?";
        $params = [$document->getTypeD(), $document->getTitreD(), $document->getDatePublication(), $document->getContenuD(), $id];
        $req = $this->db->request($sql, $params);
        return $req;
    }

    function delete($id){
        $sql = "DELETE FROM Document WHERE codeD=?";
        $params = [$id];
        $req = $this->db->request($sql, $params);
        return $req;
    }

    function readAll(){
        $sql = "SELECT * FROM Document";
        $req = $this->db->request($sql);
        $requete = $this->db->recover($req, false);
        return $requete;
    }

    function readById($id){
        $sql = "SELECT * FROM Document WHERE codeD=?";
        $params = [$id];
        $req = $this->db->request($sql, $params);
        $requete = $this->db->recover($req, true);
        return $requete;
    }
}
?>
