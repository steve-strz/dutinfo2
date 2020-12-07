
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8"/>
        <title> Mon TD N°2</title>
        <link href="../public/styles.css" rel="stylesheet">
    </head>
    <body>
        <header>
          <div class="row" style="justify-content:center; padding-top: 15px">
            <div class="col">
              <h2>TP2 – Manipulation	des	boucles,	expressions	conditionnelles	et	introduction	aux	tables	globales.</h2>
            </div>
          </div>
        </header>
        <?php
          //3.a 3.b
          function showDate($array){
            echo "Bonjour, nous sommes le ";
            foreach ($array as $key => $value) {
              echo date($value) ." ";
            }
          }

          //3.c
          function showHour($array){
            echo "Il est actuellement : ";
            foreach ($array as $key => $value) {
              echo date($value) ." ";
            }
          }

          //3.d
          function createDate(){
            echo date("l jS F Y", mktime(0, 0, 0, 9, 2, 2010));
          }
        ?>
        <a style="color: #46a685;" href="index.php">Retour à index</a>
        <div class="container">
          <div class="question">
            <h3> EXERCICE 3 </h3>
            <div class="details">
              <h4> 3.a </h4>
              <p>Affichage de la date au moment t :</p>
              <code>
              function showDate($array){<br/>
                &nbsp;echo "Bonjour, nous sommes le ";<br/>
                &nbsp;foreach ($array as $key => $value) {<br/>
                  &nbsp;&nbsp;echo date($value) ." ";<br/>
                &nbsp;}<br/>
              }
              </code>
              > Resultat pour date('l jS F Y'):  <?php showDate(['l','jS','F','Y']) ?>
            </div>
            <div class="details">
              <h4> 3.b </h4>
              <p>Affichage de la date au moment t avec format année, mois et jour :</p>
              <code>
              function showDate($array){<br/>
                &nbsp;echo "Bonjour, nous sommes le ";<br/>
                &nbsp;foreach ($array as $key => $value) {<br/>
                  &nbsp;&nbsp;echo date($value) ." ";<br/>
                &nbsp;}<br/>
              }
              </code>
              > Resultat pour date('Y F jS'):  <?php showDate(['Y','F','jS']); ?>
            </div>
            <div class="details">
              <h4> 3.c </h4>
              <p>Affichage de l'heure : </p>
              <code>
              function showHour($array){<br/>
                &nbsp;echo "Il est actuellement : ";<br/>
                &nbsp;foreach ($array as $key => $value) {<br/>
                  &nbsp;&nbsp;echo date($value) ." ";<br/>
                &nbsp;}<br/>
              }
              </code>
              > Resultat pour date('h:i:s'):  <?php showHour(['h:i:s']); ?>
            </div>
            <div class="details">
              <h4> 3.d </h4>
              <p>Création d'une nouvelle date : </p>
              <code>
              function createDate(){<br/>
                &nbsp;echo date("l jS F Y", mktime(0, 0, 0, 9, 2, 2010));<br/>
              }
              </code>
              > Resultat pour date('h:i:s'):  <?php createDate(); ?>
            </div>
          </div>        
        </div>
    </body>
</html>