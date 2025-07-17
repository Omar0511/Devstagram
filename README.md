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
