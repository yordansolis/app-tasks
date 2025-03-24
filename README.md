<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Task Management Application

### Iniciar con el comando:

```
compose start
```

## Descripción General

Esta es una aplicación de gestión de tareas desarrollada con Laravel y Livewire. Permite a los usuarios crear, ver, editar y eliminar tareas, así como marcarlas como completadas o pendientes.

## Estructura del Proyecto

El proyecto sigue la estructura estándar de Laravel con componentes Livewire para la interfaz de usuario reactiva:

- **Controllers**: Contiene los controladores que manejan las solicitudes HTTP.
- **Models**: Define los modelos de datos de la aplicación.
- **Livewire Components**: Componentes reactivos para la interfaz de usuario.
- **Views**: Plantillas Blade para renderizar la interfaz de usuario.

## Modelo de Datos

### Task (Tarea)

El modelo principal de la aplicación con los siguientes campos:

- **title**: Título de la tarea
- **description**: Descripción detallada de la tarea
- **author**: Autor de la tarea
- **status**: Estado de la tarea (0 = pendiente, 1 = completada)
- **created_at**: Fecha de creación
- **updated_at**: Fecha de actualización

## Endpoints y Rutas

### Rutas Web

| Ruta     | Método | Descripción                                             |
| -------- | ------ | ------------------------------------------------------- |
| `/`      | GET    | Página de bienvenida                                    |
| `/tasks` | GET    | Listado principal de tareas (implementado con Livewire) |

### Funcionalidades en Controlador TaskController

| Funcionalidad                    | Método   | Descripción                                  |
| -------------------------------- | -------- | -------------------------------------------- |
| `show_all()`                     | GET      | Muestra todas las tareas                     |
| `view_create()`                  | GET      | Muestra el formulario para crear una tarea   |
| `tasks_create(Request $request)` | POST     | Crea una nueva tarea                         |
| `show($id)`                      | GET      | Muestra los detalles de una tarea específica |
| `update(Request $request, $id)`  | PUT/POST | Actualiza una tarea existente                |
| `destroy($id)`                   | DELETE   | Elimina una tarea                            |
| `complete($id)`                  | PUT/POST | Marca una tarea como completada              |

### Componentes Livewire

| Componente | Funcionalidad | Descripción                                                   |
| ---------- | ------------- | ------------------------------------------------------------- |
| TaskList   | Listar tareas | Muestra todas las tareas con funciones de búsqueda y filtrado |
| TaskCreate | Crear tareas  | Formulario para crear nuevas tareas                           |
| TaskEdit   | Editar tareas | Formulario modal para editar tareas existentes                |
| Welcome    | Bienvenida    | Página de bienvenida de la aplicación                         |

## Funcionalidades Principales

### TaskList Component

- Listar todas las tareas con paginación
- Buscar tareas por título, descripción o autor
- Filtrar tareas por estado (completadas/pendientes)
- Eliminar tareas
- Cambiar el estado de las tareas (completada/pendiente)

### TaskCreate Component

- Crear nuevas tareas con validación de datos
- Mostrar/ocultar formulario de creación

### TaskEdit Component

- Editar tareas existentes con validación de datos
- Interfaz modal para edición

## Cómo Usar la Aplicación

1. **Ver Tareas**: Visita la ruta `/tasks` para ver todas las tareas existentes.
2. **Crear Tarea**: En la página de tareas, haz clic en "Nueva Tarea" para abrir el formulario de creación.
3. **Editar Tarea**: Haz clic en el botón de edición junto a una tarea para modificar sus detalles.
4. **Eliminar Tarea**: Haz clic en el botón de eliminar junto a una tarea para borrarla.
5. **Cambiar Estado**: Utiliza el botón de alternar estado para marcar una tarea como completada o pendiente.
6. **Buscar y Filtrar**: Utiliza la barra de búsqueda y los selectores de filtro para encontrar tareas específicas.

## Validaciones

Todas las operaciones de creación y edición de tareas incluyen las siguientes validaciones:

- Título: Obligatorio, mínimo 3 caracteres
- Descripción: Obligatorio
- Autor: Obligatorio
