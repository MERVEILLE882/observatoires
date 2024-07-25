<?php
include_once "UtilisateurManager.php";
class Utilisateur {
    private $idU;
    private $nomU;
    private $email;
    private $password;
    private $dateNaissance;
   

    // Constructeur
    public function __construct($nomU, $email, $password, $dateNaissance, $sexe, $ville, $pays) {
        $this->nomU = $nomU;
        $this->email = $email;
        $this->password = $password;
        $this->dateNaissance = $dateNaissance;
        $this->sexe = $sexe;
        $this->ville = $ville;
        $this->pays = $pays;
    }

    // Getters
    public function getIdU() {
        return $this->idU;
    }

    public function getNomU() {
        return $this->nomU;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getDateNaissance() {
        return $this->dateNaissance;
    }


    // Setters
    public function setNomU($nomU) {
        $this->nomU = $nomU;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setDateNaissance($dateNaissance) {
        $this->dateNaissance = $dateNaissance;
    }

}



?>