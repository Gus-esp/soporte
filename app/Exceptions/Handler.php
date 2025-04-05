<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Whoops\Run;
use Whoops\Handler\PrettyPageHandler;

class Handler extends ExceptionHandler
{
    protected $dontReport = [
        //
    ];

    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });

        // Personalización para el manejo de errores Whoops en el entorno de desarrollo
        if (app()->environment('local')) {
            $this->registerWhoopsHandler();
        }
    }

    protected function registerWhoopsHandler()
    {
        // Instanciamos Whoops
        $whoops = new Run();

        // Creamos el manejador PrettyPageHandler
        $handler = new PrettyPageHandler();

        // Cambiar el título de la página de error
        $handler->setPageTitle('¡Ups! Algo salió mal.');

        // Cambiar el contenido de la página de error
        $handler->setEditor('vscode'); // Esto es opcional, para usar un editor de código
        $whoops->pushHandler($handler);

        // Registrar el manejador
        $whoops->register();
    }
}
