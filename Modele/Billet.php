<?php

require_once('Modele/Modele.php');

class Billet extends Modele {
	
	/**
	*
	* Retourne l'ensemble des billets de la base de données
	* @return $billets
	*/
	public function getBillets(){
		$req = $this->getBdd()->prepare('SELECT *, TIC_ID as id_billet FROM t_ticket INNER JOIN etats ON id = TIC_ETAT ORDER BY TIC_ID DESC');
		$req->execute();
		$billets = $req->fetchAll();
		return $billets;
	}

	/**
	*
	* Retourne un billet spécifique en fonction de l'ID passé
	* @param $idBillet
	* @return $billet
	*/
	public function getBillet(int $idBillet){
		$req = $this->getBdd()->prepare('SELECT *, TIC_ID AS id, TIC_DATE as date_ticket FROM t_ticket INNER JOIN etats ON id = TIC_ETAT WHERE TIC_ID = :idBillet');
		$req->execute(['idBillet' => $idBillet]);
		if ($req->rowCount() == 1){
			$billet = $req->fetch();
			return $billet;
		}
	}

	/**
	*
	* Permet d'ajouter un nouveau ticket dans la base de données
	* @param $titre, $contenu
	* @return void
	*/
	public function ajouterTicket(string $titre, string $contenu, int $etat){
		$req = $this->getBdd()->prepare('INSERT INTO t_ticket(TIC_DATE, TIC_TITRE, TIC_CONTENU, TIC_ETAT) VALUES(NOW(), :titre, :contenu, :etat)');
		$req->execute(['titre' => $titre, 'contenu' => $contenu, 'etat' => $etat]);
	}

	public function allEtats(){
		$req = $this->getBdd()->prepare('SELECT * FROM etats');
		$req->execute();
		$etats = $req->fetchAll();
		return $etats;
	}

	/**
	*
	* Permet de récupérer les états du ticket
	* @param $etat
	* @return $etat
	*/
	public function Etats(string $etat){
		$req = $this->getBdd()->prepare('SELECT * FROM etats WHERE nom_etat != :etat');
		$req->execute(['etat' => $etat]);
		$etats = $req->fetchAll();
		return $etats;
	}

	public function supprimerBillet(int $idBillet){
		$req = $this->getBdd()->prepare('DELETE FROM t_ticket WHERE TIC_ID = :idBillet');
		$req->execute(['idBillet' => $idBillet]);
	}
}