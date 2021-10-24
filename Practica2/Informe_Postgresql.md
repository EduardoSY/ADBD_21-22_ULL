# Informe: Introducción a PostgreSQL

En esta segunda práctica se hace una primera toma de contacto con PostgreSQL, primero instalándolo y luego creando una base de datos de prueba.

Para la instalación hacemos usamos el comando:

```
$ sudo apt-get install postgresql
```
Una vez se haya instalado accedemos al sistema.

```
$ sudo su postgres
```
Una vez estemos dentro veremos una pantalla como la siguiente:

![Imagen1](https://github.com/EduardoSY/ADBD_21-22_ULL/blob/main/Practica2/img/img1.png)

Vamos a crear un usuario

Para crear un nuevo usuario usamos la sentencia

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
Para listar cuántos usuarios usamos ``` \du ```.

![Imagen3](https://github.com/EduardoSY/ADBD_21-22_ULL/blob/main/Practica2/img/img3.png)


Una vez hemos hecho todo esto podemos pasar a crear la base de datos de prueba.

Para crear una nueva usamos la sentencia
~~~~sql
CREATE DATABASE pract1;
~~~~
Para comprobar que se ha creado podemos listar las bases de datos existentes en el sistema y buscar la nuestra. Esto lo hacemos con ``` \l ```.

![Imagen4](https://github.com/EduardoSY/ADBD_21-22_ULL/blob/main/Practica2/img/img4.png)


Dentro de esta db vamos a crear una tabla. Para ello lo primero es acceder/conectarnos con la db con la que queremos trabajar. 
~~~~sql
\c pract1;
~~~~
Si todo está bien nos saldrá un mensaje indicanto que estamos conectados a, en este caso, pract1.
Ahora es momento de crear una nueva tabla

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
