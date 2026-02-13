# Guía rápida: Laragon + PHP 8.5 TS + Laravel + phpMyAdmin (Windows)

**Objetivo:** Configurar un entorno local limpio con Laragon, PHP **8.5.x Thread Safe**, Laravel, y phpMyAdmin.

## 1) Requisitos
- Laragon
- PHP 8.5.x TS
- Visual C++ 2015–2022 Redistributable x64
- Permisos de administrador

## 2) Instalación de PHP 8.5 TS
- Descargar php-8.5.x-Win32-vs17-x64.zip
- Extraer en `C:/laragon/bin/php/`
- Crear `php.ini` desde `php.ini-development`
- Activar extensiones
- Configurar timezone

## 3) PATH
- Activar: Preferences → System → Add Laragon to PATH
- Verificar con `php -v` y `where php`

## 4) Apache + PHP
- Editar `mod_php.conf`
- Agregar LoadFile para libcrypto y libssl
- Validar sintaxis: `httpd.exe -t`

## 5) VirtualHost
- Puerto 80
- Archivo auto.tu_proyecto.test.conf
- Hosts file configurado

## 6) phpMyAdmin
- `http://localhost/phpmyadmin`
- root / contraseña vacía

## 7) Laravel
- Ajustar .env
- Migraciones y optimize

## 8) Troubleshooting
- Problemas de Composer y PHP
- Apache no arranca
- DLLs faltantes
- Forbidden phpMyAdmin
- Timezone inválido
- Dominio .test no resuelve
- HTTPS forzado accidentalmente


## 10) Descargas para estilos
### Bootstrap
- https://startbootstrap.com/template/sb-admin
- https://getbootstrap.com/docs/5.2/getting-started/download/

