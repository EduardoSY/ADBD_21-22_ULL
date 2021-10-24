# INFORME: Introducción a PostgreSQL
- Alumno: Eduardo Da Silva Yanes

### 1. Introducción
***

En esta segunda práctica se hace una primera toma de contacto con PostgreSQL, primero instalándolo y luego creando una base de datos de prueba. PostgreSQL es un sistema gestor de bases de datos relacional orientado a objetos de código libre. En esta práctica lo usaremos mediante la terminal pero también dispone de extensiones para poder utilizar una interfaz gráfica.

### 2. Instalación y creación de usuarios
***

Lo primero que debemos hacer es instalar el software en nuestra máquina. Con el siguiente comando se nos instalarán todos los paquetes necesarios.

```
$ sudo apt-get install postgresql
```

Una vez se haya instalado accedemos al sistema.

```
$ sudo su postgres
```

Con ese comando hemos accedido al sistema gestor como el superusuario por defecto, que es postgres.
Una vez estemos dentro veremos una pantalla como la siguiente:

![Imagen1](https://github.com/EduardoSY/ADBD_21-22_ULL/blob/main/Practica2/img/img1.png)

Pasemos a crear un nuevo usuario.

Para crearlo usamos la sentencia

~~~~sql
CREATE USER usuario;
~~~~

El usuario recien creado no posee contraseña. Si queremos asignarle una contraseña hacemos lo siguiente:

~~~~sql
ALTER ROLE usuario WITH PASSWORD 'password';
~~~~

![Imagen2](https://github.com/EduardoSY/ADBD_21-22_ULL/blob/main/Practica2/img/img2.png)

En mi caso el usuario se llama **usuariotest** y
Con esto ya le habríamos establecido la contraseña.

También podríamos hacer ambos pasos con una única sentencia como la siguiente:

```
CREATE USER user WITH PASSWORD 'password';
```

Para listar cuántos usuarios usamos ``` \du ```.

![Imagen3](https://github.com/EduardoSY/ADBD_21-22_ULL/blob/main/Practica2/img/img3.png)

Una vez hemos hecho todo esto podemos pasar a crear la base de datos de prueba.

### 3. Creación de una base de datos
***

Para crear una nueva base de datos usamos la sentencia:

~~~~sql
CREATE DATABASE pract1;
~~~~

Para comprobar que se ha creado podemos listar las bases de datos existentes en el sistema y buscar la nuestra. Esto lo hacemos con ``` \l ```.

![Imagen4](https://github.com/EduardoSY/ADBD_21-22_ULL/blob/main/Practica2/img/img4.png)

Dentro de esta D.B. vamos a crear una tabla. Lo primero es acceder/conectarnos con la D.B. con la que queremos trabajar. 

~~~~sql
\c pract1;
~~~~

Si todo está bien nos saldrá un mensaje indicanto que estamos conectados a, en este caso, pract1.

#### 3.2. Creación de una tabla dentro de la base de datos

Ahora es momento de crear una nueva tabla en la que poder almacenar información posteriormente. La sentencia a utilizar sigue la siguiente estructura:

```
CREATE TABLE <nombre_tabla> (
   (nombre_atributo)(tipo atributo),
   ...
   ...
);
```

En nuestro caso particular la sentencia sería la siguiente.

~~~~sql
CREATE TABLE usuarios (
  nombre varchar(30),
  clave varchar(10)
 );
~~~~

![Imagen5](https://github.com/EduardoSY/ADBD_21-22_ULL/blob/main/Practica2/img/img5.png)

Finalmente vamos a rellenar esta tabla recien creada con distintas tuplas.

~~~~sql
INSERT INTO usuarios (nombre, clave) VALUES ('Isa','asdf');
INSERT INTO usuarios (nombre, clave) VALUES ('Pablo','jfx344');
INSERT INTO usuarios (nombre, clave) VALUES ('Ana','tru3fal');
~~~~

![Imagen6](https://github.com/EduardoSY/ADBD_21-22_ULL/blob/main/Practica2/img/img6.png)

### 4. Comandos adicionales
***

| Comando | Descripción|
| -- | -- |
| \?  |  Muestra una ayuda con los comandos disponibles en PostgreSQL junto a una breve descripción. |
| \h nombre_comando | Muestra una ayuda más detallada del comando en cuestión. |
| \i path.sql | Ejecuta los comandos descritos en el fichero .sql que se le haya indicado. |
