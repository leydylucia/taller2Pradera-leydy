<?php

include_once '../librerias/dataBaseClass.php'; //incluye la clase DB
include_once 'controller/controllerClass.php'; //incluye el controlador
include_once 'view/viewClass.php'; // incluye la vista 
include_once 'model/modelClass.php'; // incluye el modelo

$controller = new controllerClass();

// verifico que exista $_GET['action'] en la prueba del index seria index.php?action=''
if (isset($_GET['action']) === true) {
    switch ($_GET['action']) {
        case 'create':
            $controller->create();
            break;
        case 'update':
            $controller->update();
            break;
        case 'delete':
            $controller->delete();
            break;
        case 'read':
            $controller->index();
            break;
        default:
            $controller->notFound();
            break;
    }
} else {
    $controller->index();
}
    