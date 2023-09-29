<!DOCTYPE html>
<html lang="en">
<!--HEAD-->
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>Login</title>
</head>
<form action="php/verif_connexion.php" method="post">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Courriel</label>
        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
        <input type="password" name="mdp" class="form-control" id="exampleInputPassword1">
    </div>
    <button type="submit" class="btn">Se connecter</button>
</form>
</html>