<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INSCRIPTION</title>
<link rel="stylesheet" href="formc.css">
  </head>
  <body>
  <div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->
    <h2 class="active"> INSCRIPTION </h2>

    <!-- Login Form -->
    <form action="../metier/traitement_inscription.php" method="post">
      <input type="text" id="nomU" class="fadeIn second" name="nomU" placeholder="Nom" required>
      <input type="email" id="email" class="fadeIn second" name="email" placeholder="email" required>
      <input type="password" id="password" class="fadeIn third" name="password" placeholder="password" required>
      <input type="date" id="date" class="fadeIn third" name="dateNaissance" placeholder="dateNaissance" required>
      <input type="submit" class="fadeIn fourth" value="S'inscrire">
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="formulaire_connection.php">Vous avez déja un compte?<strong>Connectez-vous</strong></a>
    </div>

  </div>
</div>
</body>
</html>






