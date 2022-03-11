<?php
require 'database.php';

$nameError = $descriptionError = $priceError = $categoryError = $imageError = $name = $description = $price = $category = $image = "";     // ici c'est le pre mier passage.

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
                <h1><strong>Ajouter un item</strong></h1>
                <br>
                <form  class="form" role="form" action="insert.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name">Nom:</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nom" value="<?php echo $name; ?>">
                        <span class="help-inline"><?php echo $nameError; ?></span>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="name">Description:</label>
                        <input type="text" class="form-control" id="description" name="description" placeholder="DEscription" value="<?php echo $description; ?>">
                        <span class="help-inline"><?php echo $descriptionError; ?></span>
                    </div>
                    <br>
                    <div class="form-group">
                    <label for="name">Prix: (en $)</label>
                        <input type="number" step="0.01" class="form-control" id="price" name="price" placeholder="prix" value="<?php echo $price; ?>">
                        <span class="help-inline"><?php echo $priceError; ?></span>
                    </div>
                    <br>
                    <div class="form-group">
                    <label for="category">Categorie:</label>
                        <select class="form-control" id="category" name="category">
                            <?php
                                $db = Database::connect();
                                foreach($db->query('SELECT * FROM categories') as $row)
                                {
                                    echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                                }
                                database::disconnect();
                            ?>

                        </select>
                        <span class="help-inline"><?php echo $categoryError; ?></span>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="image">Sélectionner une image:</label> <br>
                        <input type="file" id="image" name="image">
                        <span class="help-inline"><?php echo $imageError; ?></span>
                    </div>
                </form>

                <div class="form-actions">
                    <br>
                    <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span> Ajouter</button>
                    <a class="btn btn-primary" href="index.php" role="button"><span class="glyphicon glyphicon-arrow-left"></span> Retour</a>
                </div>
                
            </div>

        </div>
    </body>


</html>
