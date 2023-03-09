<!DOCTYPE html>
<html>
<head>
	<title>Opdracht 15 Yasin Coban</title>
</head>
<body>
	<h1>Kapitaalberekening</h1>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		Startapitaal: <input type="text" name="kapitaal"><br>
		Rentepercentage: <input type="text" name="rente"><br>
		Jaarlijkse opname: <input type="text" name="opname"><br>
		<input type="submit" name="submit" value="Bereken de looptijd">
	</form>
	<br>
	<?php
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$kapitaal = $_POST["kapitaal"];
			$rente = $_POST["rente"]/100; // rentepercentage omzetten naar decimale waarde
			$opname = $_POST["opname"];
			$jaar = 0;

			while ($kapitaal > 0) {
			    $jaar++;
			    $kapitaal = $kapitaal * (1 + $rente) - $opname;
			    if ($jaar > 100) {
			        echo "Het rentepercentage is te hoog om de berekening uit te voeren.";
			        break;
			    }
			}

			if ($jaar > 100) {
			    // het bedrag kan het hele leven lang worden opgenomen als het programma 100 jaar bereikt zonder af te sluiten
			    echo "U kunt het bedrag uw hele leven lang opnemen.";
			} else {
			    $jaar_opname = $jaar - 1;
			    echo "U kunt het bedrag $jaar_opname jaar lang opnemen met een jaarlijkse opname van € $opname. ";
			}
		}
	?>
</body>
</html>
