<?php
        require_once 'vacina.php';
        $vacina = new Vacina('CVO_DATABASE','localhost','root',''); 
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="cadastrar_vacina_style.css">
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
            <?php
                if(isset($_POST['nome'])){
                    $vacina->cadastrarVacina($_POST['nome'],$_POST['data_fabricacao'],$_POST['data_vencimento'],$_POST['fabricante'],
                    $_POST['lote'],$_POST['quantidade'],$_POST['composicao']);
                }else{
                    
                }
            ?>
            <form id="content_form" method="POST">
                <h1>Cadastrar Vacina</h1>
                <input type="text" name="nome" id="nome" placeholder="Nome">
                <div class="date_label">
                    <label for="data_fabricacao">Data de fabricação</label>
                    <input type="date" name="data_fabricacao" id="data_fabricacao" placeholder="Data de fabricação">
                </div>
                <div class="date_label">
                    <label for="data_vencimento">Data de vencimento</label>
                    <input type="date" name="data_vencimento" id="data_vencimento" placeholder="Data de vencimento">
                </div>
                <input type="text" name="fabricante" id="fabricante" placeholder="Fabricante">
                <input type="number" name="lote" id="lote" placeholder="Lote">
                <input type="number" name="quantidade" id="quantidade" placeholder="Quantidade">
                <input type="text" name="composicao" id="composicao" placeholder="Composição">
                <input type="submit" value="cadastrar" name="cadastrar">
            </form>
        </div>
    </section>

</body>

</html>