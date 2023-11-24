<div class="scroller">
    <?php
    $dir    = '../Ressources/Realisations';
    $files1 = scandir($dir);

    //print_r($files1);

    for ($i = 2; $i < count($files1); $i++) {
        echo '<img src="' . $dir . '/' . $files1[$i] . '" alt=""/>';
    }
    ?>
</div>



