<?php $titre = "Gestion des états"; ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6">
            <table class="table">
                <thead>
                    <th>N°</th>
                    <th>Nom de l'états</th>
                    <th>Actions</th>
                </thead>
                <tbody>
                    <?php foreach($etats as $etat): ?>
                        <tr>
                            <td><?= $etat['id'] ?></td>
                            <td><?= $etat['nom_etat'] ?></td>
                            <td>
                                <a href="index.php?action=modifierEtat&id=<?= $etat['id'] ?>" class="btn btn-sm btn-outline-info">Modifier</a>
                                <a href="index.php?action=supprimerEtat&id=<?= $etat['id'] ?>" class="btn btn-sm btn-outline-danger">Supprimer</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="col-lg-6">
            <h2>Ajouter un nouvel état</h2>
            <hr>
            <form method="POST" action="">
                <label>Nom de l'état</label>
                <input type="text" class="form-control" name="nomEtat" placeholder="Saisir le nom de l'état">
                <input type="submit" name="ajouterEtat" class="btn btn-sm btn-outline-info" value="Ajouter un nouvel état">
            </form>
        </div>
    </div>
</div>