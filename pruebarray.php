<?php
$ejarray="";
$ejarray.='cosa1';

$ejarray.='cosa2';

$ejarray.='cosa3';
echo $ejarray[2];
if (isset($_REQUEST['cosa2'])){
    echo 'cosa2 requestada';
}
?>