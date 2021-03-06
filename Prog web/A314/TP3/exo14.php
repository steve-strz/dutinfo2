<!DOCTYPE html>
<html lang="fr">
  <head>
      <meta charset="UTF-8"/>
      <title> Mon TD N°3</title>
      <link href="../public/styles.css" rel="stylesheet">
  </head>
  <body>
    <header>
      <div class="row" style="justify-content:center; padding-top: 15px">
        <div class="col">
          <h2>TP3 – Génération et traitement des formulaires HTML</h2>
        </div>
      </div>
    </header>
    <a style="color: #46a685;" href="index.php">Retour à index</a>
    <form action="exo14.php" method="GET" class="question">
      <h1 style="margin-top: 10px; margin-bottom: 30px; text-align: center;">FORMULAIRE</h1>
      <div class="subform">
        <div class="subform-col" style="flex: 2; text-align: right;">
          <label for="name">NOM </label>
        </div>
        <div class="subform-col" style="flex: 5;">
          <input type="text" id="surname" name="surname" required>
        </div>
      </div>
      <div class="subform">
        <div class="subform-col" style="flex: 2; text-align: right;">
          <label for="name">PRÉNOM </label>
        </div>
        <div class="subform-col" style="flex: 5">
          <input type="text" id="name" name="name" required>
        </div>
      </div>
      <div class="subform">
        <div class="subform-col" style="flex: 2; text-align: right;">
          <label for="name">EMAIL </label>
        </div>
        <div class="subform-col" style="flex: 5">
          <input type="text" id="email" name="email" required>
        </div>
      </div>
      <div class="subform">
        <div class="subform-col" style="flex: 2; text-align: right;">
          <legend>VOTRE CIVILITÉ </legend> 
        </div>
        <div class="subform-col" style="flex: 5">
          <div style="display: flex; flex-direction: row;">
            Mme<input type="radio" name="civilite" value="Mme" style="margin : 0 15px;">
            Mlle<input type="radio" name="civilite" value="Mlle" style="margin : 0 15px;">
            M<input type="radio" name="civilite" value="M." style="margin : 0 15px;">
          </div>
        </div>
      </div>
      <div class="subform">
        <div class="subform-col" style="flex: 2; text-align: right;">
          <label for="vinSelect"> VIN </label>
        </div>
        <div class="subform-col" style="flex: 5">
          <select name="typeVin[]" multiple id="vinSelect" size="6">
            <option value="St Emilion">St Emilion</option>
            <option value="Chateau l'hermitage">Château l'Hermitage</option>
            <option value="Entre les Deux Mers">Entre les deux mers</option>
            <option value="Fitou">Fitou</option>
            <option value="Bandol">Bandol</option>
            <option value="Cote de Provence">Côte de Provence</option>
          </select>
        </div>
      </div>
      <div class="subform" style="justify-content: flex-end; margin-top: 20px;">
        <input type="submit" value="Envoyer" style="font-size: 20px; height: 35px;">
      </div>
      <div>
        <?php
          if(!empty($_GET['typeVin'])){
            if(preg_match("([^A-Za-z \s \-])", $_GET['surname'])) echo "Le nom peut contenir les caractères suivant : A-Z, a-z, espace, tiret.";
            else if(preg_match("([^A-Za-z \s \-])", $_GET['name'])) echo "Le prénom peut contenir les caractères suivant : A-Z, a-z, espace, tiret.";
            else if(preg_match("([^A-Za-z0-9\.\@\-\_])", $_GET['email'])) echo "L'mail peut contenir les caractères suivant : A-Z, a-z, 0-9, tiret, tiret du bas, @ et point(s).";
            else if(checkEmailValidity($_GET['email'])){
              echo "Résultats traités : <br/>";
              echo "Votre prénom : " .$_GET['surname']. "<br/>";
              echo "Votre nom : " .$_GET['name']. "<br/>";
              echo "Votre email : " .$_GET['email']. "<br/>";
              echo "Votre civilité : " .$_GET['civilite']. "<br/>";
              echo "Votre/Vos vin(s) : ";
              echo "<ol>";
              foreach ($_GET['typeVin'] as $key => $value) {
                echo "<li>".$value."</li>";
              }
              echo "</ol>";
            }
          }
          function checkEmailValidity($email){
            if(preg_match("([\@].*[\.])", $email)){
              if(!preg_match("(\@.\.)", $email)){
                if(!preg_match("(^.\@)", $email)){
                  return true;
                }else{
                  echo "Erreur email : Il doit y avoir au moins 2 caractères entre le @ et le point.";
                  return false;
                } 
              }else{
                echo "Erreur email : Le @ et le point doivent être séparés par au moins 2 caractères.";
                return false;
              } 
            }else{
              echo "Erreur email : Il doit y avoir au moins un point et un @.";
              return false;
            }
          }
        ?>
      </div>
    </form>
  </body>
</html>