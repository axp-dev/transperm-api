<?php

include_once '../vendor/autoload.php';

$StoppointTimeTable = AXP\TransPerm\TransPerm::getStoppointTimeTable( date('d.m.Y'), '18000');

print_r($StoppointTimeTable);