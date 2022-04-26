<?php
    class pessoafisica{
        private $pf_id;
        private $pf_cpf;
        private $pf_nome;
        private $pf_dt_nascimento;

        public function __construct($id, $cpf, $nome, $nasc){
            
            $this->pf_id = $id;
            $this->pf_nome = $nome;
            $this->pf_cpf = $cpf;
            $this->pf_dt_nascimento = $nasc;
        }

public function getId(){return $this->pf_id;}
public function getCpf(){return $this->pf_nome;}
public function getNome(){return $this->pf_cpf;}
public function getNasc(){return $this->pf_dt_nascimento;}

public function setId($id){return $this->pf_id = $id;}
public function setCpf($nome){return $this->pf_nome = $nome;}
public function setNome($cpf){return $this->pf_cpf = $cpf;}
public function setNasc($nasc){return $this->pf_dt_nascimento = $nasc;}




        public function __toString(){
            $str = "ID da pessoa: ".$this->pf_id.
            "<br>Nome da pessoa: ".$this->pf_nome.
            "<br>Data de nascimento: ".$this->pf_dt_nascimento.
            "<br>cpf da pessoa: ".$this->pf_cpf;
            
            return $str;
        }
        
        public function inserir(){
            
            $pdo = Conexao::getInstance();
            $stmt = $pdo->prepare('INSERT INTO pessoa_fisica (pf_nome, pf_cpf, pf_dt_nascimento) VALUES(:pf_nome, :pf_cpf,)');
            $stmt->bindParam(':pf_nome', $this->pf_nome, PDO::PARAM_STR);
            $stmt->bindParam(':pf_cpf', $this->pf_cpf, PDO::PARAM_STR);
    
            return $stmt->execute();
            
        }
        
        function editar($pf_id){
            $pdo = Conexao::getInstance();
            $stmt = $pdo->prepare('UPDATE pessoa_fisica SET pf_nome = :pf_nome, pf_cpf, = :pf_cpf, WHERE pf_nome = :pf_cpf');
            $stmt->bindParam(':pf_id', $id_estado, PDO::PARAM_INT);
            $stmt->bindParam(':pf_nome', $this->pf_nome, PDO::PARAM_STR);
            $stmt->bindParam(':pf_cpf,', $this->pf_cpf, PDO::PARAM_STR);
        
    
            $stmt->execute();
        }

        function excluir($pf_id){   
            $pdo = Conexao::getInstance();
            $stmt = $pdo->prepare('DELETE FROM pessoa_fisica WHERE pf_id = :pf_id');
            $stmt->bindParam(':pf_id', $pf_id);
            
            return $stmt->execute();
        }
      
 public function buscar($id) {      
    
    require_once("conf/conexao.php");
    $pdo = Conexao::getInstance();
 $query .= 'SELECT * FROM pessoa_fisica';
        
if($id > 0)
$query = query. ' WHERE pf_id = :id';

$stmt = $query->prepare($query);
$stmt->bindParam(':id',$id);
if ($stmt->execute())
return $stmt->fetchAll();

return false;
        }
    }



?>