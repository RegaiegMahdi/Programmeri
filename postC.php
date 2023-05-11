<?php
require_once '../config.php';
require_once '../Model/post.php';

class PostC
{
    public function listPost()
    {
        $sql = "SELECT * FROM post";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deletePost($id)
    {
        $sql = "DELETE FROM post WHERE id = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
            if ($req->rowCount() == 0) {
                echo "La post n'a pas été trouvé.";
            } else {
                echo "La post a été supprimé avec succès.";
            }
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addPost($post)
    {
        $sql = "INSERT INTO post (id,contenu,sujet,image) 
        VALUES (NULL, :contenu, :sujet, :image)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'contenu' => $post->getContenu(),
                'sujet' => $post->getSujet(),
                'image' => $post->getImage()
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function updatePost($post, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE post SET 
                    contenu = :contenu, 
                    sujet = :sujet, 
                    image = :image
                WHERE id= :id'
            );
            $query->execute([
                'id' => $id,
                'contenu' => $post->getContenu(),
                'sujet' => $post->getSujet(),
                'image' => $post->getImage()
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    function showPost($id)
    {
        $sql = "SELECT * from post where id = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $post = $query->fetch();
            return $post;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    public function getPost()
    {
        $db = config::getConnexion();
        $stmt = $db->prepare('SELECT * FROM post');
        $stmt->execute();
        $posts = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $post = new Post(
                $row['id'],
                $row['contenu'],
                $row['sujet'],
                $row['image']
            );
            $posts[] = $post;
        }
        return $posts;
    }


    function showpubli($sujet)
    {
        $sql = "SELECT * FROM post WHERE sujet LIKE '%" . $sujet . "%'";
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
    













}
