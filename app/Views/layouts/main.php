<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/main.css?<?php echo date('l jS \of F Y h:i:s A'); ?>">
    <title>Kızılkaya Sondaj</title>
</head>
<body class="bg-light">
    <?php 
    $uri = service('uri');    
    ?>
    
    <!-- Nav -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="/"><img src="/assets/images/logo.png" class="img-header"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                <ul class="navbar-nav ">
                    <li class="nav-item <?= $uri->getSegment(1) == '' ? 'active' : null; ?>"> <!-- active -->
                        <a class="nav-link text-primary" href="/">ANA SAYFA</a>
                    </li>
                    <li class="nav-item <?= $uri->getSegment(1) == 'hakkimizda' ? 'active' : null; ?>">
                        <a class="nav-link text-primary" href="/hakkimizda">HAKKIMIZDA</a>
                    </li>

                    <li class="nav-item dropdown ">
                        <a class="nav-link dropdown-toggle text-primary <?= $uri->getSegment(1) == 'hizmet' ? 'active' : null; ?>" href="/hizmet" id="navbarDropdown" role="button"  aria-haspopup="true" aria-expanded="false">
                        HİZMETLERİMİZ
                        </a>
                        <div class="dropdown-menu fade-in" aria-labelledby="navbarDropdown">
                            <?= $this->include('partials/hizmetMenu.php'); ?>                          
                        </div>
                    </li>
                    
                    <li class="nav-item <?= $uri->getSegment(1) == 'Iletisim' ? 'active' : null; ?>">
                        <a class="nav-link text-primary" href="/Iletisim">İLETİŞİM</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <!-- İçerik -->
    <main role="main">
        <?= $this->renderSection('content') ?>        
    </main>


    <!-- Footer -->
    <footer class="text-light bg-dark">
        <div class="container">
            <div class="row d-flex justify-content-between">
                <!-- Site Haritası -->
                <div class="col-md-4 col-lg-2 col-xl-2">
                    <h5>Site Haritası</h5>
                    <hr class="bg-white mb-2 mt-0 d-inline-block mx-auto w-25">
                    <ul class="list-unstyled">
                        <li><a href="/" class="text-light">Ana Sayfa</a></li>
                        <li><a href="/hakkimizda" class="text-light">Hakkımızda</a></li>
                        <li><a href="/hizmet" class="text-light">Hizmetlerimiz</a></li>
                        <li><a href="/Iletisim" class="text-light">İletişim</a></li>
                    </ul>
                </div>
                
                <!-- Açıklama -->
                <div class="col-md-4 col-lg-4 col-xl-3">
                    <h4>Kızılkaya Sondaj</h4>
                    <hr class="bg-white mb-2 mt-0 d-inline-block mx-auto w-25">
                    <p><?= $global['footerAciklama']->aciklama; ?></p>
                </div>

                <!-- İletişim -->
                <div class="col-md-4 col-lg-3 col-xl-3">
                    <h5>İletişim</h5>
                    <hr class="bg-white mb-2 mt-0 d-inline-block mx-auto w-25">
                    <ul class="list-unstyled">
                        <li>
                            <i class="fa fa-home mr-2"></i> 
                            <?= $global['iletisim']->baslik; ?> <br>
                            <?= nl2br($global['iletisim']->adres); ?>
                        </li>
                        <li><i class="fa fa-envelope mr-2"></i> <?= $global['iletisim']->email; ?></li>
                        <li><i class="fa fa-phone mr-2"></i> <?= $global['iletisim']->telefon; ?></li>                        
                    </ul>
                </div>

                <div class="col-12 copyright mt-3">
                    <p class="float-left">
                        <a href="#" class="text-light"># Başa Dön</a>
                    </p>
                    <p class="text-right text-muted"><a href="/auth/login">Admin</a>
                </div>
            </div>
        </div>
    </footer>
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
