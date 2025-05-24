<p align="center">
  <img src="https://github.com/davidlh24/RegistroUsuario-PHP/blob/main/mundo.png?raw=true" width="300" alt="Registro Usuario PHP" style="border-radius: 50%; background-color: #000000; padding: 10px;" />
</p>

# 🔐 Registro de Usuario en PHP

## 🚀 Descripción

Este proyecto es un sistema de **registro de usuarios** desarrollado con **PHP** y **MySQL**, que incluye:

- **Registro** de nuevos usuarios.  
- **Inicio de sesión** y **logout**.  
- **Actualización** (update) de datos de perfil una vez dentro.  
- **Eliminación** (delete) de usuarios.  

Todo ello estructurado bajo el patrón MVC, con controladores, modelos y vistas separados para un código limpio y mantenible.

## 🛠️ Tecnologías Utilizadas

- **PHP:** Lógica del servidor y gestión de sesiones.  
- **MySQL:** Base de datos para almacenar usuarios.  
- **HTML / CSS:** Estructura y estilos de la interfaz.  
- **Bootstrap (opcional):** Para estilos responsivos rápidos.  
- **.htaccess:** Control de URLs y protección de carpetas.

## 💻 Características

1. **Registro de usuarios** con validación de campos y encriptación de contraseña (MD5).  
2. **Inicio de sesión** con manejo de sesiones y control de acceso.  
3. **Logout** seguro que destruye la sesión.  
4. **CRUD de usuario:**  
   - **Update:** modifica nombre, email o contraseña.  
   - **Delete:** elimina el usuario de la base de datos.  

## 📂 Estructura de Archivos

RegistroUsuario-PHP/
├── controladores/ # Lógica que recibe peticiones y llama a modelos
├── modelos/ # Clases y funciones para interacción con DB
├── vistas/ # Archivos .php con HTML y datos dinámicos
├── .htaccess # Reescrituras y reglas de seguridad
├── dbregistro.sql # Script de creación e inserción inicial de la BD
├── index.php # Punto de entrada y router sencillo
└── mundo.png # Imagen del logo o captura de pantalla

bash
Copiar
Editar

## 🌐 Vista Previa

Una vez registrado e identificado, verás un panel donde podrás actualizar tus datos o eliminar tu cuenta. La estructura MVC mantiene el código organizado y fácil de ampliar.

## ⚙️ Instalación

1. Clona este repositorio:
   ```bash
   git clone https://github.com/davidlh24/RegistroUsuario-PHP.git
   cd RegistroUsuario-PHP
Importa la base de datos a MySQL:

sql
Copiar
Editar
mysql -u TU_USUARIO -p TU_BASE_DE_DATOS < dbregistro.sql
Configura la conexión en modelos/conexion.php con tus credenciales MySQL.

Coloca todo en tu servidor local (XAMPP, WAMP, Laragon…) o en tu hosting.

Accede desde el navegador a:

bash
Copiar
Editar
http://localhost/RegistroUsuario-PHP/index.php
o, si ya está desplegado,

arduino
Copiar
Editar
https://rc-php.digiservicedlh.com/
✏️ Cómo Usar
Registrarse: Rellena el formulario de registro y envía.

Iniciar Sesión: Introduce tu email y contraseña.

Actualizar Perfil: Dentro del panel, edita tus datos y guarda.

Eliminar Cuenta: Pulsa “Borrar cuenta” para eliminar tu usuario.

Cerrar Sesión: Usa el enlace “Logout” para salir seguro.

¡Gracias por utilizar este sistema de registro en PHP!
Si tienes dudas o sugerencias, no dudes en contactarme. 😊
