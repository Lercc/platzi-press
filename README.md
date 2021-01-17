### PLAZTI PRESS
  - Laravel 8.22.1 
  - Php 7.4.12


## STORAGE
  - crear acceso directo de la carpeta privada storage:
    <pre>php artisan storage:link </pre>
  - Create the symbolic links configured for the application

## MORE
  - Escapar html en vistas blade
     <pre>{!!<span>hola</span> !!</pre>

  - In /vendor/laravel/framework/src/Illuminate/Database/Schema/Blueprint 
    you can see the bigInteger function:
     - public function string($column, $length = null)
     - public function bigInteger($column, $autoIncrement = false, $unsigned = false)

    [DB](https://stackoverflow.com/questions/28884918/laravel-table-there-can-be-only-one-auto-column-and-it-must-be-defined-as-a-key)