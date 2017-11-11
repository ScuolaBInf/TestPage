<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "paginatest";

	$conn = new mysqli($servername, $username, $password, $dbname);
	
	//echo $_REQUEST['anni']." ";
	//echo $_REQUEST['titolo']." ";
	//echo $_REQUEST['pos']." ";
	//echo $_REQUEST['sede']." ";
	
	$min;
	$max;
	
	sscanf($_REQUEST['anni'] ,"%d-%d", $min, $max);
	
	$sql = "SELECT Nome, Cognome, Email, Eta, Titolo, Telefono FROM candidatura WHERE Titolo='".$_REQUEST['titolo']."' and Posizione='".$_REQUEST['pos']."' and (Sede='".$_REQUEST['sede']."' || Sede='Nessuna Preferenza') and (Eta>='".$min."' and Eta<='".$max."')";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) 
		{
			echo "<table>";
			echo "<tr>";
			echo "<th> Nome </th>";
			echo "<th> Cognome </th>";
			echo "<th> Titolo di Studio </th>";
			echo "<th> Età </th>";
			echo "<th> CV </th>";
			echo "</tr>";
			while($row = $result->fetch_assoc()) 
				{
					echo "<tr title='".$row["Email"].", ".$row["Telefono"]."'>";
					echo "<td>".$row["Nome"]."</td>";
					echo "<td>".$row["Cognome"]."</td>";
					echo "<td>".$row["Titolo"]."</td>";
					echo "<td>".$row["Eta"]."</td>";
					echo "<td><a href='CV/".$row["Email"].".pdf' download> Download CV</a></td>";
					echo "</tr>";
				}
			echo "</table>";
		}
	else 
		{
			echo "Al momento non vi sono Candidati in base ai filtri selezionati";
		}
	$conn->close();
?>