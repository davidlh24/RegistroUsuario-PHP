<p align="center">
  <img src="https://github.com/davidlh24/RegistroUsuario-PHP/blob/main/RegistroCI.jpg?raw=true" width="600" alt="Registro Usuario PHP" style="border-radius: 10px; background-color: #000000; padding: 10px;" />
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
```
RegistroUsuario-PHP/
├── controladores/ # Lógica que recibe peticiones y llama a modelos
├── modelos/ # Clases y funciones para interacción con DB
├── vistas/ # Archivos .php con HTML y datos dinámicos
├── .htaccess # Reescrituras y reglas de seguridad
├── dbregistro.sql # Script de creación e inserción inicial de la BD
├── index.php # Punto de entrada y router sencillo
└── mundo.png # Imagen del logo o captura de pantalla
```

## 🌐 Vista Previa

https://rc-php.digiservicedlh.com/

