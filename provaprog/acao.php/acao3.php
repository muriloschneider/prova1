<?php
// operacao
    include_once "conf/default.inc.php";
    require_once "conf/Conexao.php";

    
    $acao = isset($_GET['acao']) ? $_GET['acao'] : "";
    if ($acao == "excluir"){
        $pf_id = isset($_GET['pf_id']) ? $_GET['pf_id'] : 0;
        require_once ("classe/pessoa.class.php");
        $pessoa = new pessoa("", "", "");
        $resultado = $pessoa->excluir($pf_id);
        header("location:saque_deposito.php");
    }

  
    $acao = isset($_POST['acao']) ? $_POST['acao'] : "";
    if ($acao == "salvar"){
        $pf_id = isset($_POST['pf_id']) ? $_POST['pf_id'] : "";
        if ($pf_id == 0){
            require_once ("classe/pessoa.class.php");

            $pessoa = new pessoa("", $_POST['pf_cpf'], $_POST['pf_dt_nascimento'], $_POST['pf_nome']);
            
            $resultado = $pessoa->inserir();
            header("location:pessoa.php");
        }
        else
        require_once ("classe/pessoa.class.php");

        $pessoa = new pessoa("", $_POST['pf_cpf'], $_POST['pf_dt_nascimento'], $_POST['pf_nome']);
        
        $resultado = $pessoa->editar($pf_id);
        header("location:pessoa.php");
    }



//Consultar dados
    function buscarDados($pf_id){
        $pdo = Conexao::getInstance();
        $consulta = $pdo->query("SELECT * FROM pessoa WHERE pf_id = $pf_id");
        $dados = array();
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
            $dados['pf_id'] = $linha['pf_id'];
            $dados['pf_cpf'] = $linha['pf_cpf'];
            $dados['pf_nome'] = $linha['pf_nome'];
            $dados['cc_dt_nascimento'] = $linha['cc_dt_nascimento'];

        }
        //var_dump($dados);
        return $dados;
    }

?>