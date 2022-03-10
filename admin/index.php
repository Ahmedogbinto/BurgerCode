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
                <h1><strong>Liste des items   </strong><a class="btn btn-success" href="insert.php" role="button"><span class="glyphicon glyphicon-plus"></span>Ajouter</a></h1>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Description</th>
                            <th>Prix</th>
                            <th>Catégories</th>
                            <th>Actions</th>    
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require 'database.php';
                        $db = Database::connect();
                        $statement = $db->query('SELECT items.id, items.name, items.description, items.price, 
                                                categories.name AS category FROM items LEFT JOIN categories
                                                 ON items.category = categories.id ORDER BY items.id DESC');

                        while($item = $statement->fetch())
                        {
                            echo '<tr>';
                            echo '<td>' . $item['name'] . '</td>';
                            echo '<td>' . $item['description'] . '</td>';
                            echo '<td>' . number_format((float)$item['price'],2,'.','',) . '</td>';
                            echo '<td>' . $item['category'] . '</td>';
                            echo '<td width=240>';

                            echo '<a class="btn btn-default" href="view.php? id=' . $item['id'] . '" role="button"><span class="glyphicon glyphicon-eye-open"></span> Voir</a>';
                            echo'  '; 
                            echo '<a class="btn btn-primary" href="update.php? id= ' . $item['id'] . '" role="button"><span class="glyphicon glyphicon-pencil"></span> Modifier</a>';
                            echo'  ';
                            echo '<a class="btn btn-danger" href="delete.php? id= ' . $item['id'] . '" role="button"><span class="glyphicon glyphicon-remove"></span> Supprimer</a>';
                            
                            echo '</td>';
                            echo '</tr>';
                            
                        }
                        Database::connect();

                        ?>

                    </tbody>

                </table>
            </div>

        </div>
    </body>


</html>
