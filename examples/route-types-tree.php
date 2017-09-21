<?php

include_once '../vendor/autoload.php';

$RouteTypesTree = AXP\TransPerm\TransPerm::getRouteTypesTree( date('d.m.Y') );

print_r($RouteTypesTree);