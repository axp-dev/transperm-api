<?php

include_once '../vendor/autoload.php';

$TicketPoints = AXP\TransPerm\TransPerm::getTicketPoints();

print_r($TicketPoints);