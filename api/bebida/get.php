<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// Incluir arquivos de banco de dados e modelo
include_once '../../config/Database.php';
include_once '../../models/Bebida.php';
 
// Instanciar o objeto Database e obter a conexão
$database = new Database();
$db = $database->getConnection();
 
// Instanciar o objeto Bebida
$bebida = new Bebida($db);

$bebida->idBebida = isset($_GET['id']) ? $_GET['id'] : null;

if ($bebida->idBebida) {

    $bebida->idBebida = $_GET['id'];

    // Executa a query
    $bebida->read_single();
    //$bebida->nome != null
    if(isset($bebida->nome)){
        // Cria o array de resposta
        $bebida_arr = array(
            "id" => $bebida->idBebida,
            "nome" => $bebida->nome,
            "litros" => $bebida->litros,
            "valor" => $bebida->valor
        );
        http_response_code(200);

        echo json_encode($bebida_arr, JSON_PRETTY_PRINT);
    } else {
        http_response_code(404);
        echo json_encode(array("message" => "Nenhuma bebida encontrada."));
    }
}
//*-------------------------------------------------------

else{
    http_response_code(405);
    echo json_encode(array("erro" => "Parâmetro id não fornecido!"));
}