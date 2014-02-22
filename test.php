<?php

include("muon.php");

$l1 = 25;
$w1 = 3;
$l2 = 25;
$w2 = 3;
$norm_rate = 1;
$distance = 22;
$n_event = 100;

echo get_accepted_ratio($l1, $w1, $l2, $w2, $distance, $n_event);
echo "\n";

?>
