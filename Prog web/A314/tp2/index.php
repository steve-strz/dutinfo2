
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8"/>
        <title> Mon TD N°1</title>
        <?php
          echo countWords("Ceci est une phrase  dd sfs a ") .'<br/>';
          echo countSentences("Ceci est une phrase. En voici une deuxieme. Et une troisieme.") .'<br/>';
          echo reverseWordsFromSentence("Ceci est une phrase. En voici une deuxieme. Et une troisieme.") .'<br/>';
          echo countSpecialChars("Ceci ! ! est une ... ... phrase ; , ; , ; .") .'<br/>';
        ?>
    </head>
    <body>
        <?php
          //exo 1.1
          function countWords($string){
            $words = 0;
            echo "Nombre de mot dans '" .$string. "' : ";
            for ($i=0; $i < strlen($string); $i++) { 
              if(substr($string, $i, 1) == " " && substr($string, $i+1, 1) != " "){
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
            echo "Nombre de phrases dans '" .$string. "' : ";
            for ($i=0; $i < strlen($string) ; $i++) { 
              if(substr($string, $i, 1) == "."){
                $sentences++;
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
            countWords($string);
          }
        ?>
    </body>
</html>