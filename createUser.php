<!DOCTYPE html>
<?php
include_once "functions.php";
include_once "autoload.php";

$um = new UserManager();

$fn = "";
$ln = "";

if (isset($_POST['firstName']) && isset($_POST['lastName']))
{
    $fn = purge($_POST['firstName']);
    $ln = purge($_POST['lastName']);
    if($fn)
    {
        if ($ln)
        {
            if (!preg_match("/^([a-zA-Z' ]+)$/", $fn))
                alert("Prénom invalide");
            else if (!preg_match("/^([a-zA-Z' ]+)$/", $ln))
                alert("Nom invalide");
            else
            {
                $um->create($fn, $ln);
                header('Location: users.php');
            }
        }
        else
            alert("Veuillez renseigner un nom");
    }
    else
    {
        alert("Veuillez renseigner un prénom");
    }
}

?>

<html>
<head>
    <title>Test Stage Création</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/css/materialize.min.css">
    <link rel="stylesheet" href="CSS/style.css">
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<div class="container cadre row">
    <h3 class="center">Ajouter un utilisateur</h3>
    <form method="post" action="" class="col s10 offset-s1 row">
        <div class="input-field col s12">
            <input id="firstName" name="firstName" value="<?php $fn ?>" type="text" required maxlength="255">
            <label for="firstName">First Name</label>
        </div>
        <div class="input-field col s12">
            <input id="lastName" name="lastName" value="<?php $ln ?>" type="text" required maxlength="255">
            <label for="lastName">Last Name</label>
            <button type="submit" class="btn waves-effect waves-light" name="submit" value="">Valider</button>
    </form>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="JavaScript/main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/js/materialize.min.js"></script>
</body>
</html>
