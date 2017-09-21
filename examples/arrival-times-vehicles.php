<?php

include_once '../vendor/autoload.php';

$ArrivalTimesVehicles = AXP\TransPerm\TransPerm::getArrivalTimesVehicles( '18000');

print_r($ArrivalTimesVehicles);