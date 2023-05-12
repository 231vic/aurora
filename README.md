<p>Crear el archivo .env con las variables de entorno para la base de datos cuenta con un .env.example<p>
<p>Para crear la BD se cuentan con migraciones, ejecutar el siguiente comando para crear las tablas en una base de datos vacía (debe llamarse aurora o como se especifique en el .env)</p>
<li>php artisan migrate</li>

<p>El sistema de igual manera cuenta con un seed para los productos, ejecutar el siguiente comando luego de haber generado las tablas correspondientes</p>
<li>php artisan db:seed</li>