<?php

require_once('Modele/Modele.php');

class Etat extends Modele {

	public function getEtats(){
		$req = $this->getBdd()->prepare('SELECT * FROM etats');
		$req->execute();
		$etats = $req->fetchAll();
		return $etats;
	}

	public function ajouterEtat(string $nomEtat){
		$req = $this->getBdd()->prepare('INSERT INTO etats(nom_etat) VALUES(:nomEtat)');
		$req->execute(['nomEtat' => $nomEtat]);
	}

	public function modifierEtat(string $nom, int $idEtat){
		$req = $this->getBdd()->prepare('UPDATE etats SET nom_etat = :nom WHERE id = :idEtat');
		$req->execute(['nom' => $nom, 'idEtat' => $idEtat]);
	}

	public function chercherEtat(int $idEtat){
		$req = $this->getBdd()->prepare('SELECT * FROM etats WHERE id = :idEtat');
		$req->execute(['idEtat' => $idEtat]);
		$etat = $req->fetch();
		return $etat;
	}

	public function recupererBillet(int $idEtat){
		$req = $this->getBdd()->prepare('SELECT * FROM t_ticket WHERE TIC_ETAT = :idEtat');
		$req->execute(['idEtat' => $idEtat]);
		if ($req->rowCount() > 0) {
			$billets = $req->fetchAll();
			return $billets;
		}
	}

	public function supprimerAllTickets(int $idEtat){
		$req = $this->getBdd()->prepare('DELETE FROM t_ticket WHERE TIC_ETAT = :idEtat');
		$req->execute(['idEtat' => $idEtat]);
		$req2 = $this->getBdd()->prepare('DELETE FROM etats WHERE id = :idEtat');
		$req2->execute(['idEtat' => $idEtat]);
	}

	public function supprimerEtat(int $idEtat){
		$req = $this->getBdd()->prepare('DELETE FROM etats WHERE id = :idEtat');
		$req->execute(['idEtat' => $idEtat]);
	}
}	