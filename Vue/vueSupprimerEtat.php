<?php $titre = "Suppression d'état"; ?>
<h2>Modification de l'état "<?= $etat['nom_etat'] ?>"</h2>
<hr>
<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12">
			<?php if (isset($billets)) { ?>
				<div class="alert alert-warning">
					Cet état contient des articles, si vous validez la suppression, vous supprimerez les articles associés !
				</div>
				<ul>
					<?php foreach ($billets as $billet) { ?>
						<li><?= $billet['TIC_TITRE'] ?> - <a href="index.php?action=supprimerTicket&id=<?= $billet['TIC_ID'] ?>">Supprimer cet article</a></li>
					<?php } ?>
				</ul>
				<form method="POST" action="">
					<input type="submit" name="toutSupprimer" class="btn btn-sm btn-outline-danger" value="Supprimer tous les articles">
				</form>
			<?php } else { ?>
				<div class="alert alert-info">
					Cet état ne contient aucun article, vous pouvez supprimer sans peine !
				</div>
				<form method="POST" action="">
					<input type="submit" name="supprimerEtat" class="btn btn-sm btn-outline-danger" value="Supprimer l'état">
				</form>
			<?php } ?>
		</div>
	</div>
</div>