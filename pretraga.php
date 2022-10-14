<?php
include 'Baza.php';
$db = new Baza();

$marka = trim($_GET['marka']);
$sort = trim($_GET['sort']);

$podaci = $db->pretrazi($marka, $sort);

$delay = 0.2;
$bg = array('1.png', '2.png', '3.png', '4.png'); // array of background image filenames

foreach ($podaci as $telefon){
    $i = rand(0, count($bg)-1);
    $selectedBg = "$bg[$i]";
    ?>
    
    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="<?= $delay ?>s"style="display:flex;justify-content:center;align-content:center;width: 32%;height: 450px;margin-left: 15px;">
        <div class="service-item d-flex position-relative text-center h-100" style="justify-content: center; width: 100%; height: 100%;">
            <img src = "img/<?php echo $selectedBg; ?>"  style = "margin-left:30px;" alt="">
            <div class="service-text p-5"style="background: none; margin-top:60px; height:70%; width:80%; margin-left: -268px;" >

                <h3 id="tel1"><?= $telefon->proizvodjac ?></h3>
                <h3 id="tel2"><?= $telefon->model ?></h3>
                <h5 id="tel1"><?= $telefon->godinaLansiranja ?></h5>
                
               
                <?php
                    if($telefon->akcija){
                        ?>
                        <img src="img/sale4.png" style="max-height:50px; max-width:50px;">
                        <?php

                    }else{
                        ?>
                        <div style="height:50px;"></div>
                        <?php
                    }
                ?>

                <h2 id="tel3">Cena: <?= $telefon->cena ?>€</h2>
            </div>
        </div>
    </div>

<?php
    $delay += 0.2;
}

