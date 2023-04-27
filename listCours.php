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
        <!--navbar icon-->
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="style2.css">
        <script src="C:\xampp\htdocs\scriptphp\projet\view\script.js"></script>
    </head>
    <body>
       <header class="header">
        <a href="" class="logo"><img src="C:/xampp/htdocs/scriptphp/projet/view/image/logo.png" width="50px"></a>
        <nav class="navbar">
            <a href="#Home" style="--i:1;" class="active">Home</a>
            <a href="#About"style="--i:2;">About</a>
            <a href="searchPost.php"style="--i:3;">Post</a>
            <a href="#Compte"style="--i:4;">Compte</a>
            
        </nav>
        <div class="bx bx-moon" id="dark-icon"></div>
       </header> 
       <!--home section-->
       <section class="home" id="Home">
        <div class="offre-container">
          <div class="overlay"></div>

          
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
    </section>
    


    <footer class="footer">
    <div class="footer-text">
        <p>Copyright &copy;;2023 by SWEAT SOCIETY</p>
    </div>
    <div class="footer-icontop">
        <a href="#Home"><i class="bx bx-up-arrow-alt"></i></a>
    </div>
</footer>

    </body>
</html>