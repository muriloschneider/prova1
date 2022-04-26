
<?php require_once "utils.php" ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>operacoes da conta</title>
</head>
<body>
    
<form action="controle_operacoes.php">
    <label for="pf_id">pessoa:</label>
<select name="pf_id">

<?php

require_once("utils.php");
echo lista_pessoa(0);
?>
</select>

<select name="cc_id">

<?php
$pessoa = isset($_POST['pf_id'])?$_POST['pf_id'] :0;
require_once("utils.php");
echo lista_contas($pessoa);
?>
</select>
<label for="op">Operação</label>
<input name="op" type="radio"> saque 
<input name="op" type="radio"> deposito
<label for="valor">Valor:</label>
<input type="text" name="valor">
<input type="submit">
</body>
</html>