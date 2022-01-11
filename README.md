# EasyBroker - Software Developer Intern Interview Project

Para la elaboración de este proyecto se uso LARAVEL, un framework para PHP.

## ¿Cómo ejecutar el proyecto?

### Usando Docker Desktop (Mac/Windows)
<br>

1. Clonar el repositorio

```bash
git clone https://github.com/hugobelman/eb_project
```

2. Entrar a la carpeta eb_project

```bash
cd eb_project
```

3. Ejecutar el siguiente comando (Docker Desktop debe estar corriendo)

```bash
./vendor/bin/sail up
```

4. Entrar a [localhost](http://localhost) y listo!

## Screenshots

![Alt text](/../main/screenshots/4.jpg?raw=true "Página principal: Page 1")

![Alt text](/../main/screenshots/1.jpg?raw=true "Página principal: Page 5")

![Alt text](/../main/screenshots/2.jpg?raw=true "Página de propiedad")

![Alt text](/../main/screenshots/3.jpg?raw=true "Formulario enviado")

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





