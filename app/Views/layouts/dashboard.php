<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/dashboard.css?<?php echo date('l jS \of F Y h:i:s A'); ?>">

    <title>Kontrol Paneli</title>
</head>
<body>
    <?php 
    $uri = service('uri');    
    ?>

    <!-- Header -->
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0 font-weight-bold" href="/">Kızılkaya Sondaj</a>
        
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <a class="nav-link text-light font-weight-bold" href="/auth/logout">Oturumu Kapat</a>
            </li>
        </ul>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <!-- Nav -->
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link <?= $uri->getSegment(2) == 'hizmet' ? 'active' : null; ?>" href="/admin/hizmet"><!-- active -->
                            <span data-feather="file"></span>
                            Hizmetler
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  <?= $uri->getSegment(2) == 'slider' ? 'active' : null; ?>" href="/admin/slider">
                            <span data-feather="bar-chart-2"></span>
                            Slider
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  <?= $uri->getSegment(2) == 'aciklama' ? 'active' : null; ?>" href="/admin/aciklama/edit">
                            <span data-feather="bar-chart-2"></span>
                            Sayfa Başlık Açıklamaları
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  <?= $uri->getSegment(2) == 'hakkimizda' ? 'active' : null; ?>" href="/admin/hakkimizda/edit">
                            <span data-feather="users"></span>
                            Hakkımızda
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  <?= $uri->getSegment(2) == 'Iletisim' ? 'active' : null; ?>" href="/admin/Iletisim/edit">
                            <span data-feather="bar-chart-2"></span>
                            İletişim
                            </a>
                        </li>
                        <a class="nav-link  <?= $uri->getSegment(2) == 'kullanici' ? 'active' : null; ?>" href="/admin/kullanici/edit">
                            <span data-feather="bar-chart-2"></span>
                            Hesap Ayarları
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>


            <!-- İçerik-->
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <?= $this->renderSection('content') ?>
            </main>
        </div>
    </div>


    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    
    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
        feather.replace()
    </script>
</body>
</html>