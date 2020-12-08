<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<?= $this->include('partials/jumbotron.php'); ?>

<div class="album py-5 bg-light">
    <div class="container">
        <div class="row">  
            <div class="col-10 offset-1">
                <h2><?= $hakkimizda->baslik ?></h2>
                <?= nl2br($hakkimizda->metin) ?>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>