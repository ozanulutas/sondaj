<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container">
    <div class="row">
        <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 mt-5 pt-3 pb-3 bg-white form-wrapper">
            <div class="container">

                <h3>Giriş</h3>
                <hr>

                <form action="" method="post">
                    <div class="form-group">
                        <label for="kullanici_adi">Kullanıcı Adı</label>
                        <input type="text" class="form-control" name="kullanici_adi" id="kullanici_adi" value="<?= set_value('kullanici_adi', '') ?>">
                    </div>
                    <div class="form-group">
                        <label for="sifre">Şifre</label>
                        <input type="sifre" class="form-control" name="sifre" id="sifre" value="">
                    </div>
                    <?php if(isset($validation)) : ?>
                        <div class="col-12">
                            <div class="alert alert-danger" role="alert">
                                <?= $validation->listErrors() ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="row">
                        <div class="col-12 col-sm-4">
                            <button type="submit" class="btn btn-primary btn-block">Giriş</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
