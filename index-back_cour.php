<?php
include "../Controller/CoursC.php";
$CoursC = new CoursC();
$list = $CoursC->listCours();


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>SWEAT SOCIETY</title>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
        <link rel="stylesheet" href="style_back.css">
    </head>
    <body>
    
        <div class="container">
            <aside>
                <div class="top">
                    <div class="logo">
                        <img src="C:\xampp\htdocs\scriptphp\projet\image\logo.png">
                        <h2>SW<span class="title">EAT</span> SOCIETY</h2>
                    </div>
                    <div class="close" id="close-btn">
                        <span class="material-icons-sharp">close</span>
                    </div>
                </div>
                
                <div class="sidebar">
                <a href="afficheruser.php" class="active">
                        <span class="material-icons-sharp">book_online</span>
                        <h3>Dashboard</h3>
                    </a>
                <a href="afficheruser.php" class="active">
                        <span class="material-icons-sharp">person</span>
                        <h3>Utilisateur</h3>
                    </a>
                    <a href="index-back-rec.php" class="active">
                        <span class="material-icons-sharp">chat</span>
                        <h3>Reclamation</h3>
                    </a>
                 
                    <a href="listproduit.php"class="active">
                         <span class="material-icons-sharp"> production_quantity_limits  </span>
                         <h3>Produit</h3>
                    </a>
                   
                    <a href="index-back_post.php"class="active">
                        <span class="material-icons-sharp">pages</span>
                        <h3>Post</h3>
                    </a>
                    <a href="listCommentaire.php"class="active">
                        <span class="material-icons-sharp">comment</span>
                        <h3>Commentaire</h3>
                    </a>
                    <a href="index-back_cour.php"class="active">
                        <span class="material-icons-sharp">fitness_center</span>
                        <h3>Cours</h3>
                    </a>
                    <a href="listeReservation.php"class="active">
                        <span class="material-icons-sharp">book_online</span>
                        <h3>Reservation</h3>
                    </a>
                    <a href="login.php"class="active">
                        <span class="material-icons-sharp">book_online</span>
                        <h3>LOG OUT</h3>
                    </a>
                </div>
            </aside>
            <right>
                
                <div class="right">
                    <div class="top">
                        <button id="menu-btn">
                            <span class="material-icons-sharp ">menu</span>
                        </button>
                        <div class="theme-toggler">
                            <span class="material-icons-sharp active"> light_mode</span>
                            <span class="material-icons-sharp" >dark_mode</span>
                        </div>
                    </div>
                    
         </div>
  <div>

<section class="List">
<div class="row">
				
                <a href="pdf_cour.php" class="btn btn-success pull-right"><span class="glyphicon glyphicon-print"></span> PDF</a>

			</div>
            <div class="Tablelist">
        <table class="tableview">
            <tr class="TitleTab">
                
                <th class="styleth">Id Client</th>
                <th class="styleth">num Salle</th>
                <th class="styleth">nom Coach</th>
                <th class="styleth">type cours</th>
                
                <th><a class="toggle-edit"><i class="edit-del-icon uil uil-edit"></i></a></th>
                <th><a class="toggle-add"><i class="edit-del-icon uil uil-book-medical"></i></a></th>
            </tr>
            <?php
    foreach ($list as $Cours) 
    {
    ?>
                <tr>
                    <td class="styleth"><?= $Cours['id_Client']; ?></td>
                    <td class="styleth"><?= $Cours['num_salle']; ?></td>
                    <td class="styleth"><?= $Cours['nom_coach']; ?></td>
                    <td class="styleth"><?= $Cours['typee']; ?></td>
                
                    <td>
                        <!--<form method="POST" action="updateCours.php">
                        <a href="updateCours.php?Id_L="><i class="edit-del-icon uil uil-edit"></i></a>
                        </form>-->
                    </td>

                    
                    <td>
                    
                    <a href="deleteCours.php?id=<?php echo $Cours['id_Client']; ?>">Delete</a>  
                    </td>
                    
                </tr>
                <?php
    }
    ?>	
        </table>
    </div>
    <div class="InputlistAdd slide-in-right">

        <form  class="form-group" method="POST" action="addCours.php">
            
            <ul>
                <li>
                    <h3> Ajouter</h3>
                </li>
                <li>
                    <label for="idClientadd">
                        <label>
                            <input type="number" name="idClientadd" placeholder="entrer votre ID" id="idClientadd" required
                            minlength="1" max="100" size="10">
                </li>
                <li>
                    <label for="numSalleadd">
                        <label>
                            <select name="numSalleadd">
                                <option value="1">Salle 1</option>
                                <option value="2">Salle 2</option>
                                <option value="3">Salle 3</option>
</select>
                </li>
                <li>
                <label for="nomCoachadd">
                        <label>
                            <select name="nomCoachadd">
                                <option value="Mahdi">Mahdi</option>
                                <option value="Youssef">Youssef</option>
                                <option value="Chareffedine">Chareffedine</option>
                                </select>
                </li>
                <li>
                <label for="typeadd">
                        <label>
                            <select name="typeadd">
                                <option value="Boxe">Boxe</option>
                                <option value="Body Combat">Body Combat</option>
                                <option value="Zumba">Zumba</option>
                                </select>
                </li>

                
                
            </ul>
            <input type="submit" name="Add" value="Submit" class="btn mt-4">
        </form>

    </div>
    <div class="InputlistEdit slide-out-right">

        <form  class="form-group" method="POST" action="updateCours.php">
            
            <ul>
                <li>
                    <h3>Modifier</h3>
                    </li>
                <li>
                    <label for="idClientup">
                        <label>
                            <input type="number" name="idClientup" placeholder="entrer votre numero" id="idClientadd" 
                            minlength="1" maxlength="6" size="10">
                </li>
                <li>
                    <label for="numSalleup">
                        <label>
                            <select name="numSalleup">
                                <option value="1">Salle 1</option>
                                <option value="2">Salle 2</option>
                                <option value="3">Salle 3</option>
</select>
                </li>
                <li>
                <label for="nomCoachup">
                        <label>
                            <select name="nomCoachup">
                                <option value="Mahdi">Mahdi</option>
                                <option value="Youssef">Youssef</option>
                                <option value="Chareffedine">Chareffedine</option>
                                </select>
                </li>
                <li>
                <label for="typeup">
                        <label>
                            <select name="typeup">
                                <option value="Boxe">Boxe</option>
                                <option value="Body Combat">Body Combat</option>
                                <option value="Zumba">Zumba</option>
                                </select>
                </li>
            <input type="submit" name="Update" value="Submit" class="btn mt-4">
          

        </form>
        
    </div>
</section>
<form action="listeReservation.php">
    <button>afficher la liste des reservation</button>
</form>

<form action="dynamic-full-calendar.html">
    <button>Afficher Calendrier</button>
</form>    

   </right>
        </div>
        <script src="./back-office.js"></script>
    </body>
</html>