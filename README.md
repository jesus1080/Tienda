### Tienda Familiar
## Descripción

Aplicación web que permite la gestión y venta de productos en línea para una tienda familiar. Los usuarios pueden agregar productos al carrito, realizar pagos y recibir un correo electrónico con la confirmación de su compra. Además, los supervisores pueden gestionar productos y despachar pedidos, y los gerentes pueden hacer eso y crear supervisores.


## Requisitos

    - PHP 8.0.25
    - Node 9.3.1
    - Laravel 9.51.0

- Instala las dependencias de composer:

    `composer install`

- Configura las variables de entorno en un archivo .env:

    `cp .env.example .env`

- Ejecuta las migraciones y seeders:

    `php artisan migrate`

- Inicia el servidor:

    `php artisan serve`

- Instala dependencias de node:

    `npm install`

- Inicia servidor node:

    `npm run dev`

## Uso

   - Registra un usuario en la aplicación.
   - Inicia sesión como supervisor o gerente para gestionar productos y despachar pedidos.
   - Agrega productos al carrito y realiza un pago.
   - Recibe un correo electrónico con la confirmación de la compra.

## Contribución

Si deseas contribuir a este proyecto, por favor envía un pull request con tus cambios.
Licencia

Este proyecto está licenciado bajo la licencia [free]. Para más información, consulta el archivo LICENSE en este repositorio.