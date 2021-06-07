<?php

namespace Source\Controllers;

use Source\Models\SystemUser;
use Source\Models\SystemEmpresa;
use Source\Models\AccessLevel;

class Session
{

    public function Login($data)
    {
        $token = md5(uniqid());

        $login = (new SystemUser())->find("email = :e", "e={$data['email']}")->fetch();
        //var_dump($login);

        if ($login) {
            if ($login->active) {

                if (!$login || !password_verify($data['senha'], $login->password)) {
                    echo json_encode([
                        "code" => false,
                        "title" => 'Erro',
                        "message" => 'Login e/ou senha inválida !',
                        "id" => uniqid()
                    ]);
                } else {
                    $empresa = (new SystemEmpresa())->findById($login->fk_empresa)->data();

                    if ($empresa->active) {

                        $al = (new AccessLevel())->findById($login->access_level)->data();

                        if($empresa->url_image){
                            $img = $empresa->url_image;
                        } else {
                            $img = "https://sistema.tabacaria.ga/assets/Icons/favicon.png";
                        }


                        $_SESSION['ADMIN']['USER'] = [
                            'ID' => $login->id,
                            'NOME' => $login->name,
                            'EMAIL' => $login->email,
                            'EMPRESA' => [
                                'ID' => $empresa->id,
                                'RAZAO_SOCIAL' => $empresa->razao_social,
                                'URL_IMG' => $img
                            ],
                            'ACCESS_LEVEL' => [
                                'ID' => $al->id,
                                'TITLE' => $al->title,
                                //'DESCRIPTION' => $al->description
                            ],
                            'TOKEN' => $login->token
                        ];

                        echo json_encode([
                            "code" => true,
                            "title" => 'Sucesso',
                            "message" => 'Login realizado com êxito !',
                            "id" => uniqid()
                        ]);
                    } else {

                        echo json_encode([
                            "code" => false,
                            "title" => 'Erro',
                            "message" => 'O acesso desta empresa está bloqueado !<br>entre em contato com o suporte para descobrir o que aconteceu.',
                            "id" => uniqid()
                        ]);
                    }
                }
            } else {

                echo json_encode([
                    "code" => false,
                    "title" => 'Erro',
                    "message" => 'O Administrador da sua empresa bloqueou este usuário !',
                    "id" => uniqid()
                ]);
            }
        } else {
            echo json_encode([
                "code" => false,
                "title" => 'Erro',
                "message" => 'Login e/ou senha inválida !',
                "id" => uniqid()
            ]);
        }
    }

    public function LogOut($data)
    {
        session_destroy();

        echo json_encode([
            "code" => true,
            "title" => 'Sucesso',
            "message" => 'Logout realizado com êxito !',
            "id" => uniqid()
        ]);
    }

    public function Verify($data)
    {
        $thisUser = (new SystemUser())->find($_SESSION['ADMIN']['USER']['ID'])->fetch();
        $empresa = (new SystemEmpresa())->findById($thisUser->fk_empresa)->data();

        //var_dump($thisUser,$empresa);

        if (!$thisUser->active) {
            echo json_encode([
                "code" => false,
                "title" => 'Erro',
                "message" => 'O Administrador da sua empresa bloqueou este usuário !',
                "id" => uniqid()
            ]);
            session_destroy();
        } else if (!$empresa->active) {
            echo json_encode([
                "code" => false,
                "title" => 'Erro',
                "message" => 'O acesso desta empresa está bloqueado !<br>entre em contato com o suporte para descobrir o que aconteceu.',
                "id" => uniqid()
            ]);
            session_destroy();
        }
    }
}
