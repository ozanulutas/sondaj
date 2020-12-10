<?= $this->extend('layouts/dashboard') ?>
<?= $this->section('content') ?>

<?= $this->include('partials/dashboard_baslik.php') ?>

<?php if(isset($validation)) : ?>
    <div class="col-xl-9">
        <div class="alert alert-danger" role="alert">
            <?= $validation->listErrors() ?>
        </div>
    </div>
<?php endif; ?>

<form method="post" enctype="multipart/form-data" class="col-xl-9">
    <input type="hidden" name="id" value="<?= set_value('id', $hizmet->id); ?>">

    <div class="form-group">
        <h6><label for="baslik">Başlık</label></h6>
        <input type="text" name="baslik" class="form-control" value="<?= set_value('baslik', $hizmet->baslik); ?>">
    </div>
    <div class="form-group">
        <h6><label for="aciklama">Kısa Açıklama</label></h6>
        <textarea class="form-control" name="aciklama" rows="3"><?= set_value('aciklama', $hizmet->aciklama); ?></textarea>
    </div>
    <div class="form-group">
        <h6><label for="metin">Metin</label></h6>
        <textarea class="form-control" name="metin" rows="3"><?= set_value('metin', $hizmet->metin); ?></textarea>
    </div>
    <div class="form-group">
        <h6><label for="resim">Resim</label></h6>
        <input type="file" accept="image/*" class="form-control-file" name="resim">
        <?php if(! empty($hizmet->resim)) : ?>
        <img src="<?= IMAGE_PATH . $hizmet->resim ?>" class="mt-2 img-thumbnail col-3">
        <?php endif; ?>
    </div>
    <button type="submit"  class="btn btn-success btn-block">Kaydet</button>
</form>

<?= $this->endSection() ?>
