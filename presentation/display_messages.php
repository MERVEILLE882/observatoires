<?php
include_once "../access_donnees/basedonnee.php";

$db = new basedonnee();

// Function to recursively fetch and display messages and their replies
function displayMessages($parent_id = null, $margin = 0) {
    global $db;
    $query = "SELECT m.id_message, m.texte_message, m.date_message, m.heure_message, u.nomU, c.nom AS categorie, m.idutil  
              FROM message m 
              JOIN Utilisateur u ON m.idutil = u.idU 
              JOIN Categorie c ON u.id_Categorie = c.id
              WHERE m.parent_id " . ($parent_id ? "= ?" : "IS NULL") . "
              AND m.deleted = FALSE 
              ORDER BY m.date_message DESC, m.heure_message DESC";
    $params = $parent_id ? [$parent_id] : [];
    $messages = $db->request($query, $params)->fetchAll(PDO::FETCH_ASSOC);

    foreach ($messages as $message) {
        $isAdmin = ($message['categorie'] == 'Administrateur') ? 'admin' : '';
        $userRole = ($message['categorie'] == 'Administrateur') ? ' (Admin)' : '';
        echo "<div class='message' style='margin-left: {$margin}px;'>";
        echo "<p><strong class='$isAdmin'>" . htmlspecialchars($message['nomU']) . $userRole . "</strong> (" . $message['date_message'] . " à " . $message['heure_message'] . ")</p>";
        echo "<p>" . htmlspecialchars($message['texte_message']) . "</p>";

        // Bouton "Répondre"
        echo "<span class='reply-button' onclick='toggleReplyForm(this)'>Répondre</span>";
        echo "<form class='reply-form' action='../metier/post_message.php' method='post'>";
        echo "<textarea name='texte_message' placeholder='Votre réponse...' required></textarea>";
        echo "<input type='hidden' name='parent_id' value='" . $message['id_message'] . "' />";
        echo "<button type='submit'>Répondre</button>";
        echo "</form>";

        // Bouton "Supprimer" (si l'utilisateur est l'auteur du message)
        if (isset($_SESSION['idU']) && $message['idutil'] == $_SESSION['idU']) { 
            echo "<span class='delete-button' onclick='confirmDelete(" . $message['id_message'] . ")'>Supprimer</span>"; 
        } 

        // Bouton "Voir les réponses"
        echo "<span class='reply-button' onclick='toggleReplies(this)'>Voir les réponses</span>";
        echo "<div class='replies'>";
        displayMessages($message['id_message'], $margin + 20);
        echo "</div>";
        echo "</div>";
    }
}

// Display top-level messages
displayMessages();
?>