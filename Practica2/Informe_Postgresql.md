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

IMAGEN

Vamos a crear un usuario

Para crear un nuevo usuario usamos la sentencia

~~~~sql
CREATE USER usuario;
~~~~
El usuario recien creado no posee contraseña. Si queremos asignarle una contraseña hacemos lo siguiente:
~~~~sql
ALTER ROLE usuario WITH PASSWORD 'password';
~~~~

En mi caso el usuario se llama **usuariotest** y
Con esto ya le habríamos establecido la contraseña.
Para listar cuántos usuarios usamos ``` \du ```.

Una vez hemos hecho todo esto podemos pasar a crear la base de datos de prueba.

Para crear una nueva usamos la sentencia
~~~~sql
CREATE DATABASE pract1;
~~~~
Para comprobar que se ha creado podemos listar las bases de datos existentes en el sistema y buscar la nuestra. Esto lo hacemos con ``` \l ```.


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

Finalmente vamos a rellenar esta tabla recien creada con distintas tuplas. 
~~~~sql
INSERT INTO usuarios (nombre, clave) VALUES ('Isa','asdf');
INSERT INTO usuarios (nombre, clave) VALUES ('Pablo','jfx344');
INSERT INTO usuarios (nombre, clave) VALUES ('Ana','tru3fal');
~~~~
