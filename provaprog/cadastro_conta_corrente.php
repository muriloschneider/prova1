<!DOCTYPE html>
<html lang="en">
<head>
<a href="saque_deposito.php"> deposito </a>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Cadastro de Conta Corrente</title>
</head>
<body>
<form action="ctrl-conta.php" method="POST">
<label for="cc_numero">Número:</label>
<input type="text" name="cc_numero">
<label for="cc_saldo">Saldo:</label>
<input type="text" name="cc_saldo">
<label for="cc_dt_ultima_alteracao">Data de última alteração:</label>
<input type="text" name="cc_dt_ultima_alteracao">
<label for="cc_pf">Pessoa Física:</label>
<select name="cc_pf_id" $id="cc_pf_id">
<option value="0">Selecione</option>

<?php

require_once("controle_conta_corrente.php");
echo lista_pessoa(0);
?>
</select>
<input type="submit" value="Enviar">
</form>
<br><br>


</body>
</html>