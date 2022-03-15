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
                ?>  
            
            
                
                    
                
            

            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane show active" id="tab1" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="row">
                        <div class="col-md-6 col-lg-4">
                            <div class="img-thumbnail">
                                <img src="images/m1.png" class="img-fluid" alt="...">
                                <div class="price">8.90$</div>
                                <div class="caption">
                                    <h4>Menu Classic</h4>
                                    <p>Sandwich: Burger, Salade, Tomate, Cornichon, Frites + Boisson</p>
                                    <a href ="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span></span> Commander</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="img-thumbnail">
                                <img src="images/m2.png" class="img-fluid" alt="...">
                                <div class="price">9.50$</div>
                                <div class="caption">
                                    <h4>Menu Beacon</h4>
                                    <p>Sandwich: Burger, Fromage, Bacon, Salade, Tomate + Frites + Boisson</p>
                                    <a href ="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span></span> Commander</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="img-thumbnail">
                                <img src="images/m3.png" class="img-fluid" alt="...">
                                <div class="price">10.90$</div>
                                <div class="caption">
                                    <h4>Menu Big</h4>
                                    <p>Sandwich: Double Burger, Fromage, Cornichon, Salade + Frites + Boisson</p>
                                    <a href ="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span></span> Commander</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="img-thumbnail">
                                <img src="images/m4.png" class="img-fluid" alt="...">
                                <div class="price">9.90$</div>
                                <div class="caption">
                                    <h4>Menu Chicken</h4>
                                    <p>Sandwich: Poulet Frit, Tomate, Salade, Mayonnaise + Frites + Boisson</p>
                                    <a href ="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span></span> Commander</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="img-thumbnail">
                                <img src="images/m5.png" class="img-fluid" alt="...">
                                <div class="price">10.90$</div>
                                <div class="caption">
                                    <h4>Menu Fish</h4>
                                    <p>Sandwich: Poisson, Salade, Mayonnaise, Cornichon + Frites + Boisson</p>
                                    <a href ="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span></span> Commander</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="img-thumbnail">
                                <img src="images/m6.png" class="img-fluid" alt="...">
                                <div class="price">11.90$</div>
                                <div class="caption">
                                    <h4>Menu Double Steack</h4>
                                    <p>Sandwich: Double Burger, Fromage, Bacon, Salade, Tomate + Frites + Boisson</p>
                                    <a href ="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span></span> Commander</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane" id="tab2"role="tabpanel" aria-labelledby="pills-tab2-tab">
                    <div class="row">
                        <div class="col-md-6 col-lg-4">
                            <div class="img-thumbnail">
                                <img src="images/b1.png" class="img-fluid" alt="...">
                                <div class="price">5,90$</div>
                                <div class="caption">
                                    <h4>Classic</h4>
                                    <p>Sandwich: Burger, Salade, Tomate, Cornichon</p>
                                    <a href ="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span></span> Commander</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="img-thumbnail">
                                <img src="images/b2.png" class="img-fluid" alt="...">
                                <div class="price">6,50$</div>
                                <div class="caption">
                                    <h4>Beacon</h4>
                                    <p>Sandwich: Burger, Fromage, Bacon, Salade, Tomate</p>
                                    <a href ="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span></span> Commander</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="img-thumbnail">
                                <img src="images/b3.png" class="img-fluid" alt="...">
                                <div class="price">6,90$</div>
                                <div class="caption">
                                    <h4>Big</h4>
                                    <p>Sandwich: Double Burger, Fromage, Cornichon, Salade</p>
                                    <a href ="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span></span> Commander</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="img-thumbnail">
                                <img src="images/b4.png" class="img-fluid" alt="...">
                                <div class="price">5,90$</div>
                                <div class="caption">
                                    <h4>Chicken</h4>
                                    <p>Sandwich: Poulet Frit, Tomate, Salade, Mayonnaise</p>
                                    <a href ="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span></span> Commander</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="img-thumbnail">
                                <img src="images/b5.png" class="img-fluid" alt="...">
                                <div class="price">6,90$</div>
                                <div class="caption">
                                    <h4>Fish</h4>
                                    <p>Sandwich: Poisson, Salade, Mayonnaise, Cornichon</p>
                                    <a href ="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span></span> Commander</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="img-thumbnail">
                                <img src="images/b6.png" class="img-fluid" alt="...">
                                <div class="price">7,50$</div>
                                <div class="caption">
                                    <h4>Double Steack</h4>
                                    <p>Sandwich: Double Burger, Fromage, Bacon, Salade, Tomate</p>
                                    <a href ="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span></span> Commander</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
                <div class="tab-pane" id="tab3"role="tabpanel" aria-labelledby="pills-tab3-tab">
                    <div class="row">
                        <div class="col-md-6 col-lg-4">
                            <div class="img-thumbnail">
                                <img src="images/s1.png" class="img-fluid" alt="...">
                                <div class="price">3.90$</div>
                                <div class="caption">
                                    <h4>Frites</h4>
                                    <p>Pommes de terre frites</p>
                                    <a href ="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span></span> Commander</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="img-thumbnail">
                                <img src="images/s2.png" class="img-fluid" alt="...">
                                <div class="price">3.40$</div>
                                <div class="caption">
                                    <h4>Oinion Rings</h4>
                                    <p>Rondelles d'oignon frits</p>
                                    <a href ="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span></span> Commander</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="img-thumbnail">
                                <img src="images/s3.png" class="img-fluid" alt="...">
                                <div class="price">5.90$</div>
                                <div class="caption">
                                    <h4>Nuggets</h4>
                                    <p>Nuggets de poulet frits</p>
                                    <a href ="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span></span> Commander</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="img-thumbnail">
                                <img src="images/s4.png" class="img-fluid" alt="...">
                                <div class="price">3.50$</div>
                                <div class="caption">
                                    <h4>Nuggets Fromage</h4>
                                    <p>Nuggets de fromage frits</p>
                                    <a href ="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span></span> Commander</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="img-thumbnail">
                                <img src="images/s5.png" class="img-fluid" alt="...">
                                <div class="price">5.90$</div>
                                <div class="caption">
                                    <h4>Ailes de poulet</h4>
                                    <p>Ailes de poulet Barbecue</p>
                                    <a href ="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span></span> Commander</a>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            
                <div class="tab-pane" id="tab4"role="tabpanel" aria-labelledby="pills-tab4-tab">
                    <div class="row">
                        <div class="col-md-6 col-lg-4">
                            <div class="img-thumbnail">
                                <img src="images/sa1.png" class="img-fluid" alt="...">
                                <div class="price">8.90$</div>
                                <div class="caption">
                                    <h4>César Poulet Pané</h4>
                                    <p>Poulet Pané, Salade, Tomate et la fameuse sauce César</p>
                                    <a href ="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span></span> Commander</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="img-thumbnail">
                                <img src="images/sa2.png" class="img-fluid" alt="...">
                                <div class="price">8.90$</div>
                                <div class="caption">
                                    <h4>César Poulet Grillé</h4>
                                    <p>Poulet Grillé, Salade, Tomate et la fameuse sauce César</p>
                                    <a href ="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span></span> Commander</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="img-thumbnail">
                                <img src="images/sa3.png" class="img-fluid" alt="...">
                                <div class="price">5.90$</div>
                                <div class="caption">
                                    <h4>Salade Light</h4>
                                    <p>Salade, Tomate, Concombre, Maïs et Vinaigre balsamique</p>
                                    <a href ="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span></span> Commander</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="img-thumbnail">
                                <img src="images/sa4.png" class="img-fluid" alt="...">
                                <div class="price">7.90$</div>
                                <div class="caption">
                                    <h4>Poulet Pané</h4>
                                    <p>Poulet Pané, Salade, Tomate et la sauce de votre choix</p>
                                    <a href ="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span></span> Commander</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="img-thumbnail">
                                <img src="images/sa5.png" class="img-fluid" alt="...">
                                <div class="price">7.90$</div>
                                <div class="caption">
                                    <h4>Poulet Grillé</h4>
                                    <p>Poulet Grillé, Salade, Tomate et la sauce de votre choix</p>
                                    <a href ="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span></span> Commander</a>
                                </div>
                            </div>
                        </div>              
                    </div>
                </div>

                <div class="tab-pane" id="tab5"role="tabpanel" aria-labelledby="pills-tab5-tab">
                    <div class="row">
                        <div class="col-md-6 col-lg-4">
                            <div class="img-thumbnail">
                                <img src="images/bo1.png" class="img-fluid" alt="...">
                                <div class="price">1.90$</div>
                                <div class="caption">
                                    <h4>Coca-Cola</h4>
                                    <p>Au choix: Petit, Moyen ou Grand</p>
                                    <a href ="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span></span> Commander</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="img-thumbnail">
                                <img src="images/bo2.png" class="img-fluid" alt="...">
                                <div class="price">1.90$</div>
                                <div class="caption">
                                    <h4>Coca-Cola Light</h4>
                                    <p>Au choix: Petit, Moyen ou Grand</p>
                                    <a href ="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span></span> Commander</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="img-thumbnail">
                                <img src="images/bo3.png" class="img-fluid" alt="...">
                                <div class="price">1.90$</div>
                                <div class="caption">
                                    <h4>Coca-Cola Zéro</h4>
                                    <p>Au choix: Petit, Moyen ou Grand</p>
                                    <a href ="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span></span> Commander</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="img-thumbnail">
                                <img src="images/bo4.png" class="img-fluid" alt="...">
                                <div class="price">1.90$</div>
                                <div class="caption">
                                    <h4>Fanta</h4>
                                    <p>Au choix: Petit, Moyen ou Grand</p>
                                    <a href ="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span></span> Commander</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="img-thumbnail">
                                <img src="images/bo5.png" class="img-fluid" alt="...">
                                <div class="price">1.90$</div>
                                <div class="caption">
                                    <h4>Sprite</h4>
                                    <p>Au choix: Petit, Moyen ou Grand</p>
                                    <a href ="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span></span> Commander</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="img-thumbnail">
                                <img src="images/bo6.png" class="img-fluid" alt="...">
                                <div class="price">1.90$</div>
                                <div class="caption">
                                    <h4>Nestea</h4>
                                    <p>Au choix: Petit, Moyen ou Grand</p>
                                    <a href ="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span></span> Commander</a>
                                </div>
                            </div>
                        </div>  
                    </div>
                </div>

                <div class="tab-pane" id="tab6"role="tabpanel" aria-labelledby="pills-tab6-tab">
                    <div class="row">
                        <div class="col-md-6 col-lg-4">
                            <div class="img-thumbnail">
                                <img src="images/d1.png" class="img-fluid" alt="...">
                                <div class="price">4.90$</div>
                                <div class="caption">
                                    <h4>Fondant au chocolat</h4>
                                    <p>Au choix: Petit, Moyen ou Grand</p>
                                    <a href ="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span></span> Commander</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="img-thumbnail">
                                <img src="images/d2.png" class="img-fluid" alt="...">
                                <div class="price">2.90$</div>
                                <div class="caption">
                                    <h4>Muffin</h4>
                                    <p>Au choix: Petit, Moyen ou Grand</p>
                                    <a href ="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span></span> Commander</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="img-thumbnail">
                                <img src="images/d3.png" class="img-fluid" alt="...">
                                <div class="price">2.90$</div>
                                <div class="caption">
                                    <h4>Beignet</h4>
                                    <p>Au choix: Petit, Moyen ou Grand</p>
                                    <a href ="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span></span> Commander</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="img-thumbnail">
                                <img src="images/d4.png" class="img-fluid" alt="...">
                                <div class="price">3.90$</div>
                                <div class="caption">
                                    <h4>Milkshake</h4>
                                    <p>Au choix: Petit, Moyen ou Grand</p>
                                    <a href ="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span></span> Commander</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="img-thumbnail">
                                <img src="images/d5.png" class="img-fluid" alt="...">
                                <div class="price">4.90$</div>
                                <div class="caption">
                                    <h4>Sundae</h4>
                                    <p>Au choix: Petit, Moyen ou Grand</p>
                                    <a href ="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span></span> Commander</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </body>>

</html>