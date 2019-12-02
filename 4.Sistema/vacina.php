<?php
class Vacina{
    private $PDO;

    public function __construct($dbname,$host,$user,$senha){
        try{
            $this->PDO = new PDO("mysql:dbname=".$dbname.";host=".$host,$user,$senha);
        }catch(PDOException $e){
            echo "Erro de banco de dados: ".$e->getMessage();
        }catch(Excepion $e){
            echo "Erro genérico: ".$e->getMessage();
        }
    }

    //Cadastrar vacinas no BD
    public function cadastrarVacina($nome,$data_fabricacao,$data_vencimento,$fabricante,$lote,$quantidade,$composicao){
        $res = $this->PDO->prepare("INSERT INTO vacina(nome,data_fabricacao,data_vencimento,fabricante,lote,quantidade,composicao) VALUES
        (:nome,:data_fabricacao,:data_vencimento,:fabricante,:lote,:quantidade,:composicao)");
        $res->bindValue(":nome",$nome);
        $res->bindValue(":data_fabricacao",$data_fabricacao);
        $res->bindValue(":data_vencimento",$data_vencimento);
        $res->bindValue(":fabricante",$fabricante);
        $res->bindValue(":lote",$lote);
        $res->bindValue(":quantidade",$quantidade);
        $res->bindValue(":composicao",$composicao);
        $res->execute();
    }

    public function getVacina(){
        $res = array();
        $cmd =$this->PDO->prepare("SELECT nome,quantidade,data_fabricacao,data_vencimento FROM vacina");
        $cmd->execute();
        $res = $cmd->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }
}
?>