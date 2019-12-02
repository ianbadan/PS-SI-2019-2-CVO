<?php
        require_once 'vacina.php';
        $vacina = new Vacina('CVO_DATABASE','localhost','root',''); 
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="estoque_vacina_style.css">
    <title>Cartão Vacinação Online</title>
</head>

<body>
    <section>
        <div id="header">
            <a href="tela_usuario.html"><img src="./imagens/ícone-png.png" /></a>
            <h1>Bem Vindo</h1>
        </div>
        <div id="menu">
            <ul>
                <li><a href="cadastrar_vacina.php">Cadastrar Vacina</a></li>
                <li><a href="estoque_vacina.php">Verificar estoque de vacinas</a></li>
                <li><a href=#>Cadastrar Hospital</a></li>
                <li><a href=#>Menu Option</a></li>
                <li><a href=#>Menu Option</a></li>
            </ul>
        </div>
        <div id="content">
            <table>
                <tr>
                    <th>Vacina</th>
                    <th>Quantidade</th>
                    <th>Data de Fabricacão</th>
                    <th>Data de Vencimento</th>
                </tr>
                <tbody>
                <?php
                    $dado = $vacina->getVacina();
                   if (count($dado) > 0){
                       for ($i=0; $i < count($dado);$i++){
                           echo "<tr>";
                           foreach($dado[$i] as $key => $value){
                                if($key != 'id'){
                                    echo "<td>".$value."</td>";
                                }
                           }
                           echo "</tr>";
                       }
                   }
                ?>   
                </tbody>         
            </table>
            
        </div>
    </section>

</body>

</html>