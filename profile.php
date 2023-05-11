<?php
include '../controller/usersC.php';
//include '../Model/client.php';
$utilisateur= new usersC();
$prenom;$nom;$adresse;$dob;$phone;$path;
//$Client2=new Client();
$id = $_GET['id'];
$listeutilisateurs=$utilisateur->afficheruser();  
    foreach ($listeutilisateurs as $utilisateur)
    if ($id==$utilisateur['id_user']){
    $prenom=$utilisateur['prenom_user'];
    $nom=$utilisateur['nom_user'];
    $adresse=$utilisateur['email_user'];
    $pass=$utilisateur['mdp_user'];
}
/*if(isset($_POST['submit']))
{
    $img=$_FILES['image']['name'];
    $sql = "UPDATE client set photo='$img' where idclient ='$id'";
    move_uploaded_file($_FILES['image']['tmp_name'],"images/$img");
        $db = config::getConnexion();
        try {
            $req = $db->prepare($sql);
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
            }
}*/
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-UA-compatible"content="IE=edge">
    <meta name="viewport"content="width=device-width,initial-scale=1.0">
    <title>Your profile</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css"> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm//bootstrap-icons@1.3.0/font/bootstrap-icons.css"> 
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'> 
    <link rel="stylesheet" href="../views/styleala.css">
    <script src="fontawesome/js/all.js"></script>
</head>
 <body >
 
    <div class="container">
       <!--BACKFROUND COLOR!!--> <div class="card-one">
            <div id="myDiv" class="profile"><?php echo "<img src='../image/logo.png'width=215";?>
           <br>
           </div>
            <div class="contact-box">
                <form action="" method="post" enctype="multipart/form-data">
                <input type="file" name="image" />
                <input type="submit" name="submit" value="Upload" />
                </form> 
            <a href="formmodifier.php?id_user=<?php echo $id ?>">
                <i class='bx bxs-upvote 'style="font-size: xx-large;">Modifer</i></a>
                <div>
                    <i class='bx bxs-phone'></i>
                     <div class="text">(+216)</div>
                </div>
                <div>
                    <i class='bx bxs-home' ></i>
                  <div class="text"><?=$adresse?></div>
            </div>
            <div>
                <i class='bx bx-globe' ></i>
                <div class="text"> </div>
            </div>
            <div>
            <i class='bx bx-key'></i>
                <div class="text"><?=$pass?></div>
                </div>
            </div>
        
                <div class="personal-box">
                    <h2>Vos préferences</h2>
                    <div>
                        <p>festivals</p>
                        <div>
                            <div class="dot active"></div>
                            <div class="dot active"></div>
                            <div class="dot active"></div>
                            <div class="dot active"></div>
                            <div class="dot active"></div>
                            <div class="dot active"></div>
                            <div class="dot "></div>
                        </div></div><div>
                            <p>Théâtrales </p>
                            <div>
                                <div class="dot active"></div>
                                <div class="dot active"></div>
                                <div class="dot active"></div>
                                <div class="dot active"></div>
                                <div class="dot active "></div>
                                <div class="dot active "></div>
                                <div class="dot active "></div>
                            </div></div><div>
                            <p>Spectacles</p>
                            <div>
                                <div class="dot active"></div>
                                <div class="dot active"></div>
                                <div class="dot active"></div>
                                <div class="dot active"></div>
                                <div class="dot active"></div>
                                <div class="dot "></div>
                                <div class="dot "></div>
                            </div></div><div>
                            <p>Concerts</p>
                            <div>
                                <div class="dot active"></div>
                                <div class="dot active"></div>
                                <div class="dot active"></div>
                                <div class="dot active"></div>
                                <div class="dot "></div>
                                <div class="dot "></div>
                                <div class="dot "></div>
                            </div></div></div>
                    <div class="hobbies-box">
                        <h2>loisirs</h2>
                        <div class="logo">
                            <div>
                            <i class='bx bxs-music'></i>
                            </div>
                            <div>
                                <i class='bx bxs-camera' ></i>
                            </div>
                            <div>
                                <i class='bx bxs-tv' ></i>
                            </div>
                            <div>
                                <i class='bx bxs-car' ></i>
                            </div>
                    </div>
                    </div>
                    </div>
            <div class="card-two" >
                <div class="head-title">
                    <h1><?=$prenom?> <?=$nom?></h1>
                    </div>
                    <div>
                        <h2>ID:<?=$id?></h2>
                    </div>
                    <div class="group-1">
                        <div class="box" style="background-color: black;">
                            <h2>About You</h2>
            </div>
            <div class="desc">
                Computer programmers use problem-solving skills and teamwork to create software programs.
                 A specialized, well-formatted resume can demonstrate your software experience and technical
                skills to hiring managers. If you're looking to find a position as a
                computer programmer, you may find it useful to learn how to create a resume that reflects your
                computer science skills and technology experience. In this article, we discuss how to create an
                 effective programmer resume and provide tips to help you get the attention of recruiters.
            </div>
            </div>
            <div class="group-2">
                <div class="box"style="background-color: black;">
                    <h2>Education</h2>

                </div>
                <div class="desc">
                    <ul>
                        <li>
                            <div>was top1 in univesity</div>
                            <div>got my degrees from one of the best teatchers </div>
                        </li>
                    </ul>
                    <ul>
                        <li>
                            <div>doing solo search always </div>
                            <div>got diplome from microsoft online</div>
                        </li>
                    </ul>
                    <ul>
                        <li>
                           <div> passed hardest test for devolopers</div>
                           <div>new skills and got my first projet</div>
                        </li>
                    </ul>

                </div>

            </div>
            <div class="group-3">
                <div class="box"style="background-color: black;">
                    <h2>Work Experience</h2>

                </div>
                <div class="desc">
                    <ul>
                        <li>
                            <div>2015-2017:worked for microsoft</div>
                            <div>was giving new ubdate there</div>
                            <div>did one of my best project with the societe</div>

                        </li>
                    </ul>

                </div>
                <ul>
                    <li>
                        <div>2018-2020:modified site for ibiza</div>
                        <div>got funniest years there</div>
                        <div>devoloped more than the work they gived to me </div>

                    </li>
                </ul>
                <ul>
                    <li>
                        <div>2020-2022:created online shop</div>
                        <div>was the best site ever and every one have it almost </div>
                        <div>won lot of money after it so i m working now to push my self to better one</div>

                    </li>
                </ul>


            </div>
            </div>
 </body>
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    $('#submit-btn').click(function() {
      const file = $('#path')[0].files[0];
      const path = URL.createObjectURL(file);
      
      $.ajax({
        url: 'process-file.php',
        type: 'POST',
        data: { path: path },
        success: function(response) {
          console.log('File path sent successfully');
        },
        error: function(jqXHR, textStatus, errorThrown) {
          console.log('Error sending file path:', errorThrown);
        }
      });
    });
  });
</script>
</html>