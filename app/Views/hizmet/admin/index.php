<?= $this->extend('layouts/dashboard') ?>
<?= $this->section('content') ?>

<?= $this->include('partials/dashboard_baslik.php') ?>

<?php if(session()->get('success')) : ?>
    <div class="alert alert-success" role="alert">
        <?= session()->get('success') ?>
    </div>
<?php endif; ?>

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