<?= $this->extend('layouts/dashboard') ?>
<?= $this->section('content') ?>

<?= $this->include('partials/dashboard_baslik.php') ?>

<?php if(session()->get('success')) : ?>
    <div class="alert alert-success" role="alert">
        <?= session()->get('success') ?>
    </div>
<?php endif; ?>

<?php if(isset($validation)) : ?>
    <div class="col-12">
        <div class="alert alert-danger" role="alert">
            <?= $validation->listErrors() ?>
        </div>
    </div>
<?php endif; ?>

<form method="post" action="" class="col-xl-9">
    <input type="hidden" name="id" value="<?= set_value('id', $hakkimizda->id) ?>">
    <div class="form-group">
        <h6><label for="baslik">Başlık</label></h6>
        <input type="text" name="baslik" class="form-control" value="<?= set_value('baslik', $hakkimizda->baslik) ?>">
    </div>
    <div class="form-group">
        <h6><label for="metin">Metin</label></h6>
        <textarea class="form-control" name="metin" rows="8"><?= set_value('metin', $hakkimizda->metin) ?></textarea>
    </div>

    <button type="submit"  class="btn btn-success btn-block">Kaydet</button>
</form>

<?= $this->endSection() ?>