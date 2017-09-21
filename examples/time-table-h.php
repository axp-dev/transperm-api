<?php

include_once '../vendor/autoload.php';

$TimeTableH = AXP\TransPerm\TransPerm::getTimeTableH( date('d.m.Y'), '806', '34601');

print_r($TimeTableH);