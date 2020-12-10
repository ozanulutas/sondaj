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

    <div class="form-group">
        <button type="submit"  class="btn btn-success btn-block form-control">Kaydet</button>
    </div>
</form>

<hr>

<!-- Sosyal Medya -->

<?php if(session()->get('error')) : ?>
    <div class="col-xl-9">
        <div class="alert alert-danger" role="alert">
            <?= session()->get('error')->listErrors() ?>
        </div>
    </div>
<?php endif; ?>

<form method="post" action="/admin/sosyalMedya/create" class="col-xl-9 mb-4">
    <h4 class="mb-4 mt-4">Sosyal Medya</h4>
    <div class="d-sm-flex align-items-center justify-content-between">
        <div class="">
            <div class="form-group">
                <h6><label for="platform">Platform</label></h6>
                <select class="form-control" name="platform">
                    <option value="facebook">Facebook</option>
                    <option value="twitter">Twitter</option>
                    <option value="instagram">Instagram</option>
                    <option value="youtube">YouTube</option>
                </select>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="form-group">
                <h6><label for="link">Link</label></h6>
                <input type="text" name="link" class="form-control" value="">
            </div>
        </div>
        <div class="align-self-end">
            <div class="form-group">
                <button type="submit"  class="btn btn-success form-control">Ekle</button>
            </div>
        </div>
    </div>
</form>

<h5 class="mb-4 col-xl-9">Kayıtlı Hesaplarım</h5>

<?php foreach($sosyalMedyalar as $sosyalMedya) : ?>
<form method="post" action="/admin/sosyalMedya/edit" class="col-xl-9">
    <div class="d-flex align-items-center justify-content-between">
        <input type="hidden" name="id" value="<?= set_value('id', $sosyalMedya->id) ?>">
        <input type="hidden" name="platform" value="<?= set_value('platform', $sosyalMedya->platform) ?>">
        <div class="form-group">
            <span class="fa fa-<?= $sosyalMedya->platform ?>"></span>
        </div> 
        <div class="col-sm-8">
            <div class="form-group">
                <input type="text" name="link" class="form-control" value="<?= set_value('link', $sosyalMedya->link) ?>">
            </div>
        </div>
        
        <div class="form-group d-flex">
            <button type="submit"  class="btn btn-primary form-control">Güncelle</button>
            <a href="/admin/sosyalMedya/delete/<?= $sosyalMedya->id ?>" class="btn btn-danger ml-1" onclick="return confirm('Sosyal medya\'yı silmek istediğinize emin misiniz?')">Sil</a>  
        </div>  
    </div>
</form>
<?php endforeach; ?>

<?= $this->endSection() ?>