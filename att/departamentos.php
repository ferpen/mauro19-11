
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
  
    function registrar() {
    var nome = document.getElementById('nome').value;
    var url = 'registrar.php?nome=' + nome + '&pag=departamento';

    fetch(url)
	.then(response => response.json())
	.then(data => {
	    document.getElementById('registro').textContent = "Resultado: " + data.login;
	});

    
}

    </script>
</head>
<body>
<div id='registro'>
    nome do departamento: <input type="text" id="nome" required><br>
    <input type="button" value="Cadastrar" onclick='registrar()'>
</div>
</body>
</html> 