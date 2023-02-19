<?php
try {
    $db = new PDO("mysql:host=localhost;dbname=fietsenmaker", "root", "");
} catch (PDOException $e) {
    die("Error!: " . $e->getMessage());
}


$username = "ik";
$password = password_hash("geheim", PASSWORD_DEFAULT);


$query = $db->prepare("INSERT INTO gebruikers (username, password) VALUES (:username, :password)");
$query->bindParam(":username", $username);
$query->bindParam(":password", $password);


if ($query->execute()) {
    echo "De nieuwe gegevens zijn toegevoegd.";
} else {
    echo "Er is een fout opgetreden!";
}
?>
