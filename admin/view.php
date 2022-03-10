<?php
require 'database.php';

if(!empty($_GET['id']))
{
    $id = checkInput($_GET['id']);
}

function checkInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$db = Database::connect();
$statement = $db->prepare('SELECT items.id, items.name, items.description, items.price, items.image, 
                            categories.name AS category FROM items LEFT JOIN categories
                            ON items.category = categories.id WHERE items.id = ?');

$statement->execute(array($id));
$item = $statement->fetch();
Database::connect();
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
                <div class="col-md-6">
                    <h1><strong>Voir un item</strong></h1>
                    <br>
                    <form>
                        <div class="form-group">
                            <label>Nom:</label><?php echo ' ' . $item['name'] ?>
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Description:</label><?php echo ' ' . $item['description'] ?>
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Prix:</label><?php echo ' ' . number_format((float)$item['price'],2,'.','',) ?>
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Catégories:</label><?php echo ' ' . $item['name'] ?>
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Image:</label><?php echo ' ' . $item['image'] ?>
                        </div>
                    </form>
                    <br>
                    <br>
                    <div class="form-actions">
                        <a class="btn btn-primary" href="index.php" role="button"><span class="glyphicon glyphicon-arrow-left"></span> Retour</a>
                    </div>
                </div>

                
                <div class="col-md-6 site">
                    <div class="img-thumbnail">
                        <img src="<?php  echo '../images/' . $item['image'] ; ?>" class="img-fluid" alt="...">
                            <div class="price"><?php echo number_format((float)$item['price'],2,'.','',) ; ?></div>
                                <div class="caption">
                                 <h4><?php echo $item['name'] ;?></h4>
                                    <p><?php echo $item['description'] ; ?></p>
                                    <a href ="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span></span> Commander</a>
                                </div>
                    </div>
                </div>
             
                
            </div>

        </div>
    </body>


</html>
