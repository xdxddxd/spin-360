<?php

namespace Source\Controllers;

use Source\Models\SystemUser;
use Source\Models\AccessLevel;

class Usuario
{

    public function Consultar($data)
    {

        $user = new SystemUser();
        $list = $user->find()->order("access_level ASC")->fetch(true);

        $return = array();

        foreach ($list as $userItem) {

            $accessLevel = (new AccessLevel())->findById($userItem->access_level)->data();

            if ($userItem->active) {
                $active = true;
            } else {
                $active = false;
            }

            if ($_SESSION['ADMIN']['USER']['ACCESS_LEVEL']['ID'] != 1) {
                $isAdm = false;
            } else {
                $isAdm = true;
            }

            $return[$userItem->id] = [
                "id"    => $userItem->id,
                "nome"  => $userItem->name,
                "email" => $userItem->email,
                "celular" => $userItem->cel_phone,
                "active" => $active,
                "posicao" => $accessLevel->title,
                "isAdm" => $isAdm,
            ];
        }
        echo json_encode($return);
    }

    public function Cadastro($data)
    {
        if ($data['posicao'] == 1) {
            echo json_encode([
                "code" => false,
                "title" => "Erro !",
                "message" => "Você não pode cadastrar um Administrador !",
                "id" => uniqid()
            ]);
        } else {
            $user = new SystemUser();
            $user->fk_empresa = $_SESSION['ADMIN']['USER']['EMPRESA']['ID'];
            $user->name = $data['name'];
            $user->cel_phone = $data['cel_phone'];
            $user->email = $data['email'];
            $user->password = $data['password'];
            $user->access_level = $data['posicao'];
            $user->active = 1;

            if ($user->save()) {
                echo json_encode([
                    "code" => true,
                    "title" => "Sucesso !",
                    "message" => "Usuário cadastrado com sucesso",
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
        }
    }

    public function Block($data)
    {

        if (isset($_SESSION['ADMIN']['USER']) && $_SESSION['ADMIN']['USER']['ACCESS_LEVEL']['ID'] == 1) {
            $block = new SystemUser();
            $block = $block->findById($data['BlockID']);
            //var_dump($block->data);

            if ($block) {

                if ($block->access_level != 1) {

                    $block->active = !$block->active;

                    if ($block->save()) {
                        if ($block->active) {
                            echo json_encode([
                                "code" => true,
                                "title" => "Sucesso !",
                                "message" => "Usuário desbloqueado com sucesso",
                                "id" => uniqid()
                            ]);
                        } else {
                            echo json_encode([
                                "code" => true,
                                "title" => "Sucesso !",
                                "message" => "Usuário bloqueado com sucesso",
                                "id" => uniqid()
                            ]);
                        }
                    } else {
                        echo json_encode([
                            "code" => false,
                            "title" => "Erro !",
                            "message" => $block->fail()->getMessage(),
                            "id" => uniqid()
                        ]);
                    }
                } else {
                    echo json_encode([
                        "code" => false,
                        "title" => "Erro !",
                        "message" => "Impossivel Bloquear um Administrador",
                        "id" => uniqid()
                    ]);
                }
            } else {
                echo json_encode([
                    "code" => false,
                    "title" => "Erro !",
                    "message" => "Erro ao bloquear Usuário",
                    "id" => uniqid()
                ]);
            }
        } else {
            echo json_encode([
                "code" => false,
                "title" => "Erro !",
                "message" => "Você não tem permissão para bloquear um Usuário",
                "id" => uniqid()
            ]);
        }
    }
}
