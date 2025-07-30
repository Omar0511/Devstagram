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
- 
