<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<?= $this->include('partials/jumbotron.php'); ?>

<div class="album py-5 bg-light">
<div class="container">
    <div class="row featurette">
        <div class="col-md-5 order-md-1">
            <img class="featurette-image img-fluid mx-auto" src="<?= $hizmet->resim ? (IMAGE_PATH . $hizmet->resim) : ''; ?>" alt="Generic placeholder image">
        </div>
        <div class="col-md-7 order-md-2">
            <!-- <h2 class="featurette-heading">Oh yeah, it's that good. <span class="text-muted">See for yourself.</span></h2> -->
            <p class="lead"><?= $hizmet->metin ?></p>
        </div>
    </div>
</div>
</div>

<?= $this->endSection() ?>