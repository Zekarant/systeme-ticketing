<?php

require_once 'Controleur/ControleurAccueil.php';
require_once 'Controleur/ControleurBillet.php';
require_once 'Controleur/ControleurEtat.php';
require_once 'Vue/Vue.php';
class Routeur {

    private $ctrlAccueil;
    private $ctrlBillet;

    public function __construct() {
        $this->ctrlAccueil = new ControleurAccueil();
        $this->ctrlBillet = new ControleurBillet();
        $this->ctrlEtat = new ControleurEtat();
    }

    // Route une requête entrante : exécution l'action associée
    public function routerRequete() {
        try {
            if (isset($_GET['action'])) {
                if ($_GET['action'] == 'billet') {
                    $idBillet = intval($this->getParametre($_GET, 'id'));
                    if ($idBillet != 0) {
                        $this->ctrlBillet->billet($idBillet);
                    }
                    else
                        throw new Exception("Identifiant de billet non valide");
                } else if ($_GET['action'] == 'ajouter'){
                    $titre = $this->getParametre($_POST, 'titre');
                    $demande = $this->getParametre($_POST, 'demande');
                    $etat = $this->getParametre($_POST, 'etat');
                    $this->ctrlBillet->ajouterTicket($titre, $demande, $etat);
                }
                else if ($_GET['action'] == 'commenter') {
                    $this->ctrlBillet->commenter($_POST['auteur'], $_POST['contenu'], $_POST['id']);
                }
                else if ($_GET['action'] == 'modifieretat'){
                    $etat = $this->getParametre($_POST, 'etats');
                    $idBillet = $this->getParametre($_POST, 'id');
                    $this->ctrlBillet->modifieretat($etat, $idBillet);
                } elseif ($_GET['action'] == "gestionEtats") {
                    $this->ctrlEtat->gererEtats();
                } elseif ($_GET['action'] == "supprimerCommentaire" && isset($_GET['id']) && intval($_GET['id'])) {
                    $this->ctrlBillet->supprimerCommentaire($_GET['id']);
                }
                elseif ($_GET['action'] == "modifierEtat" && isset($_GET['id']) && intval($_GET['id'])) {
                    $this->ctrlEtat->modifierEtat($_GET['id']);
                }
                elseif ($_GET['action'] == "supprimerEtat" && isset($_GET['id']) && intval($_GET['id'])) {
                    $this->ctrlEtat->supprimerEtat($_GET['id']);
                } elseif ($_GET['action'] == "supprimerTicket" && isset($_GET['id']) && intval($_GET['id'])) {
                    $this->ctrlBillet->supprimerTicket($_GET['id']);
                }
                else
                    throw new Exception("Action non valide");
            }
            else {  // aucune action définie : affichage de l'accueil
                $this->ctrlAccueil->accueil();
            }
        }
        catch (Exception $e) {
            $this->erreur($e->getMessage());
        }
    }

    // Affiche une erreur
    private function erreur($msgErreur) {
        $vue = new Vue("Erreur");
        $vue->generer(array('msgErreur' => $msgErreur));
    }

    // Recherche un paramètre dans un tableau
    private function getParametre($tableau, $nom) {
        if (isset($tableau[$nom])) {
            return $tableau[$nom];
        }
        else
            throw new Exception("Paramètre '$nom' absent");
    }

}