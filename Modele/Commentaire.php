<?php 

require_once('Modele/Modele.php');

class Commentaire extends Modele {

	public function getCommentaires(int $idBillet){
		$req = $this->getBdd()->prepare('SELECT COM_id as id, COM_DATE as date_commentaire, COM_CONTENU as contenu, COM_AUTEUR as auteur FROM t_commentaire WHERE TIC_ID = :idBillet');
		$req->execute(['idBillet' => $idBillet]);
		$commentaires = $req->fetchAll();
		return $commentaires;
	}

	public function getCommentaire(int $idCommentaire){
		$req = $this->getBdd()->prepare('SELECT * FROM t_commentaire WHERE COM_ID = :idCommentaire');
		$req->execute(['idCommentaire' => $idCommentaire]);
		$commentaire = $req->fetch();
		return $commentaire;
	}
	
    public function ModifierEtat(int $idEtat, $idBillet){
    	$req = $this->getBdd()->prepare('UPDATE t_ticket SET TIC_ETAT = :idEtat WHERE TIC_ID = :idBillet');
    	$req->execute(['idEtat' => $idEtat, 'idBillet' => $idBillet]);
    }

	public function ajouterCommentaire(string $auteur, string $contenu, int $idBillet) {
		$req = $this->getBdd()->prepare('INSERT INTO t_commentaire(COM_DATE, COM_AUTEUR, COM_CONTENU, tic_id) VALUES(NOW(), :auteur, :contenu, :idBillet)');
		$req->execute(['auteur' => $auteur, 'contenu' => $contenu, 'idBillet' => $idBillet]);
	}

	public function supprimerCommentaire(int $idCommentaire){
		$req = $this->getBdd()->prepare('DELETE FROM t_commentaire WHERE COM_ID = :idCommentaire');
		$req->execute(['idCommentaire' => $idCommentaire]);
	}
}