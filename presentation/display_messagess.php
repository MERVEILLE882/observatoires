<?php
if (isset($_SESSION['categorie'])) {
    $categorie = $_SESSION['categorie'];
    echo "Catégorie de l'utilisateur : " . $categorie;
} else {
    echo "La catégorie de l'utilisateur n'est pas définie.";
    header("Location: formulaire_connection.php");
    exit();
}

include_once "../access_donnees/basedonnee.php";

$db = new basedonnee();

function displayMessages($parent_id = null, $margin = 0) {
    global $db;
    $query = "SELECT m.id_message, m.texte_message, m.date_message, m.heure_message, u.nomU, c.nom AS categorie
              FROM message m 
              JOIN Utilisateur u ON m.idutil = u.idU 
              JOIN Categorie c ON u.id_Categorie = c.id
              WHERE m.parent_id " . ($parent_id ? "= ?" : "IS NULL") . "
              ORDER BY m.date_message DESC, m.heure_message DESC";
    $params = $parent_id ? [$parent_id] : [];
    $messages = $db->request($query, $params)->fetchAll(PDO::FETCH_ASSOC);

    foreach ($messages as $message) {
        $isAdmin = ($message['categorie'] == 'Administrateur') ? 'admin' : '';
        $userRole = ($message['categorie'] == 'Administrateur') ? ' (Admin)' : '';
        echo "<div class='message' style='margin-left: {$margin}px;'>";
        echo "<p><strong class='$isAdmin'>" . htmlspecialchars($message['nomU']) . $userRole . "</strong> (" . $message['date_message'] . " à " . $message['heure_message'] . ")</p>";
        echo "<p>" . htmlspecialchars($message['texte_message']) . "</p>";

        echo "<div class='button-container'>";
        
        if ($_SESSION['categorie'] == 'Administrateur') {
            echo "<form class='delete-form' action='../metier/delete_message.php' method='post' onsubmit='return confirm(\"Êtes-vous sûr de vouloir supprimer ce message ?\");'>
                    <input type='hidden' name='id_message' value='" . $message['id_message'] . "' />
                    <button type='submit' class='delete-button'>Supprimer</button>
                  </form>";
        }

        echo "<span class='reply-button' onclick='toggleReplyForm(this)'>Répondre</span>";
        echo "<form class='reply-form' action='../metier/post_message.php' method='post'>
                <textarea name='texte_message' placeholder='Votre réponse...' required></textarea>
                <input type='hidden' name='parent_id' value='" . $message['id_message'] . "' />
                <button type='submit'>Répondre</button>
              </form>";
        echo "<span class='view-replies-button' onclick='toggleReplies(this)'>Voir les réponses</span>";
        
        echo "</div>"; // End of button-container
        
        echo "<div class='replies'>";
        displayMessages($message['id_message'], $margin + 20);
        echo "</div>";
        echo "</div>";
    }
}

displayMessages();
?>
