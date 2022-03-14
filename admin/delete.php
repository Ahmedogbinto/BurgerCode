<?php
require 'database.php';
if(!empty($_GET['id']))
{
    $id = checkInput($_GET['id']);
}
if(!empty($_POST))   //Deuxieme passage, recuperation de l id avec la variable GLOBAL POST
{
    $id = checkInput($_POST['id']);
    $db = Database::connect();
    $statement = $db->prepare("DELETE FROM items WHERE id = ?");
    $statement->execute(array($id));
    Database::disconnect();
    header("Location: index.php");

}

function checkInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;

}

?>


<!DOCTYPE html>
<html>

    <head>
        <title>Burger Code</title>

        <meta charset="utf-8" />

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css">

        <link rel="stylesheet" href="../css/styles.css">

        <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'>
    </head>

    <body>
        <h1 class="text-logo"><span class="glyphicon glyphicon-cutlery"></span> Burger Code <span class="glyphicon glyphicon-cutlery"></span></h1>
        <div class="container admin">
            <div class="row">
                <h1><strong>Supprimer un item</strong></h1>
                <br>
                <form  class="form" role="form" action="delete.php" method="post">   
                    <input type="hidden" name="id" value="<?php echo $id;?>"/>                           
                    <p class="alert alert-warning">Êtes-vous sur de vouloir supprimer?</p>


                    <div class="form-actions"></div>
                        <button type="submit" class="btn btn-warning">Oui</button>
                        <a class="btn btn-default" href="index.php" role="button">Non</a>
                    </div>
                </form>
            </div>

        </div>
    </body>


</html>
