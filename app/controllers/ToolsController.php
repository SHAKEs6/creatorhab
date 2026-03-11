<?php
class ToolsController extends Controller {
    public function index() {
        $data = [
            'title' => 'Creator Tools',
            'description' => 'Accelerate your content creation with our suite of AI-powered YouTube tools.'
        ];
        $this->view('tools/index', $data);
    }
}
