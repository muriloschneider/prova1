<?php
    class contato{
        private $cont_id;
        private $cont_tipo;
        private $cont_descricao;
        private $pf_id;
        
        public function __construct($id, $tipo, $desc, $pf_id){ 
            $this->cont_id = $id;
            $this->cont_tipo = $tipo;
            $this->cont_descricao = $desc;
            $this->pessoa_fisica_pf_id = $pf_id;
        }

        public function getnumero(){return $this->cont_id;}
        public function getsaldo(){return $this->cont_tipo;}
        public function getdt(){return $this->cont_descricao;}
        public function getpf_id(){return $this->pf_id;}
    
        public function setId($id) { $this->cont_id = $id; }
        public function setCpf($tipo) { $this->cont_tipo = $tipo; }
        public function setNome($desc) { $this->cont_descricao = $desc; }
        public function setDtNascimento($pf_id) { $this->pf_id = $pf_id; }


        public function __toString(){
            $str = "tipo: ".$this->cont_tipo.
            "<br>descricao: ".$this->cont_descricao;
            return $str;
        }

        public function inserir(){
            
            $pdo = Conexao::getInstance();
            $stmt = $pdo->prepare('INSERT INTO contato (cont_id, pf_id, cont_tipo, cont_descricao) VALUES(:cont_id, :pf_id, :cont_tipo, :cont_descricao)');
            $stmt->bindParam(':cont_id', $this->cont_id, PDO::PARAM_STR);
            $stmt->bindParam(':pf_id', $this->pf_id, PDO::PARAM_STR);
    
            return $stmt->execute();
            
        }

        public function editar($cont_id){
            
            $pdo = Conexao::getInstance();
        $stmt = $pdo->prepare('UPDATE contato SET cont_id = :cont_id, pf_id = :pf_id WHERE cont_id = :cont_id');
        $stmt->bindParam(':cont_id', $cont_id, PDO::PARAM_INT);
        $stmt->bindParam(':pf_id', $this->pf_id, PDO::PARAM_STR);
    

    
            return $stmt->execute();
            
        }


        function excluir($cont_id){
            $pdo = Conexao::getInstance();
            $stmt = $pdo ->prepare('DELETE FROM contato WHERE cont_id = :cont_id');
            $stmt->bindParam(':cont_id', $cont_id);
            
            return $stmt->execute();
        }
       
}

?>