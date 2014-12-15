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

<!-- input form -->

	<hr>
	<form name="input_form" action="result.php" method="post">
		<table class='table'>
			<tr>
				<th>
					Upper counter
				</th>
				<td>
					<label>Length (al):</label>
					<div class="input-group">
						<input class='form-control' type="number" name="l1" step=0.1 value=1>
						<div class="input-group-addon">cm</div>
					</div>
				</td>
				<td>
					<label>Width (aw):</label>
					<div class="input-group">
						<input class='form-control' type="number" name="w1" step=0.1 value=1>
						<div class="input-group-addon">cm</div>
					</div>  
				</td>
			</tr>
			<tr>
				<th>
					Lower counter
				</th>
				<td>
					<label>Length (bl):</label>
					<div class="input-group">
						<input class='form-control' type="number" name="l2" step=0.1 value=1>
						<div class="input-group-addon">cm</div>
					</div>
				</td>
				<td>
					<label>Width (bw):</label>
					<div class="input-group">
						<input class='form-control' type="number" name="w2" step=0.1 value=1>
						<div class="input-group-addon">cm</div>
					</div>  
				</td>
			</tr>
			<tr>
				<th>
					Offset Between Planes
				</th>
				<td>
					<label>Length (fl):</label>
					<div class="input-group">
						<input class='form-control' type="number" name="loff" step=0.1 value=0>
						<div class="input-group-addon">cm</div>
					</div>
				</td>
				<td>
					<label>Width (fw):</label>
					<div class="input-group">
						<input class='form-control' type="number" name="woff" step=0.1 value=0>
						<div class="input-group-addon">cm</div>
					</div>  
				</td>
			</tr>
			<tr>
				<th>
					Distance Between Two Counters
				</th>
				<td>
					<label>Height (h):</label>
					<div class="input-group">
					<input class="form-control" type="number" name="distance" step=0.1 value=0>
						<div class="input-group-addon">cm</div>
					</div> 
				</td>
				</td>
				<td>			
			</tr>
			<tr>
				<th>
					Normalized Rate
				</th>
				<td>
					<label>Rate:</label>
					<div class="input-group">
					<input class="form-control" type="number" name="norm_rate" value=1 step=0.1 value=1>
						<div class="input-group-addon">/cm2/min</div>
					</div> 
				</td>
				</td>
				<td>
			</tr>
			<tr>
				<th>
					Number of Generated MC Events:<br>
				</th>
				<td>
					<label>Number:</label>
					<div class="input-group">
					<input class="form-control" type="number" name="n_event" value=40000>
						<div class="input-group-addon">#</div>
					</div> 
				</td>
				</td>
				<td>
			</tr>
		</table>
		<br>
		<div class="well">
		<input type="submit" class='btn btn-primary btn-lg' name="submit" value="Calculate!"> 
		</div>
	</form>
	<hr>

</div>

</body>

</html>
