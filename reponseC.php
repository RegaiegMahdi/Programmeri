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
        VALUES (NULL, :contenu, :statut)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'contenu' => $reponse->getContenu(),
                'statut' => $reponse->getStatut(),
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

}
