API REST para gestionar tareas, desarrollada en CodeIgniter 3.

## Funcionalidades

- Listar tareas (GET)
- Crear tarea (POST)
- Modificar tarea (PUT)
- Eliminar tarea (DELETE)
- Marcar tarea como completada

## Endpoints principales

- `GET /api/tareas` — obtener todas las tareas
- `POST /api/tareas` — crear una nueva tarea
- `PUT /api/tarea/{id}` — actualizar tarea por ID
- `DELETE /api/tarea/{id}` — borrar tarea por ID

## Base de datos

- MySQL
- El script de creación y datos iniciales está en `/sql/tareas.sql`
