<?= $this->extend('layouts/dashboard') ?>
<?= $this->section('content') ?>

<?= $this->include('partials/dashboard_baslik.php') ?>

<?php if(session()->get('success')) : ?>
    <div class="alert alert-success" role="alert">
        <?= session()->get('success') ?>
    </div>
<?php endif; ?>

<form method="post" action="update" class="col-xl-9">

    <?php foreach($aciklamalar as $aciklama) : ?>
    <div class="form-group">
        <h6><label for="aciklama"><?= $aciklama->sayfa ?></label></h6>
        <textarea class="form-control" name="aciklama[]" rows="3"><?= set_value('aciklama', $aciklama->aciklama ?? '') ?></textarea>
    </div>
    <?php endforeach; ?>

    <button type="submit"  class="btn btn-success btn-block">Kaydet</button>
</form>

<?= $this->endSection() ?>