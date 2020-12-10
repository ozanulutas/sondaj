<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<?= $this->include('partials/jumbotron.php'); ?>

<div class="album py-5 bg-light">
    <div class="container">
        <div class="row">
            <!-- Sosyal Medya -->
            <div class="col-12 mb-3 text-center sosyalmedya">                
                <?php foreach($global['sosyalMedya'] as $sm) : ?>
                <a href="<?= $sm->link ?>" class="mr-1" target="_blank">
                    <span class="fa fa-<?= $sm->platform ?> grow"></span>
                </a>                
                <?php endforeach; ?> 
            </div>

            <!-- Email -->
            <div class="col">
                <div class="card mb-3">
                    <div class="card-header bg-primary text-white">
                        <i class="fa fa-envelope"></i> Bize Yazın
                    </div>
                    <div class="card-body">
                        <form method="post" action="">
                            <div class="form-group">
                                <label for="isim">Adınız</label>
                                <input type="text" class="form-control" name="isim" aria-describedby="emailHelp" placeholder="Adınızı girin" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email Adresiniz</label>
                                <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Email'inizi girin" required>
                                <small id="emailHelp" class="form-text text-muted">Email'inizi  asla başkalarıyla paylaşmayacağız.</small>
                            </div>
                            <div class="form-group">
                                <label for="mesaj">Mesajınız</label>
                                <textarea class="form-control" name="mesaj" rows="6" required></textarea>
                            </div>
                            <div class="mx-auto">
                            <button type="submit" class="btn btn-primary text-right">Gönder</button></div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- İletişim -->
            <div class="col-12 col-sm-4">
                <div class="card bg-light mb-3">
                    <div class="card-header bg-success text-white">
                        <i class="fa fa-home"></i> İletişim Bilgileri
                    </div>
                    <div class="card-body">
                        <p><?= nl2br($global['iletisim']->adres) ?></p>                    
                        <p>Email : <?= $global['iletisim']->email ?></p>
                        <p>Tel: <?= $global['iletisim']->telefon ?></p>
                    </div>
                </div>

            <!-- Sosyal Medya -->
                <!-- <div class="card bg-light mb-3">
                    <div class="card-header bg-success text-white">
                        Sosyal Medya Hesaplarımız
                    </div>
                    <div class="card-body">

                    </div>
                </div> -->
                
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>