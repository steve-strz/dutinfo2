
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8"/>
        <title> Mon TD N°1</title>
        <?php
            $x = 2;
            $y = 4;
            $z = 0;
            $msg = "Bonjour à tous";
            define("constante", "i'm the constante");
        ?>
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
            echo "\"Je m'appelle Martin\" <br/>";
            //3.3
            echo strlen('utilisation de la fonction strlen');
            echo '<br/>';
            echo strpos('utilisation de la fonction strpos', 'utilisation');
            echo '<br/>';
            echo strpos('utilisation de la fonction strpos', 'fonction');
            echo '<br/>';
            echo strstr('utilisation de la fonction strstr', 'la');
            echo '<br/>';
            echo substr('utilisation de la fonction substr', -4);
            echo '<br/>';
            echo str_replace('test', 'coucou', 'ceci est un test');
            echo '<br/>';
            echo html_entity_decode('<b>ceci est un test</b>');
        ?>
    </body>
</html>