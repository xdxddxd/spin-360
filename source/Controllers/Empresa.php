<?php

namespace Source\Controllers;

use Source\Models\SystemUser;
use Source\Models\SystemEmpresa;

class Empresa
{

    public function Consultar($data)
    {

        $user = new SystemUser();
        $list = $user->find()->fetch(true);

        $return = array();

        foreach ($list as $userItem) {
            $return[$userItem->id] = [
                "id"    => $userItem->id,
                "nome"  => $userItem->nome,
                "email" => $userItem->email,
            ];
        }
        echo json_encode($return);
    }

    public function Cadastro($data)
    {

        $empresa = new SystemEmpresa();
        $empresa->razao_social = $data['razao_social'];
        $empresa->cnpj         = $data['cnpj'];
        $empresa->cep          = $data['cep'];
        $empresa->logradouro   = $data['rua'];
        $empresa->nr_local     = $data['nr'];
        $empresa->complemento  = $data['complemento'];
        $empresa->bairro       = $data['bairro'];
        $empresa->cidade       = $data['cidade'];
        $empresa->uf           = $data['uf'];
        $empresa->cel_phone    = $data['cel_phone'];
        $empresa->email        = $data['email'];
        $empresa->send_mail    = $data['send_mail'];
        $empresa->use_term     = $data['useterm'];
        $empresa->active       = 1;

        if ($empresa->save()) {

            $empresaId = (new SystemEmpresa())->find("cnpj = :cnpj", "cnpj={$data['cnpj']}")->fetch();

            $user = new SystemUser();
            $user->fk_empresa = $empresaId->id;
            $user->name = $data['name'];
            $user->cel_phone = $data['cel_phone'];
            $user->email = $data['email'];
            $user->password = $data['password'];
            $user->access_level = 1;
            $user->active = 1;

            if ($user->save()) {
                echo json_encode([
                    "code" => true,
                    "title" => "Sucesso !",
                    "message" => "Empresa e Usuário cadastrado com sucesso",
                    "id" => uniqid()
                ]);
            } else {
                echo json_encode([
                    "code" => false,
                    "title" => "Erro !",
                    "message" => $user->fail()->getMessage(),
                    "id" => uniqid()
                ]);
            }

        } else {
            echo json_encode([
                "code" => false,
                "title" => "Erro !",
                "message" => $empresa->fail()->getMessage(),
                "id" => uniqid()
            ]);
        }
    }
}
