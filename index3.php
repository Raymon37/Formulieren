<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>

<?php
// define variables and set to empty values
$voornaamErr = $achternaamErr = $mobielErr = $emailErr = $adresErr = "";
$voornaam = $achternaam = $mobiel = $email = $adres = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["voornaam"])) {
    $voornaamErr = "Voornaam is required";
  } else {
    $voornaam = test_input($_POST["voornaam"]);
  }
  
  if (empty($_POST["achternaam"])) {
    $achternaamErr = "Achternaam is required";
  } else {
    $achternaam = test_input($_POST["achternaam"]);
  }
    
  if (empty($_POST["adres"])) {
    $adres = "";
  } else {
    $adres = test_input($_POST["adres"]);
  }

  if (empty($_POST["mobiel"])) {
    $mobiel = "";
  } else {
    $mobiel = test_input($_POST["mobiel"]);
  }

  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>Login Leerling</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Voornaam: <input type="text" name="voornaam">
  <span class="error">* <?php echo $voornaamErr;?></span>
  <br><br>
  Achternaam: <input type="text" name="achternaam">
  <span class="error">* <?php echo $achternaamErr;?></span>
  <br><br>
  Adres: <input type="text" name="adres">
  <span class="error"><?php echo $adresErr;?></span>
  <br><br>
  Mobiel: <input type="text" name="mobiel">
  <span class="error">* <?php echo $mobielErr;?></span>
  <br><br>
  Email: <input type="text" name="email">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>  
  

<?php
echo "<h2>Your Input:</h2>";
echo $voornaam;
echo "<br>";
echo $achternaam;
echo "<br>";
echo $adres;
echo "<br>";
echo $mobiel;
echo "<br>";
echo $email;
?>


</form>
</body>
</html>