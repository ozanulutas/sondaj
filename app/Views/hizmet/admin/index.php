<?= $this->extend('layouts/dashboard') ?>
<?= $this->section('content') ?>

<?= $this->include('partials/dashboard_baslik.php') ?>

<?php if(session()->get('success')) : ?>
    <div class="alert alert-success" role="alert">
        <?= session()->get('success') ?>
    </div>
<?php endif; ?>

<?php if(isset($validation)) : ?>
    <div class="col-xl-9">
        <div class="alert alert-danger" role="alert">
            <?= $validation->listErrors() ?>
        </div>
    </div>
<?php endif; ?>

<!-- Hizmet Sayfası Bilgileri -->
<p>
    <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
        Sayfa Bilgileri
    </a>
</p>
<div class="collapse" id="collapseExample">
    <div class="card card-body">
        <form method="post" action="" enctype="multipart/form-data" class="col-xl-9">
            <input type="hidden" name="id" value="<?= set_value('id', $hizmet->id) ?>">

            <div class="form-group">
                <h6><label for="baslik">Başlık</label></h6>
                <input type="text" name="baslik" class="form-control" value="<?= set_value('baslik', $hizmet->baslik) ?>">
            </div>
            <div class="form-group">
                <h6><label for="metin">Metin</label></h6>
                <textarea class="form-control" name="metin" rows="8"><?= set_value('metin', $hizmet->metin) ?></textarea>
            </div>

            <div class="form-group">
                <h6><label for="resim">Resim</label></h6>
                <input type="file" accept="image/*" class="form-control-file" name="resim">
                <?php if(! empty($hizmet->resim)) : ?>
                <div class="row">
                    <div class="col-3 mb-1 text-center">
                        <img src="<?= IMAGE_PATH . $hizmet->resim ?>" class="mt-2 img-thumbnail">
                        <a href="/admin/hizmet/resimKaldir/resim" class="text-danger" onclick="return confirm('Resmi kaldırmak istediğinize emin misiniz?')">Resmi Kaldır</a>
                    </div>
                </div>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <h6><label for="parallax">Parallax Resmi</label></h6>
                <input type="file" accept="image/*" class="form-control-file" name="parallax">
                <?php if(! empty($hizmet->parallax)) : ?>
                <div class="row">
                    <div class="col-3 mb-1 text-center">
                        <img src="<?= IMAGE_PATH . $hizmet->parallax ?>" class="mt-2 img-thumbnail">
                        <a href="/admin/hizmet/resimKaldir/parallax" class="text-danger" onclick="return confirm('Resmi kaldırmak istediğinize emin misiniz?')">Resmi Kaldır</a>
                    </div>
                </div>
                <?php endif; ?>
            </div>

            <button type="submit"  class="btn btn-success">Kaydet</button>
        </form>
    </div>
</div>

<hr>

<!-- Hizmetler -->

<a href="/admin/hizmet/create" class="btn btn-success mb-2">Hizmet Ekle</a>
<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
            <th>Başlık</th>
            <th>Kısa Açıklama</th>
            <th>Metin</th>
            <th>İşlemler</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($hizmetler as $hizmet) : ?>
            <tr>
                <td class="align-middle ellipsis"><?= $hizmet->baslik ?></td>
                <td class="align-middle ellipsis"><?= $hizmet->aciklama ?></td>
                <td class="align-middle ellipsis"><?= $hizmet->metin ?></td>
                <td>                    
                    <a href="/admin/hizmet/edit/<?= $hizmet->id ?>" class="btn btn-primary btn-sm">Düzenle</a>
                    <a href="/admin/hizmet/delete/<?= $hizmet->id ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hizmeti silmek istediğinize emin misiniz?')">Sil</a>                    
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>