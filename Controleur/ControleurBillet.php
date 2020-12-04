<?php

require_once 'Modele/Billet.php';
require_once 'Modele/Commentaire.php';
require_once 'Vue/Vue.php';

class ControleurBillet {

    private $billet;
    private $commentaire;

    public function __construct() {
        $this->billet = new Billet();
        $this->commentaire = new Commentaire();
    }

    // Affiche les détails sur un billet
    public function billet($idBillet) {
        $billet = $this->billet->getBillet($idBillet);
        if (isset($billet['id'])) {
            $etats = $this->billet->Etats($billet['nom_etat']);
            $commentaires = $this->commentaire->getCommentaires($idBillet);
            $vue = new Vue("Billet");
            $vue->generer(array('billet' => $billet, 'etats' => $etats, 'commentaires' => $commentaires));
        } else {
            header('Location: index.php');
        }
        
    }

    public function modifieretat($etat, $idBillet) {
        // Sauvegarde du commentaire
        $this->commentaire->ModifierEtat($etat, $idBillet);
        // Actualisation de l'affichage du billet
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    // Ajoute un commentaire à un billet
    public function commenter($auteur, $contenu, $idBillet) {
        // Sauvegarde du commentaire
        $this->commentaire->ajouterCommentaire($auteur, $contenu, $idBillet);
        // Actualisation de l'affichage du billet
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    public function supprimerCommentaire(int $idCommentaire){
        $commentaire = $this->commentaire->getCommentaire($idCommentaire);
        if ($commentaire['COM_ID'] == $idCommentaire) {
            $this->commentaire->supprimerCommentaire($commentaire['COM_ID']);
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    }

    public function ajouterTicket($titre, $demande, $etat) {
        // Sauvegarde du commentaire
        $this->billet->ajouterticket($titre, $demande, $etat);
        header('Location: .');
        die();
    }

    public function supprimerTicket(int $idBillet){
        $billet = $this->billet->getBillet($idBillet);
        if ($billet['TIC_ID'] == $idBillet) {
            $this->billet->supprimerBillet($billet['TIC_ID']);
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        } else {
           header('Location: index.php');
        }
    }

}