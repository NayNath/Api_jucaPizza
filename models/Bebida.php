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

}