<?php

include_once '../vendor/autoload.php';

$MovingAutos = AXP\TransPerm\TransPerm::getMovingAutos('01');

print_r($MovingAutos);