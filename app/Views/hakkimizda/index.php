<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<?= $this->include('partials/jumbotron.php'); ?>

<div class="album py-5 bg-light">
    <div class="container">
        <div class="row featurette">            
            <div class="col-12">  <!-- col-md-7 order-md-2 -->
                <?php if(! empty($hakkimizda->resim)) : ?>
                <img class="featurette-image img-fluid img-thumbnail mx-auto pull-left mr-md-2" src="<?= IMAGE_PATH . $hakkimizda->resim ?>" alt="Generic placeholder image">
                <?php endif; ?>
                <h2 class="featurette-heading "><?= $hakkimizda->baslik ?></h2>
                <p class="lead text-justify"><?= nl2br($hakkimizda->metin) ?></p>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection() ?>