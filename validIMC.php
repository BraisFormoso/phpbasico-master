<?php

function validarPeso ($peso){
    if (($peso> 150) && ($peso < 40)){
        return true;
    } else {
        return false;
    }
    
}
