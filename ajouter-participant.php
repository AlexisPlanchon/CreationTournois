<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Creer tournoi</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="creer-tournoi.css">
</head>
<body>

<div class="nav">
  <div class="nav-header">
    <img src="logo.png" height="100%" />
  </div>
  <div class="nav-btn">
    <label for="nav-check">
      <span></span>
      <span></span>
      <span></span>
    </label>
  </div>
  <input type="checkbox" id="nav-check">
  <div class="nav-links">
    <a href="creer-tournoi.php">Créer tournoi</a>
  </div>
</div>

  <form action="ajouter-participant-post.php" method="POST">

    <label>Nom du nouveau participant</label><br /><input type="text" name="nom" required placeholder="Nom..." /><br />
    <br />
    <input type="submit" value="Valider" />

  </form>

  <footer>
  <p>
  © Copyright 2019 Alexis & Ambroise. All rights reserved.
</p>
  </footer>

  <script type="text/javascript" src="creer-tournoi.js"></script>

</body>
</html>
