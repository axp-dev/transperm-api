<?php

include_once '../vendor/autoload.php';

$News = AXP\TransPerm\TransPerm::getNews();

print_r($News);