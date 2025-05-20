<?php

class ControladorFormularios
{

    /*=============================================
	Registro
	=============================================*/

    static public function ctrRegistro()
    {

        if (isset($_POST["registroNombre"])) {
            if (
                preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["registroNombre"]) &&
                preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["registroEmail"]) &&
                preg_match('/^[0-9a-zA-Z]+$/', $_POST["registroPassword"])
            ) {
                $tabla = "registros";
                $token = md5($_POST["registroNombre"] . "+" . $_POST["registroEmail"]);
                $encriptarPassword = crypt($_POST["registroPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
                $datos = array(
                    "token" => $token,
                    "nombre" => $_POST["registroNombre"],
                    "email" => $_POST["registroEmail"],
                    "password" => "$encriptarPassword"
                );



                $respuesta = ModeloFormularios::mdlRegistro($tabla, $datos);

                return $respuesta;
            } else {
                $respuesta = "error";

                return $respuesta;
            }
        }
    }

    /*=============================================
	Seleccionar Registros
	=============================================*/

    static public function ctrSeleccionarRegistros($item, $valor)
    {

        $tabla = "registros";

        $respuesta = ModeloFormularios::mdlSeleccionarRegistros($tabla, $item, $valor);

        return $respuesta;
    }

    /*=============================================
	Ingreso
	=============================================*/

    public function ctrIngreso()
    {
        if (isset($_POST["ingresoEmail"])) {

            $tabla = "registros";
            $item = "email";
            $valor = $_POST["ingresoEmail"];

            $respuesta = ModeloFormularios::mdlSeleccionarRegistros($tabla, $item, $valor);
            $encriptarPassword = crypt($_POST["ingresoPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

            if ($respuesta && $respuesta["email"] == $_POST["ingresoEmail"] && $respuesta["password"] == $encriptarPassword) {

                $_SESSION["validarIngreso"] = "ok";

                echo '<script>
                if ( window.history.replaceState ) {
                    window.history.replaceState( null, null, window.location.href );
                }
                window.location = "inicio";
            </script>';
            } else {

                echo '<script>
                if ( window.history.replaceState ) {
                    window.history.replaceState( null, null, window.location.href );
                }
            </script>';

                echo '<div class="alert alert-danger">Error al ingresar al sistema, el email o la contraseña no coinciden</div>';
            }
        }
    }

    /*=============================================
Actualizar Registro
=============================================*/
    static public function ctrActualizarRegistro()
    {
        if (isset($_POST["actualizarNombre"])) {
            // Validación de datos ingresados
            if (
                preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9 ]+$/', $_POST["actualizarNombre"]) &&
                preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["actualizarEmail"])
            ) {
                // Obtener el usuario por token
                $usuario = ModeloFormularios::mdlSeleccionarRegistros("registros", "token", $_POST["tokenUsuario"]);

                // Verificar si el token coincide
                if ($usuario && $usuario["token"] == $_POST["tokenUsuario"]) {
                    // Verificar si la contraseña debe actualizarse
                    if (!empty($_POST["actualizarPassword"]) && preg_match('/^[0-9a-zA-Z]+$/', $_POST["actualizarPassword"])) {

                        $password = crypt($_POST["actualizarPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
                    } else {
                        $password = $usuario["password"]; // Mantener la contraseña actual
                    }

                    $tabla = "registros";
                    $datos = array(
                        "token" => $_POST["tokenUsuario"],
                        "nombre" => $_POST["actualizarNombre"],
                        "email" => $_POST["actualizarEmail"],
                        "password" => $password
                    );

                    // Actualizar registro en la base de datos
                    $respuesta = ModeloFormularios::mdlActualizarRegistro($tabla, $datos);

                    // Verificar el resultado de la actualización
                    if ($respuesta == "ok") {
                        echo '<script>
                         alert("Usuario actualizado correctamente");
                        window.location = "inicio";
                    </script>';
                    } else {
                        echo '<div class="alert alert-danger">Error al actualizar el usuario</div>';
                    }
                } else {
                    echo '<div class="alert alert-danger">Token no válido o usuario no encontrado</div>';
                }
            } else {
                echo '<div class="alert alert-danger">Error en la validación de los datos</div>';
            }
        }
    }

    /*=============================================
Eliminar Registro
=============================================*/
    public function ctrEliminarRegistro()
    {
        if (isset($_POST["eliminarRegistro"])) {
            $tabla = "registros";
            $valor = $_POST["eliminarRegistro"];

            // Obtener el usuario usando el token proporcionado
            $usuario = ModeloFormularios::mdlSeleccionarRegistros($tabla, "token", $valor);

            // Verificar si el usuario existe y el token coincide
            if ($usuario && $usuario["token"] == $valor) {
                $respuesta = ModeloFormularios::mdlEliminarRegistro($tabla, $valor);

                if ($respuesta == "ok") {
                    echo '<script>
                    if (window.history.replaceState) {
                        window.history.replaceState(null, null, window.location.href);
                    }
                            
                    alert("Usuario eliminado exitosamente");
                    window.location = "inicio";
                </script>';
                } else {
                    echo '<div class="alert alert-danger">Error al eliminar el usuario</div>';
                }
            } else {
                echo '<div class="alert alert-danger">Token no válido o usuario no encontrado</div>';
            }
        }
    }
}
