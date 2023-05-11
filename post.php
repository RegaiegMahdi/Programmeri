<?php
class Post
{
    private  $id = null;
    private  $contenu = null;
    private  $sujet = null;
    private  $image = null;

    public function __construct($id = null, $contenu, $sujet, $image)
    {
        $this->id = $id;
        $this->contenu = $contenu;
        $this->sujet = $sujet;
        $this->image = $image;
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of contenu
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * Set the value of contenu
     *
     * @return  self
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;

        return $this;
    }


      /**
     * Get the value of sujet
     */
    public function getSujet()
    {
        return $this->sujet;
    }

    /**
     * Set the value of sujet
     *
     * @return  self
     */
    public function setSujet($sujet)
    {
        $this->contenu = $sujet;

        return $this;
    }
    /**
     * Get the value of image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set the value of image
     *
     * @return  self
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }
}
?>
