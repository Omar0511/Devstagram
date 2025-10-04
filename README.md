# Devstagram

- Clon de Instagram

## Herramientas y/o Tecnologías

- PHP (8.3)
- LARAVEL (12.20.0)
- BLADE
- HTML5
- CSS3
- JAVASCRIPT
- DOCKER
- SAIL
- MYSQL (8.1)
- VITE
- TAILWIND CSS (3.4)
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
- Eloquent (ORM):
  - Laravel incluye su propio **ORM**: Object Relacional Mapper, que hace muy sencillo interactuar con tu base d edatos.
  - En **Eloquent**, cada tabla tiene su propio modelo; ese modelo interactúa únicamente con esa tabla y tiene las funciones necesarias para crear registros, obtenerlos, actualizarlos y eliminarlos.
  - Forma de crear un modelo, el nombre del nombre es en Singular:
    - **__sail php artisan make:model Cliente__**
  - **CONVENCIONES**
  - Cuando crear el Modelo: **Cliente**, __Eloquent__ asume que la tabla se va llamar: **clientes**
  - Si el Modelo se llama: **Producto**, __Eloquent__ espera una tabla llamada **productos**
  - Puede ser un problema llamar a tu modelo: **Proveedor**, porque __Eloquent__ espera la tabla llamada: **provedors**, pero se puede reescribir en el modelo.
  - Forma de crear un **CONTROLLER**
    - **__sail php artisan make:controller NombreControllador__**
- Iconos:
  - **https://heroicons.com**
- Dropzone (6.0)
  - Sirve para arrastrar las imágenes y poder subirlas al servidor
  - https://www.dropzone.dev/
  - **_sail npm i --save dropzone_**
  - La siguiente línea también debemos copiarla
    - <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
  - Tenemos que configurar en:
    - resources/js/**app.js**
- InterventionImage (2.7)
  - **packgae auto discovery**
    -  Es la instalación de un paquete, actualiza el archivo _autoload_ de **composer**
  - **_sail composer require intervention/image:^2.7_**
  - Para este proyecto, usamos la versión: **2.7**
  - Si es **Laravel** > 8, no debemos configurar nada, si es menor si, dentro de:
    - **config/app.js**
  - Dentro de la documenación de: **INTERVENTION IMAGE**, dice como...
  - ## RELACIONES
    - Las relaciones en _Eloquent_ son métodos que existen en tus modelos.
    - Un Modelo tendrá un método y un tipo de relación, así como el Modelo con el cuál esta relacionado, a esto se le conoce como: **COLECCIÓN**
    - Sintaxis:
      - **$user->posts**
      - User -> Posta
    - Tipos de relaciones:
      - _One To One_
        - Usuario -> Perfil
        - Uno a Uno
      - _Has One Of Many_
        - Usuario -> Ordenes
        - Obtienes la última orden
      - _One To Many_
        - Usuario -> Posts
        - Uno a Muchos
      - _Hash One Through_
        - Doctor    Pacientes -> Habitación
                 -> 
                    Pacientes -> Habitación
        - Uno a Uno pero con otra relación
      - _Belongs To_
        - Usuario <- Post
        - Relación Inversa
      - _Has Many Through_
        - Evento             Habitación
                 -> Lugar ->
          Evento             Habitación
    - Una vez que creamos la **RELACIÓN**, ejecutamos:
      - **_sail artisan tinker_**
      -  **$usuario = User::find(3)** <- el ID debe estar en la BD
      -  **$usuario->posts**
      -  **$post = Post::fin(1);**
      -  **$post = App\Models\Post::find(1);**
      -  **$post->user**
- Iconos
  - [HeroIcons](https://heroicons.com/)

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
      - **sail artisan make:controller Auth\\RegisterControllr** Si queremos crearlo en una Carpeta
    - Crear todo junto:
      - **_sail artisan make:model --migration --controller --factory Nombre_**
      - Nota: El **Nombre** debe ser en _SINGULAR_
    - Cuando se realicen cambios en las rutas y los cambios no se reflejen, ejecutamos:
      - **_sail artisan route:cache_**
    - Si los cambios siguen sin refrescarse, ejecutamos:
      - **_sail artisan route:list_**
    - Un atajo para crear:_MODELO, CONTROLADOR y MIGRACION_
      - **_sail artisan make:model Follower -mc_**
    - 

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
  - Podemos poner después:
  - **_sail artisan migrate_**
- Más comandos para crear migraciones:
  - **_ sail artisan make:migration agregar_imagen_user_ _**
  - **_ sail php artisan make:migration agregar_imagen_user _**
- Las migraciones se colocan en la carpeta de: 
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
  - **Nota:**
    - Si ya habías corrido esa migración antes y cambiaste cosas en el archivo, entonces primero deberías revertir la migración y luego volver a correrla:
    - **_sail artisan migrate:rollback_**
    - **_sail artisan migrate_**
- Para limpiar la BD, pero como si las necesitaremos, ejecutaremos el primer comando
  - **_sail artisan migrate_**
- Al hacer esto, el usuario root y su contraseña, no funcionarían, se conectarían a los creados por el contenedor y _LARAVEL_, una vez detenido el contenedor, ya te dejará conectarte.
- En el archivo:
  - **_.env_**
- Creamos la variable:
  - **FORWARD_DB_PORT=3307**
- Debajo de _PASSWORD_
- Limpiar caché
  - **_php artisan config:cache_**
- Si tenemos en el FORMULARIO un campo que no esta en la **BASE DE DATOS** que se creo con la migración, tenemos que ejecutar una nueva migración, ejemplo:
  - **_ sail php artisan make:migration add_username_to_users_table_ _**
  - Una vez creada la migración, abrimos el archivo que se creo en: **migrations** y ahí debemos agregar el campo nuevo
  - Después de haber creado los campos nuevos en la migración, debemos ejecutar:
    - **_sail php artisan migrate_**
  - Estos reflejará el campo nuevo creado en la **BASE DE DATOS**
- Cada vez que realizamos cambios en la migración (archivo), debemos ejecutar el comando:
  - **_sail php artisan migrate:rollback --step=1_**
  - Esto retornará la última migración
  - Después ejecutamos:
    - **_sail php artisan migrate_**
  - Para que tome los nuevos cambios
  - Si deseamos eliminar toda la información al realizar la migración, ejecutamos:
    - **_sail php artisan migrate:refresh_**

## FACTORY

- Es una forma de hacer _TESTING_ a una base de datos.
- Se utilizan únicamente en _Desarrollo_.
- Para correr los _Factories_
  - **_sail artisan tinker_**
- Es un:
  - _CLI_
- Con el que nuestra aplicación puede interactuar, para correr una prueba:
  - **_sail artisan tinker_**
    - **$usuario = User::find(3)**
  - Debemos buscar el _ID_ en la tabla de **USERS**, puede ser otro, esto es una prueba y elegimos ese _ID_
  - Después ejecutamos:
    - **_App\Models\Post::factory()_**
  - Si nos marca error, debemos agregear en el archivo:
    - **Post.php**
    - _use Illuminate\Database\Eloquent\Factories\HasFactory;_
  - Dentro de la Clase agregamos:
    - _use HasFactory;_
  - Y volver a correrlo:
    - **_App\Models\Post::factory()_**
  - Esto ya nos dará respuesta
  - También debería poderse con:
    - _Post::factory()_
  - En nuestro caso la forma de aquí arriba no funcino, sino la que tiene: **App\....**
  - Después ejecutamos:
    - **_App\Models\Post::factory()->times(200)->create();_**
  - Si marca algún error como:
  - ```
        > App\Models\Post::factory()->times(200)->create();

            Illuminate\Database\QueryException  SQLSTATE[23000]: Integrity constraint violation: 1452 Cannot add or update a child row: a foreign key constraint fails (`devstagram`.`posts`, CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE) (Connection: mysql, SQL: insert into `posts` (`titulo`, `descripcion`, `imagen`, `user_id`, `updated_at`, `created_at`) values (Vel in suscipit omnis nulla., Placeat modi debitis omnis ea quia eos voluptas nobis aut ut commodi optio quibusdam sit quae sint eum enim delectus qui voluptas., d1fa083b-515e-3683-a31a-47ada3eb1549jpg, 1, 2025-09-06 19:29:14, 2025-09-06 19:29:14)).
    ```
  - Debemos poner los **ID*S** que tenemos en la base de datos y debemos salirnos con:
    - **exit**
  - Nos salimos de la consola y volvemos a entrar, esto con la finalidad que se actualice la información y ya no nos marqué error, sino nos salimos nos estará marcando error en la base de datos...

## POLICY

- Creación:
  - **_sail artisan make:policy NombrePolicy --model=Post_**
- Con el _--model=Post_, le asociamos un **MODELO**
- Se crean en:
  - _Devstagram\app\Policies_
- Esto permite al usuario poder:
  - **VER, ELIMINAR o ACTUALIZAR** algún registro

## COMPONENTES

- Un componente en Laravel (normalmente se refiere a los Blade Components) sirve para reutilizar código de interfaz y organizar mejor las vistas de tu aplicación.
- Lo creamos de la siguiente manera:
  - **_sail artisan make:component NombreComponente_**
- Después de agregar contenido al _COMPONENTE_ y a la _VISTA_, es necesario realizar una limpieza:
  - **_sail artisan view:clear_**
- 
