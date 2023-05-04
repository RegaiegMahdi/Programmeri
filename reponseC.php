<?php
require_once '../config.php';
require_once '../Model/reponses.php';

class ReponseC
{
    public function listReponses()
    {
        $sql = "SELECT * FROM reponses";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteReponse($id_rep)
    {
        $sql = "DELETE FROM reponses WHERE id_rep = :id_rep";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id_rep', $id_rep);

        try {
            $req->execute();
            if ($req->rowCount() == 0) {
                echo "La réponse n'a pas été trouvée.";
            } else {
                echo "La réponse a été supprimée avec succès.";
            }
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addReponse($reponse)
    {
        $sql = "INSERT INTO reponses  
        VALUES (NULL, :contenu, :statut,:Id_R)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'contenu' => $reponse->getContenu(),
                'statut' => $reponse->getStatut(),
                'Id_R' => $reponse->getId_R()

            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function updateReponse($reponse, $id_rep)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE reponses SET 
                    contenu = :contenu, 
                    statut = :statut
                WHERE id_rep= :id_rep'
            );
            $query->execute([
                'id_rep' => $id_rep,
                'contenu' => $reponse->getContenu(),
                'statut' => $reponse->getStatut(),
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    function showReponse($id)
    {
        $sql = "SELECT * from reponses where id_rep = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $reponse = $query->fetch();
            return $reponse;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    public function getReponses()
    {
        $db = config::getConnexion();
        $stmt = $db->prepare('SELECT * FROM reponses');
        $stmt->execute();
        $reponses = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $reponse = new Reponse(
                $row['id_rep'],
                $row['contenu'],
                $row['statut']
            );
            $reponses[] = $reponse;
        }
        return $reponses;
    }
    




    // Other functions here

    function updateReclamationStatut()
    {
        $sql = "UPDATE reclamation
                SET Statut_R = 'traité'
                WHERE Statut_R = 'en attente'";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function joinTables()
    {
        // Connexion à la base de données
        $db = config::getConnexion();
        // Préparation de la requête SQL
        $query = $db->prepare('SELECT reclamation.Id_R, reclamation.id_Client, reclamation.Email, reclamation.sujet_R, reclamation.Message_R,reclamation.Statut_R, reponses.contenu
                               FROM reclamation
                               INNER JOIN reponses ON reclamation.Id_R = reponses.id_rep');

        // Exécution de la requête SQL
        $query->execute();

        // Récupération des résultats sous forme de tableau associatif
        $results = $query->fetchAll(PDO::FETCH_ASSOC);

        // Fermeture de la connexion à la base de données
        $db = null;

        // Retourne le tableau de résultats
        return $results;
    }
    public function updateReclamation($id)
    {
        try {

            $pdo = config::getConnexion();
            $sql = "UPDATE `Reclamation` SET  `Statut_R`='Traité' WHERE Id_R=:idrr";
            $query = $pdo->prepare($sql);
            $query->execute([
                
                "idrr" => $id
            ]);
        } catch (PDOException $e) {
            echo "Modification Echouer: " . $e->getMessage();
        }
    }

    public function updateReclamation2($id)
    {
        try {

            $pdo = config::getConnexion();
            $sql = "UPDATE `Reclamation` SET  `Statut_R`='En_attente' WHERE Id_R=:idrr";
            $query = $pdo->prepare($sql);
            $query->execute([
                
                "idrr" => $id
            ]);
        } catch (PDOException $e) {
            echo "Modification Echouer: " . $e->getMessage();
        }
    }
}


    


