<div id="myCarousel" class="carousel slide" data-ride="carousel">

    <div class="carousel-inner" role="listbox" style=" width:100%; height:500px !important;">
        <?php for($i = 0; $i < count($sliderlar); $i++) : ?>
        <div class="carousel-item <?= $i == 0 ? 'active' : '' ?>">
            <img class="first-slide d-block w-100" src="<?= IMAGE_PATH . $sliderlar[$i]->resim ?>">
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
