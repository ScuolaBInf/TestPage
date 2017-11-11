<html>
	<head>
		<script>
			function showCustomer() 
				{
					var xhttp;    
					var anni = document.getElementById("anni").value;
					var titolo = document.getElementById("titolo").value;
					var pos = document.getElementById("pos").value;
					var sede = document.getElementById("sede").value;

					xhttp = new XMLHttpRequest();
					xhttp.onreadystatechange = function() 
						{
							if (this.readyState == 4 && this.status == 200) 
								{
									document.getElementById("txtHint").innerHTML = this.responseText;
								}
						};
					xhttp.open("POST", "ajaxcall.php?anni="+anni+"&titolo="+titolo+"&pos="+pos+"&sede="+sede, true);
					xhttp.send();
				}
		</script>
	</head>
	<body>
		<select id="anni" onchange="showCustomer()">
			<option value="18-25">18-25 anni</option>
			<option value="25-35">25-35 anni</option>
			<option value="35-45">35-45 anni</option>
			<option value="45-1000">>45 anni</option>
		</select> 
		<select id="titolo" onchange="showCustomer()">
			<option value="Diploma">Diploma</option>
			<option value="Laurea">Laurea</option>
		</select>
		<select id="pos" onchange="showCustomer()">
			<option value="Cuoco">Cuoco</option>
			<option value="Cameriere">Cameriere</option>
		</select> 		
		<select id="sede" onchange="showCustomer()">
			<option value="Milano">Milano</option>
			<option value="Roma">Roma</option>
			<option value="Genova">Genova</option>
		</select> 
		
		<div id="txtHint"></div>
	</body>
</html>