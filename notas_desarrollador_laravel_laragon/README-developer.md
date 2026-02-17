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


```batch
gh auth login;
gh create tutorial_laravel_crm_codigosdeprogramacion --public --source=. --remote=origin --push
```

## Comandos
### Mostrar la listas de rutas usadas en el proyecto y sus métodos
```batch
php artisan route:list
```

### Crear modelo, controller y los recursos con artisan
Usar un nombre del modelo en singular
```batch
php artisan make:model [nombre_modelo] -mcr
```

### Solucionar problemas con la migración:
Si los archivos xxxx_xx_xx_xxxxxx_create_[nombre_modelo]_table.php aparece como Ran, entonces los cambios que editaste después no se aplicaron.
```batch
php artisan migrate:status
```

#### Solución A: Reaplicar desde cero (destruye tablas):
```batch
php artisan migrate:fresh
# (opcional si usas seeders)
php artisan db:seed
```
#### Opción B — Rollback sólo lo necesario y volver a migrar:
Asegúrate de hacer el rollback con la misma cantidad de pasos que necesitas para llegar a la migración que modificaste.
```batch
php artisan migrate:rollback --step=1
php artisan migrate
```

#### Opción C — Crear una migración para ALTER TABLE
Si no quieres borrar datos:
```batch
php artisan make:migration alter_clients_add_missing_columns --table=clients
```
Luego, en esa nueva migración, agregas/ajustas columnas o llaves foráneas con Schema::table('clients', ...). Ejecutas con:
```batch
php artisan migrate
```
