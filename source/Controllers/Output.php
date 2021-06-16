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

                    if($picItem->save()){
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
}
