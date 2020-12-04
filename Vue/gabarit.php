<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <title><?= $titre ?></title>
    <link rel="stylesheet" href="Contenu/style.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
    <div id="global">
        <header>
            <h1 class="text-center">
                <a href="index.php">Gestionnaire des tickets</a>
                -
                <a href="index.php?action=gestionEtats">Gestionnaire des états</a>
            </h1>
            <hr>
        </header>
        <div id="contenu">
            <?= htmlspecialchars_decode($contenu) ?>
        </div>
    </div>
</body>
</html>