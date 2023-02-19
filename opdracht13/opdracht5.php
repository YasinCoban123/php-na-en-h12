<?php
session_start();

if (isset($_SESSION['username'])) {
  header('Location: dashboard.php');
  exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = $_POST['username'];
  $password = $_POST['password'];

  try {
    $db = new PDO("mysql:host=localhost;dbname=fietsenmaker", "root", "");
  } catch (PDOException $e) {
    die("Error!: " . $e->getMessage());
  }

  $query = $db->prepare("SELECT * FROM gebruikers WHERE username = :username");
  $query->bindParam(":username", $username);
  $query->execute();
  $user = $query->fetch(PDO::FETCH_ASSOC);

  if ($user && password_verify($password, $user['password'])) {
    $_SESSION['username'] = $user['username'];
    header('Location: dashboard.php');
    exit;
  } else {
    $error = "Ongeldige gebruikersnaam of wachtwoord.";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Inloggen</title>
</head>
<body>
  <h1>Inloggen</h1>

  <?php if (isset($error)) { ?>
    <p><?php echo $error; ?></p>
  <?php } ?>

  <form method="post" action="">
    <label for="username">Gebruikersnaam:</label>
    <input type="text" id="username" name="username" required>

    <label for="password">Wachtwoord:</label>
    <input type="password" id="password" name="password" required>

    <input type="submit" value="Inloggen">
  </form>
</body>
</html>
