<?php
    $dir    = './images';
    $files1 = scandir('../images');
 
    if(sizeof($files1)>0){
        $random_file_index = rand(2, sizeof($files1) - 1);
        echo $dir.'/'.$files1[$random_file_index];
    }
?>