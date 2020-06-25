<?php ob_start();
require_once('/wamp/www/CodFlix/ec-code-2020-codflix-php/model/database.php');
$db = init_db();
$pdoMovie = 'SELECT * FROM  media';
$sqlMovie = $db->prepare($pdoMovie);
$sqlMovie->execute();

$medias = $sqlMovie->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="row"><!--Movie search-->
    <div class="col-md-4 offset-md-8">
        <form method="get">
            <div class="form-group has-btn">
                <input type="search" id="search" name="title" value="<?= $search; ?>" class="form-control"
                       placeholder="Rechercher un film ou une série">

                <button type="submit" class="btn btn-block bg-red">Valider</button>
            </div>
        </form>
    </div>
</div>

<div class="media-list">
	<?php foreach ($medias as $media): ?>
        <a class="item" href="index.php?media=<?= $media['id']; ?>">
            <div class="video">
                <div>
                    <iframe allowfullscreen="" frameborder="0"
                            src="<?= $media['picture']; ?>"
                    </iframe>
                </div>
            </div>
            <div class="title"><?= $media['title']; ?></div>
            <div>Résumé: <?= $media['summary']; ?></div>
            <div>Date de sortie: <span  style="font-weight: bold"><?= $media['release_date']; ?></span></div>
            <div>Durée: <span  style="font-weight: bold"><?= $media['runtime']; ?></span> minutes</div>

        </a>
	<?php endforeach; ?>
</div>


<?php $content = ob_get_clean(); ?>

<?php require('dashboard.php'); ?>
