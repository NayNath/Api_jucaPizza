<?php 
class Bebida{
    private $conn;
    private $tabela = "bebidas";
    public $idBebida;
    public $nome;
    public $litros;
    public $valor;

    public function __construct($db) {
        $this->conn = $db;
    }
    function read(){
        $query = "SELECT idBebida, nome, litros, valor FROM ". $this->tabela . " ORDER BY valor asc";

        // Prepara a query
        $stmt = $this->conn->prepare($query);
 
        // Executa a query
        $stmt->execute();
 
        return $stmt;
    }
    public function read_single()
    {
        // Cria a consulta
        $query = 'SELECT
            b.idBebida,
            b.nome,
            b.litros,
            b.valor
        FROM
            ' . $this->tabela . ' b
        WHERE
            b.idBebida = ?
        LIMIT 1';
 
        // Prepara a query
        $stmt = $this->conn->prepare($query);
 
        // Vincula o ID
        $stmt->bindParam(1, $this->idBebida);
 
        // Executa a query
        $stmt->execute();
 
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
        // Define as propriedades
        $this->nome = $row['nome'];
        $this->litros = $row['litros'];
        $this->valor = $row['valor'];
    }

    public function create()
    {
        // Query de inserção
        $query = 'INSERT INTO ' . $this->tabela . ' SET nome = :nome, litros = :litros, valor = :valor';
 
        // Preparar a query
        $stmt = $this->conn->prepare($query);
 
        // Limpar os dados
        $this->nome = htmlspecialchars(strip_tags($this->nome));
        $this->litros = htmlspecialchars(strip_tags($this->litros));
        $this->valor = htmlspecialchars(strip_tags($this->valor));
       
        // Vincular os parâmetros
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':litros', $this->litros);
        $stmt->bindParam(':valor', $this->valor);
 
        // Executar a query
        if ($stmt->execute()) {
            return true;
        }    
        return false;
    }

    public function update() {
        // Query de atualização
        $query = 'UPDATE ' . $this->tabela . ' SET nome=:nome, litros=:litros, valor=:valor WHERE idBebida=:id';
 
        // Preparar a query
        $stmt = $this->conn->prepare($query);
 
        // Limpar os dados
        $this->nome = htmlspecialchars(strip_tags($this->nome));
        $this->litros = htmlspecialchars(strip_tags($this->litros));
        $this->valor = htmlspecialchars(strip_tags($this->valor));
        $this->idBebida = htmlspecialchars(strip_tags($this->idBebida));
 
        // Vincular os parâmetros
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':litros', $this->litros);
        $stmt->bindParam(':valor', $this->valor);
        $stmt->bindParam(':id', $this->idBebida);
 
        // Executar a query
        if($stmt->execute()) {
            return true;
        }
     
        return false;
    }

}