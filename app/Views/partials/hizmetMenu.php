<?php foreach($global['hizmetMenu'] as $hizmetMenu) : ?>
<a class="dropdown-item" href="/hizmet/show/<?= $hizmetMenu->id ?>"><?= $hizmetMenu->baslik ?></a>
<?php endforeach; ?> 
