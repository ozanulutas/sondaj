<?= $this->extend('layouts/dashboard') ?>
<?= $this->section('content') ?>

<?= $this->include('partials/dashboard_baslik.php') ?>

<?php if(session()->get('success')) : ?>
    <div class="alert alert-success" role="alert">
        <?= session()->get('success') ?>
    </div>
<?php endif; ?>

<a href="/admin/slider/create" class="btn btn-success mb-2">Slide Ekle</a>

<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>Resim</th>
                <th>Seçenekler</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($sliderlar as $slider) : ?>
            <tr>
                <td class="align-middle ellipsis"><img src="<?= IMAGE_PATH . $slider->resim ?>" alt="Resim Yok" class="td-img"></td>
                
                <td class="align-middle">                    
                    <a href="/admin/slider/edit/<?= $slider->id ?>" class="btn btn-primary btn-sm">Düzenle</a>
                    <a href="/admin/slider/delete/<?= $slider->id ?>" class="btn btn-danger btn-sm" onclick="return confirm('Slide\'ı silmek istediğinize emin misiniz?')">Sil</a>                    
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>