<?php

namespace Source\Controllers;

use Source\Models\Archive;
use Source\Models\Imagem;

class Output
{

    public function Picture($data)
    {


        $image = new Imagem();
        $files = $_FILES;

        if (!empty($files["file"])) {
            $file = $files["file"];

            if (empty($file["type"]) || !in_array($file["type"], $image::isAllowed())) {
                echo json_encode([
                    "code" => false,
                    "title" => "Erro !",
                    "message" => "Selecione Uma Imagem Válida !",
                    "id" => uniqid()
                ]);
            } else {
                $imgName = hash('sha256', $_SESSION['ADMIN']['USER']['ID'] . '-' . uniqid());

                if ($image->upload($file, $imgName, 450)) {

                    switch ($file['type']) {
                        case "image/jpeg":
                            $ext = '.jpg';
                            break;

                        case "image/png":
                            $ext = '.png';
                            break;

                        case "image/gif":
                            $ext = '.gif';
                            break;

                        default:
                            $ext = ".err";
                            break;
                    }

                    $picItem = new Archive();
                    $picItem->sequencia = (new Archive())->find("id_produto = :idprd", "idprd={$data['prdid']}")->count();
                    $picItem->url = URL_BASE . '/assets/uploads/images/' . date('Y') . '/' . date('m') . '/' . $imgName . $ext;
                    $picItem->id_produto = $data['prdid'];

                    if ($picItem->save()) {
                        echo json_encode([
                            "code" => true,
                            "title" => "Imagem Atualizada !",
                            "message" => "<img src='" . URL_BASE . '/assets/uploads/images/' . date('Y') . '/' . date('m') . '/' . $imgName . $ext . "' class='uploaded-image' alt='Uploaded Image'>",
                            "id" => uniqid()
                        ]);
                    } else {
                        echo json_encode([
                            "code" => false,
                            "title" => "Erro !",
                            "message" => $picItem->fail()->getMessage(),
                            "id" => uniqid()
                        ]);
                    }
                } else {
                    echo json_encode([
                        "code" => false,
                        "title" => "Erro !",
                        "message" => "Seu Arquivo é Muito Pesado !",
                        "id" => uniqid()
                    ]);
                }
            }
        }
    }

    public function PictureGet($data)
    {

        $title = '';
        $description = '';

        $img = new Archive();
        $i = $img->findById($data['id']);
        if ($i) {
            $title = $i->nome;
            $id = $i->id;
            $description = $i->legenda;

            echo json_encode([
                "code" => true,
                "title" => "Imagem Encontrada !",
                "message" => "Abrindo Edição !",
                "id" => uniqid(),
                "img" => [
                    "title" => $title,
                    "description" => $description,
                    "id" => $id
                ]
            ]);
        } else {
            echo json_encode([
                "code" => false,
                "title" => "Erro !",
                "message" => "Imagem não Encontrada !",
                "id" => uniqid()
            ]);
        }
    }

    public function PictureUpdate($data)
    {
        $img = new Archive();
        $img->findById($data['id']);
        $img->nome = $data['nome'];
        $img->legenda = $data['legenda'];

        if ($img->save()) {
            echo json_encode([
                "code" => true,
                "title" => "Sucesso !",
                "message" => "Informações Salvas com sucesso!",
                "id" => uniqid(),
            ]);
        } else {
            echo json_encode([
                "code" => false,
                "title" => "Erro !",
                "message" => $img->fail()->getMessage(),
                "id" => uniqid()
            ]);
        }
    }

    public function SpinExt($data)
    {
        var_dump($data);
    }

    public function SpinInt($data)
    {
        var_dump($data);
    }
}
