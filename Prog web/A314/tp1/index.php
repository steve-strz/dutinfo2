<?php
    $x = 2;
    $y = 4;
    $z = 0;
    $msg = "Bonjour à tous";
    define("constante", "i'm the constante");
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8"/>
        <title> Mon TD N°1</title>
    </head>
    <body>
        <?php
            echo $msg. "<br/>";
            //2.4 : La plus grosse différence avec echo est que print n'accepte qu'un seul argument et retourne toujours 1. 
            echo $x. " " .$y. " " .$z. "<br/>";
            echo $x. " fois " .$y. " = " .$z=$x*$y;
            //3.1
            $cdc1 = "test";
            $cdc2 = 'test';
            //3.2
            echo "\"Je m'appelle Martin\"";
        ?>
    </body>
</html>