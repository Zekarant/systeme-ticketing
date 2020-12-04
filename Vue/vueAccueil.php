<?php $titre = 'Gestionnaire des tickets'; ?>
<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <?php foreach($billets as $billet): ?>
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title"><?= htmlspecialchars($billet['TIC_TITRE']) ?> - <span class="btn btn-sm btn-outline-info"><?= $billet['nom_etat'] ?></span></h5>
                     <hr>
                     <p class="card-text"><em><?= $billet['TIC_CONTENU'] ?></em></p>
                     <a href="index.php?action=billet&id=<?= $billet['id_billet'] ?>" class="btn btn-sm btn-outline-primary">Accéder au ticket</a>
                 </div>
             </div>
             <br/>
         <?php endforeach; ?>
     </div>
     <div class="col-lg-6">
        <h2 class="text-center">Ajouter un nouveau ticket</h2>
        <hr>
        <form method="post" action="index.php?action=ajouter">
            <label>Sujet du ticket : </label>
            <input id="titre" name="titre" class="form-control" type="text" placeholder="Titre de la demande" 
            required /><br/>
            <label>Etat du ticket :</label>
            <select name="etat" class="form-control">
                <?php foreach($allEtats as $etat): ?>
                    <option value="<?= $etat['id'] ?>"><?= $etat['nom_etat'] ?></option>
                <?php endforeach; ?>
            </select>
            <br/>
            <label>Contenu du ticket :</label>
            <textarea id="txtCommentaire" name="demande" rows="4" 
            placeholder="Votre demande" class="form-control" required></textarea>
            <input type="submit" value="Poster un nouveau ticket" class="btn btn-outline-info" name="valider_ticket"/>
        </form>
    </div>
</div>
</div>