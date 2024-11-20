<?php

function cadastrarusuario($nome, $email, $pass ){
$servidor = 'localhost';
$banco = 'sch';
$usuario = 'root';
$senha = '';
try {
    $conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);
} catch (PDOException $e) {
    echo "Erro de conexão: " . $e->getMessage();
}

    $codigoSQL = "INSERT INTO `usuarios` (`nome`, `email`, `senha`, `id`) VALUES (:nome, :email, :pass, NULL)";

    
    try {
        $comando = $conexao->prepare($codigoSQL);

        $resultado = $comando->execute(array('nome' => $nome, 'email' => $email,'pass' => $pass));
        

        if($resultado){
            $conexao = null;
            return "Cadastrado Com Sucesso!";
        } else {
            $conexao = null;
            return "Erro ao executar o comando!";
        }
    } catch (Exception $e) {
        $conexao = null;
        return "Erro $e";
        }
}
function cadastrarusuariot($nome, $email, $pass ){
    $servidor = 'localhost';
    $banco = 'sch';
    $usuario = 'root';
    $senha = '';
    try {
        $conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);
    } catch (PDOException $e) {
        echo "Erro de conexão: " . $e->getMessage();
    }
    
        $codigoSQL = "INSERT INTO `usuarios` (`nome`, `email`, `senha`, `id`, `tecnico`) VALUES (:nome, :email, :pass, NULL , '1')";
    
        
        try {
            $comando = $conexao->prepare($codigoSQL);
    
            $resultado = $comando->execute(array('nome' => $nome, 'email' => $email,'pass' => $pass));
            
    
            if($resultado){
                $conexao = null;
                return "Cadastrado Com Sucesso!";
            } else {
                $conexao = null;
                return "Erro ao executar o comando!";
            }
        } catch (Exception $e) {
            $conexao = null;
            return "Erro $e";
            }
    }

function cadastrardepartamento($nome){
    $servidor = 'localhost';
    $banco = 'sch';
    $usuario = 'root';
    $senha = '';
    try {
        $conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);
    } catch (PDOException $e) {
        echo "Erro de conexão: " . $e->getMessage();
    }
    
        $codigoSQL = "INSERT INTO `departamentos` (`nome`, `id`) VALUES (:nome, NULL)";
    
        
        try {
            $comando = $conexao->prepare($codigoSQL);
    
            $resultado = $comando->execute(array('nome' => $nome));
            
    
            if($resultado){
                $conexao = null;
                return "Cadastrado Com Sucesso!";
            } else {
                $conexao = null;
                return "Erro ao executar o comando!";
            }
        } catch (Exception $e) {
            $conexao = null;
            return "Erro $e";
            }
    }



$pagina=$_GET['pag'];

if ($pagina == "usuario" ){
$nome=$_GET['nome'];
$email=$_GET['email'];
$senha=$_GET['senha'];
if(isset($_GET['tec'])){
    $isCorrect = cadastrarusuariot($nome,$email,$senha);
}
else{
$isCorrect = cadastrarusuario($nome,$email,$senha);
}
$fim = array('login' => $isCorrect);
echo json_encode($fim);
}

else if ($pagina == "departamento"){
    $nome=$_GET['nome'];
    $isCorrect = cadastrardepartamento($nome);
    $fim = array('login' => $isCorrect);
    echo json_encode($fim);
}

?>
