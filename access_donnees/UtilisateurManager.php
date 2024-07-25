<?php
include_once "basedonnee.php";

class CategorieManager {
    private $db;

    function __construct($db) {
        $this->db = $db;
    }
    function getNomCategorie($idCategorie)
    {
        $sql = "SELECT nom FROM categorie WHERE id = :id_categorie";
        $req = $this->db->request($sql, [':id_categorie' => $idCategorie]);
        $result = $this->db->recover($req, true);
        return $result['nom'];
    }
    

}

class UtilisateurManager {
    private $db;
    private $categorieManager;

    function __construct() {
        $this->db = new basedonnee();
        $this->categorieManager = new CategorieManager($this->db);
    }

    function insert($utilisateur) {
        $sql = "INSERT INTO Utilisateur (nomU, email, password, dateNaissance, id_categorie) VALUES (?, ?, ?, ?, ?)";
        $params = [$utilisateur->getNomU(), $utilisateur->getEmail(), $utilisateur->getPassword(), $utilisateur->getDateNaissance(), $utilisateur->getid_categorie()];
        $req = $this->db->request($sql, $params);
        return $req;
    }

    function update($utilisateur, $id) {
        $sql = "UPDATE Utilisateur SET nomU=?, email=?, password=?, dateNaissance=?, id_categorie=? WHERE idU=?";
        $params = [$utilisateur->getNomU(), $utilisateur->getEmail(), $utilisateur->getPassword(), $utilisateur->getDateNaissance(), $utilisateur->getid_categorie(), $id];
        $req = $this->db->request($sql, $params);
        return $req;
    }

    function delete($id) {
        $sql = "DELETE FROM Utilisateur WHERE idU=?";
        $params = [$id];
        $req = $this->db->request($sql, $params);
        return $req;
    }

    function readAll() {
        $sql = "SELECT * FROM Utilisateur";
        $req = $this->db->request($sql);
        $users = $this->db->recover($req, false);

        foreach ($users as &$user) {
            if (property_exists($user, 'id_categorie')) {
                $user->nom = $this->categorieManager->getNomCategorie($user->id_categorie);
            } else {
                $user->nom = "Categorie inconnue";
            }
        }

        return $users;
    }

    function readById($id) {
        $sql = "SELECT * FROM Utilisateur WHERE idU = ?";
        $params = [$id];
        $req = $this->db->request($sql, $params);
        $user = $this->db->recover($req, true);
        $user->nom = $this->categorieManager->getNomCategorie($user->id_categorie);
        return $user;
    }
    function getNomCategorie($id) {
        $sql = "SELECT nom FROM Categorie WHERE id = ?";
        $params = [$id];
        $req = $this->db->request($sql, $params);
        $result = $this->db->recover($req, true);
        return $result['nom'];
    }

    public function GetUserById($id)
    {
        // Code pour récupérer les informations de l'utilisateur à partir de l'ID dans la base de données
        $query = "SELECT * FROM Utilisateur WHERE idU = :idU";
        $stmt = $this->db->request($query, [':idU' => $id]);
        $result = $this->db->recover($stmt, true);
        
        // Vérifier si l'utilisateur existe
        if ($result) {
            return $result;
        } else {
            return null;
        }
    }
    
}
?>