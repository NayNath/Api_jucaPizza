<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
//metodos que aceita
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
//tempo de acesso
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
//encode descodifica
echo json_encode(["mensagem"=>"Bem vindos a API Juca Pizzaria"],
JSON_PRETTY_PRINT);
?>