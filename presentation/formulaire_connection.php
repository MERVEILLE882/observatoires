<!--<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CONNEXION</title>
<link rel="stylesheet" href="formc.css">
  </head>
  <body>
  <div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->
    <!--<h2 class="active"> CONNEXION </h2>
    <!-- Icon -->
   <!-- <div class="fadeIn first">
      <img src="../images/iconuser.png" id="icon" alt="User Icon" />
    </div>

    <!-- Login Form -->
   <!-- <form action="../metier/traitement_connexion.php" method="post">
      <input type="email" id="email" class="fadeIn second" name="email" placeholder="email" required>
      <input type="password" id="password" class="fadeIn third" name="password" placeholder="password" required>
      <input type="submit" class="fadeIn fourth" value="Se connecter">
    </form>

    <!-- Remind Passowrd -->
   <!-- <div id="formFooter">
      <a class="underlineHover" href="../metier/reset-password.php">Mot de passe oublié?</a>
      <a class="underlineHover" href="formulaire_inscription.php">Vous n'avez pas de compte?<strong>inscrivez-vous</strong></a>
    </div>

  </div>
</div>
</body>
</html>-->





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CONNEXION</title>
    <link rel="stylesheet" href="formc.css">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->
    <h2 class="active"> CONNEXION </h2>
    <!-- Icon -->
    <div class="fadeIn first">
      <img src="../images/iconuser.png" id="icon" alt="User Icon" />
    </div>

    <!-- Login Form -->
    <form action="../metier/traitement_connexion.php" method="post">
      <input type="email" id="email" class="fadeIn second" name="email" placeholder="email" required>
      <input type="password" id="password" class="fadeIn third" name="password" placeholder="password" required>
      <div class="g-recaptcha" data-sitekey="6LfJ-P0pAAAAAFg3Rvu9LWpcEnjT014INprEs6i7"></div>
      <input type="submit" class="fadeIn fourth" value="Se connecter">
    </form>

    <!-- Remind Password -->
    <div id="formFooter">
      <a class="underlineHover" href="../metier/reset-password.php">Mot de passe oublié?</a>
      <a class="underlineHover" href="formulaire_inscription.php">Vous n'avez pas de compte?<strong>inscrivez-vous</strong></a>
    </div>
  </div>
</div>
</body>
</html>







