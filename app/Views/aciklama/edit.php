<?= $this->extend('layouts/dashboard') ?>
<?= $this->section('content') ?>

<?= $this->include('partials/dashboard_baslik.php') ?>

<?php if(session()->get('success')) : ?>
    <div class="col-xl-9">
        <div class="alert alert-success" role="alert">
            <?= session()->get('success') ?>
        </div>
    </div>
<?php endif; ?>

<form method="post" action="update" class="col-xl-9">

    <?php foreach($aciklamalar as $aciklama) : ?>
    <div class="form-group">
        <label for="aciklama"><h6 class="lead"><?= $aciklama->sayfa ?></h6></label>
        <textarea class="form-control" name="aciklama[]" rows="3"><?= set_value('aciklama', $aciklama->aciklama ?? '') ?></textarea>
    </div>
    <hr>
    <?php endforeach; ?>

    <button type="submit"  class="btn btn-success btn-block">Kaydet</button>
</form>

<?= $this->endSection() ?>