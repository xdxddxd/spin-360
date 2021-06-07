<?php

namespace Source\Controllers;
use Source\Models\AccessLevel;

class Cargo{

    public function Consulta($data)
    {
        $cargo = new AccessLevel();
        $cargo = $cargo->findById($data['pos']);

        if($cargo){
            echo json_encode([
                "code" => true,
                "response" => false,
                "title" => "Sucesso !",
                "message" => "Informação do cargo atualizada",
                "id" => uniqid(),
                "info" => $cargo->description
            ]);
        } else {
            echo json_encode([
                "code" => false,
                "response" => true,
                "title" => "Erro !",
                "message" => "Erro ao pegar informação do cargo",
                "id" => uniqid(),
            ]);
        }

        
    }

}