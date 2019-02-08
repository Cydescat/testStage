<?php
include_once "functions.php";
include_once "autoload.php";

$um = new UserManager();

if (isset($_POST['search']))
{
    $users = $um->findBy(purge($_POST['id']), purge($_POST['firstName']), purge($_POST['lastName']));

}
else
{
    $users = $um->findBy();

}

$usersTemplate = "";
$template = file_get_contents('templates/list_template.html');

foreach ($users as $user)
    $usersTemplate .= adaptUsers($user, $template);


function adaptUsers(User $user, $template)
{
    $arrValues =
        [
            '{{id}}' => $user->getId(),
            '{{firstName}}' => $user->getFirstName(),
            '{{lastName}}' => $user->getLastName()
        ];

    return strtr($template, $arrValues);
}

?>
<html>
    <head>
        <title>Test Stage Liste</title>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/css/materialize.min.css">
        <link rel="stylesheet" href="CSS/style.css">
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div class="container">
            <form method="post">
                <div class="row">
                    <div class="col s12">
                    </div>
                    <div class="col s12 center">
                        <h3 class="title">User list</h3>
                    </div>
                </div>
                <form method="post" action="">
                    <div class="row valign-wrapper">
                        <div class="input-field col s2 center-align">
                            <input id="id" type="text" name="id" class="validate">
                            <label for="id">Id</label>
                        </div>
                        <div class="input-field col s4 center-align">
                            <input id="first_name" type="text" name="firstName" class="validate">
                            <label for="first_name">First Name</label>
                        </div>
                        <div class="input-field col s4 center-align">
                            <input id="last_name" type="text" name="lastName" class="validate">
                            <label for="last_name">Last Name</label>
                        </div>
                        <button class="btn waves-effect waves-light col s2 center-align" type="submit" name="search">Search
                            <i class="material-icons right">search</i>
                        </button>
                    </div>
                </form>
                <div class="table-wrapper">
                    <table class="responsive-table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>First Name</th>
                                <th>Last name</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php echo $usersTemplate?>
                        </tbody>
                    </table>
                </div>
            </form>
        </div>
        <div class="fixed-action-btn">
            <a href="createUser.php" class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">add</i></a>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="JavaScript/main.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/js/materialize.min.js"></script>
    </body>
</html>
