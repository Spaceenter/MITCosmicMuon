<html>

<head>

<title>MIT Cosmic Muon</title>

</head>

<body>

<h1>MIT Cosmic Ray Muon Rate Calculator</h1>
<h1>http://cyclo.lns.mit.edu/muon/</h1>
<h3>Please contact weisun@mit.edu for any question.</h3>

=================================================<br>
<form name="input_form" action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
Upper counter:<br>
Length: <input type="number" name="l1" step=0.000001>cm  
&nbsp &nbsp &nbsp &nbsp 
Width: <input type="number" name="w1" step=0.000001>cm<br>
-------------------------------------------------<br>
Lower counter:<br>
Length: <input type="number" name="l2" step=0.000001>cm  
&nbsp &nbsp &nbsp &nbsp 
Width: <input type="number" name="w2" step=0.000001>cm<br>
-------------------------------------------------<br>
Offset Between Planes:<br>
Length Direction: <input type="number" name="loff" value=0 step=0.000001>cm  
&nbsp &nbsp &nbsp &nbsp 
Width Direction: <input type="number" name="woff" value=0 step=0.000001>cm<br>
-------------------------------------------------<br>
Distance between two counters:<br>
<input type="number" name="distance" step=0.000001>cm<br>
-------------------------------------------------<br>
Normalized rate:<br>
<input type="number" name="norm_rate" value=1 step=0.000001>/cm2/min<br>
-------------------------------------------------<br>
Number of generated MC events:<br>
<input type="number" name="n_event" value=40000><br>
-------------------------------------------------<br>
<input type="submit" name="submit" value="Calculate!"><br>
=================================================<br>
</form>

</body>

</html>

<?php

include_once("muon.php");

if($_POST) 
{
  if(is_numeric($_POST["l1"]) and is_numeric($_POST["w1"]) and is_numeric($_POST["l2"]) and is_numeric($_POST["w2"]) and is_numeric($_POST["loff"]) and is_numeric($_POST["woff"]) and is_numeric($_POST["distance"]))
  {
    $l1 = $_POST["l1"];
    $w1 = $_POST["w1"];
    $l2 = $_POST["l2"];
    $w2 = $_POST["w2"];
    $loff = $_POST["loff"];
    $woff = $_POST["woff"];
    $norm_rate = $_POST["norm_rate"];
    $distance = $_POST["distance"];
    $n_event = $_POST["n_event"];

    $accepted_ratio = get_accepted_ratio($l1, $w1, $l2, $w2, $loff, $woff, $distance, $n_event);
    $rate = $l1*$w1*$norm_rate*$accepted_ratio;
    $accepted_ratio = 100*$accepted_ratio;

    echo "<h3>Parameters:</h3>";
    echo "Upper counter:<br>";
    echo "Length: <b>".$l1."cm</b> &nbsp &nbsp &nbsp &nbsp Width: <b>".$w1."cm</b><br>";
    echo "Lower counter:<br>";
    echo "Length: <b>".$l2."cm</b> &nbsp &nbsp &nbsp &nbsp Width: <b>".$w2."cm</b><br>";
    echo "Offset Between Planes:<br>";
    echo "Length Direction: <b>".$loff."cm</b> &nbsp &nbsp &nbsp &nbsp Width Direction: <b>".$woff."cm</b><br>";
    echo "Distance between two counters: <b>".$distance."cm</b><br>";
    echo "Normalized rate: <b>".$norm_rate."/cm2/min</b><br>";
    echo "<h3>Calculated results:</h3>";
    echo "<b>".number_format($accepted_ratio,2)."%</b> particles passing the upper counter are accepted by the lower counter.<br>";
    echo "The event rate is estimated to be: <b>".number_format($rate, 2)." /min</b>.<br>";
  }
  else echo "<h1>Please give input parameters in the form!</h1>";
}

?>
