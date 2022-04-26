<?php
//conta
    include_once "conf/default.inc.php";
    require_once "conf/Conexao.php";

    
    $acao = isset($_GET['acao']) ? $_GET['acao'] : "";
    if ($acao == "excluir"){
        $cc_numero = isset($_GET['cc_numero']) ? $_GET['cc_numero'] : 0;
        require_once ("classe/conta.class.php");
        $conta = new conta("", "", "");
        $resultado = $conta->excluir($cc_numero);
        header("location:saque_deposito.php");
    }

  
    $acao = isset($_POST['acao']) ? $_POST['acao'] : "";
    if ($acao == "salvar"){
        $cc_numero = isset($_POST['cc_numero']) ? $_POST['cc_numero'] : "";
        if ($cc_numero == 0){
            require_once ("classe/conta.class.php");

            $conta = new conta("", $_POST['cc_saldo'], $_POST['cc_dt_ultima_alteracao']);
            
            $resultado = $conta->inserir();
            header("location:conta.php");
        }
        else
        require_once ("classe/conta.class.php");

        $conta = new conta("", $_POST['cc_saldo'], $_POST['cc_dt_ultima_alteracao']);
        
        $resultado = $conta->editar($cc_numero);
        header("location:conta.php");
    }



//Consultar dados
    function buscarDados($cc_numero){
        $pdo = Conexao::getInstance();
        $consulta = $pdo->query("SELECT * FROM conta WHERE cc_numero = $cc_numero");
        $dados = array();
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
            $dados['cc_numero'] = $linha['cc_numero'];
            $dados['cc_saldo'] = $linha['cc_saldo'];
            $dados['cc_dt_ultima_alteracao'] = $linha['cc_dt_ultima_alteracao'];

        }
        //var_dump($dados);
        return $dados;
    }

?>