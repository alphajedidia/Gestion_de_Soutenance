<?php
class Soutenir 
{
    private $matricule;
    private $annee_univ;
    private $id_org;
    private $note;
    private $president;
    private $examinateur;
    private $rapporteur_int;
    private $rapporteur_ext;

    public function __construct($matricule,$annee_univ,$id_org,$note,$president,$examinateur,$rapporteur_int,$rapporteur_ext){
        $this->matricule = $matricule;
        $this->annee_univ = $annee_univ;
        $this->id_org = $id_org;
        $this->note = $note;
        $this->president = $president;
        $this->examinateur = $examinateur;
        $this->rapporteur_int = $rapporteur_int;
        $this->rapporteur_ext = $rapporteur_ext;
    }

    public function getMatricule(){
        return $this->matricule;
    }
    public function getAnnee_univ(){
        return $this->annee_univ;
    }
    public function getId_org(){
        return $this->id_org;
    }
    public function getNote(){
        return $this->note;
    }
    public function getPresident(){
        return $this->president;
    }
    public function getExaminateur(){
        return $this->examinateur;
    }
    public function getRapporteur_int(){
        return $this->rapporteur_int;
    }
    public function getRapporteur_ext(){
        return $this->rapporteur_ext;
    }
}

?>