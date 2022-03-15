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

        <link rel="stylesheet" href="css/styles.css">

        <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'>
    </head>

    <body>
        <div class="container site">
            
            <h1 class="text-logo"><span class="glyphicon glyphicon-cutlery"></span> Burger Code <span class="glyphicon glyphicon-cutlery"></span></h1>
                <?php 
                    require 'admin/database.php';
                    echo '<nav>
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">';

                    $db =  Database::connect();
                    $statement = $db->query('SELECT * FROM categories');
                    $categories = $statement->fetchALL();
                    foreach($categories as $category)
                    {
                        if($category['id'] == '1')
                        {
                            echo '<li class="nav-item" role="presentation"><button class="nav-link active" data-bs-toggle="pill" 
                            data-bs-target="#tab'.$category['id']. '" type="button" role="tab" aria-controls="pills-tab" aria-selected="true">'.$category['name'].'</button></li>';
                        }   
                        else 
                        { 
                            echo '<li class="nav-item" role="presentation"><button class="nav-link"  data-bs-toggle="pill"  
                            data-bs-target="#tab'.$category['id'].'" type="button"  role="tab" aria-controls="pills-tab" aria-selected="false" >' .$category['name']. '</button></li>'; 
                        }
                    }
                        echo '</ul>
                                </nav>';

                    echo '<div class="tab-content" id="pills-tabContent">';
                    foreach($categories as $category)
                    {
                        if($category['id'] == '1')
                        {
                            echo '<div class="tab-pane show active" id="tab' .$category['id']. '" role="tabpanel" 
                            aria-labelledby="pills-tab">';
                        }
                        else
                        {
                            echo '<div class="tab-pane" id="tab' .$category['id']. '" role="tabpanel" 
                            aria-labelledby="pills-tab">';
                        }

                        echo '<div class="row">';

                        $statement = $db->prepare('SELECT * FROM items WHERE items.category = ?');
                        $statement->execute(array($category['id']));

                        while($item = $statement->fetch())
                        {
                                echo '<div class="col-md-6 col-lg-4">
                                            <div class="img-thumbnail">
                                                <img src="images/' . $item['image']. '" class="img-fluid" alt="...">
                                                <div class="price">' . number_format($item['price'], 2, '.',''). ' $</div>
                                                <div class="caption">
                                                    <h4>' . $item['name'] . '</h4>
                                                    <p>' . $item['description'] . '</p>
                                                    <a href ="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart">
                                                    </span></span> Commander</a>
                                                </div>
                                            </div>
                                        </div>';
                        }

                        echo    '</div>
                            </div>';
                            

                    }
                    Database::disconnect();

                    echo '</div>';
                ?>   
        
        </div>
    </body>

</html>
