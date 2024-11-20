<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
  
    function registrar() {
    var nome = document.getElementById('nome').value;
    var email = document.getElementById('email').value;
    var senha = document.getElementById('senha').value;
    var tecnico = document.getElementById('tecnico').checked;
    if(!tecnico){
    var url = 'registrar.php?nome=' + nome + '&email=' + email + '&senha=' + senha + '&pag=usuario';
    }
    else{
    var url = 'registrar.php?nome=' + nome + '&email=' + email + '&senha=' + senha + '&pag=usuario' + '&tec=1';
    }

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
    nome: <input type="text" id="nome" required><br>
    email:<input type="text" id="email" required><br>
    senha:<input type="text" id="senha" required><br>
    tecnico <input type="checkbox" id="tecnico"><br>
    <input type="button" value="Cadastrar" onclick='registrar()'>
</div>
</body>
</html> 

