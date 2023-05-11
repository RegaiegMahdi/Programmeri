<?php
class Commentaire
{
    private  $Id_c ;
    private  $contenu_c ;
    private  $Id ;


    public function __construct( $Id_c = null, $contenu_c = null,$Id=null)
{
    $this->Id_c = $Id_c;
    $this->contenu_c = $contenu_c;
    $this->Id = $Id;

}


    /**
     * Get the value of id
     */
    public function getId_c()
    {
        return $this->Id_c;
    }

    /**
     * Get the value of contenu
     */
    public function getContenu_c()
    {
        return $this->contenu_c;
    }

    /**
     * Set the value of contenu
     *
     * @return  self
     */
    public function setContenu_c($contenu_c)
    {
        $this->contenu_c = $contenu_c;

        return $this;
    }
    
    public function getId()
    {
        return $this->Id;
    }



      
}
?>
