<?php

class App {
    protected $currentController = 'HomeController';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct(){
        $url = $this->getUrl();

        // Look in controllers for first value
        if(isset($url[0])){
            $raw = $url[0];
            // try transformation: hyphen-separated -> PascalCase
            $transformed = str_replace(' ', '', ucwords(str_replace('-', ' ', $raw)));
            $transformed = ucfirst($transformed);

            // list of possible controller names to try
            $candidates = [$transformed, ucfirst($raw)];

            // scan controllers directory for a case-insensitive match as fallback
            foreach (glob(APPROOT . '/controllers/*Controller.php') as $file) {
                $name = basename($file, 'Controller.php');
                if (strtolower($name) === strtolower($raw) || strtolower($name) === strtolower($transformed)) {
                    $candidates[] = $name;
                }
            }

            // pick the first candidate that exists
            foreach ($candidates as $candidate) {
                if (file_exists(APPROOT . '/controllers/' . $candidate . 'Controller.php')) {
                    $this->currentController = $candidate . 'Controller';
                    unset($url[0]);
                    break;
                }
            }
        }

        require_once APPROOT . '/controllers/'. $this->currentController . '.php';
        $this->currentController = new $this->currentController;

        // Check for second part of url
        if(isset($url[1])){
            if(method_exists($this->currentController, $url[1])){
                $this->currentMethod = $url[1];
                unset($url[1]);
            }
        }

        // Get params
        $this->params = $url ? array_values($url) : [];

        // Call a callback with array of params
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }

    public function getUrl(){
        if(isset($_GET['url'])){
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
        return [];
    }
}
