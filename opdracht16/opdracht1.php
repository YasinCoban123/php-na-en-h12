<?php
function generatePassword($length) {
  $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
  $password = "";
  for ($i = 0; $i < $length; $i++) {
    $randomIndex = rand(0, strlen($chars) - 1);
    $password .= substr($chars, $randomIndex, 1);
  }
  return $password;
}

// Gebruik de functie om een wachtwoord van lengte 10 te genereren
echo 'Hier is uw willekeurig wachtwoord van 10 tekens: ';
echo generatePassword(10);
?>