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
    <input type="hidden" name="id" value="<?= set_value('id', $iletisim->id) ?>">

    <div class="form-group">
        <h6><label for="baslik">Şirket Adı</label></h6>
        <input type="text" name="baslik" class="form-control" value="<?= set_value('baslik', $iletisim->baslik) ?>">
    </div>
    <div class="form-group">
        <h6><label for="email">Email</label></h6>
        <input type="text" name="email" class="form-control" value="<?= set_value('email', $iletisim->email) ?>">
    </div>
    <div class="form-group">
        <h6><label for="telefon">Telefon</label></h6>
        <input type="text" name="telefon" class="form-control" value="<?= set_value('telefon', $iletisim->telefon) ?>">
    </div>
    <div class="form-group">
        <h6><label for="adres">Adres</label></h6>
        <textarea class="form-control" name="adres" rows="3"><?= set_value('adres', $iletisim->adres) ?></textarea>
    </div>

    <button type="submit"  class="btn btn-success btn-block">Kaydet</button>
</form>

<?= $this->endSection() ?>