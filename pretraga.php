<?php
include 'Baza.php';
$db = new Baza();

$marka = trim($_GET['marka']);
$sort = trim($_GET['sort']);

$podaci = $db->pretrazi($marka, $sort);

$delay = 0.2;
$bg = array('1.png', '2.png', '3.png', '4.png'); // array of background image filenames
$i = rand(0, count($bg)-1);
$selectedBg = "$bg[$i]";

foreach ($podaci as $telefon){
    $i = rand(0, count($bg)-1);
    $selectedBg = "$bg[$i]";
    ?>
    
    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="<?= $delay ?>s"style="display:flex;justify-content:center;align-content:center;width: 32%;height: 450px;margin-left: 15px;border:solid 3px red;">
        <div class="service-item d-flex position-relative text-center h-100" style="justify-content: center; width: 100%; height: 100%; border:solid 3px blue; ">
            <img class="bg-img" style = "background: url(img/<?php echo $selectedBg; ?>) no-repeat;background-size:contain;display:flex;justify-content:center; width: 100%; height: 100%;margin-left:150px;border:solid 3px yellow; " alt="">
            <div class="service-text p-5"style="background: none;border:solid 3px green;margin-top:60px; height:60%;width:60%;" >

                <h3 class="mb-4"><?= $telefon->proizvodjac ?> <?= $telefon->model ?></h3>
                
                <h5 class="mb-3"><?= $telefon->godinaLansiranja ?></h5>
                
               
                <?php
                    if($telefon->akcija){
                        ?>
                        <span>&check;</span>
                        <?php

                    }else{
                        ?>
                        <span>&#x2716;</span>
                        <?php
                    }
                ?>

                <h2 class="text-danger">Cena: <?= $telefon->cena ?>€</h2>
            </div>
        </div>
    </div>

<?php
    $delay += 0.2;
}