<?php
session_start();

// Vérifier si l'utilisateur est connecté via la session ou les cookies
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    if (isset($_COOKIE["loggedin"]) && $_COOKIE["loggedin"] == true) {
        $_SESSION["loggedin"] = true;
        $_SESSION["email"] = $_COOKIE["email"];
        $_SESSION["idU"] = $_COOKIE["idU"];
        $_SESSION["role"] = $_COOKIE["role"];
    } else {
        header("Location: ../presentation/formulaire_connection.php");
        exit();
    }
}
?>
