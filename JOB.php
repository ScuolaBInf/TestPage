<!DOCTYPE html>
<html>
	<head>
		<script>
			function CheckCreate()
				{
					var MCuP = "Cuoco primi: Per la sede di Milano si cerca un cuoco specializzato nei primi piatti della cucina milanese con almeno 5 anni di esperienza";
					var MCuS = "Cuoco Secondi: Per la sede di Milano si cerca un cuoco specializzato nei secondi piatti della cucina milanese con almeno 2 anni di esperienza";
					var RCuP = "Cuoco Primi: Per la sede di Roma, si cerca cuoco specializzato nei primi piatti della cucina romana, con almeno 2 anni di esperienza";
					
					var MCaC = "Cameriere di sala: Per la sede di Milano si cerca cameriere di sala con almeno 2 anni di esperienza";
					var MCaM = "Maître: Per la sede di Milano si cerca Maitre con decennale esperienza";
					var GCaS = "Cameriere di sala: Per la sede di Genova, si cerca cameriere di sala con almeno 2 anni di esperienza";
					
					var c = document.getElementById("r");
					var op = document.getElementById("op")
					c.value = "";
					switch (document.getElementById("Luogo").value)
						{
							case "Milano":	switch(op.value)
												{
													case null:			c.innerHTML = "";
																		break
													case "Cuoco":		c.innerHTML = "<input type='checkbox' name='1' value='1'>" + MCuP + "<BR/>";
																		c.innerHTML += "<input type='checkbox' name='2' value='2'>" + MCuS + "<BR/>";
																		break;
													case "Cameriere":	c.innerHTML = "<input type='checkbox' name='1' value='1'>" + MCaC + "<BR/>";
																		c.innerHTML += "<input type='checkbox' name='2' value='2'>" + MCaM + "<BR/>";
												}												
											break;
							case "Roma":	
							case "Genova":	switch(op.value)
												{
													case null:		c.innerHTML = "";
																		break
													case "Cuoco":		c.innerHTML = "<input type='checkbox' name='3' value='3'>" + RCuP + "<BR/>";
																		break;
													case "Cameriere":	c.innerHTML = "<input type='checkbox' name='3' value='3'>" + GCaS + "<BR/>";
												}									
											break;
							case "Nessuna Preferenza":	switch(op.value)
												{
													case null:			c.innerHTML = "";
																		break
													case "Cuoco":		c.innerHTML = "<input type='checkbox' name='1' value='1'>" + MCuP + "<BR/>";
																		c.innerHTML += "<input type='checkbox' name='2' value='2'>" + MCuS + "<BR/>";
																		c.innerHTML += "<input type='checkbox' name='3' value='3'>" + RCuP + "<BR/>";
																		break;
													case "Cameriere":	c.innerHTML = "<input type='checkbox' name='1' value='1'>" + MCaC + "<BR/>";
																		c.innerHTML += "<input type='checkbox' name='2' value='2'>" + MCaM + "<BR/>";
																		c.innerHTML += "<input type='checkbox' name='3' value='3'>" + GCaS + "<BR/>";
												}									
											
						}						
				}

			function SelectCreate()
				{
					document.getElementById("r").innerHTML = "";
					var container = document.getElementById("5");
					var selectList;
					var txt = "";
					switch(document.getElementById("op").value)
						{
							case null:			selectList = [""];
												break;
							case "Cuoco":		selectList = ["", "Milano", "Roma", "Nessuna Preferenza"];
												break;
							case "Cameriere":	selectList = ["", "Milano", "Genova", "Nessuna Preferenza"];
												break;
						}
						
					for (var i = 0; i < selectList.length; i++) 
						{
							txt +=  "<option value='" + selectList[i] + "'>" + selectList[i] + "</option>";
						}
					container.innerHTML = "<select required id='Luogo' name='Luogo' onchange='CheckCreate()'>" + txt + "</select>";
				}
			
			function reset()
				{
					document.getElementById("f").reset();
					document.getElementById("5").innerHTML = "";
					document.getElementById("r").innerHTML = "";
				}
		</script>
	</head>
	
	<body>
		<form method="POST" action="elabora.php" id='f' enctype="multipart/form-data">
		<table>
			<tr>
				<td>Nome</td>
				<td><input  type="text" id="nomeID" name="nomeName" pattern="[A-Za-z]{2,20}$"></td>
			</tr>
			<tr>
				<td>Cognome</td>
				<td><input required type="text" id="cognomeID" name="cognomeName" pattern="[A-Za-z]{2,20}$"></td>
			</tr>
			<tr>
				<td>Telefono</td>
				<td><input required type="text" id="telefonoID" name="telefonoName" pattern="[0-9]{10}$"></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><input  type="text" id="emailID" name="emailName" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"></td>
			</tr>
			<tr>
				<td>Eta'</td>
				<td><input required type="text" id="etaID" name="etaName" pattern="[1-9]{1,3}$"> </td>
			</tr>
			<tr>
				<td>Titolo di Studio</td>
				<td>
					<select required name="titoloName">
						<option value="null"></option>
						<option value="diploma">Diploma</option>
						<option value="Laurea">Laurea</option>
					</select> 
				</td>
			</tr>
			<tr>
				<td>Posizioni Aperte</td>
				<td>
					<select required id="op" name="opName" onChange="SelectCreate()">
						<option value="null"></option>
						<option value="Cuoco">Cuoco</option>
						<option value="Cameriere">Cameriere</option>
					</select> 
				</td>
			</tr>
			<tr>
				<td>Sede di Lavoro</td>
				<td id="5">	
				</td>
			</tr>
		</table>
		
		<BR/>Ruolo:<BR/>
		<div id="r">
		</div>
		
		<BR/><BR/>
		
		<input type="hidden" name="action" value="upload" />
            <label>Carica il tuo file:</label>
            <input required type="file" name="user_file" />
            <br />
            <input type="submit" value="INVIA" />

		</form>
		<button onclick="reset()">RESET</button>
	</body>
</html>