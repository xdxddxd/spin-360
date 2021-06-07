<?php

namespace Source\Controllers;

class Dashboard
{

    public function Info($data)
    {
        echo json_encode([
            "code" => true,
            "title" => "Abrindo Caixa!",
            "message" => "Insira as informações necessárias!",
            "id" => uniqid(),
            "info" => [
                'capturasRealizadas' => '7',
                'capturasPendentes' => '25',
                'creditosDisponiveis' => 'R$ 900,00',
            ]
        ]);
    }
}
