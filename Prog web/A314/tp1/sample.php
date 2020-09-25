<?php
    $h1 = '<h1>TD 1 - A la découverte du PHP</h1>';
    $p = <<<_EOS_
        <p>Voici un <br/> premier <br/> paragraphe.. </p>
    _EOS_;
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8"/>
        <title> Mon TD N°1</title>
    </head>
    <body>
        <?php
            echo $h1;
            echo $p;
            var_dump($p);
        ?>
    </body>
</html>