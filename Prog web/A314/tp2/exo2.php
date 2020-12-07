
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
          //2.a
          $GLOBALS['x'] = 10;
          function returnGlobals(){
            $x = 20;
            echo "Variable locale = " .$x. " || Variable globale = " .$GLOBALS['x'];
          }

          //2.b
          function getServerData(){
            echo "SERVEUR_ADDR = " .$_SERVER['SERVER_ADDR']. " || HTTP_HOST = " .$_SERVER['HTTP_HOST']. " || REMOTE_ADDR = " .$_SERVER['REMOTE_ADDR'];
          }

          //2.c
          function getEnvData(){
            foreach ($_ENV as $key => $value) {
              echo "<br/>" .$key. " => " .$value;
            }
          }
        ?>
        <a style="color: #46a685;" href="index.php">Retour à index</a>
        <div class="container">
          <div class="question">
            <h3> EXERCICE 2 </h3>
            <div class="details">
              <h4> 2.a </h4>
              <p>Exemple d'accès a une variable GLOBALS 'x'</p>
              <code>
              &nbsp;$GLOBALS['x'] = 10;<br/>
              &nbsp;function returnGlobals(){<br/>
                &nbsp;&nbsp;$x = 20;<br/>
                &nbsp;&nbsp;echo "Variable locale = " .$x. " || Variable globale = " .$GLOBALS['x'];<br/>
              &nbsp;}<br/>
              </code>
              > Resultat :  <?php returnGlobals() ?>
            </div>
            <div class="details">
              <h4> 2.b </h4>
              <p>Exemple d'accès aux informations stockés dans $_SERVER : </p>
              <code>
              function getServerData(){<br/>
                &nbsp;echo "SERVEUR_ADDR = " .$_SERVER['SERVER_ADDR']. " || HTTP_HOST = " .$_SERVER['HTTP_HOST']. " || REMOTE_ADDR = " .$_SERVER['REMOTE_ADDR'];<br/>
              }<br/>
              </code>
              > Resultat :  <?php getServerData() ?>
            </div>
            <div class="details">
              <h4> 2.c </h4>
              <p>Exemple d'accès aux informations stockés dans $_ENV : </p>
              <code>
              function getEnvData(){<br/>
                &nbsp;foreach ($_ENV as $key => $value) {<br/>
                  &nbsp;&nbsp;echo "< br/>" .$key. " => " .$value;<br/>
                &nbsp;}<br/>
              }
              </code>
              > Resultat :  <?php getEnvData() ?>
            </div>
          </div>
        </div>
    </body>
</html>