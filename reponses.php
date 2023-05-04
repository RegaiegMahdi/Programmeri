<?php
class Reponse
{
    private ?int $id_rep = null;
    private ?string $contenu = null;
    private ?bool $statut = null;
    private ?int $Id_R = null;

    public function __construct($id_rep = null, $contenu, $statut, $Id_R=null)
    {
        $this->id_rep = $id_rep;
        $this->contenu = $contenu;
        $this->statut = $statut;
        $this->Id_R = $Id_R;
    }

    /**
     * Get the value of id_rep
     */
    public function getId_Rep()
    {
        return $this->id_rep;
    }

    public function getId_R()
    {
        return $this->Id_R;
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
     * Get the value of statut
     */
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * Set the value of statut
     *
     * @return  self
     */
    public function setStatut($statut)
    {
        $this->statut = $statut;

        return $this;
    }
}
?>
