<?php
// Assurez-vous que l'utilisateur est connecté ou a les autorisations nécessaires pour modifier la publication
$idPublication = isset($_GET['id']) ? $_GET['id'] : null;

if ($idPublication) {
  // Connexion à la base de données
  require_once '../access_donnees/basedonnee.php';
  $db = new basedonnee();

  // Récupérer les informations de la publication
  $sql = "SELECT * FROM Publication WHERE idP = ?";
  $params = [$idPublication];
  $result = $db->request($sql, $params);
  $publication = $db->recover($result, true);

  if ($publication) {
    // Récupérer les noms des entités associées
    $sqlOrganisation = "SELECT id_organisation, nom_organisation FROM OrganisationEtatique WHERE id_organisation = ?";
    $paramsOrganisation = [$publication->id_organisation];
    $organisation = $db->recover($db->request($sqlOrganisation, $paramsOrganisation), true);

    $sqlPays = "SELECT id_pays, nom_pays FROM Pays WHERE id_pays = ?";
    $paramsPays = [$publication->id_pays];
    $pays = $db->recover($db->request($sqlPays, $paramsPays), true);

    $sqlContinent = "SELECT id_continent, nom_continent FROM Continent WHERE id_continent = ?";
    $paramsContinent = [$publication->id_continent];
    $continent = $db->recover($db->request($sqlContinent, $paramsContinent), true);
    ?>
    <!DOCTYPE html>
    <html>
    <head>
      <meta charset="UTF-8">
      <title>Modifier la publication</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
      <style>
        body { background-color: #f8f9fa; padding: 20px; }
        .container { max-width: 500px; margin: 0 auto; background-color: #ffffff; padding: 20px; border-radius: 5px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); }
        .form-group { margin-bottom: 20px; }
        .form-label { font-weight: bold; color: #333333; }
        .form-control { border-color: #dddddd; }
        .btn-primary { background-color: #007bff; border-color: #007bff; }
        .btn-primary:hover { background-color: #0056b3; border-color: #0056b3; }
      </style>
    </head>
    <body>
    <div class="container">
      <h1 style="color: #007bff;">Modifier la publication</h1>
      <form method="POST" action="traitement_modification.php" enctype="multipart/form-data">
        <input type="hidden" name="idPublication" value="<?php echo $publication->idP; ?>">
        <div class="form-group">
          <label for="titre" class="form-label">Titre</label>
          <input type="text" class="form-control" id="titre" name="titre" value="<?php echo htmlspecialchars($publication->titreP); ?>" required>
        </div>
        <div class="form-group">
          <label for="contenu" class="form-label">Contenu</label>
          <textarea class="form-control" id="contenu" name="contenu" required><?php echo htmlspecialchars($publication->contenuP); ?></textarea>
        </div>
        <div class="form-group">
          <label for="auteur" class="form-label">Auteur</label>
          <input type="text" class="form-control" id="auteur" name="auteur" value="<?php echo htmlspecialchars($publication->auteurP); ?>" required>
        </div>
        <div class="form-group">
          <label for="typedocument" class="form-label">Type de document</label>
          <input type="text" class="form-control" id="typedocument" name="typedocument" value="<?php echo htmlspecialchars($publication->type_document); ?>" required>
        </div>
        <div class="form-group">
          <label for="document" class="form-label">Document</label>
          <input type="file" class="form-control" id="document" name="document">
          <p>Document actuel : <?php echo htmlspecialchars(basename($publication->document)); ?></p>
        </div>
        <div class="form-group">
          <label for="image_descriptive" class="form-label">Image descriptive</label>
          <input type="file" class="form-control" id="image_descriptive" name="image_descriptive">
          <p>Image descriptive actuelle : <?php echo htmlspecialchars(basename($publication->image_descriptive)); ?></p>
        </div>
        <div class="form-group">
          <label for="organisation" class="form-label">Organisation</label>
          <input type="text" class="form-control" id="organisation" name="organisation" value="<?php echo isset($organisation) ? htmlspecialchars($organisation->nom_organisation) : ''; ?>" required>
        </div>
        <div class="form-group">
          <label for="pays" class="form-label">Pays</label>
          <input type="text" class="form-control" id="pays" name="pays" value="<?php echo isset($pays) ? htmlspecialchars($pays->nom_pays) : ''; ?>" required>
        </div>
        <div class="form-group">
          <label for="continent" class="form-label">Continent</label>
          <input type="text" class="form-control" id="continent" name="continent" value="<?php echo isset($continent) ? htmlspecialchars($continent->nom_continent) : ''; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary" onclick="return confirm('Êtes-vous sûr de vouloir modifier cette publication?');">Valider</button>
      </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
    </html>
    <?php
  } else {
    echo "Aucune publication correspondante trouvée.";
  }
} else {
  echo "Identifiant de publication non fourni.";
}
?>
