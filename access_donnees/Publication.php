<?php

include_once "PublicationManager.php";
class Publication {
    private $idP;
    private $titreP;
    private $dateP;
    private $contenuP;
    private $auteurP;
    private $idU_Utilisateur;

    // Constructeur
    public function __construct($titreP, $dateP, $contenuP, $auteurP, $idU_Utilisateur) {
        $this->titreP = $titreP;
        $this->dateP = $dateP;
        $this->contenuP = $contenuP;
        $this->auteurP = $auteurP;
        $this->idU_Utilisateur = $idU_Utilisateur;
    }

    // Getters
    public function getIdP() {
        return $this->idP;
    }

    public function getTitreP() {
        return $this->titreP;
    }

    public function getDateP() {
        return $this->dateP;
    }

    public function getContenuP() {
        return $this->contenuP;
    }

    public function getAuteurP() {
        return $this->auteurP;
    }

    public function getIdU_Utilisateur() {
        return $this->idU_Utilisateur;
    }

    // Setters
    public function setTitreP($titreP) {
        $this->titreP = $titreP;
    }

    public function setDateP($dateP) {
        $this->dateP = $dateP;
    }

    public function setContenuP($contenuP) {
        $this->contenuP = $contenuP;
    }

    public function setAuteurP($auteurP) {
        $this->auteurP = $auteurP;
    }

    public function setIdU_Utilisateur($idU_Utilisateur) {
        $this->idU_Utilisateur = $idU_Utilisateur;
    }
}
?>