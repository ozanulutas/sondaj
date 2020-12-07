<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<?= $this->include('partials/jumbotron.php'); ?>

<div class="album py-5 bg-light">
    <div class="container">
        <div class="row">        
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <img class="card-img-top" src="/assets/images/793.jpg" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <div class="d-flex justify-content-center">
                            <p><a class="btn btn-secondary" href="/hizmet/show" role="button">View details &raquo;</a></p>
                        </div> 
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <img class="card-img-top" src="/assets/images/793.jpg" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <div class="d-flex justify-content-center">
                            <p><a class="btn btn-secondary" href="/hizmet/show" role="button">View details &raquo;</a></p>
                        </div> 
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <img class="card-img-top" src="/assets/images/793.jpg" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <div class="d-flex justify-content-center">
                            <p><a class="btn btn-secondary" href="/hizmet/show" role="button">View details &raquo;</a></p>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>