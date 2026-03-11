<?php
class HomeController extends Controller {
    public function __construct(){
        // Will load models here if needed for the homepage
    }

    public function index(){
        $data = [
            'title' => 'Start, Grow & Monetize Your YouTube Channel'
        ];
        
        $this->view('home/index', $data);
    }
}
