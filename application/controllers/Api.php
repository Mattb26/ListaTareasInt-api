<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Tarea_model');
        header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: *'); 
        header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');  
        header('Access-Control-Allow-Headers: Content-Type'); 
    }

    // Ruta para: /api/tareas (GET, POST, OPTIONS)
    public function tareas() {
        $method = $_SERVER['REQUEST_METHOD'];

        switch ($method) {
            case 'GET':
                $this->tareas_get();
                break;
            case 'POST':
                $this->tareas_post();
                break;
            case 'OPTIONS':
                $this->options();
                break;
            default:
                http_response_code(405);
                echo json_encode(['error' => 'Método no permitido']);
        }
    }

    // Ruta para: /api/tareas/{id} (GET, PUT, DELETE, OPTIONS)
    public function tarea($id) {
        $method = $_SERVER['REQUEST_METHOD'];

        switch ($method) {
            case 'GET':
                $this->tarea_get($id);
                break;
            case 'PUT':
                $this->tareas_put($id);
                break;
            case 'DELETE':
                $this->tareas_delete($id);
                break;
            case 'OPTIONS':
                $this->options();
                break;
            default:
                http_response_code(405);
                echo json_encode(['error' => 'Método no permitido']);
        }
    }

    // Listado de tareas 
    public function tareas_get() {
        $tareas = $this->Tarea_model->get_all();
        echo json_encode($tareas);
    }

    // Busqueda por tarea especifica
    public function tarea_get($id) {
        $tarea = $this->Tarea_model->get($id);
        if ($tarea) {
            echo json_encode($tarea);
        } else {
            http_response_code(404);
            echo json_encode(['error' => 'Tarea no encontrada']);
        }
    }

    // Añado una tarea al listado
    public function tareas_post() {
    $input = json_decode(file_get_contents('php://input'), true);

    if (
        !$input ||
        !isset($input['titulo'], $input['descripcion']) ||
        trim($input['titulo']) === '' ||
        trim($input['descripcion']) === ''
    ) {
        http_response_code(400);
        echo json_encode(['error' => 'El título y la descripción son obligatorios']);
        return;
    }

    // Tarea por defecto como no completada
    $data = [
        'titulo' => trim($input['titulo']),
        'descripcion' => trim($input['descripcion']),
        'completada' => 0
    ];

    $this->Tarea_model->insert($data);
    echo json_encode(['mensaje' => 'Tarea creada']);
    }

    // Para modificar una tarea o el estado
    public function tareas_put($id) {
        $input = json_decode(file_get_contents('php://input'), true);
        if (!$input) {
            http_response_code(400);
            echo json_encode(['error' => 'Datos inválidos']);
            return;
        }

        $this->Tarea_model->update($id, $input);
        echo json_encode(['mensaje' => 'Tarea actualizada']);
    }

    // Borrar una tarea del listado
    public function tareas_delete($id) {
        $this->Tarea_model->delete($id);
        echo json_encode(['mensaje' => 'Tarea eliminada']);
    }

    public function options() {
        http_response_code(200);
    }
}

