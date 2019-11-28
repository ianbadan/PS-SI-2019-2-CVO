<?php
try{
    $pdo = new PDO ("mysql:dbname=CVO_DATABASE;host=localhost","root","");
}catch (PDOException $e){
    echo "Erro no banco de dados: ".$e->getMessage();
}catch(Exception $e){
    echo "Erro genérico: ".$e->getMessage();
}

$usuario = $_POST['usuario'];
$senha = $_POST['senha'];
$logar = $_POST['logar'];

$verify = $pdo->query("SELECT nome,senha FROM usuario WHERE nome = '$usuario' AND senha = '$senha'") or die("Não foi possível selecionar");
$verifyArray = $verify->fetch(PDO::FETCH_ASSOC);

if (empty($verifyArray)){
    echo "<script type='text/javascript'>";
    echo "alert('Login ou senha inválidos, tente novamente');window.location.href='index.html';";
    echo "</script>";
}else{
    echo "<script type='text/javascript'>";
    echo "window.location.href='tela_usuario.html';";
    echo "</script>";
}
?>