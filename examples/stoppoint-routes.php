<?php

include_once '../vendor/autoload.php';

$StoppointRoutes = AXP\TransPerm\TransPerm::getStoppointRoutes( date('d.m.Y'), '18000');

print_r($StoppointRoutes);