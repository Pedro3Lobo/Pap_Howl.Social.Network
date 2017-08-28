<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>jQuery UI Dialog - Modal form</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <body>
	

	

	<button onclick="myFunction()">Alterar as Informações do Utilizador</button>

	

	<script>
	function myFunction() {
		var person = prompt("Introduze a tua password:", "");

		if (person == "henrique") {
			
			 window.location='index.php?page=main_infor';
		}
	}
	</script>


  </body>
</html>
