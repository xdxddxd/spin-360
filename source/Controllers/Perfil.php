<?php

namespace Source\Controllers;

use Source\Models\SystemUser;
use Source\Models\SystemEmpresa;
use Source\Models\Imagem;



class Perfil
{

     public function PicUpdate($data)
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
                    $empresa = (new SystemEmpresa())->findById($_SESSION['ADMIN']['USER']['EMPRESA']['ID']);
                    $imgName = hash('sha256', $empresa->id);

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

                         $empresa->url_image = URL_BASE . '/assets/uploads/images/' . date('Y') . '/' . date('m') . '/' . $imgName . $ext;
                         $empresa->save();

                         $_SESSION['ADMIN']['USER']['EMPRESA']['URL_IMG'] = URL_BASE . '/assets/uploads/images/' . date('Y') . '/' . date('m') . '/' . $imgName . $ext;

                         echo json_encode([
                              "code" => true,
                              "title" => "Imagem Atualizada !",
                              "message" => "<img src='" . URL_BASE . '/assets/uploads/images/' . date('Y') . '/' . date('m') . '/' . $imgName . $ext . "' alt='Profile Picture'>",
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
