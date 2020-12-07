<?php
  echo "Résultats traités : <br/>";
  echo "Votre prénom : " .$_GET['surname']. "<br/>";
  echo "Votre nom : " .$_GET['name']. "<br/>";
  echo "Votre email : " .$_GET['email']. "<br/>";
  echo "Votre civilité : " .$_GET['civilite']. "<br/>";
  echo "Votre/Vos vin(s) : ";
  foreach ($_GET['typeVin'] as $key => $value) {
    echo $value. " ; ";
  }
?>