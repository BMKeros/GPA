#!/bin/bash

clear

echo "Ejecutando migraciones"
php artisan migrate

echo "Ejecutando dumpautoload = CREANDO COMPILADOS"
composer dump-autoload

echo "Ejecutando autollenado de la base de datos"
php artisan db:seed

echo "Base de datos inicializada"
echo "Adios, Bmkeros"
