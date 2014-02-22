<?php

function get_accepted_ratio($l1, $w1, $l2, $w2, $distance, $n_event)
{
  $n_accepted = 0;

  for($i = 0; $i < $n_event; $i++)
  {
    $x = (rand()/getrandmax()-0.5)*$l1;
    $y = (rand()/getrandmax()-0.5)*$w1;
    $theta = generate_theta();
    $phi = rand()/getrandmax()*2*pi();
    $phi = rand(0, 2*pi());

    $x_low = $x + $distance*tan($theta)*cos($phi);
    $y_low = $y + $distance*tan($theta)*sin($phi);

    if($x_low>-0.5*$l2 and $x_low<0.5*$l2 and $y_low>-0.5*$w2 and $y_low<0.5*$w2) 
    {
      $n_accepted = $n_accepted + 1;
    }
  }

  return $n_accepted/$n_event;
}

/////////////////////////////////////////////////////////////////////

function generate_theta()
{
  while(1)
  {
    $theta = rand()/getrandmax()*0.5*pi();
    $pdf = cos($theta)*cos($theta)*sin($theta);
    $pdf_r = rand()/getrandmax()*2.0/3.0/sqrt(3.0);
    if($pdf_r < $pdf) return $theta;
  }
}

?>
