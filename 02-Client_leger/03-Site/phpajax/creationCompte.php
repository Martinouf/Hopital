<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="connexion.css" />
</head>
<body>
<?php
require('config.php');
if (isset($_REQUEST['Username'], $_REQUEST['password'])){
  $username = stripslashes($_REQUEST['Username']);
  $username = mysqli_real_escape_string($conn, $username); 
  $password = stripslashes($_REQUEST['password']);
  $password = mysqli_real_escape_string($conn, $password);
    $query = "INSERT into `PERSONNEL` (Username, password)
              VALUES ('$username', '".hash('sha256', $password)."')";
    $res = mysqli_query($conn, $query);
    if($res){
       echo "<div class='sucess'>
             <h3>Vous êtes inscrit avec succès.</h3>
             <p>Cliquez ici pour vous <a href='index.html'>connecter</a></p>
       </div>";
    }
}else{
?>
<form class="box" action="" method="post">
  <h1 class="box-logo box-title"><a href="03-Site/hopital.html">Hopital</a></h1>
    <h1 class="box-title">S'inscrire</h1>
  <input type="text" class="box-input" name="Username" placeholder="Nom d'utilisateur" required />
    <input type="password" class="box-input" name="password" placeholder="Mot de passe" required />
    <input type="submit" name="submit" value="S'inscrire" class="box-button" />
    <p class="box-register">Déjà inscrit? <a href="login.php">Connectez-vous ici</a></p>
</form>
<?php } ?>
</body>
</html>