<?php
require 'database.php';    // 1- es ce que le GET il est vide: non, je le mets dans la variable (id) et le check avec checkInput

if(!empty($_GET['id']))
{
    $id = checkInput(($_GET['id']));
}

$nameError = $descriptionError = $priceError = $categoryError = $imageError = $name = $description = $price = $category = $image = "";     // ici c'est le pre mier passage, toutes variables sont vides ou on une valeur par defaut

if(!empty($_POST))         // 2-  la variable globale $_POST pour le moment elle est vide donc je n<entre pas encore dans le if qui suit. // 3-  Si je clique sur le bouton modifier alors la variable globale $_POST n<est plus vide
{  
    $name                = checkInput($_POST['name']);
    $description         = checkInput($_POST['description']);
    $price               = checkInput($_POST['price']);
    $category            = checkInput($_POST['category']);
    $image               = checkInput($_FILES['image']['name']);
    $imagePath           = '../images/'. basename($image);
    $imageExtension      = pathinfo($imagePath, PATHINFO_EXTENSION);
    $isSucces            = true;



    if(empty($name))
    {
        $nameError = 'Ce champ ne peut pas être vide';
        $isSuccess = false;
    }
    if(empty($description))
    {
        $descriptionError = 'Ce champ ne peut pas être vide';
        $isSuccess = false;
    }
    if(empty($price))
    {
        $priceError = 'Ce champ ne peut pas être vide';
        $isSuccess = false;
    }
    if(empty($category))
    {
        $categoryError = 'Ce champ ne peut pas être vide';
        $isSuccess = false;
    }
    if(empty($image))
    {
        $isImageUpdated = false;
    }
    else
    {
        $isImageUpdated = true;
        $isUploadSuccess = true;
        if($imageExtension !="jpeg" && $imageExtension !="png" && $imageExtension !="jpeg" && $imageExtension != "gif")
        {
            $imageError = "les fichiers autorisés sont: .jpg, .jpeg, .png, .gif";
            $isUploadSuccess = false;
        } 
        if(file_exists($imagePath))
        {
            $imageError = "le fichier existe deja";
            $isUploadSuccess = false;
        }
        if($_FILES["image"]["size"] > 500000)
        {
            $imageError = "le fichier ne doit pas depasser 500kB"; 
            $isUploadSuccess = false; 
        }
        if($isUploadSuccess)
        {
            if(!move_upload_file($_FILES["image"]["tmp_name"], $imagePath))
            {
                $imageError = "Il y a eu une erreur lors du televersement";
                $isUploadSuccess = false;
                
            }
        }
    }
    if(($isSucces && $isImageUpdated && $isUploadSucces) || ($isSuccess && !$isImageUpdated))
    {
        $db = Database::conect();
        if($isImageUpdated)
        {
            $statement = $db->prepare("UPDATE items set name = ?, description = ?, price = ?, category = ?, image = ? WHERE id = ?");
            $statement = $db->execute(array($name,$description,$price,$category,$image,$id));
        }
        else
        {
            $statement = $db->prepare("UPDATE items set name = ?, description = ?, price = ?, category = ?  WHERE id = ?");
            $statement = $db->execute(array($name,$description,$price,$category,$id));
        }
        Database::disconnect();
        header("Location: index.php");
    }
    else if($isImageUpdated && !$isUploadSuccess)
    {
        $db = Database::connect();
        $statement = $db->prepare("SELECT image FROM items WHERE id = ?");
        $statement->execute(array($id));
        $item = $statement->fetch();
        $image = $item['image'];
        Database::disconnect();    
    }
}
else
{
    $db = Database::connect();
    $statement = $db->prepare("SELECT * FROM items WHERE id = ?");
    $statement->execute(array($id));
    $item = $statement->fetch();
    $name                = $item['name'];
    $description         = $item['description'];
    $price               = $item['price'];
    $category            = $item['category'];
    $image               = $item['image'];
    Database::disconnect();
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
                <div class="col-md-6">
                    <h1><strong>Modifier un item</strong></h1>
                    <br>
                    <form  class="form" role="form" action="<?php echo 'update.php? id=' . $id; ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Nom:</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nom" value="<?php echo $name; ?>">
                            <span class="help-inline"><?php echo $nameError; ?></span>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="name">Description:</label>
                            <input type="text" class="form-control" id="description" name="description" placeholder="Description" value="<?php echo $description; ?>">
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
                        <label class="form-label" for="category">Categorie:</label>
                            <select class="form-control" id="category" name="category">
                                <?php
                                    $db = Database::connect();
                                    foreach($db->query('SELECT * FROM categories') as $row)
                                    {
                                        if($row['id'] == $category)
                                            echo '<option selected="selected" value="' . $row['id'] . '">' . $row['name'] . '</option>';
                                        else
                                             echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                                    }       
                                    database::disconnect();
                                ?>
                            </select>
                            <span class="help-inline"><?php echo $categoryError; ?></span>
                        </div>
                        <br>
                        <div>
                            <label class="form-label" for="image">Image:</label>
                            <p><?php echo $image; ?></p>
                            <label for="image">Sélectionner une nouvelle image:</label> <br>
                            <input type="file" id="image" name="image">
                            <span class="help-inline"><?php echo $imageError; ?></span>
                        </div>
                    
                        <div class="form-actions">
                            <br>
                            <a class="btn btn-primary" href="index.php" role="button"><span class="glyphicon glyphicon-arrow-left"></span> Retour</a>
                            <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span> Modifier</button>
                        </div>
                    </form>
                </div>

                <div class="col-md-6 site">
                    <div class="img-thumbnail">
                            <img src="<?php echo '../images/' . $image ; ?>"  alt="...">
                                <div class="price"><?php echo number_format((float)$price,2,'.','',) . ' $'; ?></div>
                                    <div class="caption">
                                    <h4><?php echo $name;?></h4>
                                        <p><?php echo $description;?></p>
                                        <a href ="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span></span> Commander</a>
                                    </div>
                        </div>
                    </div>
            </div>

        </div>
    </body>


</html>
