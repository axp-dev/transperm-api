<?php

include_once '../vendor/autoload.php';

$FullRoute = AXP\TransPerm\TransPerm::getFullRoute( date('d.m.Y'), '01');

print_r($FullRoute);