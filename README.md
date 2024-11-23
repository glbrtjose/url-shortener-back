## Guia de ejecucion del proyecto

Instalar dependencias con el comando
```bash
composer install
```

Crear document .env con el contenido del documento .env.example y
Conectar la base de datos local reemplazando los valores correspondientes
```bash
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=nombre_base_de_datos
DB_USERNAME=nombre_usuario
DB_PASSWORD=contraseña
```

Correr migraciones con el comando
```bash
php artisan migrate
```

Una vez completados los pasos mencionados, ejecutar el siguiente comando para
poner a andar el proyecto
```bash
php artisan serve
```

Abre [http://127.0.0.1:8000](http://127.0.0.1:8000) en el explorador y verifica el proyecto

Realizar las pruebas unitarias con el comando
```bash
vendor/bin/phpunit
```