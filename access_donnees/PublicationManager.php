<?php
include_once "basedonnee.php";


class PublicationManager{
    private $db;

    function __construct(){
        $this->db = new basedonnee();
    }

    function insert($publication){
        $sql = "INSERT INTO Publication (titreP, dateP, contenuP, auteurP, idU_Utilisateur) VALUES (?, ?, ?, ?, ?)";
        $params = [$publication->getTitreP(), $publication->getDateP(), $publication->getContenuP(), $publication->getAuteurP(), $publication->getIdU_Utilisateur()];
        $req = $this->db->request($sql, $params);
        return $req;
    }

    function update($publication, $id){
        $sql = "UPDATE Publication SET titreP=?, dateP=?, contenuP=?, auteurP=?, idU_Utilisateur=? WHERE idP=?";
        $params = [$publication->getTitreP(), $publication->getDateP(), $publication->getContenuP(), $publication->getAuteurP(), $publication->getIdU_Utilisateur(), $id];
        $req = $this->db->request($sql, $params);
        return $req;
    }

    function delete($id){
        $sql = "DELETE FROM Publication WHERE idP=?";
        $params = [$id];
        $req = $this->db->request($sql, $params);
        return $req;
    }

    function readAll(){
        $sql = "SELECT * FROM Publication";
        $req = $this->db->request($sql);
        $requete = $this->db->recover($req, false);
        return $requete;
    }

    function readById($id){
        $sql = "SELECT * FROM Publication WHERE idP=?";
        $params = [$id];
        $req = $this->db->request($sql, $params);
        $requete = $this->db->recover($req, true);
        return $requete;
    }
}
?>
