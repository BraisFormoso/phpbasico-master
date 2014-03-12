<?php require_once 'validIMC.php'?>
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
    </head>
    <body>
        <div>Resultado IMC</div>
<?php
$peso=$_REQUEST['peso'];
$estat=$_REQUEST['estat'];
$estat=$estat/100;
$dobleEstat=$estat*$estat;
$IMC= $peso/$dobleEstat;
echo $IMC;
echo '<br>';


if ($IMC < 18.5) {
    echo 'bajo peso';
}else if ($IMC < 25) {
    echo 'Peso Normal';
}else if ($IMC < 36){
    echo 'Sobrepeso';
} else {
    echo 'obeso';
}

?>
    </body>