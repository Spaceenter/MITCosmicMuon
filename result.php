<html>

<head>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<style type="text/css">
	th { white-space: nowrap; font-weight: 400; font-style: italic;}
	.input-group { max-width: 20rem }
	</style>

	<title>MIT Cosmic Muon</title>

</head>

<body>

<div class="container">

	<h1>MIT Cosmic Ray Muon Rate Calculator</h1>
	<h4>http://cyclo.lns.mit.edu/muon/</h4>
	<h4>Please contact <b>weisun@mit.edu</b> for any question.</h4>
	<hr>

	<img src="scheme.png" style="width:450px;height=300px">

<!-- show results -->

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
		echo "<table class='table table-hover'>";
		echo "<tr><td>Upper counter</td>";
		echo "<td>Length (al): <b>".$l1."cm</b> &nbsp &nbsp &nbsp &nbsp Width (aw): <b>".$w1."cm</b></td></tr>";
		echo "<tr><td>Lower counter</td>";
		echo "<td>Length (bl): <b>".$l2."cm</b> &nbsp &nbsp &nbsp &nbsp Width (bw): <b>".$w2."cm</b></td></tr>";
		echo "<tr><td>Offset Between Planes</td>";
		echo "<td>Length (fl): <b>".$loff."cm</b> &nbsp &nbsp &nbsp &nbsp Width (fw): <b>".$woff."cm</b></td></tr>";
		echo "<tr><td>Distance between two counters &nbsp </td><td><b>".$distance."cm</b></td></tr>";
		echo "<tr><td>Normalized rate</td><td><b>".$norm_rate."/cm2/min</b></td></tr>";
		echo "</table>";
		echo "<h3>Calculated results</h3>";
		echo "<div class='alert alert-info'>";
		echo "<b>".number_format($accepted_ratio,2)."%</b> particles passing the upper counter are accepted by the lower counter.<br>";
		echo "The event rate is estimated to be: <b>".number_format($rate, 2)." /min</b>.<br>";
		echo "</div>";
	}
	else echo "<h1>Please give input parameters in the form!</h1>";
}
echo '<form name="input_form" action="index.php" method="post">';
echo '<input type="submit" class="btn btn-primary btn-lg" name="submit" value="Go Back & Re-Calculate!">';
echo '</form>';
echo "<br><br><br><br>";

?>

</div>

</body>

</html>
