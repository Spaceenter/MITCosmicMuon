<html>

  <head>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

    <title>MIT Cosmic Muon</title>

  </head>

  <body>

    <h1>MIT Cosmic Ray Muon Rate Calculator</h1>
    <h1>http://cyclo.lns.mit.edu/muon/</h1>
    <h3>Please contact weisun@mit.edu for any question.</h3>

    <hr>
    <form name="input_form" action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
      <table border='1'>
	<tr>
	  <td>
	    Upper counter
	  </td>
	  <td>
	    Length: <input type="number" name="l1" step=0.000001>cm  
	    &nbsp&nbsp&nbsp&nbsp
	    Width: <input type="number" name="w1" step=0.000001>cm
	  </td>
	</tr>
	<tr>
	  <td>
	    Lower counter
	  </td>
	  <td>
	    Length: <input type="number" name="l2" step=0.000001>cm  
	    &nbsp&nbsp&nbsp&nbsp
	    Width: <input type="number" name="w2" step=0.000001>cm<br>
	  </td>
	</tr>
	<tr>
	  <td>
	    Offset Between Planes
	  </td>
	  <td>
	    Length: <input type="number" name="loff" value=0 step=0.000001>cm  
	    &nbsp&nbsp&nbsp&nbsp
	    Width: <input type="number" name="woff" value=0 step=0.000001>cm<br>
	  </td>
	</tr>
	<tr>
	  <td>
	    Distance Between Two Counters
	  </td>
	  <td>
	    <input type="number" name="distance" step=0.000001>cm
	  </td>
	</tr>
	<tr>
	  <td>
	    Normalized Rate
	  </td>
	  <td>
	    <input type="number" name="norm_rate" value=1 step=0.000001>/cm2/min
	  </td>
	</tr>
	<tr>
	  <td>
	    Number of Generated MC Events:<br>
	  </td>
	  <td>
	    <input type="number" name="n_event" value=40000>
	  </td>
	</tr>
      </table>
      <br>
      <input type="submit" class='btn btn-primary' name="submit" value="Calculate!"> 
    </form>
    <hr>

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

echo "<h3>Parameters</h3>";
echo "<table border='1'>";
echo "<tr><td>Upper counter</td>";
echo "<td>Length: <b>".$l1."cm</b> &nbsp &nbsp &nbsp &nbsp Width: <b>".$w1."cm</b></td></tr>";
echo "<tr><td>Lower counter</td>";
echo "<td>Length: <b>".$l2."cm</b> &nbsp &nbsp &nbsp &nbsp Width: <b>".$w2."cm</b></td></tr>";
echo "<tr><td>Offset Between Planes</td>";
echo "<td>Length: <b>".$loff."cm</b> &nbsp &nbsp &nbsp &nbsp Width: <b>".$woff."cm</b></td></tr>";
echo "<tr><td>Distance between two counters &nbsp </td><td><b>".$distance."cm</b></td></tr>";
echo "<tr><td>Normalized rate</td><td><b>".$norm_rate."/cm2/min</b></td></tr>";
echo "</table>";
echo "<h3>Calculated results</h3>";
echo "<b>".number_format($accepted_ratio,2)."%</b> particles passing the upper counter are accepted by the lower counter.<br>";
echo "The event rate is estimated to be: <b>".number_format($rate, 2)." /min</b>.<br>";
}
else echo "<h1>Please give input parameters in the form!</h1>";
}
echo "<br><br><br><br>";

?>
