<?php
declare(strict_types=1);

namespace Requests;

use finfo;
class FormRequest
{


    public static function sanitize(array $response): array
    {


        $response['tipo'] = htmlspecialchars(trim($response['tipo'] ?? ''), ENT_QUOTES, 'UTF-8');
        $response['zona'] = htmlspecialchars(trim($response['zona'] ?? ''), ENT_QUOTES, 'UTF-8');
        $response['direccion'] = htmlspecialchars(trim($response['direccion'] ?? ''), ENT_QUOTES, 'UTF-8');
        $response['nDormitorios'] = htmlspecialchars(trim($response['nDormitorios'] ?? ''), ENT_QUOTES, 'UTF-8');
        $response['precio'] = filter_var(trim($response['precio'] ?? ''), FILTER_SANITIZE_NUMBER_FLOAT);
        $response['tamanio'] = filter_var(htmlspecialchars(trim($response['tamanio'] ?? ''), ENT_QUOTES, 'UTF-8'), FILTER_SANITIZE_NUMBER_FLOAT);
        $response['observaciones'] = htmlspecialchars(trim($response['observaciones'] ?? ''), ENT_QUOTES, 'UTF-8');
        //$response['foto'] = htmlspecialchars(trim($response['foto'] ?? ''), ENT_QUOTES, 'UTF-8');

        $extras = $response['extras'] ?? [];



        if (is_array($extras)) {
            $extras = array_map(
                fn($extras) => trim(strip_tags($extras)),
                $extras
            );
            $response['extras'] = $extras;
        } else {
            $extras = [];
        }


        return $response;
    }

    public static function validateImg()
    {
        $maxSize = 1024 * 1024 * 2;

        $errors['foto'] = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['foto'])) {
            $img = $_FILES['foto'];


            if ($img['error'] !== UPLOAD_ERR_OK) {
                $errors['foto'] = 'Error en la subida del archivo (código ' . $img['error'] . ').';
                return $errors['foto'];


            } elseif ($img['size'] > $maxSize) {
                // 2. Tamaño máximo permitido
                $errors['foto'] = 'El archivo supera los 2 MB permitidos.';
                return $errors['foto'];


            } elseif (!is_uploaded_file($img['tmp_name'])) {

                // 3. ¿Proviene realmente de una subida HTTP POST?
                $errors['foto'] = 'Petición no válida.';
                return $errors['foto'];


            }
            // 4. Validación estricta del tipo real (no del que declara el navegador)
            if (!$errors['foto']) {
                $finfo = new finfo(FILEINFO_MIME_TYPE);
                
                $mimeReal = $finfo->file($img['tmp_name']);
                // Tipos MIME permitidos y la extensión segura que les corresponde
                $permitidos = [
                    'image/jpeg' => 'jpg',
                    'image/png' => 'png',
                    'image/gif' => 'gif'
                ];


                if (!array_key_exists($mimeReal, $permitidos)) {
                    $errors['foto'] = 'Formato no permitido. Solo se aceptan JPG, PNG y GIF.';
                    return $errors['foto'];
                }
            }
            if (!$errors['foto']) {
                // 5. La extensión sale del MIME real, nunca del nombre que da el usuario.
                // El nombre es único e impredecible: fecha + valor aleatorio.
                $nombreFinal = date('Ymd_His') . '_' . bin2hex(random_bytes(4))
                    . '.' . $permitidos[$mimeReal];
                // Resultado esperado: 20261019_113158_a61b8ff8.png
                $directorio = __DIR__ . '/../../public/img/';
                if (!is_dir($directorio)) {
                    mkdir($directorio, 0755, true);
                }
                // 6. Movemos el archivo temporal a su ubicación definitiva
                if (move_uploaded_file($img['tmp_name'], $directorio . $nombreFinal)) {
                    return $errors['foto'];
                } else {
                    $errors['foto'] = 'Error interno al guardar el archivo en el servidor.';
                    return $errors['foto'];
                }
            }
        }
    }

    public static function validate(array $response): array
    {

        $response['errors'] = [];

        $posibleExtras = [
            "jardin",
            "piscina",
            "garaje"
        ];

        $posibleTipo = [
            "piso",
            "casa",
            "adosado",
            "chalet"
        ];

        $posibleZona = [
            "centro",
            "albaicin",
            "realjeo",
            "sacromonte",
            "zaidin",
            "chana"
        ];

        $posibleNDormitorios = [
            "1",
            "2",
            "3",
            "4",
            "5"
        ];



        if (isset($response)) {

            if (!in_array($response['nDormitorios'] ?? '', $posibleNDormitorios, true)) {
                $response['errors']['nDormitorios'] = "numero de dormitorios is not valid";
            }

            if (!in_array($response['tipo'] ?? '', $posibleTipo, true)) {
                $response['errors']['tipo'] = "tipo is not valid";
            }

            if (!in_array($response['zona'] ?? '', $posibleZona, true)) {
                $response['errors']['zona'] = "zona is not valid";
            }

            if (empty($response['direccion'])) {
                $response['errors']['direccion'] = "introduce direccion";
            }

            if (empty($response['precio'])) {
                $response['errors']['precio'] = "introduce precio";
            }

            if (empty($response['tamanio'])) {
                $response['errors']['tamanio'] = "introduce tamanio";
            }

            if (!preg_match('/^[0-9.]+$/', $response['precio'])) {
                $response['errors']['precio'] = "Introduce un numero válido";
            }

            if (!preg_match('/^[0-9.]+$/', $response['tamanio'])) {
                $response['errors']['tamanio'] = "Introduce un numero válido";
            }


            $extras = $response['extras'] ?? [];

            if (!empty($extras)) {

                foreach ($extras as $extra) {
                    if (!in_array($extra, $posibleExtras)) {
                        $response['errors']['extra'] = "You need to fill the form";

                    }
                }
            }

            $imgValidation = self::validateImg();

            if (isset($imgValidation)) {

                $response['errors']['foto'] = $imgValidation;
            }


        } else {
            $response['errors']['empty'] = "You need to fill the form";
        }
        return $response;
    }

}
?>