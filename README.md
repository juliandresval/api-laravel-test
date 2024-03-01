## Instalación y configuración inicial
* Descargar el repositorio
* Ralizar configuraciones típicas en .env (ej: nombre de base de datos)
* Ejecutar migraciones
* Cargar datos iniciales
  * Esto crea, entre otros, un usuario *admin* con contraseña *password*
  * Tambien se crean varias suscripciones con nombres aleatoreos de colores

## Pruebas
### Login para bearer token
```
curl --location 'http://127.0.0.1:8000/api/login' \
--header 'Accept: application/json' \
--header 'Content-Type: application/json' \
--data '{
  "username": "admin",
  "password": "password"
}'
```

### CRUD Subscriptions
#### Get List
```
curl --location 'http://127.0.0.1:8000/api/subscriptions' \
--header 'Accept: application/json' \
--header 'Content-Type: application/json' \
--header 'Authorization: Bearer ***'
```

#### Get One
```
curl --location 'http://127.0.0.1:8000/api/subscriptions/{id}' \
--header 'Accept: application/json' \
--header 'Content-Type: application/json' \
--header 'Authorization: Bearer ***'
```

#### Create New
```
curl --location --request POST 'http://127.0.0.1:8000/api/subscriptions' \
--header 'Accept: application/json' \
--header 'Content-Type: application/json' \
--header 'Authorization: Bearer ***' \
--data '{
  "name": "xxxxxxxxxxx"
}'
```

#### Update One
```
curl --location --request PATCH 'http://127.0.0.1:8000/api/subscriptions/2' \
--header 'Accept: application/json' \
--header 'Content-Type: application/json' \
--header 'Authorization: Bearer ***' \
--data '{
  "name": "XXXX"
}'
```

#### Delete One
```
curl --location --request DELETE 'http://127.0.0.1:8000/api/subscriptions/2' \
--header 'Accept: application/json' \
--header 'Content-Type: application/json' \
--header 'Authorization: Bearer ***'
```

### CRUD Recharges
#### Create New
Cuando se crea una recarga, el estado inicial "state" por defecto es "in_process"
```
curl --location --request POST 'http://127.0.0.1:8000/api/recharges' \
--header 'Accept: application/json' \
--header 'Content-Type: application/json' \
--header 'Authorization: Bearer ***' \
--data '{
  "user_id": "100",
  "subscription_id": "100",
  "value": "1200"
}'
```
#### Get List
```
curl --location 'http://127.0.0.1:8000/api/recharges' \
--header 'Accept: application/json' \
--header 'Content-Type: application/json' \
--header 'Authorization: Bearer ***'
```
Para **Get One** y **Delete One** seguir el mismo patron estandar típico de RESTful aplicado en Subscriptions
#### Update
Sólo las recargas no se pueden modificar, sólo es posible cambiar su estado con "state" igual a "failed" ó "completed"
```
curl --location --request PATCH 'http://127.0.0.1:8000/api/recharges/{id}' \
--header 'Accept: application/json' \
--header 'Content-Type: application/json' \
--header 'Authorization: Bearer ***' \
--data '{
  "state": "XXXX"
}'
```


### CRUD Users
#### Get List
```
curl --location 'http://127.0.0.1:8000/api/users' \
--header 'Accept: application/json' \
--header 'Content-Type: application/json' \
--header 'Authorization: Bearer ***'
```
#### Get One
```
curl --location 'http://127.0.0.1:8000/api/users/{id}' \
--header 'Accept: application/json' \
--header 'Content-Type: application/json' \
--header 'Authorization: Bearer ***'
```
#### Create New
```
curl --location 'http://127.0.0.1:8000/api/user-register' \
--header 'Accept: application/json' \
--header 'Content-Type: application/json' \
--header 'Authorization: Bearer ***' \
--data-raw '{
  "username": "XXXXX",
  "full_name": "xxxx xxxx xxxx",
  "email": "xxxxxx@xxxxxx.xxx",
  "password": "xxxxxxxxxxxxx"
}'
```
#### Update Password
```
curl --location 'http://127.0.0.1:8000/api/users/{id}/password-reset' \
--header 'Accept: application/json' \
--header 'Content-Type: application/json' \
--header 'Authorization: Bearer ***' \
--data '{
  "password": "XXXX"
}'
```
Se envía notificación al actualizar cada contraseña

### Punto no cubierto
* API Soap
