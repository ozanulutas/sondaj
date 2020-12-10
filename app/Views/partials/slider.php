<div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel">

    <div class="carousel-inner">
        <?php for($i = 0; $i < count($sliderlar); $i++) : ?>
        <div class="carousel-item <?= $i == 0 ? 'active' : '' ?>">
            <img class="first-slide d-block" src="<?= IMAGE_PATH . $sliderlar[$i]->resim ?>">
            <div class="container">
                <div class="carousel-caption text-left">
                    <h1><?= $sliderlar[$i]->baslik ?></h1>
                    <h5><?= $sliderlar[$i]->metin ?></h5>
                    <!-- <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p> -->
                </div>
            </div>
        </div>
        <?php endfor; ?>
    </div>    

    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>

</div>




