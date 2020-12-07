
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
          //Extra
          function checkSpecialCaracter($char){
            switch ($char) {
              case '.':
                return true;
                break;
              case ',':
                return true;
                break;
              case ';':
                return true;
                break;
              case '!':
                return true;
                break;
              case '?':
                return true;
                break; 
              default:
                return false;
                break;
            }
          }

          //exo 1.1
          function countWords($string){
            $words = 0;
            for ($i=0; $i < strlen($string); $i++) {
              if(substr($string, $i, 1) == " " && (substr($string, $i+1, 1) != " " && !checkSpecialCaracter(substr($string, $i+1, 1)))){
                $words++;
              }
            }
            if(substr($string, strlen($string)-1, 1) != " "){
              $words++;
            }
            return $words;
          }

          //exo1.2
          function countSentences($string){
            $sentences = 0;
            if(substr($string, strlen($string)-1, 1) != "."){
              return "Votre texte ne termine pas par un point.";
            }
            for ($i=0; $i < strlen($string) ; $i++) { 
              if(substr($string, $i, 1) == "."){
                if(substr($string, $i, 3) != "...") $sentences++;
                else $i+=2;
              }
            }
            return $sentences;
          }

          //exo1.3
          function reverseWordsFromSentence($string){
            $wordsArray = array();
            $word = "";
            for ($i=0; $i < strlen($string) ; $i++) {
              if(substr($string, $i, 1) != "."){
                if(substr($string, $i, 1) != " "){
                  $word .= substr($string, $i, 1);
                }else{
                  array_push($wordsArray, $word);
                  $word = "";
                }
              }else{
                array_push($wordsArray, $word);
                $word = "";
                for ($j=count($wordsArray)-1; $j >= 0 ; $j--) { 
                  echo $wordsArray[$j]. " ";
                }
                echo ".";
                $wordsArray = array();
              }
            }
          }

          //exo1.4
          // nbr mot  ,  ;  !  ? ...
          function countSpecialChars($string){
            $tab = [
              'words' => 0, 
              'sentences' => 0, 
              'points' => 0, 
              'virgules' => 0,
              'points-virgules' => 0,
              'exclamations' => 0,
              'interrogations' => 0,
              'trois-points' => 0
            ];
            $toAdd = '';
            for($i=0; $i < strlen($string); $i++){
              switch (substr($string, $i, 1)) {
                case '.':
                  if(substr($string, $i, 3) == '...') {
                    $toAdd = 'trois-points';
                    $i+=2;
                  }
                  else $toAdd = 'points';
                  break;
                case ',':
                  $toAdd = 'virgules';
                  break;
                case ';':
                  $toAdd = 'points-virgules';
                  break;
                case '!':
                  $toAdd = 'exclamations';
                  break;
                case '?':
                  $toAdd = 'interrogations';
                  break;              
                default:
                  $toAdd = '';
                  break;
              }
              foreach($tab as $key => $value) {
                if($key == $toAdd){
                  $tab[$key]++;
                }
              }
            }

            $tab['words'] = countWords($string);
            $tab['sentences'] = countSentences($string);

            foreach($tab as $key => $value) {
              echo $key. " => " .$value ." <br/>";
            }
          }

          //exo 1.5
          function passwordGenerator($word){
            $finalPassword = [];
            if(strlen($word) == 6){
              for($i = 0; $i < 4; $i++){
                array_push($finalPassword, random_int(0,9));
                array_push($finalPassword, substr($word, random_int(0, 5), 1));
              }
              foreach ($finalPassword as $key => $value) {
                echo $value;
              }
            }else{
              echo "Le mot doit faire 6 caractères.";
            }
          }
        ?>
        <a style="color: #46a685;" href="index.php">Retour à index</a>
        <div class="container">
          <div class="question">
            <h3> EXERCICE 1 </h3>
            <div class="details">
              <h4> 1.a </h4>
              <p>Fonction permettant de compter les mots dans une phrase : </p>
              <code>
                function countWords($string){ <br/>
                &nbsp;$words = 0; <br/>
                &nbsp;for ($i=0; $i < strlen($string); $i++) { <br/>
                &nbsp;&nbsp;if(substr($string, $i, 1) == " " && (substr($string, $i+1, 1) != " " && !checkSpecialCaracter(substr($string, $i+1, 1)))){ <br/>
                &nbsp;&nbsp;&nbsp;$words++; <br/>
                &nbsp;&nbsp;} <br/>
                &nbsp;} <br/>
                &nbsp;if(substr($string, strlen($string)-1, 1) != " "){ <br/>
                &nbsp;&nbsp;$words++; <br/>
                &nbsp;} <br/>
                &nbsp;return $words; <br/>
                } <br/>
              </code>
              > Resultat pour "Ceci est une ! ; . , phrase !" :  <?php echo countWords("Ceci est une ! ; . , phrase !") .'<br/>'; ?>
            </div>
            <div class="details">
              <h4> 1.b </h4>
              <p>Fonction permettant de compter les phrase dans un text : </p>
              <code>
              function countSentences($string){ <br/>
              &nbsp;$sentences = 0; <br/>
              &nbsp;if(substr($string, strlen($string)-1, 1) != "."){ <br/>
              &nbsp;&nbsp;return "Votre texte ne termine pas par un point."; <br/>
              &nbsp;} <br/>
              &nbsp;for ($i=0; $i < strlen($string) ; $i++) { <br/>
              &nbsp;&nbsp;if(substr($string, $i, 1) == "."){ <br/>
              &nbsp;&nbsp;&nbsp;if(substr($string, $i, 3) != "...") $sentences++; <br/>
              &nbsp;&nbsp;&nbsp;else $i+=2; <br/>
              &nbsp;&nbsp;} <br/>
              &nbsp;} <br/>
              &nbsp;return $sentences; <br/>
              } <br/>
              </code>
              > Resultat pour "Ceci est une phrase. En voici une deuxieme. Et une troisieme." :  <?php echo countSentences("Ceci est une phrase. En voici une deuxieme. Et une troisieme.") .'<br/>'; ?>
            </div>
            <div class="details">
              <h4> 1.c </h4>
              <p>Fonction permettant d'inverser les mots dans une phrase : </p>
              <code>
              function reverseWordsFromSentence($string){<br/>
                &nbsp;$wordsArray = array();<br/>
                &nbsp;$word = "";<br/>
                &nbsp;for ($i=0; $i < strlen($string) ; $i++) {<br/>
                  &nbsp;&nbsp;if(substr($string, $i, 1) != "."){<br/>
                    &nbsp;&nbsp;&nbsp;if(substr($string, $i, 1) != " "){<br/>
                      &nbsp;&nbsp;&nbsp;&nbsp;$word .= substr($string, $i, 1);<br/>
                    &nbsp;&nbsp;&nbsp;}else{<br/>
                      &nbsp;&nbsp;&nbsp;&nbsp;array_push($wordsArray, $word);<br/>
                      &nbsp;&nbsp;&nbsp;&nbsp;$word = "";<br/>
                    &nbsp;&nbsp;&nbsp;}<br/>
                  &nbsp;&nbsp;}else{<br/>
                  &nbsp;&nbsp;&nbsp;array_push($wordsArray, $word);<br/>
                  &nbsp;&nbsp;&nbsp;$word = "";<br/>
                  &nbsp;&nbsp;&nbsp;for ($j=count($wordsArray)-1; $j >= 0 ; $j--) { <br/>
                    &nbsp;&nbsp;&nbsp;&nbsp;echo $wordsArray[$j]. " ";<br/>
                  &nbsp;&nbsp;&nbsp;}<br/>
                  &nbsp;&nbsp;&nbsp;echo ".";<br/>
                  &nbsp;&nbsp;&nbsp;$wordsArray = array();<br/>
                  &nbsp;&nbsp;}<br/>
                &nbsp;}<br/>
              }
              </code>
              > Resultat pour "Ceci est une phrase. En voici une deuxieme. Et une troisieme." :  <?php echo reverseWordsFromSentence("Ceci est une phrase. En voici une deuxieme. Et une troisieme.") .'<br/>'; ?>
            </div>
            <div class="details">
              <h4> 1.d </h4>
              <p>Fonction permettant de compter mots, phrases et quelques caractères spécials : </p>
              <code>
              function countSpecialChars($string){<br/>
                &nbsp;$tab = [<br/>
                  &nbsp;&nbsp;'words' => 0, <br/>
                  &nbsp;&nbsp;'sentences' => 0, <br/>
                  &nbsp;&nbsp;'points' => 0, <br/>
                  &nbsp;&nbsp;'virgules' => 0,<br/>
                  &nbsp;&nbsp;'points-virgules' => 0,<br/>
                  &nbsp;&nbsp;'exclamations' => 0,<br/>
                  &nbsp;&nbsp;'interrogations' => 0,<br/>
                  &nbsp;&nbsp;'trois-points' => 0<br/>
                &nbsp;];<br/>
                &nbsp;$toAdd = '';<br/>
                &nbsp;for($i=0; $i < strlen($string); $i++){<br/>
                  &nbsp;&nbsp;switch (substr($string, $i, 1)) {<br/>
                    &nbsp;&nbsp;&nbsp;case '.':<br/>
                      &nbsp;&nbsp;&nbsp;&nbsp;if(substr($string, $i, 3) == '...') {<br/>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$toAdd = 'trois-points';<br/>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$i+=2;<br/>
                      &nbsp;&nbsp;&nbsp;&nbsp;}<br/>
                      &nbsp;&nbsp;&nbsp;&nbsp;else $toAdd = 'points';<br/>
                      &nbsp;&nbsp;&nbsp;&nbsp;break;<br/>
                    &nbsp;&nbsp;&nbsp;case ',':<br/>
                      &nbsp;&nbsp;&nbsp;&nbsp;$toAdd = 'virgules';<br/>
                      &nbsp;&nbsp;&nbsp;&nbsp;break;<br/>
                    &nbsp;&nbsp;&nbsp; case ';':<br/>
                      &nbsp;&nbsp;&nbsp;&nbsp;$toAdd = 'points-virgules';<br/>
                      &nbsp;&nbsp;&nbsp;&nbsp;break;<br/>
                    &nbsp;&nbsp;&nbsp;case '!':<br/>
                      &nbsp;&nbsp;&nbsp;&nbsp;$toAdd = 'exclamations';<br/>
                      &nbsp;&nbsp;&nbsp;&nbsp;break;<br/>
                    &nbsp;&nbsp;&nbsp;case '?':<br/>
                      &nbsp;&nbsp;&nbsp;&nbsp;$toAdd = 'interrogations';<br/>
                      &nbsp;&nbsp;&nbsp;&nbsp;break; <br/>
                    &nbsp;&nbsp;&nbsp;default:<br/>
                      &nbsp;&nbsp;&nbsp;&nbsp;$toAdd = '';<br/>
                      &nbsp;&nbsp;&nbsp;&nbsp;break;<br/>
                  &nbsp;&nbsp;}<br/>
                  &nbsp;&nbsp;foreach($tab as $key => $value) {<br/>
                    &nbsp;&nbsp;&nbsp;if($key == $toAdd){<br/>
                      &nbsp;&nbsp;&nbsp;&nbsp;$tab[$key]++;<br/>
                    &nbsp;&nbsp;&nbsp;}<br/>
                  &nbsp;&nbsp;}<br/>
                &nbsp;}<br/>
                &nbsp;$tab['words'] = countWords($string);<br/>
                &nbsp;$tab['sentences'] = countSentences($string);<br/>

                &nbsp;foreach($tab as $key => $value) {<br/>
                  &nbsp;&nbsp;echo $key. " => " .$value ;<br/>
                &nbsp;}<br/>
              }<br/>
              </code>
              > Resultat pour "Le point d’exclamation !!!, le point d’interrogation ? et les points virgules ;; sont des signes de ponctuation forte... . Ils sont importants." :  
              <?php echo countSpecialChars("Le point d’exclamation !!!, le point d’interrogation ? et les points virgules ;; sont des signes de ponctuation forte... . Ils sont importants.") .'<br/>';?>
            </div>
            <div class="details">
              <h4> 1.e </h4>
              <p>Fonction permettant de générer un mot de passe de 4 lettres et de 4 chiffres : </p>
              <code>
              function passwordGenerator($word){<br/>
                &nbsp;$finalPassword = [];<br/>
                &nbsp;if(strlen($word) == 6){<br/>
                  &nbsp;&nbsp;for($i = 0; $i < 4; $i++){<br/>
                    &nbsp;&nbsp;&nbsp;array_push($finalPassword, random_int(0,9));<br/>
                    &nbsp;&nbsp;&nbsp;array_push($finalPassword, substr($word, random_int(0, 5), 1));<br/>
                  &nbsp;&nbsp;}<br/>
                  &nbsp;&nbsp;foreach ($finalPassword as $key => $value) {<br/>
                    &nbsp;&nbsp;&nbsp;echo $value;<br/>
                  &nbsp;&nbsp;}<br/>
                &nbsp;}else{<br/>
                  &nbsp;&nbsp;echo "Le mot doit faire 6 caractères.";<br/>
                &nbsp;}<br/>
              }
              </code>
              > Resultat pour le mot contenant "abcdef" :  <?php echo passwordGenerator("abcdef") .'<br/>'; ?>
            </div>
          </div>
          
        </div>
    </body>
</html>