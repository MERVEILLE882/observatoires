<?php

include_once "ContenirManager.php";

class Contenir {
    private $idP_Publication;
    private $codeD_document;

    // Constructeur
    public function __construct($idP_Publication, $codeD_document) {
        $this->idP_Publication = $idP_Publication;
        $this->codeD_document = $codeD_document;
    }

    // Getters
    public function getIdP_Publication() {
        return $this->idP_Publication;
    }

    public function getCodeD_document() {
        return $this->codeD_document;
    }

    // Setters
    public function setIdP_Publication($idP_Publication) {
        $this->idP_Publication = $idP_Publication;
    }

    public function setCodeD_document($codeD_document) {
        $this->codeD_document = $codeD_document;
    }
}

?>