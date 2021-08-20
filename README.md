# TEST DE CONOCIMIENTO

Api REST para administracion de clientes creada con PHP haciendo uso de una base de datos MySQL

- Estructura del cliente en la BD

```sql
  `id` int NOT NULL AUTO_INCREMENT,
  `dni` char(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `sexo` char(1) NOT NULL,
  `telefono` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
```

- Metodo GET
  Devuelve todos los clientes llamando a la ruta:

  ```url
  "servidor/obtener_clientes"
  ```

- Metodo PUT
  Actualiza un cliente en todos sus valores (menos el ID) enviados en el cuerpo de la peticion llamando a la ruta:

  ```url
  "servidor/actualizar_cliente/id"
  ```

- Metodo DELETE
  Elimina un cliente segun el id enviado llamando a la ruta:

  ```url
  "servidor/eliminar_cliente/id"
  ```
