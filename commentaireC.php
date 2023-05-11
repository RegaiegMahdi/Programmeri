<?php
require_once '../config.php';
require_once '../Model/commentaire.php';

class CommentaireC
{
    public function listComment()
    {
        $sql = "SELECT * FROM commentaire";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

   function deleteCommentaire($Id_c)
{
    $sql = "DELETE FROM commentaire WHERE Id_c = :Id_c";
    $db = config::getConnexion();
    $req = $db->prepare($sql);
    $req->bindValue(':Id_c', $Id_c);

    try {
        $req->execute();
        if ($req->rowCount() == 0) {
            throw new Exception("Le commentaire n'a pas été trouvé.");
        } else {
            echo "Le commentaire a été supprimé avec succès.";
        }
    } catch (Exception $e) {
        die('Error: ' . $e->getMessage());
    }
}


    function addCommentaire($commentaire)
    {
        $sql = "INSERT INTO commentaire (contenu_c,id) 
        VALUES ( :contenu_c,:id)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'contenu_c' => $commentaire->getContenu_c() ,
                'id' => $commentaire->getId() 

                
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function updateCommentaire($commentaire, $Id_c)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE commentaire SET 
                    contenu_c = :contenu_c
                WHERE Id_c= :Id_c'
            );
            $query->execute([
                'Id_c' => $Id_c,
                'contenu_c' => $commentaire->getContenu_c()
            ]);
            if ($query->rowCount() > 0) {
                echo $query->rowCount() . " records UPDATED successfully <br>";
            } else {
                echo "No records were updated.";
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    

    function showComment($Id_c)
    {
        $sql = "SELECT * from commentaire where id_c = $Id_c";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $commentaire = $query->fetch();
            return $commentaire;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    public function getComment()
    {
        $db = config::getConnexion();
        $stmt = $db->prepare('SELECT * FROM commentaire');
        $stmt->execute();
        $commentaires = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $commentaire = new Commentaire(
                $row['Id_c'],
                $row['contenu_c']
            );
            $commentaires[] = $commentaire;
        }
        return $commentaires;
    }


    function showcomm($Id_c)
    {
        $sql = "SELECT * FROM commentaire WHERE Id_c LIKE '%" . $Id_c . "%'";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $courses = $query->fetchAll();
            return $courses;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    
    function joinTables() {
        // Connexion à la base de données
        $db = config::getConnexion();
        // Préparation de la requête SQL
        $query = $db->prepare('SELECT post.id, post.contenu, post.image, post.sujet, commentaire.contenu_c
                               FROM post
                               INNER JOIN commentaire ON post.id = commentaire.Id_c');
    
        // Exécution de la requête SQL
        $query->execute();
    
        // Récupération des résultats sous forme de tableau associatif
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
    
        // Fermeture de la connexion à la base de données
        $db = null;
    
        // Retourne le tableau de résultats
        return $results;
    }
    


    function modifieravis($id,$avis){	

        try{
         $db = config::getConnexion();
    $query = $db->prepare("UPDATE post SET note=$avis WHERE id= $id  ");
    $query->execute([  
    ]);
     } catch (Exception $e){
         $e->getMessage();
    }}
    









}
