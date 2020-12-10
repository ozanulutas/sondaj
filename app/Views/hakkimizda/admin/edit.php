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

<?php if(isset($validation)) : ?>
    <div class="col-xl-9">
        <div class="alert alert-danger" role="alert">
            <?= $validation->listErrors() ?>
        </div>
    </div>
<?php endif; ?>

<form method="post" action="" enctype="multipart/form-data" class="col-xl-9">
    <input type="hidden" name="id" value="<?= set_value('id', $hakkimizda->id) ?>">
    <div class="form-group">
        <h6><label for="baslik">Başlık</label></h6>
        <input type="text" name="baslik" class="form-control" value="<?= set_value('baslik', $hakkimizda->baslik) ?>">
    </div>
    <div class="form-group">
        <h6><label for="metin">Metin</label></h6>
        <textarea class="form-control" name="metin" rows="8"><?= set_value('metin', $hakkimizda->metin) ?></textarea>
    </div>

    <div class="form-group">
        <h6><label for="resim">Resim</label></h6>
        <input type="file" accept="image/*" class="form-control-file" name="resim">
        <?php if(! empty($hakkimizda->resim)) : ?>
        <div class="row">
            <div class="col-3 mb-1 text-center">
                <img src="<?= IMAGE_PATH . $hakkimizda->resim ?>" class="mt-2 img-thumbnail">
                <a href="/admin/hakkimizda/resimKaldir/resim" class="text-danger" onclick="return confirm('Resmi kaldırmak istediğinize emin misiniz?')">Resmi Kaldır</a>
            </div>
        </div>
        <?php endif; ?>
    </div>

    <div class="form-group">
        <h6><label for="parallax">Parallax Resmi</label></h6>
        <input type="file" accept="image/*" class="form-control-file" name="parallax">
        <?php if(! empty($hakkimizda->parallax)) : ?>
        <div class="row">
            <div class="col-3 mb-1 text-center">
                <img src="<?= IMAGE_PATH . $hakkimizda->parallax ?>" class="mt-2 img-thumbnail">
                <a href="/admin/hakkimizda/resimKaldir/parallax" class="text-danger" onclick="return confirm('Resmi kaldırmak istediğinize emin misiniz?')">Resmi Kaldır</a>
            </div>
        </div>
        <?php endif; ?>
    </div>

    <button type="submit"  class="btn btn-success btn-block">Kaydet</button>
</form>
<?= $this->endSection() ?>