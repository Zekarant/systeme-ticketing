<?php $titre = "Modification d'état"; ?>
<h2>Modification de l'état "<?= $etat['nom_etat'] ?>"</h2>
<hr>
<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12">
			<form method="POST" action="">
				<label>Nom de l'état :</label>
				<input type="text" name="modifierEtat" class="form-control" value="<?= $etat['nom_etat'] ?>">
				<input type="hidden" name="idEtat" value="<?= $etat['id'] ?>" />
				<input type="submit" name="modifEtat" class="btn btn-sm btn-outline-info" value="Modifier cet état">
			</form>
		</div>
	</div>
</div>