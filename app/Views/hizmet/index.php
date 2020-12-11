<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<?= $this->include('partials/jumbotron.php'); ?>

<div class="album py-5 bg-light">
    <div class="container">
        <div class="row featurette">            
            <div class="col-12">  <!-- col-md-7 order-md-2 -->
                <?php if(! empty($hizmet->resim)) : ?>
                <img class="featurette-image img-fluid img-thumbnail mx-auto pull-left mr-md-2" src="<?= IMAGE_PATH . $hizmet->resim ?>" alt="Generic placeholder image">
                <?php endif; ?>
                <h2 class="featurette-heading "><?= $hizmet->baslik ?></h2>
                <p class="lead text-justify"><?= nl2br($hizmet->metin) ?></p>
            </div>
        </div>
    </div>
</div>

<div class="album py-5 bg-light">
    <div class="container">
        <div class="row">  

            <?php foreach($hizmetler as $hizmet) : ?>     
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <img class="card-img-top" src="<?= $hizmet->resim ? (IMAGE_PATH . $hizmet->resim) : ''; ?>" alt="Card image cap">
                    <div class="card-body">
                        <h2><?= $hizmet->baslik ?></h2>
                        <p class="card-text"><?= $hizmet->aciklama ?></p>
                        <div class="d-flex justify-content-center">
                            <p><a class="btn btn-secondary" href="/hizmet/show/<?= $hizmet->id ?>" role="button">Ayrıntılar &raquo;</a></p>
                        </div>                    
                    </div>
                </div>
            </div>
            <?php endforeach; ?>  
            
        </div>
    </div>
</div>

<?= $this->endSection() ?>