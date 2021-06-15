<?php

namespace Source\Controllers;

use Source\Models\Imagem;

class Output{
    
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
                  $imgName = hash('sha256', $_SESSION['ADMIN']['USER']['ID'].'-'.uniqid());

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

                       $_SESSION['ADMIN']['USER']['EMPRESA']['URL_IMG'] = URL_BASE . '/assets/uploads/images/' . date('Y') . '/' . date('m') . '/' . $imgName . $ext;

                       echo json_encode([
                            "code" => true,
                            "title" => "Imagem Atualizada !",
                            "message" => "<img src='" . URL_BASE . '/assets/uploads/images/' . date('Y') . '/' . date('m') . '/' . $imgName . $ext . "' class='uploaded-image' alt='Profile Picture'>",
                            "id" => uniqid()
                       ]);
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