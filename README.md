# Devstagram

- Clon de Instagram

## Herramientas y/o Tecnologías

- PHP
- LARAVEL
- BLADE
- HTML5
- CSS3
- JAVASCRIPT
- VUE.JS
- DOCKER
- SAIL
- MYSQL
- VITE
- TAILWIND CSS
  - Instalación: **sail npm install -D tailwindcss postcss autoprefixer**
  - Después: **npx tailwindcss init -p**
    - Nos creará el archivo de configuración, si marca error ejecutamos:
      - **sail npm install -D tailwindcss@3 postcss autoprefixer** 
      - Después: **sail npx tailwindcss init -p**
- **Librería** para _mensajes_ dinámicos en LARAVEL **_$message_**
  - **_git clone https://github.com/MarcoGomesr/laravel-validation-en-espanol.git resources/lang_**
  - Abrimos una consola para clonarlo, de preferencia:
    - **GIT BASH**
  - En la carpeta de:
    - **config/app.php**
    - Debemos de realizar la configuración en las líneas (aprox #85):
      - ```
        // 'locale' => env('APP_LOCALE', 'en'),
        'locale' => env('APP_LOCALE', 'es'),

        // 'fallback_locale' => env('APP_FALLBACK_LOCALE', 'en'),
        'fallback_locale' => env('APP_FALLBACK_LOCALE', 'es'),

        // 'faker_locale' => env('APP_FAKER_LOCALE', 'en_US'),
        'faker_locale' => env('APP_FAKER_LOCALE', 'es_ES'),
      ```
-  También en la carpeta de
   -  **.env**
   -  Debemos realizar la configuración en las líneas:
   - ```
        # APP_LOCALE=en
        APP_LOCALE=es
        # APP_FALLBACK_LOCALE=en
        APP_FALLBACK_LOCALE=es
        # APP_FAKER_LOCALE=en_US
        APP_FAKER_LOCALE=es_E
   ```

### Creación del proyecto

- Abrimos la consola de POWERSHELL como ADMINISTRADOR
- Ejecutamos
  - **wsl**
- Nos abrirá la consola de LINUX, tenemos que movernos de directorio, ingresamos: **cd** hasta que nos encontremos en:
  - Users/(tu usuario)/ , posiblemente tenemos que dar 2 veces: **cd**
- Ya una vez que estemos en la carpeta o directorio donde vamos a crear el proyecto, ingresamos:
  - **curl -s https://laravel.build/nombreProyecto | bash**
- Esperamos a que se realice la configuración de nuestro proyecto, es muy **IMPORTANTE** tener **DOCKER** abierto
- Después de que termine el proceso, nos pedirá la contraseña de LINUX, la cuál fue configurada al momento de realizar la configuración de DOCKER
- Para arrancar el proyecto con DOCKER, ingresamos:
  - **./vendor/bin/sail up**
    - Debemos hacerlo en la **CONSOLA** de **LINUX**
  - Si marca error de puerto, posiblemente alguna programa que se tiene, ya use ese puerto, muchas veces es: **MYSQL80**, podemos apagarlo yendo a: **SERVICIOS** , después tenemos que ejecutar el comando
- Si aún así nos marca error, ingresamos el comando:
  - **./vendor/bin/sail up -d** 
- Después ejecutamos en caso que sea error de sesiones:
  -  **./vendor/bin/sail artisan migrate**
- Y por último ahora si ejecutamos: 
  - **./vendor/bin/sail up**
- Para crear un alías para **SAIL**
  -
    ```
        omar@OmarGarcia:/mnt/c/Users/carlo/Documents/Cursos/WEB/Juan Pablo De La Torre Valdez/Laravel/miProyecto$ 
        **Dedemos estar en el proyecto**
        sudo nano ~/.bashrc
        [sudo] password for omar:
        ingresamos la contraseña
        nos movemos con las flechas, nos vamos hasta abajo e ingresamos:
        alias sail="./vendor/bin/sail"
        Control + O
        Enter
        Control + X (para salir)
        source ~/.bashrc (para refrescar los cambios)
    ```

#### SAIL

- Forma con la que puedes interactuar con **DOCKER**
- Laravel utiliza DOCKER en las versiones más recientes
- Sail hace que sea sencillo comunicarse con DOCKER
- Es un CLI para comunicarte, interactuar con los archivos de DOCKER para arrancar tus servicios, llamar artisan o instalar dependencias NPM
- Correr o Levantar proyecto de Laravel sin DOCKER:
  - **php artisan serve**
- Una vez creado el **_alías_**, solo ejecutamos:
  - **sail up -d** 
- Si marca error, realizamos lo siguiente:
  - ```
        PS C:\Windows\system32> wsl --list --verbose
        NAME              STATE           VERSION
        * docker-desktop    Running         2
        Ubuntu            Stopped         2
        PS C:\Windows\system32> wsl --set-default Ubuntu
        La operación se completó correctamente.
        PS C:\Windows\system32> wsl
    ``` 
- Una vez instalado: **TAILWINDCSS**, abrimos: vite.config.js y comentamos las líneas relacionadas con **TAILWIND**
- Abrimos otra terminal y ejecutamos:
  - **sail npm run dev**
- Si no lee los estilos, modificamos en el archivo: tailwind.config.js, la ruta de los archivos y ya ejecutamos el comando
- Si los estilos no se están refrescando, ejectuamos en otra terminal, corriendo el **sail npm run dev**:
  - **sail npm run watch**

##### MVC

- ¿Qué es?
  - Model View Controller
  - Es un patrón de arquitectura de software que permite la separación de obligaciones de cada pieza de tu código.
  - Enfatiza la separación de la lógica de programación con la presentación
- Ventajas:
  - NO mejora el performance del código, tampoco da seguridad; pero tu código tendrá un mejor orden y será fácil de mantener.
  - En un grupo de trabajo, el tener el código ordenado permite que más de una persona pueda entender que es lo que hace cada parte de él.
  - Aprender MVC, te hará que otras tecnologías como: NEST, RAILS, DJANGO, NET CORE, SPRING BOOT, te sean más sencillas de aprender.
- Piezas:
  - M = Model o Modelo
  - V = View o Vista
  - C = Controller o Controlador
- MODELO:
  - Encargado de todas las interacciones en la base de datos, obtener datos, actualizarlos y eliminar.
  - Se encarga de consultar una base de datos, obtiene la información pero no la muestra, eso es trabajo de la vista.
  - Tampoco de encarga de actualizar la información directamente; es el Controlador quien decide cuándo llamarlo. 
- VISTA:
  - Se encarga de todo lo que se ve en pantalla (HTML).
  - Laravel tiene un Template Engine llamado: **BLADE**, para mostrar los datos.
  - Si utilizas: REACT, VUE, ANGULAR, SVELTE, estos serían tu vista.
  - El Modelo consulta la base de datos, pero es por medio del Controlador que se decide que Vista hay que llamar y que datos presentar.
- CONTROLADOR:
  - Es el que comunica modelo y vista; antes de que el Modelo consulte la base de datos, el Controlador es el encargado de llamar un Modelo en específico.
  - Una vez consultado el Modelo, el Controlador recibe esa información, manda a llamar a la vista y le pasa la información.
  - El Controlador es el que manda llamar la vista y modelos que se requieren en cada parte de tu aplicación.
- ROUTER en MVC:
  - Es el encargado de registrar todas las URL'S o ENDPOINTS que va a soportar nuestra aplicación.
  - Ej: Si el usuario accede a: /clientes, el router ya tiene registrada esa ruta y un controlador con una función que sabe que Modelo debe llamar y que vista mostrar cuando el usuario visita esa URL.

##### ARTISAN

- Artisan es el CLI (Command Line Interface) ya incluido.
- Es un Script que existe en la base de tu proyecto de Laravel y cuenta con una gran cantidad de Scripts disponibles.
- Estos comandos te permiten crear: MIGRACIONES, CONTROLADORES, MODELOS, POLICIES y muchos m'as...

    # SAIL y ARTISAN

    - En versiones anteriores (PHP < 7), los comandos de Artisan se usaban como:
      - **php artisan**
    - En nuevas versiones:
      - **sail php artisan o sail artisan**
    - En consola: 
      - **wsl**
    - dentro del proyecto ejecutamos:
      - **sail artisan**
    - nos arrojará los comandos que podemos usar en LARAVEL
    - Si llegará a marcar error en Laravel, algo relacionado con: **SESSIONS**, ejecutamos:
      - **_sail php artisan migrate_**

- Creando un CONTROLADOR con ARTISAN:
  - **sail artisan make:controller --help** -> para ver lo que podemos pasarle
  - **sail artisan make:controller RegisterControllr** Ejemplo
  - - **sail artisan make:controller Auth\\RegisterControllr** Si queremos crearlo en una Carpeta

## REQUEST

- Tipos

- Se usan en: **HTTP** y _API'S_
- En **HTTP**, existen diferentes tipos de Request o tipos de petición:
  - **_GET, POST, PUT, PATCH y DELETE_**
- **GET**
  - Es el más simple, cuando visitas un sitio web por default es un _GET_, y el método solo se utiliza para recuperar datos pero nunca debe enviar datos...
- **POST**
  - Se utiliza cuando mandas datos a un servidor, esto incluye información que llenas en un formulario o buscador.
-  **PUT**
   -  Es utilizado para actualizar un elemento, pero sino existe crea uno nuevo, es un reemplazo total de un registro.
- **PATCH**
  - Es utilizado para actualizar parcialmente un elemento o recurso.
- **DELETE**
  - Se utiliza para eliminar un recurso o elemento.
- **_@csrf_**
  - Es recomendable ponerlo en los **_FORMULARIOS_** para evitar ataques, es una directiva de Laravel
  
## CONTROLLERS

- Los Controllers van ayudarte a tener un código mejor organizado, además de una separación mayor en la funcionalidad de tus aplicaciones y sitios web.
- Laravel tiene una convención a la hora de nombrar los métodos de tus controllers conocida como:
  - **RESOURCE CONTROLLERS**
- Esta convención ayuda bastante para tener todo mejor organizado

| Verbo HTTP | URI                 | Acción  | Ruta             |
| ---------- | ------------------- | ------- | ---------------- |
| GET        | /clientes           | index   | clientes.index   |
| POST       | /clientes           | store   | clientes.store   |
| DELETE     | /clientes/{cliente} | destroy | clientes.destroy |

## MIGRACIONES

- Las migraciones se les conoce como el control de versiones de tu base de datos, de esta forma se puede crear la base de datos y compartir el diseño con el quipo de trabajo.
- Si deseas agregar nuevas tablas o columnas a una tabla existente, puedes hacerlo con una nueva migración, si el resultado no fue el deseado, puedes revertir esa migración.
  - **_sail php artisan migrate_**
  - **_sail artisan migrate_**
- En caso que necesitemos revertir o regresar ese cambio en la base datos:
  - **_artisan migrate:rollback_**
- Si fueron varias migraciones que salieron mal, en este ejemplo las últimas 5:
  - **_sail artisan migrate:rollback --step=5_**
- Más comandos para crear migraciones:
  - **_sail artisan make:migration agregar_imagen_user_**
  - **_sail php artisan make:migration agregar_imagen_user**
- Las migraciones que solocan en la carpeta de: 
  - **databases/migrations**
- Primero debemos correr:
  - **_sail artisan migrate_**
- En la consola, logueado con **WSL**, ingresamos: 
  - **_sail mysql -u_**
- Para poder ver la base de datos, **NOTA**, si no te deja conectar a un gestor de base de datos, necesitamos abrir el archivo de:
  - **_.env_**
- Ahí encontraremos el usuario y contraseña que se creo para acceder
- Después ejecutamos:
  - **_sail php artisan migrate:rollback_**
- Para limpiar la BD, pero como si las necesitaremos, ejecutaremos el primer comando
  - **_sail artisan migrate_**
- Al hacer esto, el usuario root y su contraseña, no funcionarían, se conectarían a los creados por el contenedor y LARAVE, una vez detenido el contenedor, ya te dejará conectarte.
- En el archivo:
  - **_.env_**
- Creamos la variable:
  - **FORWARD_DB_PORT=3307**
- Debajo de _PASSWORD_
- Limpiar caché
  - **_php artisan config:cache_**
- Si tenemos en el FORMULARIO un campo que no esta en la **BASE DE DATOS** que se creo con la migración, tenemos que ejecutar una nueva migración, ejemplo:
  - **__sail php artisan make:migration add_username_to_users_table__**
  - Una vez creada la migración, abrimos el archivo que se creo en: **migrations** y ahí debemos agregar el campo nuevo
  - Después de haber creado la migración, debemos ejecutar:
    - **__sail php artisan migrate_**
  - Estos reflejará el campo nuevo creado en la **BASE DE DATOS**
- 
