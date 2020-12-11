<?php if(isset($jumboParallax)) : ?>
<section class="jumbotron text-center bg-dark parallax" style="background-image: url('<?= IMAGE_PATH . $jumboParallax ?>')">
<?php else : ?>
<section class="jumbotron text-center bg-dark">
<?php endif; ?>
    <div class="container">
        <h1 class="jumbotron-heading text-white text-shadow"><?= $jumboBaslik ?></h1>
        <p class="lead text-light text-shadow"><?= $jumboAciklama ?? '' ?></p>
    </div>
</section>
