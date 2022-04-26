<!DOCTYPE html>
<?php 
    include_once "conf/default.inc.php";
    require_once "conf/Conexao.php";
    $title = "POO - saques";
    $procurar = isset($_POST["procurar"]) ? $_POST["procurar"] : ""; 
    $tipo = isset($_POST['tipo']) ? $_POST['tipo'] : 1;
?>


<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title> <?php echo $title; ?> </title>

    
</head>
<body>

<br><br><br>



    <form method="post">

    <form method="post" action="">
        <label for="pf_id">Pessoa Física:</label>
<select name="select">


</select>
    </select> <br><br>
    <label for="pf_id">Conta corrente:</label>
<select name="cc_numero" $id="cc_numero">
<option value="0">Selecione</option>
    </select> <br><br>
        operação:        <input type="radio" name="tipo" value="3"   <?php if ($tipo == "3") echo "checked" ?>> saque
                <input type="radio" name="tipo" value="3"   <?php if ($tipo == "3") echo "checked" ?>> depósito<br><br>
                valor: <input type="text" name="procurar" id="procurar" size="50" value="<?php echo $procurar;?>"> 

  <br>  <input type="submit">

    <br><br>
    </form>

    <a href="operacao.php"> operacao </a> 
   
</body>
</html>
