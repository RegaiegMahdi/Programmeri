<?php
include "../config.php";
include_once "../Model/Reclamation.php";
class ReclamationC
{

    public function listReclamation()
    {
        try 
        {
            $pdo = config::getConnexion();
            $sql = "SELECT * FROM `Reclamation`";
            $query = $pdo->prepare($sql);
            $query->execute();
            $result = $query->fetchAll();
            return $result;
        }
        catch (PDOException $e) 
        {
            echo "error add: " . $e->getMessage();
        }
    }

  

    public function addReclamation($Reclamation)
    {
        try {
            
            
            $pdo = config::getConnexion();
            $sql = "INSERT INTO Reclamation
            VALUES (NULL, :idc, :email, :sujetr, :msg, :statutr)";
            $query = $pdo->prepare($sql);
            $query->execute([
                
                "idc" => $Reclamation->getIdClient(),
                "email" => $Reclamation->getEmail(),
                "sujetr" => $Reclamation->getSujetReclamation(),
                "msg" => $Reclamation->getMessageReclamation(),
                "statutr" => $Reclamation->getStatutReclamation()
                
            ]) ;
        } catch (PDOException $e) {
            echo "Ajout Echouer: " . $e->getMessage();
        }
    }

    public function deleteReclamation(int $id)
    {
        $sql = "DELETE FROM reclamation WHERE id = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
            if ($req->rowCount() == 0) {
                echo "La reclamation n'a pas été trouvé.";
            } else {
                echo "La reclamation a été supprimé avec succès.";
            }
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }    
    
    public function findReclamationById($Email)
    {
        try {
            $pdo = config::getConnexion();
            $sql = "SELECT * FROM `Reclamation` WHERE Email=:email";
            $query = $pdo->prepare($sql);
            $query->bindParam(":email", $Email);
            $query->execute();
            $result = $query->fetch();
            return $result;
        } catch (PDOException $e) {
            echo "Pas de Reclamation: " . $e->getMessage();
        }
    }
    

    public function updateReclamation($Reclamation, $id)
    {
        try {

            $pdo = config::getConnexion();
            $sql = "UPDATE `Reclamation` SET  `id_Client`=:idc,`Email`=:email,`Sujet_R`=:sujetr,`Message_R`=:msg ,`Statut_R`=:statutr WHERE Id_R=:idrr";
            $query = $pdo->prepare($sql);
            $query->execute([
                
                "idc" => $Reclamation->getIdClient(),
                "email" => $Reclamation->getEmail(),
                "sujetr" => $Reclamation->getSujetReclamation(),
                "msg" => $Reclamation->getMessageReclamation(),
                "statutr" => $Reclamation->getStatutReclamation(),
                "idrr" => $id
            ]);
        } catch (PDOException $e) {
            echo "Modification Echouer: " . $e->getMessage();
        }
    }


}
