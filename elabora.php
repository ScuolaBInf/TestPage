<?php
	$estensioni = array('doc', 'pdf');
	$temp = explode('.', $_FILES['user_file']['name']);
	$ext = end($temp);

	if (!in_array($ext, $estensioni)) 
		{
			echo "Errore: Si accettano solo formati doc e pdf";
			exit;
		}

	if (!isset($_POST["1"]))
		$_POST["1"] = 0;
	if (!isset($_POST["2"]))
		$_POST["2"] = 0;
	if (!isset($_POST["3"]))
		$_POST["3"] = 0;
	
	if(!ereg("^[a-zA-Z]{2,20}",$_POST["nomeName"]))
		{
			echo "Nome non valido";
			exit;
		}
	if(!ereg("^[a-zA-Z]{2,20}",$_POST["cognomeName"]))
		{
			echo "cognome non valido";
			exit;
		}

	if(!ereg("^[0-9]{10,10}", $_POST["telefonoName"]))
		{
			echo "cognome non valido";
			exit;			
		}
		
	if(!ereg("^[a-z0-9][_\.a-z0-9-]+@([a-z0-9][0-9a-z-]+\.)+([a-z]{2,3})",$_POST["emailName"]))
		{
			echo "Mail non valida";
			exit;
		}

	if(!ereg("^[0-9]{1,3}", $_POST["etaName"]))
		{
			echo "eta' non valida";
			exit;
		}
		
	if ($_POST["titoloName"] != "diploma" and $_POST["titoloName"] != "Laurea")
		{
			echo "Titolo non validio";
			exit;
		}

	if ($_POST["opName"] != "Cuoco" and $_POST["opName"] != "Cameriere")
		{
			echo "p non validio";
			exit;
		}

	if ($_POST["Luogo"] != "Milano" and $_POST["Luogo"] != "Roma" and $_POST["Luogo"] != "Genova" and $_POST["Luogo"] != "Nessuna Preferenza")
		{
			echo "p non validio";
			exit;
		}
	
	if(!ereg("^[0-3]{1}",$_POST["1"]))
		{
			echo "1 non valido";
			exit;
		}
	
	if(!ereg("^[0-3]{1}",$_POST["2"]))
		{
			echo "2 non valido";
			exit;
		}
	
	if(!ereg("^[0-3]{1}",$_POST["3"]))
		{
			echo "3 non valido";
			exit;
		}
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "paginatest";

	$db = new mysqli($servername, $username, $password, $dbname);
	$sql = "INSERT INTO `Candidatura` (`id`, `Nome`, `Cognome`, `Email`, `Eta`, `Titolo`, `Posizione`, `Sede`, `Ruolo1`, `Ruolo2`, `Ruolo3`, `Telefono`) 
			VALUES ('', '".$_POST["nomeName"]."', '".$_POST["cognomeName"]."', '".$_POST["emailName"]."', '".$_POST["etaName"]."', '".$_POST["titoloName"]."', '".$_POST["opName"]."', '".$_POST["Luogo"]."', '".$_POST["1"]."', '".$_POST["2"]."', '".$_POST["3"]."', '".$_POST["telefonoName"]."');";

	if ($db->query($sql) === TRUE) 
		echo "Candidatura` inviata con Successo!";
	else 
		echo $db->error;
	$db->close();
		
	$dir = "./CV/";
	if(isset($_FILES['user_file']))
		{
			$file = $_FILES['user_file'];
			if($file['error'] == UPLOAD_ERR_OK and is_uploaded_file($file['tmp_name']))
				{
					$file['name'] = $_POST["emailName"].".pdf";
					move_uploaded_file($file['tmp_name'], $dir.$file['name']);
				}
		}
?>