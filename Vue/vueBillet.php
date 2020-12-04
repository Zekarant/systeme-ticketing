<?php 
$titre = "Ticket - " . $billet['TIC_TITRE']; 
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h1 class="titreBillet text-center">
                        <?= $billet['TIC_TITRE'] ?> - <?= $billet['nom_etat'] ?> - <a href="index.php?action=supprimerTicket&id=<?= $billet['TIC_ID'] ?>">Supprimer</a></h1>
                        <hr>
                        <p><?= $billet['TIC_CONTENU'] ?></p>
                    </div>
                    <div class="card-footer text-right">
                        <small class="text-muted"><em>Posté le <?= $billet['date_ticket'] ?></em></small>
                    </div>
                </div>
                <hr>
                <h3 id="titreReponses">Réponses à <?= $billet['TIC_TITRE'] ?> :</h3>
                <br/>
                <?php foreach ($commentaires as $commentaire): ?>
                    <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">Par : <?= $commentaire['auteur'] ?> - <a href="index.php?action=supprimerCommentaire&id=<?= $commentaire['id'] ?>">Supprimer</a></h5>
                          <hr>
                          <p class="card-text"><?= $commentaire['contenu'] ?></p>
                      </div>
                      <div class="card-footer">
                          <small class="text-muted">Posté le <?= $commentaire['date_commentaire'] ?></small>
                      </div>
                  </div>
                  <br/>
              <?php endforeach; ?>
          </div>
          <div class="col-lg-6">
            <h3>Modifier l'état du ticket :</h3>
            <hr>
            <form method="post" action="index.php?action=modifieretat">
                <select name="etats" class="form-control">
                    <?php foreach($etats as $etat): ?>
                        <option value="<?= $etat['id'] ?>"><?= $etat['nom_etat'] ?></option>
                    <?php endforeach; ?>
                </select>
                <input type="hidden" name="id" value="<?= $billet['id'] ?>" />
                <input type="submit" class="btn btn-info" name="modifier_etat">
            </form>
            <hr>
            <h3>Ajouter un commentaire sur le ticket :</h3>
            <hr>
            <form method="POST" action="index.php?action=commenter">
                <label>Pseudonyme :</label>
                <input id="auteur" name="auteur" type="text" class="form-control" placeholder="Votre pseudo" 
                required /><br/>
                <label>Contenu de votre réponse :</label>
                <textarea id="txtCommentaire" name="contenu" rows="4" class="form-control"
                placeholder="Votre commentaire" required></textarea>
                <input type="hidden" name="id" value="<?= $billet['id'] ?>" />
                <input type="submit" name="ajouter_commenter" class="btn btn-sm btn-outline-info" value="Commenter" />
            </form>
        </div>
    </div>
</div>