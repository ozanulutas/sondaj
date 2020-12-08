<?= $this->extend('layouts/dashboard') ?>
<?= $this->section('content') ?>

<?= $this->include('partials/dashboard_baslik.php') ?>

<?php if(isset($validation)) : ?>
    <div class="col-12">
        <div class="alert alert-danger" role="alert">
            <?= $validation->listErrors() ?>
        </div>
    </div>
<?php endif; ?>

<?php if(session()->get('success')) : ?>
    <div class="alert alert-success" role="alert">
        <?= session()->get('success') ?>
    </div>
<?php endif; ?>

<form method="post" class="col-xl-9">
    <div class="form-group">
        <h6><label for="kullanici_adi">Kullanıcı Adı</label></h6>
        <input type="text" name="kullanici_adi" class="form-control" value="<?= set_value('kullanici_adi', $kullanici['kullanici_adi']); ?>">
    </div>
    <div class="form-group">
        <h6><label for="email">Email</label></h6>
        <input type="text" name="email" class="form-control" value="<?= set_value('email', $kullanici['email']); ?>">
    </div>
    <div class="form-group">
        <h6><label for="sifre">Şifre</label></h6>
        <input type="password" name="sifre" class="form-control">
    </div>
    <div class="form-group">
        <h6><label for="sifre_tekrar">Şifre Tekrar</label></h6>
        <input type="password" name="sifre_tekrar" class="form-control">
    </div>

    <button type="submit"  class="btn btn-success btn-block">Kaydet</button>
</form>

<?= $this->endSection() ?>