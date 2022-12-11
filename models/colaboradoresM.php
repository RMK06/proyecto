<?php
    require_once '../config/database.php';
    class ColaboradoresM
    {
        public static function allColaboradoresM($tabla)
        {
            $sql = Conexion::conect()->prepare("SELECT * FROM $tabla WHERE `acceso` = 0");
            $sql->execute();
            while ($fila = $sql->fetch(PDO::FETCH_ASSOC)) {
                $datos[] = $fila;
            }
            return $datos;
        }

        public static function cargosId($id, $tabla)
        {
            $sql = Conexion::conect()->prepare("SELECT * FROM $tabla WHERE `id` = :id");
            $sql->bindParam(":id", $id, PDO::PARAM_STR);
            $sql->execute();
            while ($fila = $sql->fetch(PDO::FETCH_ASSOC)) {
                $datos[] = $fila;
            }
            return $datos;
        }

        public static function modificarUsuariosM($datos)
        {
            $sql = Conexion::conect()->prepare("UPDATE `usuarios` SET
                                                `nombre` = '".$datos['nombre_usuario']."',
                                                `apellidos` = '".$datos['apellido_usuario']."',
                                                `correo` = '".$datos['correo_usuario']."',
                                                `cedula` = '".$datos['cedula_usuario']."',
                                                `celular` = '".$datos['numero_usuario']."',
                                                `cargo` = '".$datos['cargo_select']."',
                                                `estado` = '".$datos['estado']."',
                                                `tipo_identificacion` = '".$datos['tipoDocumento']."',
                                                `direccion` = '".$datos['direccion_usuario']."',
                                                `barrio` = '".$datos['barrio_usuario']."',
                                                `localidad` = '".$datos['localidad_usuario']."',
                                                `sexo` = '".$datos['sexo']."'
                                                WHERE `id` = '".$datos['id']."' ");
            $sql1 = Conexion::conect()->prepare("UPDATE `permisos` SET
                                                `activos` = '".$datos['activos']."',
                                                `activos_asignados` = '".$datos['activos_asigandos']."',
                                                `empleados` = '".$datos['empleados']."',
                                                `reportes` = '".$datos['reportes']."',
                                                `administrador` = '".$datos['usuarios']."'
                                                WHERE `id_usuario` = '".$datos['id']."' ");
            if ($sql->execute() && $sql1->execute()) {
                echo 1;
            } else {
                echo 2;
            }
        }

        public static function eliminarColaboradorM($datos, $tabla)
        {
            $sql = Conexion::conect()->prepare("DELETE FROM $tabla WHERE id = :id");
            $sql->bindParam(":id", $datos, PDO::PARAM_STR);
            if ($sql->execute()) {
                echo 1;
            } else {
                echo 2;
            }

        }
    }