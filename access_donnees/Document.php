<?php

include_once "DocumentManager.php";
class Document {
    private $codeD;
    private $typeD;
    private $titreD;
    private $datePublication;
    private $contenuD;

    // Constructeur
    public function __construct($typeD, $titreD, $datePublication, $contenuD) {
        $this->typeD = $typeD;
        $this->titreD = $titreD;
        $this->datePublication = $datePublication;
        $this->contenuD = $contenuD;
    }

    // Getters
    public function getCodeD() {
        return $this->codeD;
    }

    public function getTypeD() {
        return $this->typeD;
    }

    public function getTitreD() {
        return $this->titreD;
    }

    public function getDatePublication() {
        return $this->datePublication;
    }

    public function getContenuD() {
        return $this->contenuD;
    }

    // Setters
    public function setTypeD($typeD) {
        $this->typeD = $typeD;
    }

    public function setTitreD($titreD) {
        $this->titreD = $titreD;
    }

    public function setDatePublication($datePublication) {
        $this->datePublication = $datePublication;
    }

    public function setContenuD($contenuD) {
        $this->contenuD = $contenuD;
    }
}

?>