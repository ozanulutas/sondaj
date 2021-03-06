<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<?= $this->include('partials/slider.php'); ?>


<div class="album py-5 bg-light">
    <div class="container">
        <h5 class="mb-5"><?= nl2br($aciklama) ?></h5 class="mb-5">   
        <div class="row">     
            <?php foreach($hizmetler as $hizmet) : ?>     
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <div class="card-img-wrapper">                       
                        <img class="card-img-top" src="<?= $hizmet->resim ? (IMAGE_PATH . $hizmet->resim) : ''; ?>" alt="Card image cap">
                    </div>
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
