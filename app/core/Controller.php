<?php
/*
 * Base Controller
 * Loads the models and views
 */
class Controller {
    // Load model
    public function model($model){
        require_once APPROOT . '/models/' . $model . '.php';
        return new $model();
    }

    // Load view
    public function view($view, $data = []){
        $path = APPROOT . '/views/' . $view . '.php';
        if(file_exists($path)){
            require_once $path;
        } else {
            // debug stack
            ob_start();
            debug_print_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS);
            $trace = ob_get_clean();
            die("View does not exist: {$view} (looked for {$path})\nStack:\n" . $trace);
        }
    }
}
