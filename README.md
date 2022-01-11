# EasyBroker - Software Developer Intern Interview Project

Para la elaboración de este proyecto se uso LARAVEL, un framework para PHP.

## ¿Cómo ejecutar el proyecto?

### Usando Docker Desktop (Mac/Windows WSL)
<br>

1. Clonar el repositorio

```bash
git clone https://github.com/hugobelman/eb_project
```

2. Entrar a la carpeta eb_project

```bash
cd eb_project
```

3. Instalar dependencias de sail (Docker Desktop debe estar corriendo)

```bash
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs
```

4. Ejecutar el siguiente comando (Docker Desktop debe estar corriendo)

```bash
./vendor/bin/sail up
```

5. En otra terminal ejecutar lo siguiente

```bash
mv .env.example .env
mkdir tests/Feature
./vendor/bin/sail artisan cache:clear
./vendor/bin/sail composer dump-autoload
./vendor/bin/sail artisan key:generate
```

6. Agregar el EB_API_KEY al .env

7. Ejecutar tests
```bash
mv .env.example .env
mkdir tests/Feature
./vendor/bin/sail test
```

8. Entrar a [localhost](http://localhost) y listo!

## Screenshots

<br>

### Página principal: Page 1

<br>

![Página principal: Page 1](https://raw.github.com/hugobelman/eb_project/main/screenshots/4.jpeg "Página principal: Page 1")

### Página principal: Page 5

<br>

![Página principal: Page 5](https://raw.github.com/hugobelman/eb_project/main/screenshots/1.jpeg "Página principal: Page 5")

### Página de propiedad

<br>

![Página de propiedad](https://raw.github.com/hugobelman/eb_project/main/screenshots/2.jpeg "Página de propiedad")

### Formulario de contacto

<br>

![Formulario enviado](https://raw.github.com/hugobelman/eb_project/main/screenshots/3.jpeg "Formulario enviado")

## Notas

En este proyecto decidí crear una clase **EasyBrokerApiService** dentro de la carpeta App/Http/Services, esto para definir algunos de los metodos para acceder a la información de la API de EasyBroker requerida por el sitio web de una manerá más facil y centralizada, ademas de definir un formato para dichas respuestas y excepciones.

### Retos

Mi reto más grande fue del lado de los tests, debido a que aún no tengo tan desarrollada la habilidad de crear test unitarios relevantes y precisos. Puse solo los que consideré que eran utiles para mi.

Tambien considero que el código PHP que esta en los layouts no es tan limpio como me gustaría, mi mejor ejemplo podría ser en el código de la paginación, si tuviera más tiempo, arreglaría esa parte.

### Tests

Los test elaborados nos ayudan a probar que las peticiones a la API de EasyBroker esten funcionando correctamente y por lo tanto regresen un status 200. 

Una de las pruebas (Post de contact_request) realiza un verdadero post a la API por lo que se me ocurrio que debería borrar dicho post al terminar de correr el test pero por ahora no encontre manerá de hacerlo ya que no se como obtener un contact_request ID pues en la documentación no se muestra que exista esa posibilidad, tampoco dice si es posible usar el verbo http DELETE o no.

### Detalles a mejorar

Hay algunos detalles extras que me gustaría mejorar, por ejemplo, que pasa cuando le doy una página fuera del rango de páginas que existen en la API, las imagenes del slideshow no se muestran del todo bien, las tarjetas de la página principal se pueden ver mejor, etc.





