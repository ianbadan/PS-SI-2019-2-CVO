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
$email = $_POST['email'];
$cpf = $_POST['cpf'];
$endereco = $_POST['endereco'];
$telefone = $_POST['telefone'];
$sexo = $_POST['sexo'];

$res = $pdo->query("SELECT nome FROM usuario WHERE nome = '$usuario'");
$arrayUsuario = $res->fetch(PDO::FETCH_ASSOC);


if ($usuario == "" || $usuario == null){
    echo "<script type='text/javascript'>";
    echo "alert('O campo usuário está vazio');window.location.href='cadastro.html';";
    echo "</script>";
}else if ($usuario == $arrayUsuario['nome']){
    echo "<script type='text/javascript'>";
    echo "alert('Este nome de usuário ja está em uso');window.location.href='cadastro.html';";
    echo"</script>";
}else{
    $insertQuery = $pdo->prepare("INSERT INTO usuario(nome,senha,email,cpf,endereco,telefone,sexo) VALUES (:usuario,:senha,:email,:cpf,:endereco,:telefone,:sexo)");
    $insertQuery->bindValue(":usuario",$usuario);
    $insertQuery->bindValue(":senha",$senha);
    $insertQuery->bindValue(":email",$email);
    $insertQuery->bindValue(":cpf",$cpf);
    $insertQuery->bindValue(":endereco",$endereco);
    $insertQuery->bindValue(":telefone",$telefone);
    $insertQuery->bindValue(":sexo",$sexo);
    $insertQuery->execute();
    
    echo "<script type='text/javascript'>";
    echo "alert('Usuário Cadastrado com sucesso!');window.location.href='index.html';";
    echo"</script>";
}

?>