<?php

require_once 'Modele/Etat.php';
require_once 'Vue/Vue.php';

class ControleurEtat {

	private $etat;

	public function __construct() {
		$this->etat = new Etat();
	}


	public function gererEtats(){
		$etats = $this->etat->getEtats();
		if (isset($_POST['ajouterEtat'])) {
			if (isset($_POST['nomEtat']) AND !empty($_POST['nomEtat'])) {
				$this->etat->ajouterEtat($_POST['nomEtat']);
				header('Location: index.php?action=gestionEtats');
				die();
			} else {
				throw new Exception("Le champ du nom de l'état ne peut pas être vide");
			}
		}
		$vue = new Vue("Etats");
		$vue->generer(array('etats' => $etats));
	}

	public function modifierEtat(int $idEtat){
		$etatConcerne = $this->etat->chercherEtat($idEtat);
		if ($etatConcerne['id'] == $_GET['id']) {
			$vue = new Vue("ModifierEtat");
			$vue->generer(array('etat' => $etatConcerne));
		} else {
			throw new Exception("Ce ticket n'existe pas !");
		}
		if (isset($_POST['modifEtat'])) {
			if (!empty($_POST['modifierEtat'])) {
				$this->etat->modifierEtat($_POST['modifierEtat'], $_POST['idEtat']);
				header('Location: index.php?action=gestionEtats');
				die();
			} else {
				throw new Exception("Le champ du nom de l'état ne peut pas être vide");
			}
		}
	}

	public function supprimerEtat(int $idEtat){
		$etatConcerne = $this->etat->chercherEtat($idEtat);
		if ($etatConcerne['id'] == $_GET['id']) {
			$recupererBillet = $this->etat->recupererBillet($etatConcerne['id']);
			$vue = new Vue("SupprimerEtat");
			$vue->generer(array('etat' => $etatConcerne, 'billets' => $recupererBillet));
			if (isset($_POST['toutSupprimer'])) {
				$this->etat->supprimerAllTickets($etatConcerne['id']);
				header('Location: index.php?action=gestionEtats');
			} elseif (isset($_POST['supprimerEtat'])) {
				$this->etat->supprimerEtat($etatConcerne['id']);
				header('Location: index.php?action=gestionEtats');
			}
		} else {
			throw new Exception("Ce ticket n'existe pas !");
		}
	}

}