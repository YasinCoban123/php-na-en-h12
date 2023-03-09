<!DOCTYPE html>
<html>
<head>
<title>Opdracht 15 Yasin Coban</title>
</head>
<body>
	<h1>Kapitaalberekening</h1>
	<form method="post">
		Startkapitaal: <input type="text" name="kapitaal"><br>
		Rentepercentage: <input type="text" name="rente"><br>
		Jaarlijkse opname: <input type="text" name="opname"><br>
		<input type="submit" name="submit" value="Bereken de looptijd">
	</form>
	<br>
<?php
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$kapitaal = $_POST["kapitaal"];
			$rente = $_POST["rente"]/100;
			$opname = $_POST["opname"];
			$jaar = 0;

			while ($kapitaal > 0 && $jaar <= 100) {
			    $kapitaal += $kapitaal * $rente - $opname;
			    $jaar++;
			}

			if ($jaar > 100) {
			echo "Het rentepercentage is te hoog om de berekening uit te voeren.";
			} else {
			echo "U kunt het bedrag " . ($jaar - 1) . " jaar lang opnemen met een jaarlijkse opname van € $opname. ";
		}
	}
?>
</body>
</html>