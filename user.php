<?php
class users{
    private int $id_user;
    private string $nom_user;
    private string $prenom_user;
    private string $email_user;
    private string $mdp_user;

    public function __construct($nom_user,$prenom_user,$email_user,$mdp_user){
        $this->nom_user=$nom_user;
        $this->prenom_user=$prenom_user;
        $this->email_user=$email_user;
        $this->mdp_user=$mdp_user;
    }
    public function getid_user(){
        return $this->id_user;
    }
    public function getnom_user(){
        return $this->nom_user;
    }
    public function getprenom_user(){
        return $this->prenom_user;
    }
    public function getemail_user(){
        return $this->email_user;

    }
    public function getmdp_user(){
        return $this->mdp_user;

    }

    public function setnom_user($nom_user){
        $this->nom_user=$nom_user;
    }
    public function setprenom_user($prenom_user){
        $this->prenom_user=$prenom_user;
    }
    public function setemail_user($email_user){
        $this->email_user=$email_user;
    }
        public function setmdp_user($mdp_user){
        $this->mdp_user=$mdp_user;
    }
}

?>