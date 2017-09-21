<?php

include_once '../vendor/autoload.php';

$Boards = AXP\TransPerm\TransPerm::getBoards();

print_r($Boards);