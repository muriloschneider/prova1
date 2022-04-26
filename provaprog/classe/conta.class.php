<?php
    class conta{
        private $cc_numero;
        private $cc_saldo;
        private $cc_dt_ultima_alteracao;
        private $cc_pf_id;
        
        public function __construct($numero, $saldo, $dt, $pf_id ){ 
            $this->cc_numero = $numero;
            $this->cc_saldo = $saldo;
            $this->cc_dt_ultima_alteracao = $dt;
            $this->cc_pf_id = $pf_id;
        }

    public function getnumero(){return $this->cc_numero;}
    public function getsaldo(){return $this->cc_saldo;}
    public function getdt(){return $this->cc_dt_ultima_alteracao;}
    public function getpf_id(){return $this->cc_pf_id;}

    public function setId($numero) { $this->cc_numero = $numero; }
    public function setCpf($saldo) { $this->cc_saldo = $saldo; }
    public function setNome($dt) { $this->cc_dt_ultima_alteracao = $dt; }
    public function setDtNascimento($pf_id) { $this->cc_pf_id = $pf_id; }
    
        
        public function setnumero($numero){
        if($numero > 0 && $numero <> "")
        $this->cc_numero = $cc_numero;
else 
throw new Exception("Número de conta
                    inválido: ".$numero);

        }
        public function setsaldo($saldo){
            if($saldo > 0 && $numero <> "")
            $this->cc_saldo = $cc_saldo;
else
throw new Exception("Saldo inválido: ".$saldo);
        
        }
        public function setdtultimaalteracao($dt){
            if($dt > 0 && $dt <> "")
            $this->cc_dt_ultima_alteracao = $dt;
else
throw new Exception("data inválida: ".$dt);

        }
        public function setpf_id($pf_id){
            if($pf_id > 0 && $pf_id <> "")
            $this->cc_pf_id = $pf_id;
else
throw new Exception("pessoa inválida: ".$pf_id);
        
        }

public function insere(){

       
     
        require_once("conf/conexao.php");
            $query .= 'SELECT * FROM pessoa_fisica';
    
            $pdo = Conexao::getInstance();
    $query = ' INSERT INTO TABLE conta_corrent
    VALUES (:numero,:saldo,:pf_id,:dt)';
    
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':numero',$this->cc_numero);
    $stmt->bindParam(':saldo',$this->cc_saldo);
    $stmt->bindParam(':pf_id',$this->cc_pf_id);
    $stmt->bindParam(':dt',$this->cc_dt_ultima_alteracao);
    $stmt->execute();
    return $stmt->fetch();
    
    return false;
            






}


        public function __toString(){
            $str = "número da conta: ".$this->cc_numero.
            "<br>pessoa: ".$this->pf_id;
            return $str;
        }

        public function inserir(){
            
            $pdo = Conexao::getInstance();
            $stmt = $pdo->prepare('INSERT INTO conta_corrent (cc_numero, pf_id) VALUES(:cc_numero, :pf_id)');
            $stmt->bindParam(':cc_numero', $this->cc_numero, PDO::PARAM_STR);
            $stmt->bindParam(':pf_id', $this->pf_id, PDO::PARAM_STR);
    
            return $stmt->execute();
            
        }

        public function editar($cc_numero){
            
            $pdo = Conexao::getInstance();
        $stmt = $pdo->prepare('UPDATE conta SET cc_numero = :cc_numero, pf_id = :pf_id WHERE cc_numero = :cc_numero');
        $stmt->bindParam(':cc_numero', $cc_numero, PDO::PARAM_INT);
        $stmt->bindParam(':cc_numero', $this->cc_numero, PDO::PARAM_STR);
        $stmt->bindParam(':pf_id', $this->pf_id, PDO::PARAM_STR);
    

    
            return $stmt->execute();
            
        }

        public function buscar($id) {      
     
            require_once("conf/conexao.php");
                $query .= 'SELECT * FROM conta_corrent';
        
        if($id > 0){
        $query = query . ' WHERE pf_id = :id';
        }
        $stmt = $pdo->prepare($query);
        
        if ($stmt->execute())
        return $stmt->fetchAll();
        
        return false;
                }

        function excluir($cc_numero){
            $pdo = Conexao::getInstance();
            $stmt = $pdo ->prepare('DELETE FROM conta WHERE cc_numero = :cc_numero');
            $stmt->bindParam(':cc_numero', $cc_numero);
            
            return $stmt->execute();
        }
       
}

?>