<?php
    require_once '../config/database.php';
    class CValidarUsuario
    {
       
        public static function mValidarUsuario()
        {
            $sql = Conexion::conect()->prepare("SELECT * FROM `usuarios`
                                                WHERE `correo` = :correo ");
            $sql->bindParam(":correo", $_POST['correo'], PDO::PARAM_STR);
            if ($sql->execute()) {
                while ($fila = $sql->fetch(PDO::FETCH_ASSOC)) {
                    $datos[] = $fila;
                }
                if (isset($datos)) {
                    if (password_verify($_POST['contrasena'], $datos[0]['contrasena'])) {
                        @\session_start();
                        $_SESSION['id'] = $datos[0]['id'];
                        $_SESSION['nombre'] = $datos[0]['nombre'];
                        $_SESSION['apellidos'] = $datos[0]['apellidos'];
                        $_SESSION['correo'] = $datos[0]['correo'];
                        echo 1;
                    } else {
                        echo 2;
                    }
                }else {
                    echo 3;
                }
            }else {
                echo 4;
            }
            
        }
    }