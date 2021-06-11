<?php

namespace Source\Controllers;

use Source\Models\Product;

class Produto{

    public function Create($data){
        
        $produto = new Product();

        $produto->placa = $data['placa'];
        $produto->renavam = $data['renavam'];
        $produto->chassi = $data['chassi'];
        $produto->tipo_produto = $data['modo'];
        $produto->id_usuario = $_SESSION['ADMIN']['USER']['ID'];

        if($produto->save()) {
            echo json_encode([
                "code" => true,
                "title" => "Sucesso !",
                "message" => "Produto cadastrado com sucesso ! Estamos te redirecionando para a página Correta",
                "id" => uniqid(),
                "produto" => $produto->id,
                "tipo_produto" => $produto->tipo_produto,
            ]);
        } else {
            echo json_encode([
                "code" => false,
                "title" => "Erro !",
                "message" => $produto->fail()->getMessage(),
                "id" => uniqid()
            ]);
        }

    }
    
    public function HomeCars($data){
        
    }

}